@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page_title }}</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('siswa.ujian.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Informasi Peserta</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th style="width: 150px;">Nama Lengkap</th>
                                                <th class="text-center" style="width: 30px;">:</th>
                                                <th>{{ auth()->user()->nama_lengkap }}</th>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <th class="text-center">:</th>
                                                <th>{{ auth()->user()->kelas }}</th>
                                            </tr>
                                            <tr>
                                                <th>NISN</th>
                                                <th class="text-center">:</th>
                                                <th>{{ auth()->user()->nisn }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h3 class="card-title">Pilihan Ganda</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($soal_pg as $s)
                                    <div class="mb-5">
                                        <h3>{{ $loop->iteration }}. {{ $s->pertanyaan }}</h3>
                                        @if ($s->gambar)
                                            <img src="{{ asset('storage/' . $s->gambar) }}" class="img-fluid my-3" />
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_{{ $s->id }}"
                                                        id="jawaban_{{ $s->id }}_a" value="a" required>
                                                    <label class="form-check-label" for="jawaban_{{ $s->id }}_a">
                                                        {{ $s->pg_bank_soal->jawaban_a }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_{{ $s->id }}"
                                                        id="jawaban_{{ $s->id }}_b" value="b" required>
                                                    <label class="form-check-label" for="jawaban_{{ $s->id }}_b">
                                                        {{ $s->pg_bank_soal->jawaban_b }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_{{ $s->id }}"
                                                        id="jawaban_{{ $s->id }}_c" value="c" required>
                                                    <label class="form-check-label" for="jawaban_{{ $s->id }}_c">
                                                        {{ $s->pg_bank_soal->jawaban_c }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_{{ $s->id }}"
                                                        id="jawaban_{{ $s->id }}_d" value="d" required>
                                                    <label class="form-check-label" for="jawaban_{{ $s->id }}_d">
                                                        {{ $s->pg_bank_soal->jawaban_d }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_{{ $s->id }}"
                                                        id="jawaban_{{ $s->id }}_e" value="e" required>
                                                    <label class="form-check-label" for="jawaban_{{ $s->id }}_e">
                                                        {{ $s->pg_bank_soal->jawaban_e }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                @if ($soal_essay->count() > 0)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-danger">
                                    <h3 class="card-title">Pertanyaan Essay</h3>
                                </div>
                                <div class="card-body">
                                    @foreach ($soal_essay as $e)
                                        <div class="mb-5">
                                            <h3>{{ $loop->iteration }}. {{ $e->pertanyaan }}</h3>
                                            @if ($e->gambar)
                                                <img src="{{ asset('storage/' . $e->gambar) }}" class="img-fluid my-3" />
                                            @endif
                                            <textarea class="form-control" id="jawaban_{{ $e->id }}" name="jawaban_{{ $e->id }}" required></textarea>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="master_bank_soal_id" value="{{ $master_bank_soal_id }}" />
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-fw fa-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-warning btn-block">
                            <i class="fas fa-fw fa-refresh"></i> Refresh
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        $(document).ready(() => {

        })
    </script>
@endsection
