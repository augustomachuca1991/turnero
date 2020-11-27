<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PacientesTable;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('principal');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes', PacientesTable::class)->name('pacientes');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes', function () {
    return view('pacientes.index');
})->name('pacientes');

Route::middleware(['auth:sanctum', 'verified'])->get('/turnos', function () {
    return view('turnos.index');
})->name('turnos');
