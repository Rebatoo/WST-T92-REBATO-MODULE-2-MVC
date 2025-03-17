<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class StudentViewController extends Controller
{
    public function index()
    {
        try {
            // Get the authenticated student
            $student = Auth::guard('student')->user();
            
            // Debug student information
            Log::info('Student Details:', [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email
            ]);

            // Get all students for debugging
            $allStudents = Student::all();
            Log::info('All Students:', ['count' => $allStudents->count(), 'students' => $allStudents->toArray()]);

            // Get all subjects
            $subjects = Subject::all();
            Log::info('All Subjects:', ['count' => $subjects->count(), 'subjects' => $subjects->toArray()]);

            // Get all grades
            $allGrades = Grade::all();
            Log::info('All Grades:', ['count' => $allGrades->count(), 'grades' => $allGrades->toArray()]);

            // Get student's grades
            $grades = Grade::with(['subject'])
                ->where('student_id', $student->id)
                ->get();

            Log::info('Student Grades:', [
                'student_id' => $student->id,
                'grades_count' => $grades->count(),
                'grades' => $grades->toArray()
            ]);

            // Check if student exists in grades table
            $hasGrades = Grade::where('student_id', $student->id)->exists();
            Log::info('Student Grade Status:', [
                'student_id' => $student->id,
                'has_grades' => $hasGrades
            ]);

            return view('studentgrades', compact('grades', 'subjects', 'hasGrades'));
        } catch (\Exception $e) {
            Log::error('Error in StudentViewController@index:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'student_id' => $student->id ?? 'not set'
            ]);
            return back()->with('error', 'Failed to load grades. Please try again.');
        }
    }
}
