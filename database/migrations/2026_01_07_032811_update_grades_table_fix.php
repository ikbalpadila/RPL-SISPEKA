<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    // Schema::table('grades', function (Blueprint $table) {

    //     // hapus UNIQUE lama
    //     $table->dropUnique('grades_siswa_id_teaching_assignment_id_unique');

    //     // buat UNIQUE baru 3 kolom
    //     $table->unique(
    //         ['siswa_id', 'teaching_assignment_id', 'grade_type_id'],
    //         'grades_siswa_id_teach_assign_grade_type_unique'
    //     );
    // });
}

public function down(): void
{
    // Schema::table('grades', function (Blueprint $table) {

    //     // rollback unique baru
    //     $table->dropUnique('grades_siswa_id_teach_assign_grade_type_unique');

    //     // kembalikan unique lama
    //     $table->unique(
    //         ['siswa_id', 'teaching_assignment_id'],
    //         'grades_siswa_id_teaching_assignment_id_unique'
    //     );
    // });
}
};