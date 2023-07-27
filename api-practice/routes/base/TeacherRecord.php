<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::resource('/teacher-records',TeacherController::class);
//Route::get('/teacher-records', [TeacherController::class, 'index']);

