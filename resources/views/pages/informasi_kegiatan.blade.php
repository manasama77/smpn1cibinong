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
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-lg-4 col-sm-12 entries">

                            <article class="entry">

                                <div class="entry-img">
                                    <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="blog-single.html">Dolorum optio tempore voluptas dignissimos cumque fuga qui
                                        quibusdam quia</a>
                                </h2>

                                <div class="entry-content">
                                    <p>
                                        Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                        praesentium. Aliquam et
                                        laboriosam eius aut nostrum quidem aliquid dicta.
                                        Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta.
                                        Est
                                        cum et quod
                                        quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                                    </p>
                                    <div class="read-more">
                                        <a href="blog-single.html">Baca Selengkapnya</a>
                                    </div>
                                </div>

                            </article>

                        </div>
                        <!-- End blog entries list -->
                    @endfor
                </div>

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
