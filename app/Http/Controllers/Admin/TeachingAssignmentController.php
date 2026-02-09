<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssignment;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;

class TeachingAssignmentController extends Controller
{
    public function index()
    {
        $teaching_assignments = TeachingAssignment::with(['guru','mapel','kelas'])->get();

        return view(
            'admin.teaching_assignments.index',
            compact('teaching_assignments')
        );
    }

    public function create()
    {
        $gurus  = Guru::orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $kelas  = Kelas::orderBy('tingkat')->orderBy('nama_kelas')->get();

        return view(
            'admin.teaching_assignments.create',
            compact('gurus', 'mapels', 'kelas')
        );
    }

    // ✅ FIX: SIMPAN DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guru_id'  => 'required|exists:gurus,id',
            'mapel_id' => 'required|exists:mapels,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        TeachingAssignment::create($validated);

        return redirect()
            ->route('admin.teaching_assignments.index')
            ->with('success', 'Penugasan mengajar berhasil ditambahkan');
    }

    // ✅ FIX: AMBIL DATA EDIT
    public function edit($id)
    {
        $assignment = TeachingAssignment::findOrFail($id);

        $gurus  = Guru::orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();
        $kelas  = Kelas::orderBy('tingkat')->orderBy('nama_kelas')->get();

        return view(
            'admin.teaching_assignments.edit',
            compact('assignment','gurus','mapels','kelas')
        );
    }

    // ✅ FIX: UPDATE DATA
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'guru_id'  => 'required|exists:gurus,id',
            'mapel_id' => 'required|exists:mapels,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $assignment = TeachingAssignment::findOrFail($id);
        $assignment->update($validated);

        return redirect()
            ->route('admin.teaching_assignments.index')
            ->with('success', 'Penugasan mengajar berhasil diupdate');
    }

    // ✅ FIX: DELETE
    public function destroy($id)
    {
        TeachingAssignment::findOrFail($id)->delete();

        return redirect()
            ->route('admin.teaching_assignments.index')
            ->with('success', 'Penugasan mengajar berhasil dihapus');
    }
}
