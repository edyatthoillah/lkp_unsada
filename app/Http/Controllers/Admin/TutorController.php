<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function tutors()
    {
        $tutors = Tutor::latest()->get();

        return view('tutor', compact('tutors'));
    }

    // Tampilkan semua tutor
    public function index()
    {
        $tutors = Tutor::latest()->get();

        return view('admin.tutors.index', compact('tutors'));
    }

    // Simpan tutor baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048', // max 2MB
            'description' => 'nullable|string',
        ]);

        $data = $request->only('name', 'description');

        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('tutors', 'public');
        }

        Tutor::create($data);

        return redirect()->route('admin.tutor.index')->with('success', 'Tutor berhasil ditambahkan!');
    }

    // Update tutor
    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only('name', 'description');

        // Update foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($tutor->photo) {
                Storage::disk('public')->delete($tutor->photo);
            }
            $data['photo'] = $request->file('photo')->store('tutors', 'public');
        }

        $tutor->update($data);

        return redirect()->route('admin.tutor.index')->with('successedit', 'Tutor berhasil diperbarui!');
    }

    // Hapus tutor
    public function destroy(Tutor $tutor)
    {
        // Hapus foto jika ada
        if ($tutor->photo) {
            Storage::disk('public')->delete($tutor->photo);
        }

        $tutor->delete();

        return redirect()->route('admin.tutor.index')->with('success', 'Data berhasil dihapus');
    }
}
