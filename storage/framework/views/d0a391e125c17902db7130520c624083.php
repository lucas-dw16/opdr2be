<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
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

            <h1><?php echo e($title); ?></h1>

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" aria-label="Sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url=<?php echo e(route('product.index')); ?>">
            <?php endif; ?>

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
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($product->Barcode); ?></td>
                            <td class="text-start"><?php echo e($product->Naam); ?></td>
                            <td><?php echo e(intval($product->VerpakkingsEenheid)); ?></td>
                            <td><?php echo e($product->AantalAanwezig); ?></td>
                            <td>
                                <form action="<?php echo e(route('product.allergenenInfo', $product->Id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('GET'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Allergenen Info</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo e(route('product.leverantieInfo', $product->Id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('GET'); ?>
                                    <button type="submit" class="btn btn-success btn-sm">Leverantie Info</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">Geen producten beschikbaar</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/product/index.blade.php ENDPATH**/ ?>