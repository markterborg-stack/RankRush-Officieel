<x-app-layout>

    <x-slot name="header">
        <h2>
            Mijn wedstrijden
        </h2>
    </x-slot>

    <main>

        <h2>
            Wedstrijden van {{ $team->name }}
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
                        Nog geen lobbycode
                    </p>

                @endif

                <br>

                <a
                    href="{{ route('results.create', $match) }}"
                    class="button"
                >
                    Uitslag indienen
                </a>

            </div>

        @empty

            <div class="notice">
                Je team heeft nog geen wedstrijden.
            </div>

        @endforelse

    </main>

</x-app-layout>

