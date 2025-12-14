<x-layouts.app :title="$title">
    <div class="container mx-auto py-6 max-w-5xl">

        <h1 class="text-3xl font-bold mb-6">{{ $title }}</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 relative">
                {{ session('success') }}
                <button 
                    class="absolute top-0 right-0 px-4 py-3 text-xl"
                    onclick="this.parentElement.style.display='none'">
                    &times;
                </button>
            </div>
        @endif

        <div class="mb-4">
            <a 
                href="{{ route('allergeen.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
            >
                Nieuwe Allergeen
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Naam</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Omschrijving</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Verwijder</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Wijzig</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($allergenen as $allergeen)
                        <tr>
                            <td class="px-4 py-2">{{ $allergeen->Naam }}</td>
                            <td class="px-4 py-2">{{ $allergeen->Omschrijving }}</td>

                            <td class="px-4 py-2 text-center">
                                <form 
                                    action="{{ route('allergeen.destroy', $allergeen->Id) }}" 
                                    method="POST"
                                    onsubmit="return confirm('Weet je zeker dat je dit allergeen wilt verwijderen?');"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                    >
                                        Verwijderen
                                    </button>
                                </form>
                            </td>

                            <td class="px-4 py-2 text-center">
                                <a 
                                    href="{{ route('allergeen.edit', $allergeen->Id) }}"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded"
                                >
                                    Wijzig
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                Geen allergenen bekend
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app>
