@extends('layouts.landing_page')

@section('isi_aku_mas')
    <main id="main" style="margin-top: 80px;">

        <section id="gallery" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Galeri <span>Sekolah</span></h3>
                </div>

                <div class="row portfolio-container">

                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-lg-4 col-md-6 portfolio-item ">
                            <img src="{{ asset('storage/gallery/sample.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In aspernatur quidem,
                                    perspiciatis
                                    ut suscipit culpa.</h4>
                                <a href="{{ asset('storage/gallery/sample.png') }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link details-link"
                                    title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In aspernatur quidem, perspiciatis ut suscipit culpa.">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    @endfor

                </div>

            </div>
        </section>

        <section class="blog mt-0 pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
