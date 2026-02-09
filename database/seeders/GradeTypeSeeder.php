<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('grade_types')->upsert(
            [
                ['nama' => 'Tugas', 'bobot' => 20],
                ['nama' => 'UH', 'bobot' => 30],
                ['nama' => 'UTS', 'bobot' => 20],
                ['nama' => 'UAS', 'bobot' => 30],
            ],
            ['nama'],          // unique key
            ['bobot']          // column to update if exists
        );
        
    }
}
