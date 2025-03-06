<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove duplicates keeping only the latest grade
        DB::statement('
            DELETE FROM grades 
            WHERE id NOT IN (
                SELECT MAX(id)
                FROM (SELECT * FROM grades) AS g
                GROUP BY student_id, subject_id
            )
        ');

        // Add the unique constraint
        Schema::table('grades', function (Blueprint $table) {
            $table->unique(['student_id', 'subject_id'], 'grades_student_subject_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};