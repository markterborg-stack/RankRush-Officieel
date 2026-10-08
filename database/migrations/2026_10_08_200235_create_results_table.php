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
    Schema::create('results', function (Blueprint $table) {
        $table->id();

        $table->foreignId('match_id')
            ->constrained('game_matches')
            ->cascadeOnDelete();

        $table->foreignId('submitted_by')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->integer('team1_score');
        $table->integer('team2_score');

        $table->string('status')->default('pending');

        $table->foreignId('reviewed_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
