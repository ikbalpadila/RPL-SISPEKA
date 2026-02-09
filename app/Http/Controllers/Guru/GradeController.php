<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeachingAssignment;
use App\Models\GradeType;
use App\Models\Grade;
use App\Services\GradeCalculatorService;
use App\Services\Grade\GradeService;

class GradeController extends Controller
{
    public function index()
    {
        $guru = auth()->user()->guru;

        $assignments = $guru->teachingAssignments()
            ->with(['kelas','mapel'])
            ->get();

        return view('guru.grade.index', compact('assignments'));
    }

    public function create($assignmentId)
    {
        $assignment = TeachingAssignment::with(['kelas.siswas','mapel'])
            ->findOrFail($assignmentId);

        $gradeTypes = GradeType::all();

        return view('guru.grade.create', compact(
            'assignment',
            'gradeTypes'
        ));
    }

    public function store(Request $request, $assignmentId, GradeService $service)
    {
        $request->validate([
            'grade_type_id' => 'required|exists:grade_types,id',
            'nilai' => 'required|array'
        ]);

        $service->simpanNilai(
            $assignmentId,
            $request->grade_type_id,
            $request->nilai
        );

        return back()->with('success', 'Nilai berhasil disimpan');
    }
}