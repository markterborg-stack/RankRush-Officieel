<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('season_id')
                ->constrained('seasons')
                ->cascadeOnDelete();
            
            $table->foreignId('poule_id')
                ->constrained('poules')
                ->cascadeOnDelete();

            $table->foreignId('team1_id')
                ->constrained('teams')
                ->cascadeOnDelete();

            $table->foreignId('team2_id')
            ->constrained('teams')
            ->cascadeOnDelete();

            $table->datetime('match_date');

            $table->string('lobby_code')->nullable();

            $table->string('status')->default('scheduled');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_matches');
    }
};
