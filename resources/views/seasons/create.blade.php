<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Seizoen aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-6">
                        Seizoen aanmaken
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

                    <form method="POST" action="{{ route('seasons.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">
                                Naam
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block font-medium text-sm text-gray-700">
                                Startdatum
                            </label>

                            <input
                                id="start_date"
                                name="start_date"
                                type="date"
                                value="{{ old('start_date') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block font-medium text-sm text-gray-700">
                                Einddatum
                            </label>

                            <input
                                id="end_date"
                                name="end_date"
                                type="date"
                                value="{{ old('end_date') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-6">
                            <label for="status" class="block font-medium text-sm text-gray-700">
                                Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="upcoming">Komend</option>
                                <option value="active">Actief</option>
                                <option value="finished">Afgelopen</option>
                            </select>
                        </div>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-purple-600 text-black rounded-md"
                        >
                            Seizoen aanmaken
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>