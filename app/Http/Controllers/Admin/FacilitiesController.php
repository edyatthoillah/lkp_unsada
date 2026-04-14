<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FacilitiesController extends Controller
{
    public function facilities()
    {
        $facilities = Facility::latest()->get();

        return view('facilities', compact('facilities'));
    }

    public function index()
    {
        $facilities = Facility::latest()->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        try {
            // VALIDASI MANUAL (biar bisa pakai error bag)
            $validator = \Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator, 'store') // 🔥 penting
                    ->withInput();
            }

            // CEK FILE
            if (! $request->hasFile('image')) {
                return back()
                    ->with('error', 'File gambar tidak ditemukan')
                    ->withInput();
            }

            // UPLOAD
            $imagePath = $request->file('image')->store('facilities', 'public');

            if (! $imagePath) {
                return back()
                    ->with('error', 'Gagal upload gambar')
                    ->withInput();
            }

            // SIMPAN
            Facility::create([
                'image' => $imagePath,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.facilities.index')
                ->with('success', 'Data berhasil ditambahkan');

        } catch (\Exception $e) {

            \Log::error($e->getMessage());

            return back()
                ->with('error', 'Terjadi kesalahan saat menambahkan data')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        try {
            $facility = Facility::findOrFail($id);

            $validator = \Validator::make($request->all(), [
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator, 'update') // 🔥 error bag update
                    ->with('edit_id', $id)             // 🔥 simpan id
                    ->withInput();
            }

            $imagePath = $facility->image;

            if ($request->hasFile('image')) {

                if ($facility->image && Storage::disk('public')->exists($facility->image)) {
                    Storage::disk('public')->delete($facility->image);
                }

                $imagePath = $request->file('image')->store('facilities', 'public');

                if (! $imagePath) {
                    return back()
                        ->with('error', 'Gagal upload gambar')
                        ->with('edit_id', $id)
                        ->withInput();
                }
            }

            $facility->update([
                'image' => $imagePath,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.facilities.index')
                ->with('successedit', 'Data berhasil diupdate');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return back()->with('error', 'Data tidak ditemukan');

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return back()
                ->with('error', 'Terjadi kesalahan saat update data')
                ->with('edit_id', $id) // 🔥 WAJIB
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        if ($facility->image && Storage::disk('public')->exists($facility->image)) {
            Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
