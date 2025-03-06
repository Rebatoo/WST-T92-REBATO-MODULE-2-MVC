<?php

namespace App\Http\Controllers;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller {
    public function index() {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create() {
        $students = Student::all();
        $subjects = Subject::all();
        
        return view('grades.create', compact('students', 'subjects'));
    }

    // Store new student with default password
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:students',
                    'unique:users'  // Check users table too
                ],
                'password' => 'required|string|min:8|confirmed'
            ]);

            // Create the student
            $student = Student::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]);

            return redirect()->route('students.index')
                ->with('success', 'Student created successfully');

        } catch (\Exception $e) {
            Log::error('Student creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->withErrors(['email' => 'This email is already taken.'])
                ->with('error', 'Failed to create student. Please try again.');
        }
    }

    public function edit(Student $student) {
        return view('students.edit', compact('student'));
    }
    
    public function update(Request $request, Student $student)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:students,email,' . $student->id,
                    'unique:users,email'
                ]
            ];

            if ($request->filled('password')) {
                $rules['password'] = 'required|string|min:8|confirmed';
            }

            $validated = $request->validate($rules);

            $data = [
                'name' => $validated['name'],
                'email' => $validated['email']
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($validated['password']);
            }

            $student->update($data);

            return redirect()->route('students.index')
                ->with('success', 'Student updated successfully');

        } catch (\Exception $e) {
            Log::error('Student update failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update student.'])
                ->with('error', 'Update failed. Please try again.');
        }
    }
    
    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
