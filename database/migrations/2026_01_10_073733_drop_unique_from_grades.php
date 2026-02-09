<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('grades', function (Blueprint $table) {
        $table->dropUnique('grades_unique3');
    });
}

public function down(): void
{
    Schema::table('grades', function (Blueprint $table) {
        $table->unique(['siswa_id', 'teaching_assignment_id', 'grade_type_id'], 'grades_grades_unique3');
    });
}

};
