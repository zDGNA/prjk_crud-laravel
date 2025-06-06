<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

//students_routes
//Display all students
Route::get('/students',[StudentsController::class,'index'])->name('students.index');
//route to display form for creating student
Route::get('/students/create',[StudentsController::class,'create'])->name('students.create');

//store a student in the student table
Route::post('/students',[StudentsController::class,'store'])->name('students.store');
