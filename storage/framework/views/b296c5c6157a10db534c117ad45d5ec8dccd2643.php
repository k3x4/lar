<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.fields.index')); ?>"> Back</a>
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

<?php echo Form::model($field, ['method' => 'PATCH','route' => ['admin.fields.update', $field->id]]); ?>

<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Field <strong><?php echo e($field->title); ?></strong></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Type:</strong>
                    <?php echo Form::select('type', $types, 'textbox', ['id' => 'type-select', 'class' => 'form-control select2']); ?>

                </div>
                <span id="loading" style="text-align:center;display:block;"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></span>
                <div id="type-options">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        <?php echo app('arrilot.widget')->run('Status', [
            'title' => 'Status',
        ]); ?>

        <?php echo app('arrilot.widget')->run('FieldGroup', [
            'title' => 'Field group',
            'fieldGroups' => $fieldGroups
        ]); ?>
               
    </div>

</div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script>
        $(document).ready(function() {
            $('#type-select').change(function() {
                $.ajax({
                    url: '<?php echo route("admin.fields.options"); ?>',
                    type: 'GET',
                    data: {
                        id: <?php echo $field->id; ?>,
                        type: $('#type-select').val()
                    },
                    success: function(data) {
                        $('#type-options').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
            $("#type-select").change();

            $(document).ajaxStart(function() {
                $("#loading").show();
            });

            $(document).ajaxStop(function() {
                $("#loading").hide();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>