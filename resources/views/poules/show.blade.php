<x-app-layout>

    <x-slot name="header">
        <h2>
            {{ $poule->name }}
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h1>
                {{ $poule->name }}
            </h1>

            <p class="small">
                Seizoen: {{ $poule->season->name }}
            </p>

        </div>


        <div class="card">

            <h3>
                Teams in deze poule
            </h3>

            @if ($poule->teams->count() > 0)

                <ul class="players">

                    @foreach ($poule->teams as $team)

                        <li>
                            {{ $team->name }}

                            <span>
                                Gekoppeld
                            </span>
                        </li>

                    @endforeach

                </ul>

            @else

                <p class="small">
                    Er zijn nog geen teams aan deze poule gekoppeld.
                </p>

            @endif

        </div>


        <div class="card">

            <h3>
                Team toevoegen
            </h3>

            @if ($teams->count() > 0)

                <form
                    method="POST"
                    action="{{ route('poules.add-team', $poule) }}"
                >
                    @csrf

                    <label for="team_id">
                        Kies een team
                    </label>

                    <select
                        name="team_id"
                        id="team_id"
                        required
                    >
                        <option value="">
                            Kies een team
                        </option>

                        @foreach ($teams as $team)

                            @if (!$poule->teams->contains($team->id))

                                <option value="{{ $team->id }}">
                                    {{ $team->name }}
                                </option>

                            @endif

                        @endforeach

                    </select>

                    @error('team_id')
                        <p class="pending">
                            {{ $message }}
                        </p>
                    @enderror

                    <button type="submit">
                        Team toevoegen
                    </button>

                </form>

            @else

                <p class="small">
                    Er zijn nog geen teams aangemaakt.
                </p>

            @endif

        </div>


        <div class="card">

            <h3>
                Alle teams
            </h3>

            @if ($teams->count() > 0)

                <ul class="players">

                    @foreach ($teams as $team)

                        <li>

                            {{ $team->name }}

                            @if (!$poule->teams->contains($team->id))

                                <span class="small">
                                    Nog niet gekoppeld
                                </span>

                            @else

                                <span>
                                    Gekoppeld
                                </span>

                            @endif

                        </li>

                    @endforeach

                </ul>

            @else

                <p class="small">
                    Er zijn nog geen teams aangemaakt.
                </p>

            @endif

        </div>

    </main>

</x-app-layout>
