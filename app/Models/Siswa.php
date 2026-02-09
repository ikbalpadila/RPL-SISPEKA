<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Siswa extends Model
{
    protected $fillable = ['nis', 'user_id', 'nama', 'kelas_id', 'wali_nama', 'tanggal_lahir', 'jenis_kelamin'];

    public function wali()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function behaviorNotes()
    {
        return $this->hasMany(BehaviorNote::class);
    }

    public function nilaiAkhir($teachingId)
    {
        $grades = $this->grades()
            ->where('teaching_assignment_id', $teachingId)
            ->with('gradeType')
            ->get();

        $total = 0;

        foreach ($grades as $grade) {
            $total += $grade->nilai * ($grade->gradeType->bobot / 100);
        }

        return round($total, 2);
    }

}