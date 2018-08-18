<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/dist/img/avatar.png') }}" class="img-circle" alt="User Image">
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

            <li {!! BS::activeClass(['admin.media.index'], true); !!}>
                <a href="{{ route('admin.media.index') }}"><i class="fa fa-link"></i> <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! BS::activeClass(['admin.media.index']) !!}><a href="{{ route('admin.media.index') }}">All media</a></li>
                    <li {!! BS::activeClass(['admin.mediasizes.index'], true) !!}>
                        <a href="{{ route('admin.mediasizes.index') }}"> <span>Media Sizes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! BS::activeClass(['admin.mediasizes.index']) !!}><a href="{{ route('admin.mediasizes.index') }}">All media sizes</a></li>
                            <li {!! BS::activeClass(['admin.mediasizes.create']) !!}><a href="{{ route('admin.mediasizes.create') }}">Create media size</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li {!! BS::activeClass(['admin.listings.index', 'admin.categories.index'], true); !!}>
                <a href="{{ route('admin.listings.index') }}"><i class="fa fa-link"></i> <span>Listings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! BS::activeClass(['admin.listings.index']); !!}><a href="{{ route('admin.listings.index') }}">All listings</a></li>
                    <li {!! BS::activeClass(['admin.listings.create']); !!}><a href="{{ route('admin.listings.create') }}">Create listing</a></li>
                    <li {!! BS::activeClass(['admin.categories.index'], true) !!}>
                        <a href="{{ route('admin.categories.index') }}"> <span>Listing categories</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! BS::activeClass(['admin.categories.index']) !!}><a href="{{ route('admin.categories.index') }}">All listing categories</a></li>
                            <li {!! BS::activeClass(['admin.categories.create']) !!}><a href="{{ route('admin.categories.create') }}">Create listing category</a></li>
                        </ul>
                    </li>
                </ul>    
            </li>

            <li {!! BS::activeClass(['admin.features.index', 'admin.featuregroups.index'], true); !!}>
                <a href="{{ route('admin.features.index') }}"><i class="fa fa-link"></i> <span>Features</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! BS::activeClass(['admin.features.index']); !!}><a href="{{ route('admin.features.index') }}">All Features</a></li>
                    <li {!! BS::activeClass(['admin.features.create']); !!}><a href="{{ route('admin.features.create') }}">Create Feature</a></li>
                    <li {!! BS::activeClass(['admin.featuregroups.index'], true) !!}>
                        <a href="{{ route('admin.featuregroups.index') }}"> <span>Feature groups</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! BS::activeClass(['admin.featuregroups.index']) !!}><a href="{{ route('admin.featuregroups.index') }}">All Feature groups</a></li>
                            <li {!! BS::activeClass(['admin.featuregroups.create']) !!}><a href="{{ route('admin.featuregroups.create') }}">Create Feature group</a></li>
                        </ul>
                    </li>
                </ul>    
            </li>
                
            <li {!! BS::activeClass(['admin.users.index', 'admin.roles.index'], true); !!}>
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-link"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {!! BS::activeClass(['admin.users.index']); !!}><a href="{{ route('admin.users.index') }}">All users</a></li>
                    <li {!! BS::activeClass(['admin.users.create']); !!}><a href="{{ route('admin.users.create') }}">Create user</a></li>
                    <li {!! BS::activeClass(['admin.roles.index'], true); !!}>
                        <a href="{{ route('admin.roles.index') }}"> <span>Roles</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li {!! BS::activeClass(['admin.roles.index']); !!}><a href="{{ route('admin.roles.index') }}">All roles</a></li>
                            <li {!! BS::activeClass(['admin.roles.create']); !!}><a href="{{ route('admin.roles.create') }}">Create role</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>