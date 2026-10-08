<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\PouleController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $team = auth()->user()->team;

    return view('dashboard', compact('team'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#teamcontroller
Route::middleware('auth')->group(function () {
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show'); 
});

#playercontroller
Route::middleware('auth')->group(function () {
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');
});

#seasoncontroller
Route::get('/seasons/create', [SeasonController::class, 'create'])
    ->name('seasons.create');

Route::post('/seasons', [SeasonController::class, 'store'])
    ->name('seasons.store');

#poulecontroller
Route::get('/poules/create', [PouleController::class, 'create'])
    ->name('poules.create');

Route::post('/poules', [PouleController::class, 'store'])
    ->name('poules.store');

Route::get('/poules/{poule}', [PouleController::class, 'show'])
    ->name('poules.show');

Route::get('/poules/{poule}', [PouleController::class, 'show'])
    ->name('poules.show');

Route::post('/poules/{poule}/teams', [PouleController::class, 'addTeam'])
    ->name('poules.add-team');

require __DIR__.'/auth.php';
