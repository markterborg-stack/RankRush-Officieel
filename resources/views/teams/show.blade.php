<x-app-layout>

    <x-slot name="header">
        <h2>
            {{ $team->name }}
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h1>
                {{ $team->name }}
            </h1>

            <p class="small">
                Teamcaptain: {{ $team->captain->name }}
            </p>

        </div>


        <div class="card">

            <h3>Spelers</h3>

            @if ($team->players->count() > 0)

                <ul class="players">

                    @foreach ($team->players as $player)

                        <li>
                            {{ $player->name }}
                        </li>

                    @endforeach

                </ul>

            @else

                <p class="small">
                    Dit team heeft nog geen spelers.
                </p>

            @endif

        </div>

    </main>

</x-app-layout>

