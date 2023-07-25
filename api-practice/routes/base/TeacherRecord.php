<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/teacher-records', [TeacherController::class, 'index'])->name('teacher-records.index');
