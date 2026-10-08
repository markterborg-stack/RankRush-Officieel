<x-app-layout>

    <x-slot name="header">
        <h2>
            Klassement
        </h2>
    </x-slot>

    <main>

        <h2>
            Stand
        </h2>

        @if (count($standings) > 0)

            <table>

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Team</th>
                        <th>W</th>
                        <th>G</th>
                        <th>V</th>
                        <th>Punten</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($standings as $index => $standing)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                <strong>
                                    {{ $standing['team']->name }}
                                </strong>
                            </td>

                            <td>
                                {{ $standing['wins'] }}
                            </td>

                            <td>
                                {{ $standing['draws'] }}
                            </td>

                            <td>
                                {{ $standing['losses'] }}
                            </td>

                            <td>
                                <strong>
                                    {{ $standing['points'] }}
                                </strong>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="notice">
                Er zijn nog geen teams of goedgekeurde uitslagen.
            </div>

        @endif

    </main>

</x-app-layout>

