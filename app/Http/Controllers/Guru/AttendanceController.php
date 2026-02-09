<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Attendance\AttendanceService;
use App\Models\TeachingAssignment;
use App\models\user;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    protected AttendanceService $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        $assignments = auth()->user()->guru
            ->teachingAssignments()
            ->with('kelas','mapel')
            ->get();

        return view('guru.attendance.index', compact('assignments'));
    }

    public function store(Request $request)
{
    $request->validate([
        'assignment_id' => 'required|exists:teaching_assignments,id',
        'tanggal' => 'required|date',
        'attendance' => 'required|array',
    ]);

    foreach ($request->attendance as $siswaId => $status) {

        // update jika ada, buat jika belum ada
        Attendance::updateOrCreate(
            [
                'siswa_id' => $siswaId,
                'teaching_assignment_id' => $request->assignment_id,
                'tanggal' => $request->tanggal,
            ],
            [
                'status' => $status,
            ]
        );
    }

    return back()->with('success', 'Absensi berhasil disimpan');
}

    public function create($assignmentId)
{
    $assignment = TeachingAssignment::with('kelas.siswas')->findOrFail($assignmentId);

    return view('guru.attendance.create', [
        'assignment' => $assignment,
        'siswa' => $assignment->kelas->siswas
    ]);
}

public function history($assignmentId)
{
    $assignment = TeachingAssignment::with('kelas.siswas')->findOrFail($assignmentId);

    $attendances = Attendance::where('teaching_assignment_id', $assignmentId)
        ->orderBy('tanggal', 'desc')
        ->get()
        ->groupBy('tanggal');

    return view('guru.attendance.history', compact('assignment', 'attendances'));
}

public function edit($assignmentId, $attendanceDate)
{
    $assignment = TeachingAssignment::with('kelas')->findOrFail($assignmentId);

    $records = Attendance::with('siswa')
        ->where('teaching_assignment_id', $assignmentId)
        ->whereDate('tanggal', $attendanceDate)
        ->get();

    return view('guru.attendance.edit', compact(
        'assignment',
        'attendanceDate',
        'records'
    ));
}

public function update(Request $request, $date)
{
    foreach ($request->attendance as $id => $status) {
        Attendance::where('id', $id)->update([
            'status' => $status
        ]);
    }

    return back()->with('success', 'Absensi berhasil diperbarui');
}

}

