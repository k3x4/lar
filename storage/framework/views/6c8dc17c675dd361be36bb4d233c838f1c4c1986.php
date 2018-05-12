<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('adminlte/dist/img/avatar.png')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">HEADER</li>-->
            <!-- Optionally, you can add icons to the links -->
            
            <li <?php echo e(bs_active(['admin/media*', 'admin/mediasizes*'])); ?>>
                <a href="#"><i class="fa fa-link"></i> <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo e(bs_active('admin/media')); ?>><a href="<?php echo e(url('admin/media')); ?>">All media</a></li>
                    <li <?php echo e(bs_active('admin/mediasizes*')); ?>>
                        <a href="<?php echo e(url('admin/mediasizes')); ?>"> <span>Media Sizes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php echo e(bs_active('admin/mediasizes')); ?>><a href="<?php echo e(url('admin/mediasizes')); ?>">All media sizes</a></li>
                            <li <?php echo e(bs_active('admin/mediasizes/create')); ?>><a href="<?php echo e(url('admin/mediasizes/create')); ?>">Create media size</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li <?php echo e(bs_active('admin/products*')); ?>>
                <a href="#"><i class="fa fa-link"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo e(bs_active('admin/products')); ?>><a href="<?php echo e(url('admin/products')); ?>">All products</a></li>
                    <li <?php echo e(bs_active('admin/products/create')); ?>><a href="<?php echo e(url('admin/products/create')); ?>">Create product</a></li>
                </ul>    
            </li>
            
            <li <?php echo e(bs_active('admin/categories*')); ?>>
                <a href="#"><i class="fa fa-link"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo e(bs_active('admin/categories')); ?>><a href="<?php echo e(url('admin/categories')); ?>">All categories</a></li>
                    <li <?php echo e(bs_active('admin/categories/create')); ?>><a href="<?php echo e(url('admin/categories/create')); ?>">Create category</a></li>
                </ul>    
            </li>
                
            <li <?php echo e(bs_active(['admin/users*', 'admin/roles*'])); ?>>
                <a href="#"><i class="fa fa-link"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo e(bs_active('admin/users')); ?>><a href="<?php echo e(url('admin/users')); ?>">All users</a></li>
                    <li <?php echo e(bs_active('admin/users/create')); ?>><a href="<?php echo e(url('admin/users/create')); ?>">Create user</a></li>
                    <li <?php echo e(bs_active('admin/roles*')); ?>>
                        <a href="<?php echo e(url('admin/roles')); ?>"> <span>Roles</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php echo e(bs_active('admin/roles')); ?>><a href="<?php echo e(url('admin/roles')); ?>">All roles</a></li>
                            <li <?php echo e(bs_active('admin/roles/create')); ?>><a href="<?php echo e(url('admin/roles/create')); ?>">Create role</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>