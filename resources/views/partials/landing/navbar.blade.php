<header id="header" class="fixed-top {{ !request()->route()->named('home')? 'header-inner-pages': '' }}">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('storage/smpn_1_cibinong_logo.png') }}" alt="" class="img-logo">
            <span>{{ config('app.name') }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link {{ request()->route()->named('home')? 'active': '' }}"
                        href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li><a class="nav-link {{ request()->route()->named('profil_sekolah')? 'active': '' }}"
                        href="{{ route('profil_sekolah') }}">Profile Sekolah</a></li>
                <li><a class="nav-link {{ request()->route()->named('informasi_kegiatan')? 'active': '' }}"
                        href="{{ route('informasi_kegiatan') }}">Informasi Kegiatan</a></li>
                <li><a class="nav-link {{ request()->route()->named('galeri')? 'active': '' }}"
                        href="{{ route('galeri') }}">Galeri</a></li>
                <li>
                    <a class="nav-link w-100" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
