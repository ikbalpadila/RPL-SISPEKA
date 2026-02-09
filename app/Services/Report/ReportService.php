<?php

namespace App\Services\Report;

use App\Models\Attendance;;
use App\Models\BehaviorNote;
use App\Models\Grade;
use App\Models\Siswa;   

class ReportService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function generateStudentReport($siswaId)
    {
        return [
            'siswa' => Siswa::find($siswaId),
            'nilai' => Grade::where('siswa_id', $siswaId)->get(),
            'absensi' => Attendance::where('siswa_id', $siswaId)->get(),
            'perilaku' => BehaviorNote::where('siswa_id', $siswaId)->get(),
        ];
    }
}
