<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/smpn_1_cibinong_logo.png') }}" alt="Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Admin<span class="font-weight-light">Panel</span> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/pp.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-white">
                {{ auth()->user()->nama_lengkap }}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ request()->route()->named('admin.dashboard')? 'active': '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->route()->getPrefix() == 'admin/user/'? 'menu-open': 'menu-close' }}">
                    <a href="#"
                        class="nav-link {{ request()->route()->getPrefix() == 'admin/user/'? 'active': '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.admin') }}"
                                class="nav-link {{ request()->route()->named('admin.user.admin')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
