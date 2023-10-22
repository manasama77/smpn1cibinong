@extends('layouts.landing_page')

@section('isi_aku_mas')
    <section id="hero">
        <div class="hero-container">
            <h3>Selamat Datang di <strong>{{ config('app.name') }}</strong></h3>
            <h1>Slogan Sekolah</h1>
            <h2>Penjelasan Singkat Sekolah</h2>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Sekilas</h2>
                    <h3>Sambutan <span>Kepala Sekolah</span></h3>
                    <img src="{{ asset('storage/kepala_sekolah.jpg') }}" class="img-fluid mt-5" />
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ratione placeat natus dolorem tenetur
                        ab voluptate officia? Consequuntur maxime, ipsam voluptates perspiciatis dolorum dignissimos quae
                        commodi mollitia dolore eaque repudiandae blanditiis ducimus, a expedita tempora ipsum. Pariatur hic
                        doloremque obcaecati, optio laudantium omnis dolorem deserunt suscipit illum tempore minus libero.
                    </p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <h3>Visi Sekolah</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="ri-check-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat</li>
                            <li><i class="ri-check-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit</li>
                            <li><i class="ri-check-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>Misi Sekolah</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="ri-check-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat</li>
                            <li><i class="ri-check-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit</li>
                            <li><i class="ri-check-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="blog" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Informasi </h2>
                    <h3>Kegiatan <span>Sekolah</span></h3>
                </div>

                <div class="row">
                    @foreach ($informasi_kegiatan as $k)
                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="card">
                                {!! $k->banner_url_fe !!}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $k->judul }}</h5>
                                    <p class="card-text">{{ $k->description_limit }}</p>
                                    <a href="{{ route('informasi_kegiatan.detail', $k->slug) }}" target="_blank"
                                        class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                @if ($informasi_kegiatan_count > 6)
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center my-4">
                            <a href="{{ route('informasi_kegiatan') }}" class="btn btn-primary btn-lg">
                                Informasi Kegiatan Lainnya
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="gallery" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>Informasi </h2>
                    <h3>Galeri <span>Sekolah</span></h3>
                </div>

                <div class="row portfolio-container">

                    @foreach ($galeri as $g)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            {!! $g->foto_url_fe !!}
                            <div class="portfolio-info">
                                <h4>{{ $g->description }}</h4>
                                <a href="{{ asset('storage/' . $g->foto) }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link details-link" title="{{ $g->description }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                @if ($galeri_count > 6)
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center my-4">
                            <a href="{{ route('galeri') }}" class="btn btn-primary btn-lg">
                                Galeri Lainnya
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Informasi </h2>
                    <h3>Kontak <span>Sekolah</span></h3>
                </div>

                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3964.40134570114!2d106.8610426!3d-6.4707381!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c1648468ca45%3A0xad84eef3dbfa119c!2sSMPN%201%20Cibinong!5e0!3m2!1sid!2sid!4v1697901860106!5m2!1sid!2sid"
                        style="border:0; width: 100%; height: 270px;" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-sm-12 col-md-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                <a href="https://www.google.com/maps/place/SMPN+1+Cibinong,+Jl.+Raya+Mayor+Oking+Jaya+Atmaja+No.71,+Ciriung,+Cibinong,+Bogor+Regency,+West+Java+16918/@-6.4697467,106.8615147,17z/data=!4m6!3m5!1s0x2e69c1648468ca45:0xad84eef3dbfa119c!8m2!3d-6.4697467!4d106.8615147!16s%2Fg%2F11s85lt6k6"
                                    class="text-decoration-none">
                                    <p>Jl. Mayor Oking Jayaatmaja No.71 Cibinong Kaabupaten Bogor</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <a href="mailto:halo@smpn1cibinong.sch.id" class="text-decoration-none">
                                    <p>halo@smpn1cibinong.sch.id</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-telephone"></i>
                                <h4>No Telepon:</h4>
                                <a href="tel:021875204" class="text-decoration-none">
                                    <p>021875204</p>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>
@endsection
