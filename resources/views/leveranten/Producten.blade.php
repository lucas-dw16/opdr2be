@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table thead th {
            background-color: #e9ecef;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="col-md-9">

        <h1 class="text-center">{{ $title }}</h1>

        {{-- Succesmelding --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
            </div>
        @endif

        {{-- Leverancier info --}}
        @if ($leverancier)
            <div class="mb-4">
                <h5>Leverancier Informatie</h5>
                <p><strong>Naam:</strong> {{ $leverancier->Naam }}</p>
                <p><strong>Contactpersoon:</strong> {{ $leverancier->Contactpersoon }}</p>
                <p><strong>Leveranciernummer:</strong> {{ $leverancier->Leveranciernummer }}</p>
                <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel }}</p>
            </div>
        @endif

        {{-- Producten tabel --}}
        <table class="table table-striped table-bordered table-hover mt-4 shadow-sm">
            <thead>
                <tr class="text-center">
                    <th>Naam</th>
                    <th>Aantal in Magazijn</th>
                    <th>Verpakkings Eenheid</th>
                    <th>Laatste Levering</th>
                    <th>Nieuwe Levering</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($producten as $product)
                    <tr>
                        <td>{{ $product->Naam }}</td>
                        <td class="text-center">{{ $product->Aantal }}</td>
                        <td class="text-center">{{ $product->VerpakkingsEenheid }}</td>
                        <td class="text-center">{{ $product->DatumLevering }}</td>
                        <td class="text-center">
                            <a href="{{ route('leveranten.levering.create', ['leverancierId' => $leverancierId, 'productId' => $product->ProductId]) }}"
                               class="btn btn-sm btn-primary">+</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Dit bedrijf heeft nog geen producten geleverd
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('leveranten.index') }}" class="btn btn-secondary mt-3">Terug naar Leveranciers</a>
    </div>
</div>

<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
