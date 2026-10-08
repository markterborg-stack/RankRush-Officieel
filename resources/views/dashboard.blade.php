
<x-app-layout>

    <x-slot name="header">
        <h2>
            Dashboard
        </h2>
    </x-slot>

    <main>

        @if (session('success'))
            <div class="notice">
                {{ session('success') }}
            </div>
        @endif

        <h1>
            Welkom, {{ auth()->user()->name }}!
        </h1>

        @if ($team)

            <div class="cards">

                <div class="card">
                    <h3>Mijn team</h3>

                    <p class="big-number">
                        {{ $team->name }}
                    </p>

                    <p class="small">
                        Teamcaptain: {{ auth()->user()->name }}
                    </p>

                    <a
                        href="{{ route('teams.show', $team) }}"
                        class="button"
                    >
                        Team bekijken
                    </a>
                </div>


                <div class="card">
                    <h3>Spelers</h3>

                    @if ($team->players->count() > 0)

                        <ul class="players">

                            @foreach ($team->players as $player)

                                <li>
                                    {{ $player->name }}

                                    <form
                                        method="POST"
                                        action="{{ route('players.destroy', $player) }}"
                                        style="display: inline;"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="danger"
                                        >
                                            Verwijderen
                                        </button>
                                    </form>
                                </li>

                            @endforeach

                        </ul>

                    @else

                        <p class="small">
                            Je team heeft nog geen spelers.
                        </p>

                    @endif
                </div>

            </div>


            <div class="card">

                <h3>Speler toevoegen</h3>

                <form
                    method="POST"
                    action="{{ route('players.store') }}"
                >
                    @csrf

                    <label for="name">
                        Spelernaam
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <p class="pending">
                            {{ $message }}
                        </p>
                    @enderror

                    <button type="submit">
                        Speler toevoegen
                    </button>

                </form>

            </div>


        @else

            <div class="card">

                <h3>Mijn team</h3>

                <p>
                    Je hebt nog geen team.
                </p>

                <a
                    href="{{ route('teams.create') }}"
                    class="button"
                >
                    Team aanmaken
                </a>

            </div>

        @endif

    </main>

</x-app-layout>

