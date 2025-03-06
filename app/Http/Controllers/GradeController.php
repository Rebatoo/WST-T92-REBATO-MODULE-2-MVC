<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Log;

class GradeController extends Controller
{
    // Display a list of grades
    public function index()
    {
        try {
            $grades = Grade::with(['student', 'subject'])->get();
            $students = Student::all();
            $subjects = Subject::all();

            return view('grades.index', compact('grades', 'students', 'subjects'));
        } catch (\Exception $e) {
            Log::error('Error in grades index: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to load grades.']);
        }
    }

    // Store a new grade
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|numeric|between:1.00,5.00'
        ]);

        try {
            // Check if grade already exists for this student and subject
            $existingGrade = Grade::where('student_id', $request->student_id)
                                 ->where('subject_id', $request->subject_id)
                                 ->first();

            if ($existingGrade) {
                return redirect()->back()
                    ->withErrors(['error' => 'Grade already exists for this student and subject'])
                    ->withInput();
            }

            // Create new grade
            $grade = Grade::create([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'grade' => $request->grade
            ]);

            // Log successful grade creation
            \Log::info('Grade created successfully', [
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'grade' => $request->grade
            ]);

            return redirect()->route('grades.index')
                ->with('success', 'Grade added successfully');

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Grade creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withErrors(['error' => 'Failed to add grade: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // Show the form to create a new grade
    public function create()
    {
        $enrolledStudents = Student::whereHas('enrollments')->get();
        $subjects = Subject::all();

        return view('grades.create', compact('enrolledStudents', 'subjects'));
    }

    // Show the form to edit an existing grade
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        $students = Student::all();
        $subjects = Subject::all();

        return view('grades.edit', compact('grade', 'students', 'subjects'));
    }

    // Update an existing grade
    public function update(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|numeric|between:1.00,5.00',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update([
            'grade' => $request->grade
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    // Delete a grade
    public function destroy($id)
    {
        Grade::findOrFail($id)->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
