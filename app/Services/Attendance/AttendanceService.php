<?php

namespace App\Services\Attendance;

use App\Models\Attendance;

class AttendanceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function recordBulk(array $data, $assignmentId, $tanggal)
    {
        foreach ($data as $siswaId => $status) {
            Attendance::updateOrCreate(
                [
                    'siswa_id' => $siswaId,
                    'teaching_assignment_id' => $assignmentId,
                    'tanggal' => $tanggal,
                ],
                [
                    'status' => $status,
                ]
            );
        }
    }
}
