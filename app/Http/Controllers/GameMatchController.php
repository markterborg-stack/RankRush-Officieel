<?php

namespace App\Http\Controllers;

use App\Models\Seasons;
use App\Models\Poules;
use App\Models\GameMatch;
use App\Models\Teams;
use Illuminate\Http\Request;


class GameMatchController extends Controller
{
    public function create()
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $seaons = Season::orderBy('start_date')->get();
        $poules = Poule::with('season')->get();
        $teams = Team::orderBy('name')->get();


        return view('game-match.create', compact(
            'seasons',
            'poules',
            'teams',
        ));
    }

    public function store

    
}
