<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\BehaviorNote;
use App\Models\Attendance;

class WaliDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $siswa = $user->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa belum terhubung.');
        }

        // ================= NILAI =================
        $rataNilai = Grade::where('siswa_id', $siswa->id)->avg('nilai');

        // ================= ABSENSI =================
        $totalAbsensi = Attendance::where('siswa_id', $siswa->id)->count();
        $hadir = Attendance::where('siswa_id', $siswa->id)
            ->where('status', 'hadir')
            ->count();

        $persenHadir = $totalAbsensi > 0
            ? round(($hadir / $totalAbsensi) * 100, 1)
            : 0;

        // ================= PERILAKU =================
        $totalPerilaku = BehaviorNote::where('siswa_id', $siswa->id)->count();

        return view('wali.dashboard', compact(
            'siswa',
            'rataNilai',
            'persenHadir',
            'totalPerilaku'
        ));
    }
}
