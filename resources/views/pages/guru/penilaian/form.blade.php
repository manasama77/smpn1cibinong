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
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Informasi Siswa</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="width: 150px">Nama Lengkap</td>
                                            <td class="text-center" style="width: 20px">:</td>
                                            <td class="font-weight-bold">{{ $lists->user->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $lists->user->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $lists->user->nisn }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-header bg-warning">
                            <h3 class="card-title">Pilihan Ganda</h3>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @php
                                $i = 0;
                            @endphp
                            @foreach ($lists->master_bank_soal->sub_bank_soal_pg as $pg)
                                <div class="mb-3">
                                    <h3>{{ $loop->iteration }}. {{ $pg->pertanyaan }}</h3>
                                    @if ($pg->gambar)
                                        <img src="{{ asset('storage/' . $pg->gambar) }}" class="img-fluid" />
                                    @endif
                                    <h5 class="text-success font-weight-bold">Jawaban Benar:
                                        {{ strtoupper($pg->pg_bank_soal->right_answer) }}
                                    </h5>
                                    <h5 class="text-primary font-weight-bold">Jawaban Siswa:
                                        {{ strtoupper($lists->jawaban_ujian_pg[$i]->answer) }}</h5>
                                </div>

                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <form action="" method="post" class="form-horizontal">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-header bg-danger">
                                <h3 class="card-title">Pilihan Essay</h3>
                            </div>
                            <div class="card-body">

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($lists->master_bank_soal->sub_bank_soal_essay as $pg)
                                    <div class="mb-3">
                                        <h3>{{ $loop->iteration }}. {{ $pg->pertanyaan }}</h3>
                                        @if ($pg->gambar)
                                            <img src="{{ asset('storage/' . $pg->gambar) }}" class="img-fluid" />
                                        @endif
                                        <h5 class="text-primary font-weight-bold">Jawaban Siswa:<br />
                                            {{ $pg->jawaban_ujian[$i]->answer }}</h5>

                                        <div class="form-group row">
                                            <label for="nilai_essay_{{ $pg->id }}"
                                                class="col-sm-1 form-label">Nilai</label>
                                            <div class="col-sm-1">
                                                <input type="number" class="form-control"
                                                    id="nilai_essay_{{ $pg->id }}" name="nilai_essay[]"
                                                    data-jawaban_ujian_id="{{ $pg->jawaban_ujian[$i]->id }}"
                                                    onkeyup="storeNilai(this, {{ $pg->jawaban_ujian[$i]->id }}, {{ $pg->essay_bobot }})"
                                                    min="1" max="{{ $pg->essay_bobot }}"
                                                    value="{{ $pg->jawaban_ujian[$i]->essay_bobot }}" required />
                                            </div>
                                            <div class="text-muted">
                                                Maksimal Nilai Essay: {{ $pg->essay_bobot }}
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <a href="{{ route('guru.penilaian', $lists->master_bank_soal_id) }}" class="btn btn-secondary btn-block">
                <i class="fas fa-backward"></i> Kembali
            </a>

        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        let delaynya = 800

        $(document).ready(() => {
            new DataTable('#v_table');
        })

        function storeNilai(e, jawaban_ujian_id, nilai_max) {
            console.log(e.value)

            if (e.value > nilai_max) {
                e.value = nilai_max
            }

            $.ajax({
                url: `{{ url('/guru/penilaian/siswa/essay') }}/${jawaban_ujian_id}`,
                method: 'post',
                dataType: 'json',
                data: {
                    nilai: e.value
                }
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)
            })



        }
    </script>
@endsection
