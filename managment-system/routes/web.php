<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/show/{user}', [UserController::class, 'show'])->name('user.show');

});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course.index');
    Route::get('/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/store', [CourseController::class, 'store'])->name('course.store');
    Route::post('/update/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('/delete/{course}', [CourseController::class, 'delete'])->name('course.delete');
    Route::get('/show/{course}', [CourseController::class, 'show'])->name('course.show');
});

