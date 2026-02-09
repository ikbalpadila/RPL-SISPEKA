<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Schema::table('grades', function (Blueprint $table) {

            // 1. Tambah kolom baru
            // $table->foreignId('grade_type_id')
            //       ->after('teaching_assignment_id')
            //       ->constrained()
            //       ->cascadeOnDelete();

            // 2. Hapus unique lama
        //     $table->dropUnique(['siswa_id', 'teaching_assignment_id']);

        //     // 3. Tambah unique baru
        //     $table->unique([
        //         'siswa_id',
        //         'teaching_assignment_id',
        //         'grade_type_id'
        //     ]);
        // });
    }

    public function down(): void
    {
        // Schema::table('grades', function (Blueprint $table) {

        //     // rollback unique baru
        //     $table->dropUnique([
        //         'siswa_id',
        //         'teaching_assignment_id',
        //         'grade_type_id'
        //     ]);

        //     // rollback kolom
        //     $table->dropForeign(['grade_type_id']);
        //     $table->dropColumn('grade_type_id');

        //     // kembalikan unique lama
        //     $table->unique([
        //         'siswa_id',
        //         'teaching_assignment_id'
        //     ]);
        // });
    }
};
