<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BehaviorNote extends Model
{
    protected $fillable = [
        'siswa_id',
        'guru_id',
        'jenis',
        'catatan',
        'tanggal'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
