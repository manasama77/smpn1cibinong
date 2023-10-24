@extends('layouts.register')

@section('isi_aku_mas')
    <div class="mt-5">
        <div class="register-logo">
            <a href="{{ route('home') }}"><b>Register</b>Siswa</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Form Registrasi Siswa Baru</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="input-group mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                    required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Konfirmasi Password" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="input-group mb-3">
                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control"
                                    placeholder="Nama Lengkap" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <select id="kelas" name="kelas" class="form-control" required>
                                    <option value="7">Kelas 7</option>
                                    <option value="8">Kelas 8</option>
                                    <option value="9">Kelas 9</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-school"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" id="nisn" name="nisn" class="form-control" placeholder="NISN"
                                    required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="tel" id="no_hp" name="no_hp" class="form-control" placeholder="No HP"
                                    required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-mobile-screen"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="input-group mb-3">
                                <input type="text" id="nama_orang_tua_wali" name="nama_orang_tua_wali"
                                    class="form-control" placeholder="Nama Orang Tua / Wali" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa-solid fa-person-cane"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" id="no_hp_orang_tua_wali" name="no_hp_orang_tua_wali"
                                    class="form-control" placeholder="No HP Orang Tua / Wali" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-mobile-screen"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" id="no_ktp_orang_tua_wali" name="no_ktp_orang_tua_wali"
                                    class="form-control" placeholder="No KTP Orang Tua / Wali" required />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block my-3">Daftar</button>
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="text-center">Sudah memiliki akun?</a>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
