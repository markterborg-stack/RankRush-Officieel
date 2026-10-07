<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $team->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-2">
                        {{ $team->name }}
                    </h1>

                    <p class="text-gray-600 mb-6">
                        Teamcaptain: {{ $team->captain->name }}
                    </p>

                    <h2 class="text-xl font-semibold mb-4">
                        Spelers
                    </h2>

                    @if ($team->players->count() > 0)
                        <div class="space-y-2">
                            @foreach ($team->players as $player)
                                <div class="border rounded-lg p-3">
                                    {{ $player->name }}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600">
                            Dit team heeft nog geen spelers.
                        </p>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>