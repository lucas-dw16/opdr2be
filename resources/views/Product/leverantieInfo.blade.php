@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Leveringsinformatie' }}</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #343a40;
            font-weight: 700;
        }
        .card {
            border-radius: 1rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .alert {
            border-radius: 0.5rem;
        }
        .card-title {
            color: #495057;
            font-weight: 600;
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.05);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h1 class="mb-4">{{ $title ?? 'Leveringsinformatie' }}</h1>

                {{-- Succesmelding --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                    </div>
                    @if(!empty($leverant->Id))
                        <meta http-equiv="refresh" content="3;url={{ route('product.leverantieInfo', ['id' => $leverant->Id]) }}">
                    @endif
                @endif

                {{-- Leverancierinformatie --}}
                @if(!empty($leverant))
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Leverancierinformatie</h5>
                            <p><strong>Naam Leverancier:</strong> {{ $leverant->Naam ?? 'Niet beschikbaar' }}</p>
                            <p><strong>Contactpersoon:</strong> {{ $leverant->Contactpersoon ?? 'Niet beschikbaar' }}</p>
                            <p><strong>Leveranciernummer:</strong> {{ $leverant->Leveranciernummer ?? 'Niet beschikbaar' }}</p>
                            <p><strong>Mobiel:</strong> {{ $leverant->Mobiel ?? 'Niet beschikbaar' }}</p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">Geen leverancierinformatie gevonden.</div>
                @endif

                {{-- Productenlijst --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Producten en Leveringen</h5>

                        @if(!empty($producten) && count($producten))
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Naam</th>
                                            <th>Datum Levering</th>
                                            <th>Aantal</th>
                                            <th>Datum Eerstvolgende Levering</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($producten as $product)
                                            <tr>
                                                <td class="text-start">{{ $product->Naam ?? '-' }}</td>
                                                <td>{{ $product->DatumLevering ?? '-' }}</td>
                                                <td>{{ $product->Aantal ?? '-' }}</td>
                                                <td>{{ $product->DatumEerstVolgendeLevering ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                Er zijn geen producten beschikbaar van deze leverancier op dit moment.
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
