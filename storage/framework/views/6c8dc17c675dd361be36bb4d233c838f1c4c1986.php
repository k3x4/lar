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
        <ul class="sidebar-menu" data-widget="tree">
            <!--<li class="header">HEADER</li>-->
            <!-- Optionally, you can add icons to the links -->

            <li <?php echo BS::activeClass(['admin.media', 'admin.mediasizes']);; ?>>
                <a href="<?php echo e(route('admin.media')); ?>"><i class="fa fa-link"></i> <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo BS::activeClass(['admin.media']); ?>><a href="<?php echo e(route('admin.media')); ?>">All media</a></li>
                    <li <?php echo BS::activeClass(['admin.mediasizes']); ?>>
                        <a href="<?php echo e(route('admin.mediasizes')); ?>"> <span>Media Sizes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php echo BS::activeClass(['admin.mediasizes']); ?>><a href="<?php echo e(route('admin.mediasizes')); ?>">All media sizes</a></li>
                            <li <?php echo BS::activeClass(['admin.mediasizes.create']); ?>><a href="<?php echo e(route('admin.mediasizes.create')); ?>">Create media size</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li <?php echo BS::activeClass(['admin.listings']);; ?>>
                <a href="<?php echo e(route('admin.listings')); ?>"><i class="fa fa-link"></i> <span>Listings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo BS::activeClass(['admin.listings']);; ?>><a href="<?php echo e(route('admin.listings')); ?>">All listings</a></li>
                    <li <?php echo BS::activeClass(['admin.listings.create']);; ?>><a href="<?php echo e(route('admin.listings.create')); ?>">Create listing</a></li>
                </ul>    
            </li>
                
            <li <?php echo BS::activeClass(['admin.users', 'admin.roles']);; ?>>
                <a href="<?php echo e(route('admin.users')); ?>"><i class="fa fa-link"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo BS::activeClass(['admin.users']);; ?>><a href="<?php echo e(route('admin.users')); ?>">All users</a></li>
                    <li <?php echo BS::activeClass(['admin.users.create']);; ?>><a href="<?php echo e(route('admin.users.create')); ?>">Create user</a></li>
                    <li <?php echo BS::activeClass(['admin.roles']);; ?>>
                        <a href="<?php echo e(route('admin.roles')); ?>"> <span>Roles</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php echo BS::activeClass(['admin.roles']);; ?>><a href="<?php echo e(route('admin.roles')); ?>">All roles</a></li>
                            <li <?php echo BS::activeClass(['admin.roles.create']);; ?>><a href="<?php echo e(route('admin.roles.create')); ?>">Create role</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>