<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'message' => 'required',
        ]);

        Testimonial::create($data);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'message' => 'required',
        ]);

        $testimonial->update($data);

        return redirect()->back()->with('successedit', 'Testimoni berhasil diupdate');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return back()->with('successdelete', 'Testimoni berhasil dihapus');
    }
}
