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
    <div class="container mx-auto py-6 max-w-5xl">

        <h1 class="text-3xl font-bold mb-6"><?php echo e($title); ?></h1>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 relative">
                <?php echo e(session('success')); ?>

                <button 
                    class="absolute top-0 right-0 px-4 py-3 text-xl"
                    onclick="this.parentElement.style.display='none'">
                    &times;
                </button>
            </div>
        <?php endif; ?>

        <div class="mb-4">
            <a 
                href="<?php echo e(route('allergeen.create')); ?>"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
            >
                Nieuwe Allergeen
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Naam</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Omschrijving</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Verwijder</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Wijzig</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $allergenen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergeen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo e($allergeen->Naam); ?></td>
                            <td class="px-4 py-2"><?php echo e($allergeen->Omschrijving); ?></td>

                            <td class="px-4 py-2 text-center">
                                <form 
                                    action="<?php echo e(route('allergeen.destroy', $allergeen->Id)); ?>" 
                                    method="POST"
                                    onsubmit="return confirm('Weet je zeker dat je dit allergeen wilt verwijderen?');"
                                >
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button 
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                    >
                                        Verwijderen
                                    </button>
                                </form>
                            </td>

                            <td class="px-4 py-2 text-center">
                                <a 
                                    href="<?php echo e(route('allergeen.edit', $allergeen->Id)); ?>"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded"
                                >
                                    Wijzig
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                Geen allergenen bekend
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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
<?php /**PATH C:\Users\lucas\Desktop\be-opdracht-2\be-opdracht-2\resources\views/allergenen/index.blade.php ENDPATH**/ ?>