<?php

namespace App\Http\Controllers;

use App\Models\Poule;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Http\Request;


class PouleController extends Controller
{
    public function create()
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

    

        $seasons = Season::orderBy('start_date')->get();

        return view('poules.create', compact('seasons'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $validated = $request->validate([
            'season_id' => 'required|exists:seasons,id',
            'name' => 'required|string|max:255',
        ]);

        Poule::create($validated);

        return redirect('/dashboard')
            ->with('success', 'Poule succesvol aangemaakt.');
    }

    public function show(Poule $poule)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $poule->load('season', 'teams');

        $teams = Team::orderBy('name')->get();

        return view('poules.show', compact('poule', 'teams'));
    }

    public function addTeam(Request $request, Poule $poule)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
        ]);

        $poule->teams()->syncWithoutDetaching([
            $validated['team_id'],
        ]);

        return redirect()
            ->route('poules.show', $poule)
            ->with('success', 'Team succesvol aan de poule toegevoegd.');
    }
}