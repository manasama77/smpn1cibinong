@extends('layouts.landing_page')

@section('isi_aku_mas')
    <main id="main" style="margin-top: 80px;">

        <section id="blog" class="">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>{{ $exec->judul }}</h3>
                </div>

            </div>
        </section>

        <section class="blog mt-0 pt-0">
            <div class="container" data-aos="fade-up">

                <div class="d-flex justify-content-center">
                    {!! $exec->banner_url_fe_detail !!}
                </div>

                <div class="d-flex justify-content-center my-3">
                    {!! $exec->description !!}
                </div>

                <div class="d-flex justify-content-center my-5">
                    <a href="{{ route('informasi_kegiatan') }}" class="btn btn-secondary">
                        <i class="fas fa-fw fa-backward"></i> Kembali
                    </a>
                </div>

            </div>
        </section>

    </main>
@endsection
