<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe wedstrijd aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('game-matches.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="season_id" class="block font-medium">
                            Seizoen
                        </label>

                        <select name="season_id" id="season_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($seasons as $season)
                                <option value="{{ $season->id }}">
                                    {{ $season->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('season_id')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="poule_id" class="block font-medium">
                            Poule
                        </label>

                        <select name="poule_id" id="poule_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($poules as $poule)
                                <option value="{{ $poule->id }}">
                                    {{ $poule->name }} - {{ $poule->season->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('poule_id')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="team1_id" class="block font-medium">
                            Team 1
                        </label>

                        <select name="team1_id" id="team1_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('team1_id')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="team2_id" class="block font-medium">
                            Team 2
                        </label>

                        <select name="team2_id" id="team2_id" class="w-full border-gray-300 rounded-md">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('team2_id')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="match_date" class="block font-medium">
                            Datum en tijd
                        </label>

                        <input
                            type="datetime-local"
                            name="match_date"
                            id="match_date"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('match_date')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lobby_code" class="block font-medium">
                            Lobby code
                        </label>

                        <input
                            type="text"
                            name="lobby_code"
                            id="lobby_code"
                            class="w-full border-gray-300 rounded-md"
                        >

                        @error('lobby_code')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded-md"
                    >
                        Wedstrijd aanmaken
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>