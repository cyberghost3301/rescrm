<?php if(Session::has('success')): ?>
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        class="flex items-center justify-between bg-green-100 border border-green-600 text-green-800 px-4 py-3 m-3 rounded shadow-sm"
    >
        <span><?php echo e(Session::get('success')); ?></span>
        <button @click="show = false" class="text-green-800 font-bold ml-4 focus:outline-none">
            &times;
        </button>
    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        class="flex items-center justify-between bg-red-100 border border-red-600 text-red-800 px-4 py-3 m-3 rounded shadow-sm"
    >
        <span><?php echo e(Session::get('error')); ?></span>
        <button @click="show = false" class="text-red-800 font-bold ml-4 focus:outline-none">
            &times;
        </button>
    </div>
<?php endif; ?>



<?php if(session('ok')): ?>
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        class="flex items-center justify-between bg-green-100 border border-green-600 text-green-800 px-4 py-3 m-3 rounded shadow-sm"
    >
        <span><?php echo e(session('ok')); ?></span>
        <button @click="show = false" class="text-green-800 font-bold ml-4 focus:outline-none">
            &times;
        </button>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        class="flex items-center justify-between bg-red-100 border border-red-600 text-red-800 px-4 py-3 m-3 rounded shadow-sm"
    >
        <span><?php echo e($errors->first()); ?></span>
        <button @click="show = false" class="text-red-800 font-bold ml-4 focus:outline-none">
            &times;
        </button>
    </div>
<?php endif; ?>

<?php /**PATH C:\res-crm\resources\views/components/message.blade.php ENDPATH**/ ?>