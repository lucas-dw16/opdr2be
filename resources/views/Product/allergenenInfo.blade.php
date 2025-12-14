@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-9">

            <h1>{{ $title }}</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if ($product)
                <div class="mt-3">
                    <strong>Naam:</strong> {{ $product->ProductNaam }}<br>
                    <strong>Barcode:</strong> {{ $product->Barcode }}
                </div>
            @else
                <p>Geen productinformatie gevonden.</p>
            @endif
            
            <h3 class="mt-4">Allergenen</h3>

            <table class="table table-striped table-bordered table-hover mt-2 align-middle shadow-sm">
                <thead>
                    <tr>
                        <th class="text-center">Naam</th>
                        <th class="text-center">Omschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allergenen as $a)
                        <tr>
                            <td class="text-center">{{ $a->AllergeenNaam }}</td>
                            <td class="text-center">{{ $a->AllergeenOmschrijving }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">in dit product
                                zitten geen stoffen die een allergische reactie kunnen veroorzaken</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>