<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title><?php echo e($title); ?></title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    

    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery-1.11.0.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/ckeditor/ckeditor.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap-filestyle.min.js')); ?>"></script>

</head>
<body>

<header id="header_wrapper">
    <?php echo $__env->yieldContent('header'); ?>


    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
</header>
<?php echo $__env->yieldContent('content'); ?>
</body>
</html>