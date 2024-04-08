<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SerpiesteEscaleras;
use App\Livewire\Hall;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware(['auth'])->group(function(){
    Route::get('/hall',Hall::class)->name('hall');
    Route::get('/serpiestes-y-escaleras/{game}',SerpiesteEscaleras::class)->name('game.serpientesyescaleras');
    // Route::get('/checker/{game}',ChatGame::class)->name('checker');
});