<x-app-layout>

    <x-slot name="header">
        <h2>
            Wedstrijden
        </h2>
    </x-slot>

    <main>

        <h2>
            Wedstrijden
        </h2>

        @forelse ($matches as $match)

            <div class="match">

                <h3>
                    {{ $match->team1->name }}
                    vs.
                    {{ $match->team2->name }}
                </h3>

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
                </p>

                @if ($match->lobby_code)

                    <div class="lobby">
                        {{ $match->lobby_code }}
                    </div>

                @else

                    <p class="small">
                        Geen lobbycode
                    </p>

                @endif

            </div>

        @empty

            <div class="notice">
                Er zijn nog geen wedstrijden.
            </div>

        @endforelse

    </main>

</x-app-layout>

