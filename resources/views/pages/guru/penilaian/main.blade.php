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

                    <div class="table-responsive">
                        <table id="v_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kelas</th>
                                    <th>Siswa</th>
                                    <th>Total Nilai</th>
                                    <th>Nilai PG</th>
                                    <th>Nilai Essay</th>
                                    <th>Tanggal & Jam Submit</th>
                                    <th class="text-center">
                                        <i class="fas fa-cogs"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $l)
                                    <tr>
                                        <td>{{ $l->user->kelas }}</td>
                                        <td>{{ $l->user->nama_lengkap }}</td>
                                        <td>{{ $l->total_nilai }}</td>
                                        <td>{{ $l->nilai_pg }}</td>
                                        <td>{{ $l->nilai_essay }}</td>
                                        <td>{{ $l->created_at ?? '' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('guru.penilaian.siswa', $l->id) }}" class="btn btn-success">
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
