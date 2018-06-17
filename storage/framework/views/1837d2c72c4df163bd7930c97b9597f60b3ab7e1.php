<?php extract($config) ?>

<?php echo Form::open([
    'route' => 'admin.listings.store',
    'method' => 'POST',
    'id' => 'mainForm',
]); ?>


    <button type="submit" class="btn btn-success" name="status" value="publish">Submit</button>
    <button type="submit" class="btn btn-default" name="status" value="draft">Save draft</button>

<?php echo Form::close(); ?>


<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script>
        $( document ).ready(function() {
            $('#mainForm').submit(function() {
                <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    var fields = $( '<?php echo e($form); ?> .form-group' );//.clone().hide(); 
                    $(this).append(fields);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });
        });
    </script>
<?php $__env->stopSection(); ?>
