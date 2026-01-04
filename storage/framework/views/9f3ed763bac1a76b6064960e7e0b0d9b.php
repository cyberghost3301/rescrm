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
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Prospects List')); ?>

            </h2>

            <a href="<?php echo e(route('prospect.create')); ?>"> 
                <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ms-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3']); ?>
                    <?php echo e(__('Create')); ?> 
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
            </a> 

        </div>


     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <?php if (isset($component)) { $__componentOriginal88b0e6813f5b80100a19437aa80e29ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $attributes = $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $component = $__componentOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>

                <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left"> Customer Name</th>
                            <th class="px-6 py-3 text-left"> Locality </th>
                            <th class="px-6 py-3 text-left"> Contact No </th>
                            <th class="px-6 py-3 text-left"> Alt Contact No</th>
                            <th class="px-6 py-3 text-center">Requirment</th>
                            <th class="px-6 py-3 text-center">Mode</th>
                            <th class="px-6 py-3 text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        
                        
                       <?php if($prospects->isNotEmpty()): ?>
                            <?php $__currentLoopData = $prospects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->id); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->date); ?></td>
                                <td class="px-6 py-3 text-left"> <?php echo e($prospect->customer_name); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->locality); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->contact_no); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->alt_contact_no); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->requirement); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($prospect->mode); ?></td>
                                <td class="px-6 py-3 text-left">
                                    <form action="<?php echo e(route('prospect.updateStatus', $prospect->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                
                                        <select 
                                            name="status"
                                            onchange="this.form.submit()"
                                            class="border rounded px-6 py-1 text-sm
                                                <?php echo e($prospect->status == 1 ? 'bg-yellow-100' : ''); ?>

                                                <?php echo e($prospect->status == 0 ? 'bg-red-100' : ''); ?>

                                                <?php echo e($prospect->status == 2 ? 'bg-green-100' : ''); ?>">
                                
                                            <option value="1" <?php echo e($prospect->status == 1 ? 'selected' : ''); ?>>
                                                Pending
                                            </option>
                                
                                            <option value="0" <?php echo e($prospect->status == 0 ? 'selected' : ''); ?>>
                                                Rejected
                                            </option>
                                
                                            <option value="2" <?php echo e($prospect->status == 2 ? 'selected' : ''); ?>>
                                                Finalised
                                            </option>
                                
                                        </select>
                                    </form>
                                </td>

                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="my-3">

                    <?php echo e($prospects->links()); ?>


                </div>
                 
                </div>
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
<?php /**PATH /home/u384460131/domains/theglobaleworld.com/public_html/raoenergy/resources/views/prospects/index.blade.php ENDPATH**/ ?>