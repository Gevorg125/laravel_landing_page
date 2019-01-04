<div class="container">
    <div class="header_box">
        <div class="logo"><a href="#"><img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="logo"></a></div>
        <?php if(isset($menu)): ?>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="main-nav" class="collapse navbar-collapse navStyle">
                    <ul class="nav navbar-nav" id="mainNav">
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="#<?php echo e($item['alias']); ?>" class="scroll-link"><?php echo e($item['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
    </div>
</div>

<?php if(session('status')): ?>
    <div class ="alert alert-success">
        <?php echo e(session(status)); ?>

    </div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
    <div class ="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>