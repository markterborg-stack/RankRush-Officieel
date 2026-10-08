<x-app-layout>

    <x-slot name="header">
        <h2>
            Seizoen aanmaken
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h3>
                Seizoen aanmaken
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

            <form method="POST" action="{{ route('seasons.store') }}">
                @csrf

                <label for="name">
                    Naam
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                >


                <label for="start_date">
                    Startdatum
                </label>

                <input
                    id="start_date"
                    name="start_date"
                    type="date"
                    value="{{ old('start_date') }}"
                    required
                >


                <label for="end_date">
                    Einddatum
                </label>

                <input
                    id="end_date"
                    name="end_date"
                    type="date"
                    value="{{ old('end_date') }}"
                    required
                >


                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                >
                    <option value="upcoming">
                        Komend
                    </option>

                    <option value="active">
                        Actief
                    </option>

                    <option value="finished">
                        Afgelopen
                    </option>
                </select>


                <button type="submit">
                    Seizoen aanmaken
                </button>

            </form>

        </div>

    </main>

</x-app-layout>
