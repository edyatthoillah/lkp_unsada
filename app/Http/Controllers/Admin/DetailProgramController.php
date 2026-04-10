<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DetailProgram;
use App\Models\Program;
use Illuminate\Http\Request;

class DetailProgramController extends Controller
{
        public function programs()
{
    $program = Program::with('details')->get();

    return view('program', compact('program'));
}
    /**
     * Simpan data
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'program_id'   => 'required|exists:programs,id',
            'sub_program'  => 'required|string|max:255',
            'detail'       => 'nullable|string',
            'harga'        => 'nullable|numeric'
        ]);

        DetailProgram::create($data);

        return redirect()->back()->with('success', 'Detail program berhasil ditambahkan');
    }

    /**
     * Update data
     */
public function update(Request $request, $id)
{
    $detail = DetailProgram::findOrFail($id);

    $data = $request->validate([
        'sub_program'  => 'required|string|max:255',
        'detail'       => 'nullable|string',
        'harga'        => 'nullable|numeric'
    ]);

    $detail->update($data);

    return redirect()->back()->with('success', 'Detail program berhasil diupdate');
}

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $detail = DetailProgram::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Detail program berhasil dihapus');
    }
}