<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Poule;
use App\Models\GameMatch;
use App\Models\Team;
use Illuminate\Http\Request;


class GameMatchController extends Controller
{


    public function index()
    {
        $matches = GameMatch::with('season', 'poule', 'team1', 'team2')
            ->orderBy('match_date')
            ->get();

        return view('game-matches.index', compact('matches'));
    }

    public function myMatches()
    {
        if (auth()->user()->role !== 'teamcaptain') {
            abort(403);
        }

        $team = auth()->user()->team;

        if (!$team) {
            return redirect('/dashboard')
                ->with('error', 'Je hebt nog geen team.');
        }

        $matches = GameMatch::with('season', 'poule', 'team1', 'team2')
            ->where(function ($query) use ($team) {
                $query->where('team1_id', $team->id)
                    ->orWhere('team2_id', $team->id);
            })
            ->orderBy('match_date')
            ->get();

        return view('game-matches.my-matches', compact('matches', 'team'));
    }

    public function standings()
    {
        $teams = Team::with('poules')->orderBy('name')->get();

        $standings = [];

        foreach ($teams as $team) {
            $wins = 0;
            $draws = 0;
            $losses = 0;
            $points = 0;

            $results = \App\Models\Result::where('status', 'approved')
                ->whereHas('match', function ($query) use ($team) {
                    $query->where('team1_id', $team->id)
                        ->orWhere('team2_id', $team->id);
                })
                ->with('match')
                ->get();

            foreach ($results as $result) {
                $match = $result->match;

                if ($match->team1_id == $team->id) {
                    $teamScore = $result->team1_score;
                    $opponentScore = $result->team2_score;
                } else {
                    $teamScore = $result->team2_score;
                    $opponentScore = $result->team1_score;
                }

                if ($teamScore > $opponentScore) {
                    $wins++;
                    $points += 3;
                } elseif ($teamScore == $opponentScore) {
                    $draws++;
                    $points += 1;
                } else {
                    $losses++;
                }
            }

            $standings[] = [
                'team' => $team,
                'wins' => $wins,
                'draws' => $draws,
                'losses' => $losses,
                'points' => $points,
            ];
        }

        usort($standings, function ($a, $b) {
            return $b['points'] <=> $a['points'];
        });

        return view('standings.index', compact('standings'));
    }


    public function create()
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $seasons = Season::orderBy('start_date')->get();
        $poules = Poule::with('season')->get();
        $teams = Team::orderBy('name')->get();


        return view('game-matches.create', compact(
            'seasons',
            'poules',
            'teams',
        ));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'leaguebeheerder') {
            abort(403);
        }

        $validated = $request->validate([
            'season_id' => 'required|exists:seasons,id',
            'poule_id' => 'required|exists:poules,id',
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'match_date' => 'required|date',
            'lobby_code' => 'nullable|string|max:100',
        ]);

        GameMatch::create($validated);

        return redirect('/dashboard')
            ->with('success', 'Wedstrijd succesvol aangemaakt.');
    }


    
}
