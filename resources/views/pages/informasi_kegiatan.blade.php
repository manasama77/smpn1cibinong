@extends('layouts.landing_page')

@section('isi_aku_mas')
    <main id="main" style="margin-top: 80px;">

        <section id="blog" class="">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Informasi <span>Kegiatan</span></h3>
                </div>

            </div>
        </section>

        <section class="blog mt-0 pt-0">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    @foreach ($informasi_kegiatan as $k)
                        <div class="col-lg-4 col-sm-12 entries">

                            <article class="entry">

                                <div class="entry-img">
                                    {{-- <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"> --}}
                                    {!! $k->banner_url_fe_list !!}
                                </div>

                                <h2 class="entry-title">
                                    <a href="{{ route('informasi_kegiatan.detail', $k->slug) }}">
                                        {{ $k->judul }}
                                    </a>
                                </h2>

                                <div class="entry-content">
                                    <p>
                                        {!! $k->description_limit !!}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ route('informasi_kegiatan.detail', $k->slug) }}">Baca Selengkapnya</a>
                                    </div>
                                </div>

                            </article>

                        </div>
                        <!-- End blog entries list -->
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="blog-pagination">
                            {{-- <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul> --}}

                            {{ $informasi_kegiatan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
