@extends('layouts.landing_page')

@section('isi_aku_mas')
    <main id="main" style="margin-top: 80px;">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    {{-- <h2>Sekilas</h2> --}}
                    <h3>Profil <span>Sekolah</span></h3>
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

    </main>
@endsection
