<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
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

    public function landingnews(){
        $news = News::latest()->paginate(6);

    return view('news.index', compact('news'));
    }

    /**
     * Store News
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'news_title' => 'required|max:150',
            'news_content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')
                ->store('news', 'public');
        }

        News::create([
            'thumbnail' => $thumbnailPath,
            'news_title' => $request->news_title,
            'slug' => Str::slug($request->news_title),
            'news_content' => $request->news_content,
            'author' => auth()->user()->name ?? 'Admin',
            'status' => $request->status,
            'published_at' => $request->status === 'publish' ? now() : null,
        ]);

        return back()->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Show detail (Frontend)
     */
    public function show($slug)
    {
       $news = News::where('slug', $slug)->firstOrFail();

    // optional: berita lain untuk rekomendasi
    $latestNews = News::where('id','!=',$news->id)
        ->latest()
        ->take(3)
        ->get();

    return view('news.show', compact('news','latestNews'));
    }

    /**
     * Update News
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'news_title' => 'required|max:150',
            'news_content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        if ($request->hasFile('thumbnail')) {
            $news->thumbnail = $request->file('thumbnail')
                ->store('news', 'public');
        }

        $news->update([
            'news_title' => $request->news_title,
            'slug' => Str::slug($request->news_title),
            'news_content' => $request->news_content,
            'status' => $request->status,
            'published_at' => $request->status === 'publish' ? now() : null,
        ]);

        return back()->with('successedit', 'Berita berhasil diperbarui.');
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
