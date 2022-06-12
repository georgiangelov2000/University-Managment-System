<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::post('/exam/taken/{user}',[UserController::class,'examIsTaken'])->name('user.exam.taken');
});

?>
