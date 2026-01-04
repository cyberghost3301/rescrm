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
               <?php echo e(__('Day Action')); ?>

           </h2>

            <a href="<?php echo e(route('dashboard')); ?>"> 
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
                    <?php echo e(__('Back')); ?>    
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


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900">
                <form method="post" action="<?php echo e(route('dayaction.list')); ?>" class="flex items-center gap-3">
                    <?php echo csrf_field(); ?>
                    <select name="day" class="input" required>
                        <option value="" disabled selected>Select day...</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">Show</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
               <?php echo e(__('Day Action — List')); ?>

            </h2>   
                <?php if(isset($loans) ? $loans->isNotEmpty(): ''): ?>
                    <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
    $today = \Carbon\Carbon::today();
    $saleDate = \Carbon\Carbon::parse($loan->sale_date);
    $closureDate = \Carbon\Carbon::parse($loan->closure_date);
    $weeksPassed = $saleDate->diffInWeeks($today);
    $halfPeriod = $loan->finance_period_weeks / 2;

    if ($today->gt($closureDate)) {
        $bgColor = 'bg-red-500 text-white';
    } elseif (
        $weeksPassed > $halfPeriod &&
        $today->lt($closureDate) &&
        $loan->total_amount_collected < ($loan->financed_amount / 2)
    ) {
        $bgColor = 'bg-orange-500 text-white';
    } else {
        $bgColor = 'bg-teal-500 text-white';
    }
?>




                    <div class="<?php echo e($bgColor); ?> overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div x-data="{open:false}" class="p-6 text-gray-900">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="font-semibold"> <?php echo e($loan->customer->name ?? ''); ?> - ( <?php echo e($loan->invoice_number ?? ''); ?> )</div>
                                    <div class="text-sm text-gray-600">Remaining: ₹ <?php echo e(number_format($loan->total_amount_remaining,2)); ?></div>
                                </div>
                                <button @click="open=!open" class="px-3 py-1 rounded bg-gray-100">View</button>
                            </div>
                            <div x-show="open" class="mt-3 space-y-3">
                            <div class="bg-white px-5 py-1 <?php echo e($loan->weekly_color); ?>">
                                <?php echo e($loan->weekly_message); ?>

                            </div>
                                <div class="text-sm">
                                    <div class="bg-white grid md:grid-cols-4 gap-2 text-xs mt-2">
                                    <div class="px-5 py-1">Weekly Amt: ₹ <?php echo e(number_format($loan->weekly_installment_amount,2)); ?></div>
                                    <div class="px-5 py-1 <?php echo e($loan->weekly_skipped_installments > ($loan->finance_period_weeks / 4) ? 'text-red-500 font-bold' : 'text-green-600 font-bold'); ?>">
    Skipped: <?php echo e($loan->weekly_skipped_installments); ?>

</div>

                                    <div class="px-5 py-1">Non-pay Penalty: ₹ <?php echo e(number_format($loan->non_payment_penalty,2)); ?></div>
                                    <div class="px-5 py-1">Late Penalty: ₹ <?php echo e(number_format($loan->late_payment_penalty,2)); ?></div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <form method="post" action="<?php echo e(route('dayaction.collect', $loan)); ?>" class="flex items-center gap-2">
                                        <?php echo csrf_field(); ?>
                                        <input type="number" name="amount" step="0.01" min="0.01" max=" <?php echo e($loan->total_amount_remaining); ?>" class="input w-40" placeholder="Collect ₹" required/>
                                        <select name="mode" class="input" required>
                                            <option value="" disabled selected>Select Mode...</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Online">Online</option>
                                        <select>
                                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ms-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3']); ?>Log Collection  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                                    </form>
                                    <form method="post" action="<?php echo e(route('dayaction.penalty.nonpayment', $loan)); ?>" onsubmit="return confirm('Are you sure you want to charge non payment penalty?')">
                                        <?php echo csrf_field(); ?>
                                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ms-3 mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3 mt-1']); ?> Non Payment Penalty?  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                                    </form>
                                    <form method="post" action="<?php echo e(route('dayaction.penalty.late', $loan)); ?>" onsubmit="return confirm('Are you sure you want to charge late payment penalty?')">
                                        <?php echo csrf_field(); ?>
                                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ms-3 mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3 mt-1']); ?> Late Payment Penalty  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
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
<?php /**PATH /Applications/MAMP/htdocs/raoenergy/resources/views/dayaction/index.blade.php ENDPATH**/ ?>