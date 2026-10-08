<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function create(GameMatch $gameMatch)
    {
        if (auth()->user()->role !== 'teamcaptain') {
            abort(403);
        }

        $team = auth()->user()->team;

        if (!$team) {
            abort(403);
        }

        if (
            $gameMatch->team1_id !== $team->id &&
            $gameMatch->team2_id !== $team->id
        ) {
            abort(403);
        }

        $gameMatch->load('team1', 'team2');

        return view('results.create', compact('gameMatch'));
    }

    public function store(Request $request, GameMatch $gameMatch)
    {
        if (auth()->user()->role !== 'teamcaptain') {
            abort(403);
        }

        $team = auth()->user()->team;

        if (!$team) {
            abort(403);
        }

        if (
            $gameMatch->team1_id !== $team->id &&
            $gameMatch->team2_id !== $team->id
        ) {
            abort(403);
        }

        $validated = $request->validate([
            'team1_score' => 'required|integer|min:0',
            'team2_score' => 'required|integer|min:0',
        ]);

        Result::create([
            'match_id' => $gameMatch->id,
            'submitted_by' => auth()->id(),
            'team1_score' => $validated['team1_score'],
            'team2_score' => $validated['team2_score'],
            'status' => 'pending',
        ]);

        return redirect('/dashboard')
            ->with('success', 'Uitslag succesvol ingediend.');
    }

    public function index()
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $results = Result::with('match.team1', 'match.team2', 'submitter')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('results.index', compact('results'));
    }

    public function approve(Result $result)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $result->update([
            'status' => 'approved',
            'reviewed_by' => auth()->id(),
        ]);

        return redirect()
            ->route('results.index')
            ->with('success', 'Uitslag goedgekeurd.');
    }

    public function reject(Result $result)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $result->update([
            'status' => 'rejected',
            'reviewed_by' => auth()->id(),
        ]);

        return redirect()
            ->route('results.index')
            ->with('success', 'Uitslag afgewezen.');
    }
}