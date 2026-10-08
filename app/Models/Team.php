<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{

    protected $fillable = [
        'name',
        'captain_id',
    ];

    public function captain(): BelongsTo
    {
        return $this->belongsTo(User::class, 'captain_id');
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function poules(): BelongsToMany
    {
        return $this->belongsToMany(Poule::class);
    }
}
