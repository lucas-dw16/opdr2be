<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => $title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title)]); ?>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold mb-6"><?php echo e($title); ?></h1>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
        <?php endif; ?>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Naam</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Contactpersoon</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Leverantie nummer</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Mobiel</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Aantal producten</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-700">Toon producten</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $leveranten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo e($l->LeverancierNaam); ?></td>
                            <td class="px-4 py-2"><?php echo e($l->Contactpersoon); ?></td>
                            <td class="px-4 py-2 text-center"><?php echo e($l->Leveranciernummer); ?></td>
                            <td class="px-4 py-2 text-center"><?php echo e($l->Telefoonnummer); ?></td>
                            <td class="px-4 py-2 text-center"><?php echo e($l->ProductCount); ?></td>
                            <td class="px-4 py-2 text-center">
                                <a href="<?php echo e(route('leveranten.producten', ['leverancierId' => $l->Id])); ?>" class="text-blue-600 hover:underline">
                                    <img src="https://img.icons8.com/?size=30&id=391&format=png&color=1847B8" alt="Bekijk producten"/>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Geen leveranciers gevonden</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="<?php echo e(route('home')); ?>" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">Terug naar home</a>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/leveranten/index.blade.php ENDPATH**/ ?>