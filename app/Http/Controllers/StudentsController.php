<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request as IlluminateHttpRequest;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::orderByDesc('created_at')->paginate(5);
        return view('students.index', compact('students'));
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email'=> 'required|email|unique:students,email',
            'phone'=> 'required|digits:10|unique:students,phone',
        ]);
        // dd('ok');

        Student::create($request->all());
        return back()->with('success', "Student added successfully");
    }
}
