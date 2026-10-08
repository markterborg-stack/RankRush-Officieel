
<x-guest-layout>

    <div class="login-box">

        <h1>
            RankRush
        </h1>

        <h2>
            Inloggen
        </h2>

        <x-auth-session-status
            class="notice"
            :status="session('status')"
        />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">
                E-mailadres
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
            >

            @error('email')
                <p class="pending">
                    {{ $message }}
                </p>
            @enderror


            <label for="password">
                Wachtwoord
            </label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            >

            @error('password')
                <p class="pending">
                    {{ $message }}
                </p>
            @enderror


            <label>
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    style="width: auto;"
                >

                Onthoud mij
            </label>


            @if (Route::has('password.request'))

                <p>
                    <a href="{{ route('password.request') }}" class="small">
                        Wachtwoord vergeten?
                    </a>
                </p>

            @endif


            <button type="submit">
                Inloggen
            </button>

        </form>

    </div>

</x-guest-layout>

