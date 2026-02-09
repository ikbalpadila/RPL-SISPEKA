<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Attendance;

class AbsensiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $siswa = $user->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa belum terhubung');
        }

        $attendances = Attendance::where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        $rekap = [
            'hadir' => $attendances->where('status', 'hadir')->count(),
            'izin'  => $attendances->where('status', 'izin')->count(),
            'sakit' => $attendances->where('status', 'sakit')->count(),
            'alpa'  => $attendances->where('status', 'alpa')->count(),
        ];

        return view('wali.absensi.index', compact(
            'siswa',
            'attendances',
            'rekap'
        ));
    }
}
