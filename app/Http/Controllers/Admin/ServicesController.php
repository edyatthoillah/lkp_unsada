<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    // 🔹 Tampilkan semua data
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    // 🔹 Form tambah data
    public function create()
    {
        return view('admin.services.create');
    }

    // 🔹 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|string|max:100',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data = [
            'icon' => $request->icon,
            'name' => $request->name,
            'description' => $request->description,
        ];

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil ditambahkan');
    }

    // 🔹 Form edit
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // 🔹 Update data
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'icon' => 'nullable|string|max:100',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data = [
            'icon' => $request->icon,
            'name' => $request->name,
            'description' => $request->description,
        ];

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil diupdate');
    }

    // 🔹 Hapus data
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil dihapus');
    }
}