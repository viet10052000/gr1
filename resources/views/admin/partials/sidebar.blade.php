<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light ml-5">FINANCE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info ml-4">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('role_index')
                <li class="nav-item menu-open">
                    <a href="{{route('admin.roles.list')}}" class="nav-link">
                        <i class="fas fa-user-tag"></i>
                        <p>
                            Role
                        </p>
                    </a>
                </li>
                @endcan
                @can('permission_index')
                <li class="nav-item menu-open">
                    <a href="{{route('admin.permissions.list')}}" class="nav-link">
                        <i class="fas fa-drum-steelpan"></i>
                        <p>
                            Permission
                        </p>
                    </a>
                </li>
                @endcan
                @can('user_index')
                <li class="nav-item menu-open">
                    <a href="{{route('admin.users.list')}}" class="nav-link">
                        <i class="fas fa-user-tie"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
