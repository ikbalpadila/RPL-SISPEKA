<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'siswa_id',
        'teaching_assignment_id',
        'grade_type_id',
        'nilai',
        'tanggal_input',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function type() {
        return $this->belongsTo(GradeType::class,'grade_type_id');
    }

    public function gradeType() {
        return $this->belongsTo(GradeType::class);
    }
    public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class);
    }
}
