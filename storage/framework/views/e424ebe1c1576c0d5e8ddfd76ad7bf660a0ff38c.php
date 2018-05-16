<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <?php if (\Entrust::can('listing-create')) : ?>
            <a class="btn btn-success" href="<?php echo e(route('admin.listings.create')); ?>"> New Listing</a>
            <?php endif; // Entrust::can ?>
        </div>
    </div>
</div>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listings list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th width="280px">Action</th>
                    </tr>
                    <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$i); ?></td>
                        <td><?php echo e($listing->title); ?></td>
                        <td><?php echo e($listing->slug); ?></td>
                        <td><?php echo e(strip_tags($listing->content)); ?></td>
                        <td>
                            <?php if (\Entrust::can('listing-edit')) : ?>
                            <a class="btn btn-primary" href="<?php echo e(route('admin.listings.edit', $listing->id)); ?>">Edit</a>
                            <?php endif; // Entrust::can ?>
                            <?php if (\Entrust::can('listing-delete')) : ?>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['admin.listings.destroy', $listing->id],'style'=>'display:inline']); ?>

                            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger', 'data-confirm' => 'Are you sure you want to delete?']); ?>

                            <?php echo Form::close(); ?>

                            <?php endif; // Entrust::can ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>            
<?php echo $listings->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>