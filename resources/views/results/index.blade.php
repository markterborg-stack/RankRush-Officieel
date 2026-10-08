<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uitslagen beheren
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-lg font-semibold mb-6">
                    Ingediende uitslagen
                </h3>

                @forelse ($results as $result)

                    <div class="border-b py-4">

                        <p class="font-semibold">
                            {{ $result->match->team1->name }}
                            {{ $result->team1_score }}
                            -
                            {{ $result->team2_score }}
                            {{ $result->match->team2->name }}
                        </p>

                        <p>
                            Ingediend door:
                            {{ $result->submitter->name }}
                        </p>

                        <p>
                            Status:
                            {{ $result->status }}
                        </p>

                        @if ($result->status === 'pending')

                    <div class="mt-3 flex gap-2">

                        <form method="POST" action="{{ route('results.approve', $result) }}">
                            @csrf

                            <button
                                type="submit"
                                class="px-4 py-2 bg-green-600 text-green rounded-md"
                            >
                                Goedkeuren
                            </button>
                        </form>

                        <form method="POST" action="{{ route('results.reject', $result) }}">
                            @csrf

                            <button
                                type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md"
                            >
                                Afwijzen
                            </button>
                        </form>

                    </div>

                @endif

                    </div>

                @empty

                    <p>Er zijn nog geen uitslagen ingediend.</p>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>