<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\LandingPage;
use App\Models\News;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function index()
    {
        $landing = LandingPage::first();
        $testimonials = Testimonial::latest()->get();
        $news = News::latest()->paginate(10);
        $galleries = Gallery::latest()->get();
        $services = Service::get();
        $partners = Partner::latest()->get();

        return view('welcome', compact('news', 'testimonials', 'landing', 'galleries', 'services', 'partners'));
    }

    public function adminindex()
    {
        $landing = LandingPage::first();

        return view('admin.landingpage.index', compact('landing'));
    }

    public function update(Request $request)
    {
        $landing = LandingPage::firstOrCreate([]);

        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        // Logo
        if ($request->hasFile('logo')) {
            if ($landing->logo) {
                Storage::disk('public')->delete($landing->logo);
            }
            $landing->logo = $request->file('logo')->store('landing', 'public');
        }

        // Image Hero
        if ($request->hasFile('image_hero')) {
            if ($landing->image_hero) {
                Storage::disk('public')->delete($landing->image_hero);
            }
            $landing->image_hero = $request->file('image_hero')->store('landing', 'public');
        }

        // Foto Tentang Kami
        if ($request->hasFile('foto_tentang_kami')) {
            if ($landing->foto_tentang_kami) {
                Storage::disk('public')->delete($landing->foto_tentang_kami);
            }
            $landing->foto_tentang_kami = $request->file('foto_tentang_kami')->store('landing', 'public');
        }

        $landing->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'hero_section' => $request->hero_section,
            'instagram' => $request->instagram,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'tentang_kami' => $request->tentang_kami,
            'link_brosur' => $request->link_brosur,
            'footer_deskripsi' => $request->footer_deskripsi,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Landing page berhasil diupdate');
    }
}
