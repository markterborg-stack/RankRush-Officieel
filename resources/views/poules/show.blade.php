<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $poule->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-2">
                        {{ $poule->name }}
                    </h1>

                    <p class="text-gray-600 mb-6">
                        Seizoen: {{ $poule->season->name }}
                    </p>

                    <h2 class="text-xl font-semibold mb-4">
                        Teams
                    </h2>

                    @if ($poule->teams->count() > 0)

                        <div class="space-y-2 mb-6">
                            @foreach ($poule->teams as $team)
                                <div class="border rounded-lg p-3">
                                    {{ $team->name }}
                                </div>
                            @endforeach
                        </div>

                    @else

                        <p class="text-gray-600 mb-6">
                            Er zijn nog geen teams aan deze poule gekoppeld.
                        </p>

                    @endif

                    <h2 class="text-xl font-semibold mb-4">
                        Beschikbare teams
                    </h2>

                    <h2 class="text-xl font-semibold mb-4">
                        Team toevoegen
                    </h2>

                    @if ($teams->count() > 0)

                        <form method="POST" action="{{ route('poules.add-team', $poule) }}" class="mb-6">
                            @csrf

                            <select
                                name="team_id"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Kies een team</option>

                                @foreach ($teams as $team)
                                    @if (!$poule->teams->contains($team->id))
                                        <option value="{{ $team->id }}">
                                            {{ $team->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            <button
                                type="submit"
                                class="mt-3 px-4 py-2 bg-purple-600 text-black rounded-md"
                            >
                                Team toevoegen
                            </button>
                        </form>

                    @else

                        <p class="text-gray-600">
                            Er zijn nog geen teams aangemaakt.
                        </p>

                    @endif

                    @if ($teams->count() > 0)

                        <div class="space-y-2">
                            @foreach ($teams as $team)
                                <div class="border rounded-lg p-3 flex justify-between items-center">
                                    <span>{{ $team->name }}</span>

                                    @if (!$poule->teams->contains($team->id))
                                        <span class="text-gray-500">
                                            Nog niet gekoppeld
                                        </span>
                                    @else
                                        <span class="text-green-600">
                                            Gekoppeld
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                    @else

                        <p class="text-gray-600">
                            Er zijn nog geen teams aangemaakt.
                        </p>

                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>