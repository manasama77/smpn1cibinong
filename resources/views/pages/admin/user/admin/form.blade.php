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
                <div class="col-sm-12 col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.user.admin.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp">No HP</label>
                                    <input type="tel" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ old('no_hp') }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required />
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required />
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-fw fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.user.admin') }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-fw fa-backward"></i> Back
                                </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
