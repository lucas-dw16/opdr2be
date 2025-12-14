@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-top: 2rem;
            margin-bottom: 2rem;
            color: #343a40;
            text-align: center;
            font-weight: 700;
        }
        .card, .table {
            border-radius: 0.8rem;
        }
        .table thead {
            background-color: #343a40;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: rgba(0,0,0,0.05);
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }
        .alert {
            border-radius: 0.5rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-10">

            <h1>{{ $title }}</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="Sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('product.index') }}">
            @endif

            <table class="table table-striped table-bordered table-hover mt-4 align-middle shadow-sm text-center">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Naam</th>
                        <th>Verpakkingseenheid (kg)</th>
                        <th>Aantal Aanwezig</th>
                        <th>Allergenen Info</th>
                        <th>Leverantie Info</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->Barcode }}</td>
                            <td class="text-start">{{ $product->Naam }}</td>
                            <td>{{ intval($product->VerpakkingsEenheid) }}</td>
                            <td>{{ $product->AantalAanwezig }}</td>
                            <td>
                                <form action="{{ route('product.allergenenInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-sm">Allergenen Info</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('product.leverantieInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success btn-sm">Leverantie Info</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Geen producten beschikbaar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
