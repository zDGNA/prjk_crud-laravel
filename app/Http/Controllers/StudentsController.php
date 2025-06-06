<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request as IlluminateHttpRequest;
use Illuminate\Validation\Rule;

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
        return redirect()->route('students.index')->with('success', "Student added successfully");
    }
    public function show(Student $student)
    {
        // $stundent = Student::findOrFail($id);
        // dd($student);
        return view('students.show', compact('student'));
    }

        public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
        public function update(Request $request, Student $student)
    {
        //validate data
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email'=> [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id)
            ],
            'phone'=>[
                'required',
                'digits:10',
                Rule::unique('students', 'phone')->ignore($student->id)
            ],
        ]);
        // dd('ok');
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', "Student updated successfully");
    }

        public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', "Student delete successfully");
    }
}
