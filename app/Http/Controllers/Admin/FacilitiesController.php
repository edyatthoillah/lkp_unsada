<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilitiesController extends Controller
{
    public function facilities(){
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
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
        ]);

        $imagePath = $request->file('image')->store('facilities', 'public');

        Facility::create([
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // hapus gambar lama
            if ($facility->image && Storage::disk('public')->exists($facility->image)) {
                Storage::disk('public')->delete($facility->image);
            }

            $imagePath = $request->file('image')->store('facilities', 'public');
        } else {
            $imagePath = $facility->image;
        }

        $facility->update([
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Data berhasil diupdate');
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
