<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Rao Energy Solutions - Retail Chain Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-200 via-white to-green-200 p-5">
  
  <!-- Login Button (Top Right) -->
  <div class="absolute top-5 right-5">
    <a href="<?php echo e(route('login')); ?>" 
       class="px-5 py-2 bg-gray-900 text-white rounded-lg font-semibold shadow hover:bg-gray-700 transition">
       Login
    </a>
  </div>

  <!-- Center Card -->
  <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl p-10 text-center max-w-2xl w-full">
    
    <!-- Title -->
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
      Rao Energy Solutions <br> 
      <span class="text-gray-600 text-lg">Retail Chain Management</span>
    </h1>

    <!-- Invoice Search -->
    <form method="post" action="<?php echo e(route('invoice.search')); ?>" class="flex flex-col sm:flex-row items-center gap-3 mb-6">
      <?php echo csrf_field(); ?>
        <input type="text" name="invoice" placeholder="Enter Invoice Number"
               class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-700 focus:outline-none"/>
        <button type="submit" 
                class="px-6 py-3 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-700 transition">
            Search
        </button>
    </form>
  </div>

</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/raoenergy/resources/views/welcome.blade.php ENDPATH**/ ?>