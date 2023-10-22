@extends('layouts.landing_page')

@section('isi_aku_mas')
    <main id="main" style="margin-top: 80px;">

        <section id="gallery" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Galeri <span>Sekolah</span></h3>
                </div>

                <div class="row portfolio-container">

                    @foreach ($galeri as $g)
                        <div class="col-lg-4 col-md-6 portfolio-item ">
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

            </div>
        </section>

        <section class="blog mt-0 pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-pagination">

                            {{ $galeri->links() }}

                            {{-- <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
