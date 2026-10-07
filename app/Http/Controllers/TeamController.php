<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function create()
        {
            return view('teams.create');
        }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            Team::create([
                'name' => $validated['name'],
                'captain_id' => auth()->id(),
            ]);

         return redirect('/dashboard')->with('success', 'Team succesvol aangemaakt.');
     }

    public function show(Team $team)
        {
        if ($team->captain_id !== auth()->id()) {
            abort(403);
        }

         return view('teams.show', compact('team'));
        }
}