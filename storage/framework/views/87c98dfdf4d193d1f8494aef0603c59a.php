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
                <?php echo e(__('Cash Holding List')); ?>

            </h2>

            <a href="<?php echo e(route('cashHolding.create')); ?>"> 
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

            

            <div class="p-6 text-gray-900">
                <form method="post" action="<?php echo e(route('cashHolding.search')); ?>" class="flex items-center gap-3">
                    <?php echo csrf_field(); ?>

                    <label class="block mb-4">
                        <span class="block mb-2 font-medium">From Date</span>
                        <input type="date" name="from_date" required class="input w-full" />
                    </label>

                    <label class="block mb-4">
                        <span class="block mb-2 font-medium">To Date</span>
                        <input type="date" name="to_date" required class="input w-full" />
                    </label>
                
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg mt-3">Search</button>

                </form>

            
            </div>

    
            <div class="overflow-x-auto w-full">
                <table class="w-full min-w-max">
                    <thead class="bg-gray-50">
                        <tr class="border-b">
                            <th class="px-6 py-3 text-left whitespace-nowrap">#</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap">Date</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Previous Day Cash Holding </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Today Total Collection </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Today Total Expenses </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Cash In Hand </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Cash In Account </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Cash In Wallet </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Total Cash</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Created By</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Created At</th>
                          
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        <?php if($cashHolding->isNotEmpty()): ?>
                            <?php $__currentLoopData = $cashHolding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashHold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->id); ?></td>
                                <td class="px-6 py-3 text-left">
    <span style="white-space: nowrap;">
        <?php echo e(\Carbon\Carbon::parse($cashHold->date)->format('d-m-Y')); ?>

    </span>
</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"> <?php echo e($cashHold->previous_day_cash_holding); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->today_total_collection); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->today_total_expenses); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->cash_in_hand); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->cash_in_account); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->cash_in_wallet); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"><?php echo e($cashHold->total_cash); ?></td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <span style="white-space: nowrap;">
                                        <?php echo e($cashHold->user->name); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-3 text-left">
                                    <span style="white-space: nowrap;">
                                        <?php echo e(\Carbon\Carbon::parse($cashHold->created_at)->format('d-m-Y H:i:s')); ?>

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

                <div class="my-3">

                    <?php echo e($cashHolding->links()); ?>


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
<?php /**PATH /home/u384460131/domains/theglobaleworld.com/public_html/raoenergy/resources/views/cashHolding/index.blade.php ENDPATH**/ ?>