<?php $__env->startSection('content'); ?>

<div class="h-screen flex">

    <div class="w-1/2 relative hidden lg:block">
        <img src="<?php echo e(asset('img/logo.png')); ?>"
             class="w-full h-auto mt-10 object-cover">

        <div class="absolute inset-0 bg-black/5"></div>
    </div>

    <div class="w-full lg:w-1/2 bg-gray-100 flex items-center justify-center">

        <div class="w-full max-w-md p-8">

            <p class="text-gray-700 mb-8">
                Olá, <strong><?php echo e(auth()->user()->name); ?></strong>. Seja bem-vindo.
            </p>

            <div class="space-y-6">

                <a href="<?php echo e(route('multas.index')); ?>"
                   class="block bg-blue-400 text-white p-6 rounded-lg shadow hover:bg-blue-800 transition">
                    <div class="text-3xl mb-2"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    Controle de Multas

                </a>

                <a href="<?php echo e(route('veiculos.index')); ?>"
                   class="block bg-blue-400 text-white p-6 rounded-lg shadow hover:bg-blue-800 transition">
                    <div class="text-3xl mb-2"><i class="fa-solid fa-gear"></i></div>
                    Controle de Manutenção

                </a>

            </div>

            <div class="mt-12 text-sm text-gray-500 text-center">
                <?php echo e(date('Y')); ?> © DPL Construções
            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sidnney/projetos/appFrota/resources/views/dashboard.blade.php ENDPATH**/ ?>