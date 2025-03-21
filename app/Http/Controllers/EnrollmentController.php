<?php

namespace App\Http\Controllers;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller

{public function index()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $enrollments = Enrollment::all();
        
        return view('enrollments.index', compact('students', 'subjects', 'enrollments'));
    }
    
    public function create()
    {
        // Fetch all students and subjects from the database
        $students = Student::all();
        $subjects = Subject::all();
    
        return view('enrollments.create', compact('students', 'subjects'));
    }
    

    public function store(EnrollmentRequest $request)
    {
        // Check if student is already enrolled in this subject
        $existingEnrollment = Enrollment::where('student_id', $request->student_id)
            ->where('subject_id', $request->subject_id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->route('enrollments.index')
                ->with('warning', 'This student is already enrolled in this subject!');
        }

        // If no duplicate found, create the enrollment
        Enrollment::create($request->all());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment created successfully! ');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')
            ->with('warning', 'Enrollment deleted successfully! ');
    }

    public function update(EnrollmentRequest $request, Enrollment $enrollment)
    {
        // Check if student is already enrolled in the requested subject
        $existingEnrollment = Enrollment::where('student_id', $enrollment->student_id)
            ->where('subject_id', $request->subject_id)
            ->where('id', '!=', $enrollment->id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->route('enrollments.index')
                ->with('warning', '⚠️ This student is already enrolled in this subject!');
        }

        // Update only the subject if no duplicate found
        $enrollment->update([
            'subject_id' => $request->subject_id,
        ]);

        return redirect()->route('enrollments.index')
            ->with('info', 'Enrollment updated successfully! 📝');
    }
    
}
