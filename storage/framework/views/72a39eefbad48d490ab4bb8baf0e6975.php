
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
            <?php echo e(__('Multas')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Controle de Multas
        </h2>

        <button class="px-4 py-2 bg-indigo-300 text-black rounded-md text-xx hover:bg-indigo-400 hover:text-white transition">
        <a href="<?php echo e(route('multas.create')); ?>">
            <i class="fa-solid fa-plus"></i> Nova Multa
        </a>
        </button>

    </div>
    <div class="mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-700">
                    
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">Placa</th>
                            <th class="px-4 py-3 text-left">Setor</th>
                            <th class="px-4 py-3 text-left">Veículo</th>
                            <th class="px-4 py-3 text-left">Responsável</th>
                            <th class="px-4 py-3 text-left">Descrição</th>
                            <th class="px-4 py-3 text-left">Nº Auto</th>
                            <th class="px-4 py-3 text-left">Recebimento</th>
                            <th class="px-4 py-3 text-left">Vencimento</th>
                            <th class="px-4 py-3 text-left">Situação</th>
                            <th class="px-4 py-3 text-center">PDF</th>
                            <th class="px-4 py-3 text-center">PDF Desc.</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        <?php $__currentLoopData = $multas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $statusColor = match($multa->situacao) {
                                    'Pago' => 'bg-green-100 text-green-700',
                                    'Não Pago' => 'bg-red-100 text-red-700',
                                    'Recorrida' => 'bg-yellow-100 text-yellow-700',
                                    default => 'bg-gray-100 text-gray-700',
                                };
                            ?>

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 font-medium"><?php echo e($multa->placa); ?></td>
                                <td class="px-4 py-3"><?php echo e($multa->setor); ?></td>
                                <td class="px-4 py-3"><?php echo e($multa->veiculo); ?></td>
                                <td class="px-4 py-3"><?php echo e($multa->responsavel); ?></td>
                                <td class="px-4 py-3 max-w-[200px] break-words">
                                    <?php echo e($multa->descricao); ?>

                                </td>
                                <td class="px-4 py-3"><?php echo e($multa->numero_auto); ?></td>
                                <td class="px-4 py-3">
                                    <?php echo e(\Carbon\Carbon::parse($multa->data_recebimento)->format('d/m/Y')); ?>

                                </td>
                                <td class="px-4 py-3">
                                    <?php echo e(\Carbon\Carbon::parse($multa->data_vencimento)->format('d/m/Y')); ?>

                                </td>

                                <td class="px-4 py-3">
                                    <span class="situacao 
                                        situacao-<?php echo e(strtolower(str_replace(' ', '-', $multa->situacao))); ?>">
                                        <?php echo e($multa->situacao); ?>

                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <?php if($multa->pdf): ?>
                                        <a href="<?php echo e(asset('storage/' . $multa->pdf)); ?>"
                                        target="_blank"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium">
                                            Baixar
                                        </a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <?php if($multa->pdf_desconto): ?>
                                        <a href="<?php echo e(asset('storage/' . $multa->pdf_desconto)); ?>"
                                        target="_blank"
                                        class="text-indigo-600 hover:text-indigo-800 font-medium">
                                            Baixar
                                        </a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="px-4 py-3 text-center space-x-3">
                                    <a href="<?php echo e(route('multas.edit', $multa->id)); ?>"
                                    class="text-indigo-600 hover:text-indigo-800 font-medium">
                                        <i class="fa-solid fa-file-pen"></i>
                                    </a>

                                    <form action="<?php echo e(route('multas.destroy', $multa->id)); ?>"
                                        method="POST"
                                        class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                onclick="return confirm('Deseja realmente excluir esta multa?')"
                                                class="text-red-600 hover:text-red-800 font-medium">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($multas->isEmpty()): ?>
                            <tr>
                                <td colspan="12" class="text-center py-6 text-gray-500">
                                    <i class="fa-solid fa-triangle-exclamation"></i>Nenhuma multa cadastrada.
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
<?php /**PATH /home/sidnney/projetos/appFrota/resources/views/multas/index.blade.php ENDPATH**/ ?>