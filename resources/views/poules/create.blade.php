<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Poule aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-6">
                        Poule aanmaken
                    </h1>

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('poules.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="season_id" class="block font-medium text-sm text-gray-700">
                                Seizoen
                            </label>

                            <select
                                id="season_id"
                                name="season_id"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Kies een seizoen</option>

                                @foreach ($seasons as $season)
                                    <option
                                        value="{{ $season->id }}"
                                        {{ old('season_id') == $season->id ? 'selected' : '' }}
                                    >
                                        {{ $season->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">
                                Poulenaam
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                placeholder="Bijvoorbeeld Poule A"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-purple-600 text-black rounded-md"
                        >
                            Poule aanmaken
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>