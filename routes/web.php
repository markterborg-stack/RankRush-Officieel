<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\PouleController;
use App\Http\Controllers\GameMatchController;
use App\Http\Controllers\ResultController;
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


#playercontroller

    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');


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

    #gamematchcontroller
    Route::get('/game-matches/create', [GameMatchController::class, 'create'])->name('game-matches.create');

    Route::post('/game-matches', [GameMatchController::class, 'store'])->name('game-matches.store');

    Route::get('/game-matches', [GameMatchController::class, 'index'])->name('game-matches.index');
    
    Route::get('/my-matches', [GameMatchController::class, 'myMatches'])
    ->name('game-matches.my-matches');
    
    Route::get('/standings', [GameMatchController::class, 'standings'])
    ->name('standings.index');
    
    #resultcontroller
    Route::get('/results/{gameMatch}/create', [ResultController::class, 'create'])
        ->name('results.create');

    Route::post('/results/{gameMatch}', [ResultController::class, 'store'])
    ->name('results.store');

    Route::get('/results', [ResultController::class, 'index'])
    ->name('results.index');

    Route::post('/results/{result}/approve', [ResultController::class, 'approve'])
    ->name('results.approve');

    Route::post('/results/{result}/reject', [ResultController::class, 'reject'])
    ->name('results.reject');

    });

require __DIR__.'/auth.php';
