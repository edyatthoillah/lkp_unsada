<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display listing (Admin)
     */
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('admin.news.news', compact('news'));
    }

    public function landingnews()
    {
        $news = News::latest()->paginate(6);

        return view('news.index', compact('news'));
    }

    /**
     * Store News
     */
    public function store(Request $request)
    {
        try {
            // VALIDASI
            $validated = $request->validate([
                'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'news_title' => 'required|string|max:150',
                'news_content' => 'required|string',
                'status' => 'required|in:draft,publish',
            ]);

            $thumbnailPath = null;

            // UPLOAD THUMBNAIL
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('news', 'public');

                if (! $thumbnailPath) {
                    return back()->with('error', 'Gagal upload thumbnail');
                }
            }

            // GENERATE SLUG (UNIK)
            $slug = Str::slug($validated['news_title']);
            $count = \App\Models\News::where('slug', 'like', "$slug%")->count();
            if ($count > 0) {
                $slug .= '-'.($count + 1);
            }

            // SIMPAN DATA
            \App\Models\News::create([
                'thumbnail' => $thumbnailPath,
                'news_title' => $validated['news_title'],
                'slug' => $slug,
                'news_content' => $validated['news_content'],
                'author' => auth()->user()->name ?? 'Admin',
                'status' => $validated['status'],
                'published_at' => $validated['status'] === 'publish' ? now() : null,
            ]);

            return back()->with('success', 'Berita berhasil ditambahkan.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // ERROR VALIDASI
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // LOG ERROR
            Log::error($e->getMessage());

            return back()->with('error', 'Terjadi kesalahan saat menambahkan berita');
        }
    }

    /**
     * Show detail (Frontend)
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        // optional: berita lain untuk rekomendasi
        $latestNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(3)
            ->get();

        return view('news.show', compact('news', 'latestNews'));
    }

    /**
     * Update News
     */
    public function update(Request $request, News $news)
    {
        try {
            // VALIDASI
            $validated = $request->validate([
                'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'news_title' => 'required|string|max:150',
                'news_content' => 'required|string',
                'status' => 'required|in:draft,publish',
            ]);

            $thumbnailPath = $news->thumbnail;

            // JIKA ADA THUMBNAIL BARU
            if ($request->hasFile('thumbnail')) {

                // HAPUS THUMBNAIL LAMA
                if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
                    Storage::disk('public')->delete($news->thumbnail);
                }

                // UPLOAD BARU
                $uploaded = $request->file('thumbnail')->store('news', 'public');

                if (! $uploaded) {
                    return back()->with('error', 'Gagal upload thumbnail');
                }

                $thumbnailPath = $uploaded;
            }

            // GENERATE SLUG UNIK
            $slug = Str::slug($validated['news_title']);
            $count = \App\Models\News::where('slug', 'like', "$slug%")
                ->where('id', '!=', $news->id)
                ->count();

            if ($count > 0) {
                $slug .= '-'.($count + 1);
            }

            // UPDATE DATA
            $news->update([
                'thumbnail' => $thumbnailPath,
                'news_title' => $validated['news_title'],
                'slug' => $slug,
                'news_content' => $validated['news_content'],
                'status' => $validated['status'],
                'published_at' => $validated['status'] === 'publish' ? now() : null,
            ]);

            return back()->with('successedit', 'Berita berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // ERROR VALIDASI
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // LOG ERROR
            Log::error($e->getMessage());

            return back()->with('error', 'Terjadi kesalahan saat update berita');
        }
    }

    /**
     * Delete News
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Hapus file thumbnail dari storage public
        if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        // Hapus data dari database
        $news->delete();

        return back()->with('successdelete', 'Berita berhasil diperbarui.');
    }
}
