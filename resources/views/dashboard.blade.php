<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <h1 class="text-2xl font-bold mb-6">
                                Welkom, {{ auth()->user()->name }}!
                            </h1>

                            @if ($team)
            <h2 class="text-xl font-semibold mb-2">
                Mijn team
            </h2>

            <div class="border rounded-lg p-4 mb-6">
                <p class="text-lg font-semibold">
                    {{ $team->name }}
                </p>

                <p class="text-gray-600">
                    Teamcaptain: {{ auth()->user()->name }}
                </p>
            </div>

                <a
                    href="{{ route('teams.show', $team) }}"
                    class="inline-block mt-3 px-4 py-2 bg-purple-600 text-black rounded-md"
                >
                    Team bekijken
                </a>

            <h2 class="text-xl font-semibold mb-4">
                Spelers
            </h2>

            @if ($team->players->count() > 0)
                <div class="space-y-2 mb-6">
                    @foreach ($team->players as $player)
                        <div class="flex items-center justify-between border rounded-lg p-3">
                            <span>{{ $player->name }}</span>

                            <form method="POST" action="{{ route('players.destroy', $player) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-red-600 hover:text-red-800"
                                >
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 mb-6">
                    Je team heeft nog geen spelers.
                </p>
            @endif

            <h2 class="text-xl font-semibold mb-4">
                Speler toevoegen
            </h2>

            <form method="POST" action="{{ route('players.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm text-gray-700">
                        Spelernaam
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    >
                </div>

                <button
                    type="submit"
                    class="px-4 py-2 bg-purple-600 text-white rounded-md"
                >
                    Speler toevoegen
                </button>
            </form>
        @else
            <h2 class="text-xl font-semibold mb-2">
                Mijn team
            </h2>

            <p class="mb-4 text-gray-600">
                Je hebt nog geen team.
            </p>

            <a
                href="{{ route('teams.create') }}"
                class="inline-block px-4 py-2 bg-purple-600 text-black rounded-md"
            >
                Team aanmaken
            </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>