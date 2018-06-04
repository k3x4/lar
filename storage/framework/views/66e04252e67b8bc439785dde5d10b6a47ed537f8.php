<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.mediasizes.index')); ?>"> Back</a>
        </div>
    </div>
</div>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Media Size</h3>
            </div>
            <?php echo Form::open(['route' => 'admin.mediasizes.store','method'=>'POST']); ?>

            <div class="box-body">
                <div class="form-group">
                    <strong>Tag:</strong>
                    <?php echo Form::text('tag', null, ['placeholder' => 'Tag','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Width:</strong>
                    <?php echo Form::number('width', null, ['placeholder' => 'Width','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Height:</strong>
                    <?php echo Form::number('height', null, ['placeholder' => 'Width','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Crop:</strong>
                    <?php echo Form::hidden('crop', 0);; ?>

                    <?php echo Form::checkbox('crop', 1, true, ['@click' => 'cropCheck = !cropCheck', 'ref' => 'cropField']); ?>

                </div>
                <div class="form-group" v-show="cropCheck">
                    <strong>Crop Position:</strong>
                    <?php echo Form::select('crop_position', [
                        'top-left' => 'Top left',
                        'top' => 'Top',
                        'top-right' => 'Top right',
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                        'bottom-left' => 'Bottom left',
                        'bottom' => 'Bottom',
                        'bottom-right' => 'Bottom right'
                        ], 'center', ['class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Enable:</strong>
                    <?php echo Form::hidden('enabled', 0);; ?>

                    <?php echo Form::checkbox('enabled', 1, true); ?>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
<script>
    new Vue({
        el: '.content',
        data: {
            cropCheck: null
        },
        mounted: function () {
            this.cropCheck = this.$refs.cropField.checked
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>