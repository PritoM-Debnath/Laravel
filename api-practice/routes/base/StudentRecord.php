<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/student-records', [StudentController::class, 'index'])->name('student-records.index');
Route::get('/student-records/{id}', [StudentController::class, 'StudentRecordByID'])->name('StudentRecordByID');
Route::post('/student-records', [StudentController::class, 'create'])->name('studentrecords create');
Route::delete('/student-records/{id}', [StudentController::class, 'delete'])->name('studentrecords destroy');
Route::put('/student-records/{id}', [StudentController::class, 'update'])->name('student_records update');