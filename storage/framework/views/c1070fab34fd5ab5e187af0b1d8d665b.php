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
               <?php echo e(__('Expenses Create')); ?>

           </h2>

            <a href="<?php echo e(route('expenses.index')); ?>"> 
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

   <div class="grid grid-cols-1 md:grid-cols-2 px-3 gap-6">

  

  <form method="post" action="<?php echo e(route('expenses.store')); ?>">
    <?php echo csrf_field(); ?>

    <!-- FRONT -->
    <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">

    <h3 class="text-lg font-semibold mb-4">Enter Expense </h3>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Date</span>
        <input type="date" name="date" required class="input w-full" />
      </label>

      <label class="block mb-4">
            <span class="block mb-2 font-medium">Amount</span>
            <input type="number" name="amount" min="1" required class="input w-full" />
     </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Head</span>
        <input type="text" name="head" required class="input w-full" />
      </label>

        <div class="md:col-span-2 flex justify-end mt-5">
            <button class="px-6 py-3 bg-gray-900 hover:bg-gray-700 text-white font-semibold rounded-xl shadow">
                Submit
            </button>
        </div>

    </div>

  </form>

  <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">

      <h3 class="text-lg font-semibold mb-4">Expenses List</h3>

      <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left"> Amount </th>
                            <th class="px-6 py-3 text-left"> Head </th>
                        
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        <?php if($expenses->isNotEmpty()): ?>
                            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left"><?php echo e($expense->id); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e(\Carbon\Carbon::parse($expense->date)->format('d M, Y')); ?></td>
                                <td class="px-6 py-3 text-left"> <?php echo e($expense->amount); ?></td>
                                <td class="px-6 py-3 text-left"><?php echo e($expense->head); ?></td>
                              
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
      
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
<?php /**PATH /home/u384460131/domains/theglobaleworld.com/public_html/raoenergy/resources/views/expenses/create.blade.php ENDPATH**/ ?>