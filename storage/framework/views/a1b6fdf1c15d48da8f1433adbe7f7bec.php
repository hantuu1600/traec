<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>Tremic | <?php echo e($title ?? 'Auth Page'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
</head>
<body class="font-sans relative min-h-screen flex items-center justify-center p-4 bg-auth-gradient">

    
    <?php if ($__env->exists('components.preloader')) echo $__env->make('components.preloader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>

    <main class="relative z-10 w-full flex items-center justify-center">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\traec\resources\views/layouts/auth-layout.blade.php ENDPATH**/ ?>