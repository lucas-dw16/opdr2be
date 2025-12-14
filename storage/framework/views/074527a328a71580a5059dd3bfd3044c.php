<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => __('Dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Dashboard'))]); ?>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Welkom sectie -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Welkom, <?php echo e(auth()->user()->name); ?>!</h1>
            <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo e(now()->format('d M Y')); ?></span>
        </div>

        <!-- Grid kaarten met links -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Gebruikers -->
            <a href="#" class="block p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <h2 class="text-lg font-semibold">Gebruikers</h2>
                <p class="text-3xl font-bold mt-2">12</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Actieve gebruikers</p>
            </a>

            <!-- Producten -->
            <a href="<?php echo e(route('product.index')); ?>" class="block p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <h2 class="text-lg font-semibold">Producten</h2>
                <p class="text-3xl font-bold mt-2">58</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Beschikbare producten</p>
            </a>

            <!-- Leveranten -->
            <a href="<?php echo e(route('leveranten.index')); ?>" class="block p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-zinc-700 transition">
                <h2 class="text-lg font-semibold">Leveranten</h2>
                <p class="text-3xl font-bold mt-2">7</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Actieve leveranciers</p>
            </a>
        </div>

        <!-- Recente activiteiten sectie -->
        <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl shadow border border-neutral-200 dark:border-neutral-700">
            <h2 class="text-xl font-semibold mb-3">Recente activiteit</h2>
            <ul class="space-y-2">
                <?php
                    $recentActivities = [
                        'Nieuwe gebruiker aangemaakt: Lucas',
                        'Product Appel toegevoegd',
                        'Levering gepland voor Leverancier X',
                    ];
                ?>

                <?php $__currentLoopData = $recentActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="p-2 rounded bg-gray-50 dark:bg-zinc-700"><?php echo e($activity); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <!-- Snelkoppelingen sectie -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            <a href="<?php echo e(route('product.index')); ?>" class="p-4 bg-blue-500 text-white rounded-xl shadow hover:bg-blue-600 text-center font-semibold">Producten beheren</a>
            <a href="<?php echo e(route('leveranten.index')); ?>" class="p-4 bg-green-500 text-white rounded-xl shadow hover:bg-green-600 text-center font-semibold">Leveranten beheren</a>
            <a href="<?php echo e(route('allergeen.index')); ?>" class="p-4 bg-red-500 text-white rounded-xl shadow hover:bg-red-600 text-center font-semibold">Allergenen beheren</a>
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
<?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/dashboard.blade.php ENDPATH**/ ?>