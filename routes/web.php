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

//Show details student by id
Route::get('/students/{student}',[StudentsController::class,'show'])->name('students.show');

//Edit exist student data
Route::get('/students/{student}/edit',[StudentsController::class,'edit'])->name('students.edit');

//Update exist student
Route::put('/students/{student}',[StudentsController::class,'update'])->name('students.update');

//Delete a student
Route::delete('/students/{student}',[StudentsController::class,'destroy'])->name('students.destroy');