<div class="container portfolio_title">

    <!-- Title -->
    <div class="section-title">
        <h2><?php echo e($title); ?></h2>
    </div>
    <!--/Title -->

</div>
<!-- Container -->

<div class="portfolio">

    <div id="filters" class="sixteen columns">
        <ul style="padding:0px 0px 0px 0px">
            
            <li><a  href="<?php echo route('pages'); ?>">
                    <h5>Pages</h5>
                </a>
            </li>

            <li><a  href="<?php echo e(route('portfolio')); ?>">
                    <h5>Portfolio</h5>
                </a>
            </li>

            <li><a href="<?php echo e(route('service')); ?>">
                    <h5>Service</h5>
                </a>
            </li>
        </ul>
    </div>

</div>