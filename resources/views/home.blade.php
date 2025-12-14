<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jamin - Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md text-center">

        <h1 class="text-3xl font-bold mb-6">Welkom bij Jamin</h1>

        <div class="flex flex-col gap-4">
            <a href="{{ route('leveranten.index') }}"
               class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Leveranciers
            </a>

            <a href="{{ route('allergeen.index') }}"
               class="bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Allergenen
            </a>

            <a href="{{ route('product.index') }}"
               class="bg-gray-800 text-white py-2 rounded hover:bg-gray-900">
                Producten
            </a>
        </div>

    </div>
</div>

</body>
</html>
