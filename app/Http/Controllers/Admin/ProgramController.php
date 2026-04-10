<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'icon'  => 'nullable|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        Program::create($request->all());

        return redirect()->route('admin.program.index')
            ->with('success', 'Program berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    public function show($id)
{
    $program = Program::with('details')->findOrFail($id);

    return view('admin.program.detail', compact('program'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'icon'  => 'nullable|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        $program->update($request->all());

        return redirect()->route('admin.program.index')
            ->with('success', 'Program berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('admin.program.index')
            ->with('success', 'Program berhasil dihapus');
    }
}