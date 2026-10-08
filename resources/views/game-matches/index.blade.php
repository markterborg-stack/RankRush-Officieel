<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Wedstrijden
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-lg font-semibold mb-4">
                    Wedstrijden
                </h3>

                @forelse ($matches as $match)

                    <div class="border-b py-4">

                        <p class="font-semibold">
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
                            {{ $match->lobby_code ?? 'Geen lobbycode' }}
                        </p>

                    </div>

                @empty

                    <p>Er zijn nog geen wedstrijden.</p>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>