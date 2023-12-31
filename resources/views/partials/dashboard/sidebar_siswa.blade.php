<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/smpn_1_cibinong_logo.png') }}" alt="Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">{{ ucfirst(auth()->user()->role) }}<span
                class="font-weight-light">Panel</span> </span>
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
                <li class="nav-item">
                    <a href="{{ route('siswa.dashboard') }}"
                        class="nav-link {{ request()->route()->named('siswa.dashboard')? 'active': '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('siswa.ujian') }}"
                        class="nav-link {{ request()->route()->named('siswa.ujian')? 'active': '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Ujian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById(`form_logout`).submit()">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="form_logout" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                        @method('POST')
                        <button type="submit"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
