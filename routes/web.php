<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");

Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard")->middleware("auth");

Route::resource("stagiaires", \App\Http\Controllers\StagiaireController::class)->middleware("auth");

Route::resource("seances", \App\Http\Controllers\SeanceController::class)->middleware("auth");

Route::resource("absences", \App\Http\Controllers\AbsenceController::class)->middleware("auth");

Route::post('absences', [\App\Http\Controllers\AbsenceController::class, 'list'])->name("absences.list");

Route::fallback(function () {
    return view('errors.404');
});
