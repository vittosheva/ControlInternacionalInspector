<?php

use App\Http\Controllers\Pdf\GenerateController;
use App\Http\Controllers\Pdf\ViewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::domain(config('dorsi.project_url_homepage'))->group(function () {
    Route::prefix('pdf')->name('pdf.')->group(function () {
        Route::get('generate/{record}/{document?}', [GenerateController::class, 'handle'])->middleware('auth:web')->name('generate');
        Route::get('view/{record}', [ViewController::class, 'handle'])->name('view');
    });
});
