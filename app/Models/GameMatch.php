<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GameMatch extends Model
{
    protected $fillable = [
        'season_id',
        'poule_id',
        'team1_id',
        'team2_id',
        'match_date',
        'lobby_code',
        'status',
    ];

    public function casts(): array
    {
        return [
            'match_date' => 'datetime'
        ];
    }

    public function season(): BelongsTo
    {
        return $this->BelongsTo(Season::class);
    }

    public function poule(): BelongsTo
    {
        return $this->BelongsTo(Poules::class);
    }

    public function team1(): BelongsTo
    {
        return $this->BelongsTo(Teams::class, 'team1_id');
    }

    public function team2(): BelongsTo
    {
        return $this->BelongsTo(Teams::class, 'team2_id');
    }
}
