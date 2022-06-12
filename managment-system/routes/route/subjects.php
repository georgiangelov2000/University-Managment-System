<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

Route::prefix('subjects')->group(function () {
    Route::get('/', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::post('/update/{subject}', [SubjectController::class, 'update'])->name('subject.update');
    Route::get('/edit/{subject}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::get('/delete/{subject}', [SubjectController::class, 'delete'])->name('subject.delete');
    Route::get('/show/{subject}', [SubjectController::class, 'show'])->name('subject.show');
    Route::get('/courses/{subject}', [SubjectController::class, 'getCourse'])->name('subject.course');
    Route::post('/detach/course/{subject}', [SubjectController::class, 'detachCourse'])->name('subject.course.detach');
});

?>
