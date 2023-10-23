<header id="header" class="fixed-top {{ !request()->route()->named('home')? 'header-inner-pages': '' }}">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('storage/smpn_1_cibinong_logo.png') }}" alt="" class="img-logo">
            <span>{{ config('app.name') }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li><a class="nav-link {{ request()->route()->named('profil_sekolah')? 'active': '' }}"
                        href="{{ route('profil_sekolah') }}">Profile Sekolah</a></li>
                <li><a class="nav-link {{ request()->route()->named('informasi_kegiatan')? 'active': '' }}"
                        href="{{ route('informasi_kegiatan') }}">Informasi Kegiatan</a></li>
                <li><a class="nav-link {{ request()->route()->named('galeri')? 'active': '' }}"
                        href="{{ route('galeri') }}">Galeri</a></li>

                @if (!auth()->user())
                    <li>
                        <a class="nav-link w-100" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endif

                @if (auth()->user() && auth()->user()->role == 'admin')
                    <li>
                        <a class="nav-link w-100" href="{{ route('admin.dashboard') }}">
                            Admin Panel
                        </a>
                    </li>
                @endif

                @if (auth()->user() && auth()->user()->role == 'siswa')
                    <li>
                        <a class="nav-link w-100" href="{{ route('siswa.dashboard') }}">
                            Ujian
                        </a>
                    </li>
                @endif

                @if (auth()->user() && in_array(auth()->user()->role, ['guru', 'kepala sekolah']))
                    <li>
                        <a class="nav-link w-100" href="{{ route('guru.dashboard') }}">
                            Bank Soal
                        </a>
                    </li>
                @endif

                @if (auth()->user() && auth()->user()->role == 'orang tua')
                    <li>
                        <a class="nav-link w-100" href="{{ route('login') }}">
                            Siswa
                        </a>
                    </li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
