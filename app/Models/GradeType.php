<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeType extends Model
{
    protected $table = 'grade_types';

    protected $fillable = [
        'nama',
        'bobot'
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
