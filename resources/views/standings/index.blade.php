<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Klassement
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-lg font-semibold mb-6">
                    Stand
                </h3>

                @if (count($standings) > 0)

                    <div class="overflow-x-auto">

                        <table class="w-full border-collapse">

                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3">#</th>
                                    <th class="text-left py-3">Team</th>
                                    <th class="text-left py-3">W</th>
                                    <th class="text-left py-3">G</th>
                                    <th class="text-left py-3">V</th>
                                    <th class="text-left py-3">Punten</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($standings as $index => $standing)

                                    <tr class="border-b">

                                        <td class="py-3">
                                            {{ $index + 1 }}
                                        </td>

                                        <td class="py-3 font-semibold">
                                            {{ $standing['team']->name }}
                                        </td>

                                        <td class="py-3">
                                            {{ $standing['wins'] }}
                                        </td>

                                        <td class="py-3">
                                            {{ $standing['draws'] }}
                                        </td>

                                        <td class="py-3">
                                            {{ $standing['losses'] }}
                                        </td>

                                        <td class="py-3 font-semibold">
                                            {{ $standing['points'] }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <p>
                        Er zijn nog geen teams of goedgekeurde uitslagen.
                    </p>

                @endif

            </div>

        </div>
    </div>
</x-app-layout>