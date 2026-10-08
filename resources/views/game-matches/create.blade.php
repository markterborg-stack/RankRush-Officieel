<x-app-layout>

    <x-slot name="header">
        <h2>
            Nieuwe wedstrijd aanmaken
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h3>
                Nieuwe wedstrijd
            </h3>

            <form
                method="POST"
                action="{{ route('game-matches.store') }}"
            >
                @csrf

                <label for="season_id">
                    Seizoen
                </label>

                <select
                    name="season_id"
                    id="season_id"
                >
                    @foreach ($seasons as $season)
                        <option value="{{ $season->id }}">
                            {{ $season->name }}
                        </option>
                    @endforeach
                </select>

                @error('season_id')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <label for="poule_id">
                    Poule
                </label>

                <select
                    name="poule_id"
                    id="poule_id"
                >
                    @foreach ($poules as $poule)
                        <option value="{{ $poule->id }}">
                            {{ $poule->name }} - {{ $poule->season->name }}
                        </option>
                    @endforeach
                </select>

                @error('poule_id')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <label for="team1_id">
                    Team 1
                </label>

                <select
                    name="team1_id"
                    id="team1_id"
                >
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>

                @error('team1_id')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <label for="team2_id">
                    Team 2
                </label>

                <select
                    name="team2_id"
                    id="team2_id"
                >
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>

                @error('team2_id')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <label for="match_date">
                    Datum en tijd
                </label>

                <input
                    type="datetime-local"
                    name="match_date"
                    id="match_date"
                    required
                >

                @error('match_date')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <label for="lobby_code">
                    Lobby code
                </label>

                <input
                    type="text"
                    name="lobby_code"
                    id="lobby_code"
                >

                @error('lobby_code')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <button type="submit">
                    Wedstrijd aanmaken
                </button>

            </form>

        </div>

    </main>

</x-app-layout>

