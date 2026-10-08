<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;


class SeasonController extends Controller
{
    public function create()
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        return view('seasons.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:upcoming,active,finished',
        ]);

        Season::create($validated);

        return redirect('/dashboard')
            ->with('success', 'Seizoen succesvol aangemaakt.');
    }
}