<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\GradeType;
use App\Models\TeachingAssignment;

class GuruGradeController extends Controller
{
    /**
     * MATRIX NILAI (READ + EDIT ONLY)
     */
    public function matrix($teachingId)
    {
        $teaching = TeachingAssignment::with([
            'kelas.siswas',
            'mapel'
        ])->findOrFail($teachingId);

        $gradeTypes = GradeType::orderBy('id')->get();

        /**
         * Ambil semua nilai
         * Urutkan berdasarkan urutan tugas
         */
        $grades = Grade::where('teaching_assignment_id', $teachingId)
            ->orderBy('created_at')
            ->get()
            ->groupBy([
                'siswa_id',
                'grade_type_id'
            ]);

        return view('guru.grade.matrix', compact(
            'teaching',
            'gradeTypes',
            'grades'
        ));
    }

    /**
     * UPDATE NILAI (REMEDIAL / EDIT)
     * ❌ TIDAK INSERT BARU
     */
    public function updateMatrix(Request $request, $teachingId)
    {
        if (!$request->has('nilai')) {
            return back()->with('info', 'Tidak ada perubahan nilai');
        }

        $adaPerubahan = false;

        foreach ($request->nilai as $gradeId => $nilaiBaru) {

            if ($nilaiBaru === null || $nilaiBaru === '') {
                continue;
            }

            $grade = Grade::find($gradeId);

            if (!$grade) continue;

            if ((int)$grade->nilai !== (int)$nilaiBaru) {
                $grade->update([
                    'nilai' => $nilaiBaru
                ]);
                $adaPerubahan = true;
            }
        }

        if (!$adaPerubahan) {
            return back()->with('info', 'Tidak ada perubahan nilai');
        }

        return back()->with('success', 'Nilai berhasil diperbarui');
    }

    /**
     * HAPUS SEMUA NILAI DALAM 1 KELAS & MAPEL
     */
    public function deleteMatrix($teachingId)
    {
        Grade::where('teaching_assignment_id', $teachingId)->delete();

        return back()->with('success', 'Semua nilai berhasil dihapus');
    }
}
