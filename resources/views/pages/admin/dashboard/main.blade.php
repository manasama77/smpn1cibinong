@extends('layouts.dashboard')

@section('aku_isi_mas')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_admin">0</h3>
                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-secret"></i>
                        </div>
                        <a href="{{ route('admin.user.admin') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_siswa">0</h3>
                            <p>Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.user.siswa') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="overlay dark loading_card" style="display: none;">
                            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="inner">
                            <h3 id="count_guru">0</h3>
                            <p>Guru</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="{{ route('admin.user.guru') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('skrip_jawa')
    <script>
        $(document).ready(() => {
            getCount()

            setInterval(() => {
                getCount()
            }, 10000);
        })

        function getCount() {
            $.ajax({
                url: `{{ route('count_countan') }}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('.loading_card').show()
                }
            }).always(() => {
                $('.loading_card').hide()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e.data)
                $('#count_admin').text(e.data.count_admin)
                $('#count_siswa').text(e.data.count_siswa)
                $('#count_guru').text(e.data.count_guru)
            })
        }
    </script>
@endsection
