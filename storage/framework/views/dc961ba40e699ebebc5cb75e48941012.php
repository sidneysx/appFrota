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
            Revisões do Veículo
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- CARD VEICULO -->
            <div class="bg-white shadow sm:rounded-lg p-6 mb-6">

                <div class="flex gap-8 items-center text-sm">

                    <div>
                        <p class="text-gray-400 text-xs">Placa</p>
                        <p class="text-lg font-semibold"><?php echo e($veiculo->placa); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Veículo</p>
                        <p class="font-medium"><?php echo e($veiculo->veiculo); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Ano</p>
                        <p class="font-medium"><?php echo e($veiculo->ano); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Responsável</p>
                        <p class="font-medium"><?php echo e($veiculo->responsavel); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Setor</p>
                        <p class="font-medium"><?php echo e($veiculo->setor); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Tipo</p>
                        <p class="font-medium"><?php echo e($veiculo->tipo); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">DPL</p>
                        <p class="font-medium"><?php echo e($veiculo->dpl); ?></p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Total gasto</p>
                        <p class="font-semibold text-red-600">
                            R$ <?php echo e(number_format($revisoes->sum('valor'), 2, ',', '.')); ?>

                        </p>
                    </div>

                </div>

            </div>


            <!-- BOTAO NOVA REVISAO -->
            <div class="flex justify-between mb-4">
                <a href="<?php echo e(route('revisoes.create', $veiculo->id)); ?>"
                    class="px-4 py-2 bg-indigo-300 text-black rounded-md text-sm hover:bg-indigo-400 hover:text-white transition">
                    <i class="fa-solid fa-plus"></i> Nova Revisão
                </a>

                <a href="<?php echo e(route('veiculos.index')); ?>" class="px-4 py-2 bg-indigo-300 text-black rounded-md text-sm hover:bg-indigo-400 hover:text-white transition">
                <i class="fa-solid fa-backward"></i> Voltar para veículos
                </a>


            </div>


            <!-- TABELA REVISOES -->
            <div class="bg-white shadow sm:rounded-lg overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-gray-100 text-gray-700">
                        <tr>

                            <th class="px-4 py-3 text-left">Data da Revisão</th>
                            <th class="px-4 py-3 text-left">KM da Revisão</th>
                            <th class="px-4 py-3 text-left">Próxima revisão (KM)</th>
                            <th class="px-4 py-3 text-left">Local da Revisão</th>
                            <th class="px-4 py-3 text-left">Valor da Revisão</th>
                            <th class="px-4 py-3 text-center">Ações</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $revisoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revisao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-t hover:bg-gray-50 transition">

                                <td class="px-4 py-3">
                                    <?php echo e(\Carbon\Carbon::parse($revisao->data)->format('d/m/Y')); ?>

                                </td>

                                <td class="px-4 py-3">
                                    <?php echo e(number_format($revisao->km, 0, ',', '.')); ?>

                                </td>

                                <td class="px-4 py-3">
                                    <?php echo e($revisao->proxima_km ? number_format($revisao->proxima_km, 0, ',', '.') : '-'); ?>

                                </td>

                                <td class="px-4 py-3">
                                    <?php echo e($revisao->local ?? '-'); ?>

                                </td>

                                <td class="px-4 py-3 font-medium">
                                    R$ <?php echo e(number_format($revisao->valor, 2, ',', '.')); ?>

                                </td>

                                <td class="px-4 py-3 text-center space-x-3">

                                    <a href="<?php echo e(route('revisoes.edit', $revisao->id)); ?>"
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Editar
                                    </a>

                                    <form action="<?php echo e(route('revisoes.destroy', $revisao->id)); ?>" method="POST"
                                        class="inline">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" onclick="return confirm('Excluir revisão?')"
                                            class="text-red-600 hover:text-red-800 font-medium">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                    Nenhuma revisão cadastrada.
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
<?php endif; ?>
<?php /**PATH /home/sidnney/projetos/appFrota/resources/views/revisoes/index.blade.php ENDPATH**/ ?>