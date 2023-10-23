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
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="v_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>MAPEL</th>
                                    <th>Kelas</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Berakhir</th>
                                    <th>Dibuat oleh</th>
                                    <th>Tanggal & Jam Submit</th>
                                    <th>Nilai</th>
                                    <th class="text-center">
                                        <i class="fas fa-cogs"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $l)
                                    <tr>
                                        <td>{{ $l->master_mapel->name }}</td>
                                        <td>{{ $l->kelas }}</td>
                                        <td>{{ $l->start_datetime_ind }}</td>
                                        <td>{{ $l->end_datetime_ind }}</td>
                                        <td>{{ $l->creator->nama_lengkap }}</td>
                                        <td>{{ $l->ujian->created_at ?? '' }}</td>
                                        <td>{{ $l->ujian->total_nilai ?? 0 }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('siswa.ujian.show', $l->slug) }}" class="btn btn-info">
                                                <i class="fas fa-fw fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        $(document).ready(() => {
            new DataTable('#v_table');
        })
    </script>
@endsection
