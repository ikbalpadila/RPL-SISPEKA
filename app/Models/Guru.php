<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nip', 'nama', 'email', 'jenis_kelamin', 'telepon', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teachingAssignments()
    {
        return $this->hasMany(TeachingAssignment::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'teaching_assignments');
    }

    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'teaching_assignments');
    }

    public function getDisplayNameAttribute()
    {
        return "{$this->nama} ({$this->nip})";
    }

    public function scopeWithAssignments($query)
    {
        return $query->with(['assignments.kelas', 'assignments.mapel']);
    }

    public function behaviorNotes()
    {
        return $this->hasMany(BehaviorNote::class);
    }
}
