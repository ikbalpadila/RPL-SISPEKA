<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\TeachingAssignment;
use App\Models\grade;
use App\Models\Attendance;
use App\Models\BehaviorNote;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentReportExport;

class ReportController extends Controller
{
    // 1️⃣ INDEX → daftar siswa
    public function index()
    {
        $siswas = Siswa::orderBy('nama')->get();
        return view('admin.report.siswa.index', compact('siswas'));
    }

    // 2️⃣ DAFTAR MAPEL SISWA
    public function mapel($siswaId)
    {
        $siswa = Siswa::with('kelas')->findOrFail($siswaId);

        $mapel = TeachingAssignment::with('mapel')
            ->where('kelas_id', $siswa->kelas_id)
            ->get();

        return view('admin.report.mapel', compact('siswa','mapel'));
    }

    // 3️⃣ DETAIL LAPORAN PER MAPEL
    public function detail($siswaId, $mapelId)
{
    $siswa = Siswa::with('kelas')->findOrFail($siswaId);

    // NILAI → dikelompokkan per jenis nilai
    $nilai = Grade::with(['gradeType'])
        ->where('siswa_id', $siswaId)
        ->whereHas('teachingAssignment', function ($q) use ($mapelId) {
            $q->where('mapel_id', $mapelId);
        })
        ->get()
        ->groupBy(fn ($item) => $item->gradeType->nama);

    // ABSENSI (per mapel)
    $absensi = Attendance::where('siswa_id', $siswaId)
        ->whereHas('teachingAssignment', function ($q) use ($mapelId) {
            $q->where('mapel_id', $mapelId);
        })
        ->get();

    // PERILAKU (global)
    $perilaku = BehaviorNote::where('siswa_id', $siswaId)->get();

    return view('admin.report.show', compact(
        'siswa',
        'nilai',
        'absensi',
        'perilaku',
        'mapelId',
    ));
}

public function exportExcel($siswaId, $mapelId)
{
    return Excel::download(
        new StudentReportExport($siswaId, $mapelId),
        'laporan_siswa.xlsx'
    );
    
}

}
