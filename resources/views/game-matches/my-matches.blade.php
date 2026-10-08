<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mijn wedstrijden
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-lg font-semibold mb-6">
                    Wedstrijden van {{ $team->name }}
                </h3>

                @forelse ($matches as $match)

                    <div class="border-b py-4">

                        <p class="text-lg font-semibold">
                            {{ $match->team1->name }}
                            vs.
                            {{ $match->team2->name }}
                        </p>

                        <p>
                            Seizoen: {{ $match->season->name }}
                        </p>

                        <p>
                            Poule: {{ $match->poule->name }}
                        </p>

                        <p>
                            Datum:
                            {{ $match->match_date->format('d-m-Y H:i') }}
                        </p>

                        <p>
                            Lobbycode:
                            {{ $match->lobby_code ?? 'Nog geen lobbycode' }}
                        </p>

                        <a
                            href="{{ route('results.create', $match) }}"
                            class="inline-block mt-3 px-4 py-2 bg-purple-600 text-white rounded-md"
                        >
                            Uitslag indienen
                        </a>

                    </div>

                @empty

                    <p>
                        Je team heeft nog geen wedstrijden.
                    </p>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>