<?php

namespace App\Services;

use App\Models\Grade;

class GradeCalculatorService
{
    public static function hitungNilaiAkhir($siswaId, $assignmentId)
    {
        $grades = Grade::with('gradeType')
            ->where('siswa_id', $siswaId)
            ->where('teaching_assignment_id', $assignmentId)
            ->get();

        if ($grades->isEmpty()) {
            return null;
        }

        $total = 0;

        foreach ($grades as $grade) {
            $bobot = $grade->gradeType->bobot; // %
            $nilai = $grade->nilai;

            $total += ($nilai * $bobot) / 100;
        }

        return round($total, 2);
    }
}
