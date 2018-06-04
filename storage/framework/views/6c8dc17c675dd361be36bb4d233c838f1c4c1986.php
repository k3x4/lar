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

<<<<<<< HEAD
            <li <?php echo BS::activeClass(['admin.media.index'], true);; ?>>
                <a href="<?php echo e(route('admin.media.index')); ?>"><i class="fa fa-link"></i> <span>Media</span>
=======
            <li <?php echo BS::activeClass(['admin.media', 'admin.mediasizes']);; ?>>
                <a href="<?php echo e(route('admin.media')); ?>"><i class="fa fa-link"></i> <span>Media</span>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
<<<<<<< HEAD
                    <li <?php echo BS::activeClass(['admin.media.index']); ?>><a href="<?php echo e(route('admin.media.index')); ?>">All media</a></li>
                    <li <?php echo BS::activeClass(['admin.mediasizes.index'], true); ?>>
                        <a href="<?php echo e(route('admin.mediasizes.index')); ?>"> <span>Media Sizes</span>
=======
                    <li <?php echo BS::activeClass(['admin.media']); ?>><a href="<?php echo e(route('admin.media')); ?>">All media</a></li>
                    <li <?php echo BS::activeClass(['admin.mediasizes']); ?>>
                        <a href="<?php echo e(route('admin.mediasizes')); ?>"> <span>Media Sizes</span>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
<<<<<<< HEAD
                            <li <?php echo BS::activeClass(['admin.mediasizes.index']); ?>><a href="<?php echo e(route('admin.mediasizes.index')); ?>">All media sizes</a></li>
=======
                            <li <?php echo BS::activeClass(['admin.mediasizes']); ?>><a href="<?php echo e(route('admin.mediasizes')); ?>">All media sizes</a></li>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                            <li <?php echo BS::activeClass(['admin.mediasizes.create']); ?>><a href="<?php echo e(route('admin.mediasizes.create')); ?>">Create media size</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

<<<<<<< HEAD
            <li <?php echo BS::activeClass(['admin.listings.index'], true);; ?>>
                <a href="<?php echo e(route('admin.listings.index')); ?>"><i class="fa fa-link"></i> <span>Listings</span>
=======
            <li <?php echo BS::activeClass(['admin.listings']);; ?>>
                <a href="<?php echo e(route('admin.listings')); ?>"><i class="fa fa-link"></i> <span>Listings</span>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
<<<<<<< HEAD
                    <li <?php echo BS::activeClass(['admin.listings.index']);; ?>><a href="<?php echo e(route('admin.listings.index')); ?>">All listings</a></li>
=======
                    <li <?php echo BS::activeClass(['admin.listings']);; ?>><a href="<?php echo e(route('admin.listings')); ?>">All listings</a></li>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                    <li <?php echo BS::activeClass(['admin.listings.create']);; ?>><a href="<?php echo e(route('admin.listings.create')); ?>">Create listing</a></li>
                </ul>    
            </li>
                
<<<<<<< HEAD
            <li <?php echo BS::activeClass(['admin.users.index', 'admin.roles.index'], true);; ?>>
                <a href="<?php echo e(route('admin.users.index')); ?>"><i class="fa fa-link"></i> <span>Users</span>
=======
            <li <?php echo BS::activeClass(['admin.users', 'admin.roles']);; ?>>
                <a href="<?php echo e(route('admin.users')); ?>"><i class="fa fa-link"></i> <span>Users</span>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
<<<<<<< HEAD
                    <li <?php echo BS::activeClass(['admin.users.index']);; ?>><a href="<?php echo e(route('admin.users.index')); ?>">All users</a></li>
                    <li <?php echo BS::activeClass(['admin.users.create']);; ?>><a href="<?php echo e(route('admin.users.create')); ?>">Create user</a></li>
                    <li <?php echo BS::activeClass(['admin.roles.index'], true);; ?>>
                        <a href="<?php echo e(route('admin.roles.index')); ?>"> <span>Roles</span>
=======
                    <li <?php echo BS::activeClass(['admin.users']);; ?>><a href="<?php echo e(route('admin.users')); ?>">All users</a></li>
                    <li <?php echo BS::activeClass(['admin.users.create']);; ?>><a href="<?php echo e(route('admin.users.create')); ?>">Create user</a></li>
                    <li <?php echo BS::activeClass(['admin.roles']);; ?>>
                        <a href="<?php echo e(route('admin.roles')); ?>"> <span>Roles</span>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
<<<<<<< HEAD
                            <li <?php echo BS::activeClass(['admin.roles.index']);; ?>><a href="<?php echo e(route('admin.roles.index')); ?>">All roles</a></li>
=======
                            <li <?php echo BS::activeClass(['admin.roles']);; ?>><a href="<?php echo e(route('admin.roles')); ?>">All roles</a></li>
>>>>>>> be3329743dab2f284ff175d8ae0ccfd180e991b4
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