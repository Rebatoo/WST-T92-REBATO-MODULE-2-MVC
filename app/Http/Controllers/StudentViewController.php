<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class StudentViewController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $grades = Grade::with('subject')
            ->where('student_id', $student->id)
            ->get();

        return view('students.grades', compact('grades'));
    }
}