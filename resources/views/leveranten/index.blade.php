<x-layouts.app :title="$title">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold mb-6">{{ $title }}</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Naam</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Contactpersoon</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Leverantie nummer</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Mobiel</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Aantal producten</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Toon producten</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($leveranten as $l)
                        <tr>
                            <td class="px-4 py-2">{{ $l->LeverancierNaam }}</td>
                            <td class="px-4 py-2">{{ $l->Contactpersoon }}</td>
                            <td class="px-4 py-2 text-center">{{ $l->Leveranciernummer }}</td>
                            <td class="px-4 py-2 text-center">{{ $l->Telefoonnummer }}</td>
                            <td class="px-4 py-2 text-center">{{ $l->ProductCount }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('leveranten.producten', ['leverancierId' => $l->Id]) }}" class="text-blue-600 hover:underline">
                                    <img src="https://img.icons8.com/?size=30&id=391&format=png&color=1847B8" alt="Bekijk producten"/>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Geen leveranciers gevonden</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">Terug naar home</a>
        </div>
    </div>
</x-layouts.app>
