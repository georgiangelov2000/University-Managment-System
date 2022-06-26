<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course.index');
    Route::get('/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/store', [CourseController::class, 'store'])->name('course.store');
    Route::post('/update/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('/delete/{course}', [CourseController::class, 'delete'])->name('course.delete');
    Route::get('/show/{course}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/{course}/create/program', [CourseController::class, 'createProgram'])->name('course.create.program');
    Route::post('/{course}/store/program', [CourseController::class, 'storeProgram'])->name('course.store.program');
    Route::get('/{course}/students', [CourseController::class, 'students'])->name('course.students');
    Route::post('/delete/{course}', [CourseController::class, 'update'])->name('course.update');
});
