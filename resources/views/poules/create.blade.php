<x-app-layout>

    <x-slot name="header">
        <h2>
            Poule aanmaken
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h3>
                Poule aanmaken
            </h3>

            @if ($errors->any())

                <div class="notice">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <form method="POST" action="{{ route('poules.store') }}">
                @csrf

                <label for="season_id">
                    Seizoen
                </label>

                <select
                    id="season_id"
                    name="season_id"
                    required
                >
                    <option value="">
                        Kies een seizoen
                    </option>

                    @foreach ($seasons as $season)

                        <option
                            value="{{ $season->id }}"
                            {{ old('season_id') == $season->id ? 'selected' : '' }}
                        >
                            {{ $season->name }}
                        </option>

                    @endforeach

                </select>

                @error('season_id')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <label for="name">
                    Poulenaam
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    placeholder="Bijvoorbeeld Poule A"
                    required
                >

                @error('name')
                    <p class="pending">
                        {{ $message }}
                    </p>
                @enderror


                <button type="submit">
                    Poule aanmaken
                </button>

            </form>

        </div>

    </main>

</x-app-layout>

