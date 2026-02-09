<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\GradeType;
use App\Models\TeachingAssignment;

class NilaiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $siswa = $user->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa belum terhubung');
        }

        // Ambil semua mapel yg diikuti siswa
        $teachings = TeachingAssignment::with('mapel')
            ->whereHas('grades', function ($q) use ($siswa) {
                $q->where('siswa_id', $siswa->id);
            })
            ->get();

        $gradeTypes = GradeType::orderBy('id')->get();

        $grades = Grade::where('siswa_id', $siswa->id)
            ->orderBy('created_at')
            ->get()
            ->groupBy([
                'teaching_assignment_id',
                'grade_type_id'
            ]);

        return view('wali.nilai.index', compact(
            'siswa',
            'teachings',
            'gradeTypes',
            'grades'
        ));
    }
}
