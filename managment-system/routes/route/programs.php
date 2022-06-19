<?php

use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::prefix('programs')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program.index');
});

?>
