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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Heading -->
            <h2 class="text-2xl font-bold mb-6 text-gray-800">📊 Rao Energy Solution</h2>

            <!-- Financial Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-sm text-gray-500">Total Loan Amount Given</h3>
                    <p class="text-2xl font-bold text-gray-800">₹  <?php echo e(isset($loans) ? $loans->sum('financed_amount') : 0); ?></p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-sm text-gray-500"> Remaining Amount</h3>
                    <p class="text-2xl font-bold text-red-600">₹ <?php echo e(isset($loans) ? $loans->sum('total_amount_remaining') : 0); ?></p>
                </div>
                
                   <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-sm text-gray-500">Today's Expenses</h3>
                    <p class="text-2xl font-bold text-gray-800">₹ <?php echo e(isset($expenses) ? $expenses->sum('amount') : 0); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-sm text-gray-500"> Today's Collection</h3>
                    <p class="text-2xl font-bold text-green-600">₹ <?php echo e(isset($ledgerEntry) ? $ledgerEntry->sum('amount') : 0); ?></p>
                </div>
            </div>
            
 

            <!-- Customer Overview -->
            <h3 class="text-xl font-semibold mt-8 mb-4">👥 Customer Overview</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-sm text-gray-500">Active Customers</h3>
                    <p class="text-2xl font-bold"><?php echo e(isset($loans) ? $loans->where('total_amount_remaining', '>', 0)->count() : 0); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-sm text-gray-500">Closed Loans</h3>
                    <p class="text-2xl font-bold text-green-600"><?php echo e(isset($loans) ? $loans->where('total_amount_remaining', '=', 0)->count() : 0); ?></p>
                </div>
                <!--<div class="bg-white p-6 rounded-lg shadow-md">-->
                <!--    <h3 class="text-sm text-gray-500">Defaulters</h3>-->
                <!--    <p class="text-2xl font-bold text-red-600">8</p>-->
                <!--</div>-->
                <!--<div class="bg-white p-6 rounded-lg shadow-md">-->
                <!--    <h3 class="text-sm text-gray-500">Closed Loans</h3>-->
                <!--    <p class="text-2xl font-bold text-green-600">35</p>-->
                <!--</div>-->
            </div>

          

            <!-- Recent Transactions -->
            <h3 class="text-xl font-semibold mt-8 mb-4">💰 Today's Collection List</h3>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Customer Name</th>
                            <th class="px-4 py-2 border">Invoice No.</th>
                            <th class="px-4 py-2 border">Weekly Installment Amount</th>
                            <th class="px-4 py-2 border">Weekly Installment Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tcl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 border"><?php echo e($key+1); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->customer->name); ?></td>
                                <td class="px-4 py-2 border"> <?php echo e($item->invoice_number); ?></td>
                                <td class="px-4 py-2 border"> ₹ <?php echo e($item->weekly_installment_amount); ?></td>
                                <td class="px-4 py-2 border text-green-600"><?php echo e($item->total_amount); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            
             <h3 class="text-xl font-semibold mt-8 mb-4"> 👥 Skipped Installment Threshold Reached</h3>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Customer Name</th>
                            <th class="px-4 py-2 border">Invoice No.</th>
                            <th class="px-4 py-2 border">Weekly Installment Day</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $skipped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 border"><?php echo e($key+1); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->customer->name); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->invoice_number); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->weekly_installment_day); ?></td>
                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                </table>
            </div>
            
             <h3 class="text-xl font-semibold mt-8 mb-4"> 👥 Half Duration Threshold Reached</h3>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                       <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Customer Name</th>
                            <th class="px-4 py-2 border">Invoice No.</th>
                            <th class="px-4 py-2 border">Weekly Installment Day</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $half; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 border"><?php echo e($key+1); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->customer->name); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->invoice_number); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->weekly_installment_day); ?></td>
                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                </table>
            </div>
            
            <h3 class="text-xl font-semibold mt-8 mb-4"> 👥 Loan Closure Defaulters</h3>
            <div class="bg-white p-6 rounded-lg shadow-md">
                 <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                       <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Customer Name</th>
                            <th class="px-4 py-2 border">Invoice No.</th>
                            <th class="px-4 py-2 border">Weekly Installment Day</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $loanClosureDefaulters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 border"><?php echo e($key+1); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->customer->name); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->invoice_number); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->weekly_installment_day); ?></td>
                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                </table>
            </div>
            
            <h3 class="text-xl font-semibold mt-8 mb-4"> 👥 Pending Prospects</h3>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Customer Name</th>
                            <th class="px-4 py-2 border">Locality</th>
                            <th class="px-4 py-2 border">Mode</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php $__currentLoopData = $prospects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 border"><?php echo e($key+1); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->customer_name); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->locality); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->mode); ?></td>
                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
              <!-- Alerts & Notifications -->
            <h3 class="text-xl font-semibold mt-8 mb-4">🔔 Alerts & Notifications</h3>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>3 Customers have due payments today.</li>
                    <li>2 Customers are overdue for more than 2 weeks.</li>
                    <li>Battery warranty expiring for 5 customers this month.</li>
                </ul>
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
<?php /**PATH /home/u384460131/domains/theglobaleworld.com/public_html/raoenergy/resources/views/dashboard.blade.php ENDPATH**/ ?>