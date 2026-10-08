<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uitslag indienen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-lg font-semibold mb-4">
                    {{ $gameMatch->team1->name }}
                    vs.
                    {{ $gameMatch->team2->name }}
                </h3>

                <form method="POST" action="{{ route('results.store', $gameMatch) }}">
                    @csrf

                    <div class="mb-4">
                        <label for="team1_score" class="block font-medium">
                            Score {{ $gameMatch->team1->name }}
                        </label>

                        <input
                            type="number"
                            name="team1_score"
                            id="team1_score"
                            min="0"
                            required
                            class="w-full border-gray-300 rounded-md"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="team2_score" class="block font-medium">
                            Score {{ $gameMatch->team2->name }}
                        </label>

                        <input
                            type="number"
                            name="team2_score"
                            id="team2_score"
                            min="0"
                            required
                            class="w-full border-gray-300 rounded-md"
                        >
                    </div>

                    <button
                        type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded-md"
                    >
                        Uitslag indienen
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>