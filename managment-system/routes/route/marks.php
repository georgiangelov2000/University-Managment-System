<?php

use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

Route::prefix('marks')->group(function () {
    Route::get('/', [MarkController::class, 'index'])->name('mark.index');
    Route::get('/create', [MarkController::class, 'create'])->name('mark.create');
    Route::post('/store', [MarkController::class, 'store'])->name('mark.store');
    Route::get('/delete', [MarkController::class, 'destroy'])->name('mark.delete');
});


?>
