<?php

use App\Http\Controllers\Api\ApiCoursesController;
use App\Http\Controllers\Api\ApiExamController;
use App\Http\Controllers\Api\ApiSubjectController;
use App\Http\Controllers\Api\ApiUserController;
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

require_once __DIR__ . '/route/courses.php';
require_once __DIR__ . '/route/exams.php';
require_once __DIR__ . '/route/subjects.php';
require_once __DIR__ . '/route/users.php';


Route::prefix('api')->group(function () {
    Route::get('/users', [ApiUserController::class, 'index'])->name('user.api.index');
    Route::get('/subjects', [ApiSubjectController::class, 'index'])->name('subject.api.index');
    Route::get('/courses', [ApiCoursesController::class, 'index'])->name('course.api.index');
    Route::get('/exams', [ApiExamController::class, 'index'])->name('exam.api.index');

    Route::get('/exam/{exam}/users', [ApiExamController::class, 'users'])->name('exam.api.user');
});
