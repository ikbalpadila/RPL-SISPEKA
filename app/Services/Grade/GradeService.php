<?php

namespace App\Services\Grade;

use App\Models\Grade;

class GradeService
{
    public function simpanNilai($assignmentId, $gradeTypeId, array $nilaiData)
    {
        foreach ($nilaiData as $siswaId => $nilai) {

            if ($nilai === null || $nilai === '') continue;

            $urutan = Grade::where('siswa_id', $siswaId)
                ->where('teaching_assignment_id', $assignmentId)
                ->where('grade_type_id', $gradeTypeId)
                ->count() + 1;

            Grade::create([
                'siswa_id' => $siswaId,
                'teaching_assignment_id' => $assignmentId,
                'grade_type_id' => $gradeTypeId,
                'nilai' => $nilai,
                'urutan' => $urutan
            ]);
        }
    }
}
