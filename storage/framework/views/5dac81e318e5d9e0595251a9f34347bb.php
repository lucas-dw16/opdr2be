<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h1 class="mb-4"><?php echo e($title); ?></h1>

                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                    </div>
                    <meta http-equiv="refresh" content="3;url=<?php echo e(route('product.leverantieInfo', ['id' => $leverant->Id ?? 0])); ?>">
                <?php endif; ?>

                
                <?php if($leverant): ?>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Leverancierinformatie</h5>
                            <p><strong>Naam Leverancier:</strong> <?php echo e($leverant->Naam); ?></p>
                            <p><strong>Contactpersoon:</strong> <?php echo e($leverant->Contactpersoon); ?></p>
                            <p><strong>Leveranciernummer:</strong> <?php echo e($leverant->Leveranciernummer); ?></p>
                            <p><strong>Mobiel:</strong> <?php echo e($leverant->Mobiel); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">Geen leverancierinformatie gevonden.</div>
                <?php endif; ?>

                
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Producten en Leveringen</h5>

                        <?php if(count($producten)): ?>
                            <table class="table table-striped table-bordered align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>Naam</th>
                                        <th>Datum Levering</th>
                                        <th>Aantal</th>
                                        <th>Datum Eerstvolgende Levering</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $producten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product->Naam); ?></td>
                                            <td class="text-center"><?php echo e($product->DatumLevering); ?></td>
                                            <td class="text-center"><?php echo e($product->Aantal); ?></td>
                                            <td class="text-center"><?php echo e($product->DatumEerstVolgendeLevering); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                Er zijn geen producten beschikbaar van deze leverancier op dit moment.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/product/leverantieInfo.blade.php ENDPATH**/ ?>