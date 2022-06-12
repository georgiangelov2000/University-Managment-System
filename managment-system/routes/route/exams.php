<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;

Route::prefix('exams')->group(function () {
    Route::get('/', [ExamController::class, 'index'])->name('exam.index');
    Route::get('/create', [ExamController::class, 'create'])->name('exam.create');
    Route::post('/store', [ExamController::class, 'store'])->name('exam.store');
    Route::post('/update/{exam}', [ExamController::class, 'update'])->name('exam.update');
    Route::get('/edit/{exam}', [ExamController::class, 'edit'])->name('exam.edit');
    Route::get('/delete/{exam}', [ExamController::class, 'delete'])->name('exam.delete');
    Route::get('/show/{exam}', [ExamController::class, 'show'])->name('exam.show');
    Route::get('/student/detach/{exam}', [ExamController::class, 'detachStudent'])->name('exam.student.detach');
});

?>
