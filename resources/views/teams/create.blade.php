<x-app-layout>

    <x-slot name="header">
        <h2>
            Team aanmaken
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h3>Team aanmaken</h3>

            @if ($errors->any())

                <div class="notice">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <form method="POST" action="{{ route('teams.store') }}">
                @csrf

                <label for="name">
                    Teamnaam
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                >

                <button type="submit">
                    Team aanmaken
                </button>

            </form>

        </div>

    </main>

</x-app-layout>

