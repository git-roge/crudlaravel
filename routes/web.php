<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->middleware('auth');
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/store', [UserController::class, 'store']);

Route::get('/add/student', [StudentController::class, 'create']);
Route::post('/add/student', [StudentController::class, 'store']);

Route::get('/student/{students}', [StudentController::class, 'show']);
Route::put('/student/{students}', [StudentController::class, 'update']);
Route::delete('/student/{students}', [StudentController::class, 'destroy']);
