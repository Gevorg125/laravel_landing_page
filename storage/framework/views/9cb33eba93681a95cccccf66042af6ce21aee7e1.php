
<div style="margin:0px 50px 0px 50px;">

    <?php if($pages): ?>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ </th>
                <th>Name</th>
                <th>Alias</th>
                <th>Text</th>
                <th>Create Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    
                        
                    
                    <td><?php echo e($page->id); ?></td>
                    
                    <td><?php echo e($page->alias); ?></td>
                    <td><?php echo e($page->text); ?></td>
                    <td><?php echo e($page->created_at); ?></td>
                    <td>
                        <form class='form-horizontal' action="<?php echo e(route('pagesEdit',['page'=>$page->id])); ?>" method="post">
                            <?php echo e(method_field('DELETE')); ?>  
                            <button class='btn btn-danger' type='submit'>Delete</button>
                            <?php echo e(csrf_field()); ?>

                        </form>
                        
                        
                        
                        
                    </td>
                    <td>
                        <form class='form-horizontal' action="<?php echo e(route('pagesEdit',['page'=>$page->id])); ?>" method="post">
                            <input type="hidden" name="_method" value="edit">
                            <button class='btn btn-success' type='submit'>Edit</button>
                            <?php echo e(csrf_field()); ?>

                        </form>
                        
                        
                        
                        
                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
    <?php endif; ?>
        <a href="<?php echo route('pagesAdd'); ?>">Add New Page</a>
    

</div>