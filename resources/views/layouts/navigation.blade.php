
<nav>

    <div>
        <a href="{{ route('dashboard') }}">
            RankRush
        </a>
    </div>

    <div>

        <a href="{{ route('dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('standings.index') }}">
            Klassement
        </a>

        @if (Auth::user()->role === 'teamcaptain')

            <a href="{{ route('game-matches.my-matches') }}">
                Mijn wedstrijden
            </a>

        @endif

        @if (Auth::user()->role === 'leaguebeheerder')

            <a href="{{ route('game-matches.index') }}">
                Wedstrijden
            </a>

            <a href="{{ route('seasons.create') }}">
                Seizoen
            </a>

            <a href="{{ route('poules.create') }}">
                Poule
            </a>

            <a href="{{ route('results.index') }}">
                Uitslagen
            </a>

        @endif

        <a href="{{ route('profile.edit') }}">
            Profiel
        </a>

        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf

            <button type="submit">
                Uitloggen
            </button>
        </form>

    </div>

</nav>
