<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Veículos')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Controle de Veículos
        </h2>

        <a href="<?php echo e(route('veiculos.create')); ?>"
           class="px-4 py-2 bg-indigo-300 text-black rounded-md text-sm hover:bg-indigo-400 hover:text-white transition">
            + Novo Veículo
        </a>
    </div>

    <div class=" mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">Placa</th>
                            <th class="px-4 py-3 text-left">Renavan</th>
                            <th class="px-4 py-3 text-left">Veículo</th>
                            <th class="px-4 py-3 text-left">Ano</th>
                            <th class="px-4 py-3 text-left">Tipo</th>
                            <th class="px-4 py-3 text-left">Setor</th>
                            <th class="px-4 py-3 text-left">Responsável</th>
                            <th class="px-4 py-3 text-left">DPL</th>
                            <th class="px-4 py-3 text-left">Revisão</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $veiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 font-medium"><?php echo e($veiculo->placa ?? '-'); ?></td>

                                <td class="px-4 py-3">
                                   <?php if($veiculo->renavan_pdf): ?>
                                        <a href="<?php echo e(asset('storage/'.$veiculo->renavan_pdf)); ?>"
                                        target="_blank"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium">
                                            <?php echo e($veiculo->renavan_numero); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>

                                <td class="px-4 py-3"><?php echo e($veiculo->veiculo); ?></td>
                                <td class="px-4 py-3"><?php echo e($veiculo->ano ?? '-'); ?></td>
                                <td class="px-4 py-3"><?php echo e($veiculo->tipo ?? '-'); ?></td>
                                <td class="px-4 py-3"><?php echo e($veiculo->setor ?? '-'); ?></td>
                                <td class="px-4 py-3"><?php echo e($veiculo->responsavel ?? '-'); ?></td>
                                <td class="px-4 py-3"><?php echo e($veiculo->dpl); ?></td>

                                <td class="px-4 py-3 text-center">
                                <a href="<?php echo e(route('revisoes.index', $veiculo->id)); ?>"
                                class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Revisões
                                </a>
                                </td>

                                <td class="px-4 py-3 text-center space-x-3">
                                    <a href="<?php echo e(route('veiculos.edit', $veiculo->id)); ?>"
                                       class="text-indigo-600 hover:text-blue-800 font-medium">
                                       <i class="fa-solid fa-file-pen"></i>
                                    </a>

                                    <form action="<?php echo e(route('veiculos.destroy', $veiculo->id)); ?>"
                                          method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                                onclick="return confirm('Deseja realmente excluir este veículo?')"
                                                class="text-red-600 hover:text-red-800 font-medium">
                                                <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($veiculos->isEmpty()): ?>
                            <tr>
                                <td colspan="10" class="text-center py-6 text-gray-500">
                                    <i class="fa-solid fa-triangle-exclamation"></i>Nenhum veículo cadastrado.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/sidnney/projetos/appFrota/resources/views/veiculos/index.blade.php ENDPATH**/ ?>