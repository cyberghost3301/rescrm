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
               <?php echo e(__('Loan Details')); ?>

           </h2>

            <a href="<?php echo e(url()->previous()); ?>"> 
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
<div class="max-w-6xl mx-auto py-5 px-3">

    
    <?php if(session('ok')): ?>
        <div class="flex items-center justify-between bg-green-100 text-green-800 rounded-full px-5 py-3 shadow mb-5">
            <div class="flex items-center gap-2">
                <i class="bi bi-check-circle-fill text-lg"></i>
                <strong><?php echo e(session('ok')); ?></strong>
            </div>
            <button type="button" class="text-green-900 font-bold">×</button>
        </div>
    <?php endif; ?>

    
    <div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
        <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg" 
             style="background: linear-gradient(45deg,#007bff,#00c6ff);">
            <i class="bi bi-file-text text-2xl"></i>
            Loan Details
        </div>
        <div class="p-5 space-y-4">

            
            <div class="flex mb-3">
                <div><strong class="font-semibold">Invoice Number :</strong> <?php echo e($loan->invoice_number); ?></div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold">Sale Date :</strong> <?php echo e($loan->sale_date); ?></div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold">Closure Date :</strong> <?php echo e($loan->closure_date); ?></div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Weekly Installment Day :</strong> <?php echo e($loan->weekly_installment_day); ?> </div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Billed Amount :</strong> ₹<?php echo e(number_format($loan->billed_amount,2)); ?></div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Total Payment :</strong> ₹<?php echo e(number_format($loan->total_payment,2)); ?></div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Financed Amount :</strong> ₹<?php echo e(number_format($loan->financed_amount,2)); ?></div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold"> Remaining :</strong> ₹<?php echo e(number_format($loan->total_amount_remaining,2)); ?></div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold"> Period (Weeks) :</strong> <?php echo e($loan->finance_period_weeks); ?></div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Weekly Installment :</strong>₹ <?php echo e(number_format($loan->weekly_installment_amount,2)); ?></div>
            </div>

            <hr>

            <div class="flex">
                <div><strong class="font-semibold"> Skipped Installment :</strong> <?php echo e(number_format($loan->weekly_skipped_installments)); ?></div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Non - payment Penalty :</strong>₹ <?php echo e(number_format($loan->non_payment_penalty,2)); ?></div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Late Payment Penalty:</strong> ₹ <?php echo e(number_format($loan->late_payment_penalty,2)); ?> </div>
            </div>

        </div>
    </div>

    
    <div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
        <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg"
             style="background: linear-gradient(45deg,#6c757d,#343a40);">
            <i class="bi bi-person-circle text-xl"></i>
            Customer Details
        </div>
        <div class="p-5 space-y-4">

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Name :</strong><?php echo e($loan->customer->name); ?></div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Contact :</strong><?php echo e($loan->customer->contact); ?></div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold">Alt Contact :</strong><?php echo e($loan->customer->alt_contact ?? '-'); ?></div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold">Vehicle Registration :</strong><?php echo e($loan->customer->vehicle_registration ?? '-'); ?></div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Address :</strong><?php echo e($loan->customer->address); ?></div>
            </div>

        </div>
    </div>


    
<div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
    <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg"
         style="background: linear-gradient(45deg,#28a745,#20c997);">
        <i class="bi bi-cash-stack text-xl"></i>
        Payments
    </div>

    <div class="p-0">
        <?php if($loan->payments->count()): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Mode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $loan->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2"><?php echo e($i+1); ?></td>
                                <td class="px-4 py-2"><?php echo e($pay->created_at); ?></td>
                                <td class="px-4 py-2 font-bold text-green-600">
                                    ₹<?php echo e(number_format($pay->amount,2)); ?>

                                </td>
                                <td class="px-4 py-2">
                                    <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-xs">
                                        <?php echo e(ucfirst($pay->mode)); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="p-4 text-gray-500 text-center">💳 No payments recorded yet.</div>
        <?php endif; ?>
    </div>
</div>


<div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
    <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg"
         style="background: linear-gradient(45deg,#212529,#495057);">
        <i class="bi bi-journal-text text-xl"></i>
        Ledger Entries
    </div>

    <div class="p-0">
        <?php if($loan->ledger->count()): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $loan->ledger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2"><?php echo e($i+1); ?></td>
                                <td class="px-4 py-2"><?php echo e($entry->entry_date); ?></td>
                                <td class="px-4 py-2">
                                    <span class="bg-blue-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                                        <?php echo e(ucfirst($entry->type)); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-2 font-bold">
                                    ₹<?php echo e(number_format($entry->amount,2)); ?>

                                </td>
                                <td class="px-4 py-2"><?php echo e($entry->note ?? '-'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="p-4 text-gray-500 text-center">📒 No ledger entries found.</div>
        <?php endif; ?>
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
<?php /**PATH /Applications/MAMP/htdocs/raoenergy/resources/views/loans/show.blade.php ENDPATH**/ ?>