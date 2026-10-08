<x-app-layout>

    <x-slot name="header">
        <h2>
            Uitslag indienen
        </h2>
    </x-slot>

    <main>

        <div class="card">

            <h3>
                {{ $gameMatch->team1->name }}
                vs.
                {{ $gameMatch->team2->name }}
            </h3>

            <form
                method="POST"
                action="{{ route('results.store', $gameMatch) }}"
            >
                @csrf

                <label for="team1_score">
                    Score {{ $gameMatch->team1->name }}
                </label>

                <input
                    type="number"
                    name="team1_score"
                    id="team1_score"
                    min="0"
                    required
                >

                <label for="team2_score">
                    Score {{ $gameMatch->team2->name }}
                </label>

                <input
                    type="number"
                    name="team2_score"
                    id="team2_score"
                    min="0"
                    required
                >

                <button type="submit">
                    Uitslag indienen
                </button>

            </form>

        </div>

    </main>

</x-app-layout>
