<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ObituaryController;

// Route to display the obituary form
Route::get('/obituary_form', function () {
    return view('obituary_form');
})->name('obituary_form');


Route::get('/', function () {
    return view('obituary_form');
});

Route::post('/submit_obituary', [ObituaryController::class, 'store'])->name('submit_obituary');
Route::get('/view_obituaries', [ObituaryController::class, 'index'])->name('view_obituaries');


Route::get('/', function () {
    return view('welcome');
});
