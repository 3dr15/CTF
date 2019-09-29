<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>">

    <title><?php echo e(config('app.name', 'Ubuntu Social')); ?></title>

    <!-- Styles -->
    <link href="//final.cybrics.net/static/ubuntu/css/app.css" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <?php if(auth()->guard()->check()): ?>
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    <?php endif; ?>

    <?php echo $__env->yieldContent('css'); ?>

</head>

<body id="page_top">
    <div id="wrap">
        
        <?php if(auth()->guard()->check()): ?>
            <?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
        
        <div id="pusher"></div>
    </div>

    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" integrity="sha256-ABVkpwb9K9PxubvRrHMkk6wmWcIHUE9eBxNZLXYQ84k=" crossorigin="anonymous"></script>
    <script src="//final.cybrics.net/static/ubuntu/js/app.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
