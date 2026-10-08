<x-app-layout>

    <x-slot name="header">
        <h2>
            Uitslagen beheren
        </h2>
    </x-slot>

    <main>

        <h2>
            Ingediende uitslagen
        </h2>

        @forelse ($results as $result)

            <div class="match">

                <h3>
                    {{ $result->match->team1->name }}
                    {{ $result->team1_score }}
                    -
                    {{ $result->team2_score }}
                    {{ $result->match->team2->name }}
                </h3>

                <p>
                    Ingediend door:
                    {{ $result->submitter->name }}
                </p>

                <p>
                    Status:

                    @if ($result->status === 'pending')

                        <span class="pending">
                            In afwachting
                        </span>

                    @elseif ($result->status === 'approved')

                        <span class="status">
                            Goedgekeurd
                        </span>

                    @else

                        <span class="danger">
                            Afgewezen
                        </span>

                    @endif
                </p>

                @if ($result->status === 'pending')

                    <div>

                        <form
                            method="POST"
                            action="{{ route('results.approve', $result) }}"
                            style="display: inline;"
                        >
                            @csrf

                            <button type="submit">
                                Goedkeuren
                            </button>
                        </form>

                        <form
                            method="POST"
                            action="{{ route('results.reject', $result) }}"
                            style="display: inline;"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="danger"
                            >
                                Afwijzen
                            </button>
                        </form>

                    </div>

                @endif

            </div>

        @empty

            <div class="notice">
                Er zijn nog geen uitslagen ingediend.
            </div>

        @endforelse

    </main>

</x-app-layout>
