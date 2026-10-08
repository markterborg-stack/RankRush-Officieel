
<x-guest-layout>

    <div class="login-box">

        <h1>
            RankRush
        </h1>

        <h2>
            Account aanmaken
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">
                Naam
            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
            >

            @error('name')
                <p class="pending">
                    {{ $message }}
                </p>
            @enderror


            <label for="email">
                E-mailadres
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
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
                autocomplete="new-password"
            >

            @error('password')
                <p class="pending">
                    {{ $message }}
                </p>
            @enderror


            <label for="password_confirmation">
                Wachtwoord bevestigen
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            >

            @error('password_confirmation')
                <p class="pending">
                    {{ $message }}
                </p>
            @enderror


            <p>
                <a href="{{ route('login') }}" class="small">
                    Al een account? Log hier in.
                </a>
            </p>


            <button type="submit">
                Account aanmaken
            </button>

        </form>

    </div>

</x-guest-layout>

