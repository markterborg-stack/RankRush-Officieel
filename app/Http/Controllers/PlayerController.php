<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team = auth()->user()->team;

        if (!$team) {
            return redirect('/dashboard')
                ->with('error', 'Je hebt nog geen team.');
        }

        Player::create([
            'team_id' => $team->id,
            'name' => $validated['name'],
        ]);

        return redirect('/dashboard')
            ->with('success', 'Speler succesvol toegevoegd.');
    }

    public function destroy(Player $player)
    {
        $team = auth()->user()->team;

        if (!$team || $player->team_id !== $team->id) {
            abort(403);
        }

        $player->delete();

        return redirect('/dashboard')
            ->with('success', 'Speler succesvol verwijderd.');
    }
}