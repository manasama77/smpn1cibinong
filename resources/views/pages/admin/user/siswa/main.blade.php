@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User management | Siswa</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.user.siswa.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-fw fa-plus"></i> Create
                    </a>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="v_table" class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Kelas</th>
                                    <th>NISN</th>
                                    <th>No HP</th>
                                    <th>Nama Orang Tua / Wali</th>
                                    <th>KTP Orang Tua / Wali</th>
                                    <th>No HP Orang Tua / Wali</th>
                                    <th class="text-center" style="min-width: 180px;">
                                        <i class="fas fa-cogs"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $l)
                                    <tr>
                                        <td>{{ $l->nama_lengkap }}</td>
                                        <td>{{ $l->email }}</td>
                                        <td>{{ $l->kelas }}</td>
                                        <td>{{ $l->nisn }}</td>
                                        <td>{{ $l->no_hp }}</td>
                                        <td>{{ $l->nama_orang_tua_wali }}</td>
                                        <td>{{ $l->no_ktp_orang_tua_wali }}</td>
                                        <td>{{ $l->no_hp_orang_tua_wali }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.user.siswa.edit', $l->id) }}" class="btn btn-info">
                                                <i class="fas fa-fw fa-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger"
                                                onclick="askDelete({{ $l->id }}, '{{ $l->nama_lengkap }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form id="form_delete_{{ $l->id }}"
                                                action="{{ route('admin.user.siswa.destroy', $l->id) }}" method="post"
                                                style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"></button>
                                            </form>
                                            <a href="{{ route('admin.user.siswa.reset', $l->id) }}" class="btn btn-dark">
                                                <i class="fas fa-fw fa-key"></i>
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

        function askDelete(id, nama) {
            Swal.fire({
                icon: 'question',
                title: `Delete Data ${nama}`,
                text: `You won't be able to revert this!`,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#ccc',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    prosesDelete(id)
                }
            })
        }

        function prosesDelete(id) {
            document.getElementById(`form_delete_${id}`).submit()
        }
    </script>
@endsection
