<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('attendances')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/delete', [AttendanceController::class, 'destroy'])->name('attendance.delete');
});

?>
