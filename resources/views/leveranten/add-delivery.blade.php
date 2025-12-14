<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin - {{ $title }}</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Eigen CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
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
    <div class="col-md-6">
        <div class="card p-4 bg-white">
            <h1 class="text-center">{{ $title }}</h1>

            {{-- Succesmelding --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Foutenmelding --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Fout uit sessie --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="4;url={{ route('leveranten.producten', $leverancierId) }}">
            @endif

            {{-- Product en leverancier info --}}
            <div class="mb-4">
                <h5>Product: {{ $productNaam }}</h5>
                @if(!empty($leverancier))
                    <p><strong>Leverancier:</strong> {{ $leverancier->Naam }}</p>
                    <p><strong>Contactpersoon:</strong> {{ $leverancier->Contactpersoon }}</p>
                    <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel }}</p>
                @endif
            </div>

            {{-- Formulier nieuwe levering --}}
            <form method="POST" action="{{ route('leveranten.levering.store') }}">
                @csrf
                <input type="hidden" name="productId" value="{{ $productId }}">
                <input type="hidden" name="leverancierId" value="{{ $leverancierId }}">

                <div class="mb-3">
                    <label for="aantal" class="form-label">Aantal Producteenheden</label>
                    <input type="number" id="aantal" name="aantal"
                           class="form-control @error('aantal') is-invalid @enderror"
                           value="{{ old('aantal') }}" required min="1" max="32767">
                    <small class="text-muted">Maximaal 32.767 eenheden per levering</small>
                    @error('aantal') 
                        <span class="invalid-feedback">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="datumEerstvolgendeLevering" class="form-label">Datum Eerstvolgende Levering</label>
                    <input type="date" id="datumEerstvolgendeLevering" name="datumEerstvolgendeLevering"
                           class="form-control @error('datumEerstvolgendeLevering') is-invalid @enderror"
                           value="{{ old('datumEerstvolgendeLevering') }}"
                           min="{{ now()->format('Y-m-d') }}" required>
                    @error('datumEerstvolgendeLevering') 
                        <span class="invalid-feedback">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Sla op</button>
                    <a href="{{ route('leveranten.producten', $leverancierId) }}" class="btn btn-secondary">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
