<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }


    public function create()
    {
        return view('admin.testimonial.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'message' => 'required',
            // 'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // if ($request->hasFile('photo')) {
        //     $data['photo'] = $request->file('photo')->store('testimonials', 'public');
        // }

        Testimonial::create($data);

        return redirect()->back()->with('success','Testimoni berhasil ditambahkan');
    }


    public function edit($id)
    {   
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }


    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'message' => 'required',
            // 'photo' => 'nullable|image'
        ]);

        // if ($request->hasFile('photo')) {
        //     $data['photo'] = $request->file('photo')->store('testimonials','public');
        // }

        $testimonial->update($data);

        return redirect()->back()->with('successedit','Testimoni berhasil diupdate');
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return back()->with('successdelete','Testimoni berhasil dihapus');
    }
}
