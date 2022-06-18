<?php

use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::prefix('attendances')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/store', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/delete', [ProgramController::class, 'destroy'])->name('program.delete');
});

?>
