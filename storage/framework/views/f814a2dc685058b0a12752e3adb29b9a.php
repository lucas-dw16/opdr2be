<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin - <?php echo e($title); ?></title>

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
            <h1 class="text-center"><?php echo e($title); ?></h1>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="4;url=<?php echo e(route('leveranten.producten', $leverancierId)); ?>">
            <?php endif; ?>

            
            <div class="mb-4">
                <h5>Product: <?php echo e($productNaam); ?></h5>
                <?php if(!empty($leverancier)): ?>
                    <p><strong>Leverancier:</strong> <?php echo e($leverancier->Naam); ?></p>
                    <p><strong>Contactpersoon:</strong> <?php echo e($leverancier->Contactpersoon); ?></p>
                    <p><strong>Mobiel:</strong> <?php echo e($leverancier->Mobiel); ?></p>
                <?php endif; ?>
            </div>

            
            <form method="POST" action="<?php echo e(route('leveranten.levering.store')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="productId" value="<?php echo e($productId); ?>">
                <input type="hidden" name="leverancierId" value="<?php echo e($leverancierId); ?>">

                <div class="mb-3">
                    <label for="aantal" class="form-label">Aantal Producteenheden</label>
                    <input type="number" id="aantal" name="aantal"
                           class="form-control <?php $__errorArgs = ['aantal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           value="<?php echo e(old('aantal')); ?>" required min="1" max="32767">
                    <small class="text-muted">Maximaal 32.767 eenheden per levering</small>
                    <?php $__errorArgs = ['aantal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <span class="invalid-feedback"><?php echo e($message); ?></span> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label for="datumEerstvolgendeLevering" class="form-label">Datum Eerstvolgende Levering</label>
                    <input type="date" id="datumEerstvolgendeLevering" name="datumEerstvolgendeLevering"
                           class="form-control <?php $__errorArgs = ['datumEerstvolgendeLevering'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           value="<?php echo e(old('datumEerstvolgendeLevering')); ?>"
                           min="<?php echo e(now()->format('Y-m-d')); ?>" required>
                    <?php $__errorArgs = ['datumEerstvolgendeLevering'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <span class="invalid-feedback"><?php echo e($message); ?></span> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Sla op</button>
                    <a href="<?php echo e(route('leveranten.producten', $leverancierId)); ?>" class="btn btn-secondary">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/leveranten/add-delivery.blade.php ENDPATH**/ ?>