<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('attendances')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/delete', [PaymentController::class, 'destroy'])->name('payment.delete');
});

?>
