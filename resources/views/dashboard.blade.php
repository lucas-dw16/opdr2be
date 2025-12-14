<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Welkom sectie -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Welkom, {{ auth()->user()->name }}!</h1>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{ now()->format('d M Y') }}</span>
        </div>

        <!-- Grid kaarten met links -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Gebruikers -->
            <a href="#" class="block p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <h2 class="text-lg font-semibold">Gebruikers</h2>
                <p class="text-3xl font-bold mt-2">12</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Actieve gebruikers</p>
            </a>

            <!-- Producten -->
            <a href="{{ route('product.index') }}" class="block p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <h2 class="text-lg font-semibold">Producten</h2>
                <p class="text-3xl font-bold mt-2">58</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Beschikbare producten</p>
            </a>

            <!-- Leveranten -->
            <a href="{{ route('leveranten.index') }}" class="block p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <h2 class="text-lg font-semibold">Leveranten</h2>
                <p class="text-3xl font-bold mt-2">7</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Actieve leveranciers</p>
            </a>
        </div>

        <!-- Recente activiteiten sectie -->
        <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700">
            <h2 class="text-xl font-semibold mb-3">Recente activiteit</h2>
            <ul class="space-y-2">
                @php
                    $recentActivities = [
                        'Nieuwe gebruiker aangemaakt: Lucas',
                        'Product Appel toegevoegd',
                        'Levering gepland voor Leverancier X',
                    ];
                @endphp

                @foreach($recentActivities as $activity)
                    <li class="p-2 rounded bg-gray-50 dark:bg-zinc-700">{{ $activity }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Snelkoppelingen sectie -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            <a href="{{ route('product.index') }}" class="p-4 bg-blue-500 text-white rounded-xl shadow hover:bg-blue-600 text-center font-semibold">Producten beheren</a>
            <a href="{{ route('leveranten.index') }}" class="p-4 bg-green-500 text-white rounded-xl shadow hover:bg-green-600 text-center font-semibold">Leveranten beheren</a>
            <a href="{{ route('allergeen.index') }}" class="p-4 bg-red-500 text-white rounded-xl shadow hover:bg-red-600 text-center font-semibold">Allergenen beheren</a>
        </div>
    </div>
</x-layouts.app>
