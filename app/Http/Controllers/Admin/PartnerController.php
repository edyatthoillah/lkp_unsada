<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    // ✅ GET DATA
    public function index()
    {
        // dd('anjazz');
        $partners = Partner::latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    // ✅ STORE DATA
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);

            $logoPath = null;

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('partners', 'public');
            }

            Partner::create([
                'name' => $request->name,
                'logo' => $logoPath,
            ]);

            return back()->with('success', 'Mitra berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan mitra');
        }
    }

    // ✅ UPDATE DATA
    public function update(Request $request, $id)
    {
        try {
            $partner = Partner::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);

            $logoPath = $partner->logo;

            if ($request->hasFile('logo')) {
                // hapus logo lama
                if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                    Storage::disk('public')->delete($partner->logo);
                }

                $logoPath = $request->file('logo')->store('partners', 'public');
            }

            $partner->update([
                'name' => $request->name,
                'logo' => $logoPath,
            ]);

            return back()->with('success', 'Mitra berhasil diupdate');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal update mitra');
        }
    }

    // ✅ DELETE DATA
    public function destroy($id)
    {
        try {
            $partner = Partner::findOrFail($id);

            // hapus file logo
            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }

            $partner->delete();

            return back()->with('success', 'Mitra berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus mitra');
        }
    }
}
