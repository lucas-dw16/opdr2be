<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
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

            <h1><?php echo e($title); ?></h1>

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if($product): ?>
                <div class="mt-3">
                    <strong>Naam:</strong> <?php echo e($product->ProductNaam); ?><br>
                    <strong>Barcode:</strong> <?php echo e($product->Barcode); ?>

                </div>
            <?php else: ?>
                <p>Geen productinformatie gevonden.</p>
            <?php endif; ?>
            
            <h3 class="mt-4">Allergenen</h3>

            <table class="table table-striped table-bordered table-hover mt-2 align-middle shadow-sm">
                <thead>
                    <tr>
                        <th class="text-center">Naam</th>
                        <th class="text-center">Omschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $allergenen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($a->AllergeenNaam); ?></td>
                            <td class="text-center"><?php echo e($a->AllergeenOmschrijving); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="2" class="text-center">in dit product
                                zitten geen stoffen die een allergische reactie kunnen veroorzaken</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/product/allergenenInfo.blade.php ENDPATH**/ ?>