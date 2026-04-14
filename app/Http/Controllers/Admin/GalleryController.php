<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.galery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        try {
            // VALIDASI
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // CEK FILE ADA ATAU TIDAK
            if (! $request->hasFile('image')) {
                return redirect()->back()->with('error', 'File gambar tidak ditemukan');
            }

            // UPLOAD FILE
            $imagePath = $request->file('image')->store('gallery', 'public');

            if (! $imagePath) {
                return redirect()->back()->with('error', 'Gagal upload gambar');
            }

            // SIMPAN KE DATABASE
            Gallery::create([
                'image' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Gambar berhasil ditambahkan');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // ERROR VALIDASI
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // ERROR UMUM
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // AMBIL DATA
            $gallery = Gallery::findOrFail($id);

            // VALIDASI
            $validated = $request->validate([
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $imagePath = $gallery->image;

            // CEK JIKA ADA FILE BARU
            if ($request->hasFile('image')) {

                // HAPUS GAMBAR LAMA
                if ($gallery->image && \Storage::disk('public')->exists($gallery->image)) {
                    \Storage::disk('public')->delete($gallery->image);
                }

                // UPLOAD GAMBAR BARU
                $uploaded = $request->file('image')->store('gallery', 'public');

                if (! $uploaded) {
                    return redirect()->back()->with('error', 'Gagal upload gambar baru');
                }

                $imagePath = $uploaded;
            }

            // UPDATE DATA
            $gallery->update([
                'image' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Gambar berhasil diupdate');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // DATA TIDAK DITEMUKAN
            return redirect()->back()->with('error', 'Data tidak ditemukan');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // ERROR VALIDASI
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // ERROR UMUM
            \Log::error($e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat update gambar');
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }
}
