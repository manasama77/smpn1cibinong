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
            <form action="{{ route('admin.bank_soal.store') }}" method="POST">
                <div class="row">
                    <div class="col-sm-12 col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Informasi Bank Soal</h3>
                            </div>
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


                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="master_mapel_id">MAPEL</label>
                                            <select class="form-control" id="master_mapel_id" name="master_mapel_id"
                                                required>
                                                <option value=""></option>
                                                @foreach ($mapels as $m)
                                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="kelas">Kelas</label>
                                            <select class="form-control" id="kelas" name="kelas" required>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Dimulai</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" for="start_date">Tanggal</span>
                                        </div>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            required />
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" for="start_time">Jam</span>
                                        </div>
                                        <input type="time" class="form-control" id="start_time" name="start_time"
                                            required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Berakhir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" for="end_date">Tanggal</span>
                                        </div>
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            required />
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" for="end_time">Jam</span>
                                        </div>
                                        <input type="time" class="form-control" id="end_time" name="end_time"
                                            required />
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h3 class="card-title">
                                    <strong>
                                        Tambah Pilihan Ganda
                                    </strong>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="pertanyaan_pg">Pertanyaan Text</label>
                                    <input type="text" class="form-control" id="pertanyaan_pg" name="pertanyaan_pg" />
                                </div>
                                <div class="mb-3">
                                    <label for="pertanyaan_gambar_pg">Pertanyaan Gambar</label>
                                    <input type="file" class="form-control" id="pertanyaan_gambar_pg"
                                        name="pertanyaan_gambar_pg" />
                                </div>

                                <hr />
                                <hr />

                                <div class="mb-3">
                                    <label for="jawaban_a">Jawaban A</label>
                                    <input type="text" class="form-control" id="jawaban_a" name="jawaban_a" />
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban_b">Jawaban B</label>
                                    <input type="text" class="form-control" id="jawaban_b" name="jawaban_b" />
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban_c">Jawaban C</label>
                                    <input type="text" class="form-control" id="jawaban_c" name="jawaban_c" />
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban_d">Jawaban D</label>
                                    <input type="text" class="form-control" id="jawaban_d" name="jawaban_d" />
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban_e">Jawaban E</label>
                                    <input type="text" class="form-control" id="jawaban_e" name="jawaban_e" />
                                </div>

                                <div class="mb-3">
                                    <label for="right_answer">Jawaban Benar</label>
                                    <select class="form-control" id="right_answer" name="right_answer">
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                        <option value="e">E</option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button id="btn_pg" type="button" class="btn btn-primary btn-block">
                                    <i class="fas fa-fw fa-plus"></i> Tambah
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h3 class="card-title">
                                    <strong>
                                        List Pilihan Ganda
                                    </strong>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-cog"></i>
                                                </th>
                                                <th>
                                                    Pertanyaan Text
                                                </th>
                                                <th>
                                                    Pertanyaan Gambar
                                                </th>
                                                <th>
                                                    Jawaban A
                                                </th>
                                                <th>
                                                    Jawaban B
                                                </th>
                                                <th>
                                                    Jawaban C
                                                </th>
                                                <th>
                                                    Jawaban D
                                                </th>
                                                <th>
                                                    Jawaban E
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="v_pg"></tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h3 class="card-title">
                                    <strong>
                                        Tambah Essay
                                    </strong>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="pertanyaan_essay">Pertanyaan</label>
                                    <input type="text" class="form-control" id="pertanyaan_essay"
                                        name="pertanyaan_essay" />
                                </div>
                                <div class="mb-3">
                                    <label for="pertanyaan_gambar_essay">Pertanyaan Gambar</label>
                                    <input type="file" class="form-control" id="pertanyaan_gambar_essay"
                                        name="pertanyaan_gambar_essay" />
                                </div>
                                <div class="mb-3">
                                    <label for="essay_bobot">Bobot Essay</label>
                                    <input type="number" class="form-control" id="essay_bobot" name="essay_bobot"
                                        min="1" max="100" />
                                </div>

                            </div>
                            <div class="card-footer">
                                <button id="btn_essay" type="button" class="btn btn-primary btn-block">
                                    <i class="fas fa-fw fa-plus"></i> Tambah
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h3 class="card-title">
                                    <strong>
                                        List Essay
                                    </strong>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-cog"></i>
                                                </th>
                                                <th>
                                                    Pertanyaan Text
                                                </th>
                                                <th>
                                                    Pertanyaan Gambar
                                                </th>
                                                <th>
                                                    Bobot Essay
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="v_essay"></tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" value="{{ $uniqid }}" class="form-control" id="uniqid"
                            name="uniqid" />
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-fw fa-save"></i> Save
                        </button>
                        <a href="{{ route('admin.user.admin') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-fw fa-backward"></i> Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('skrip_jawa')
    <script>
        let count_pg = 0
        let count_essay = 0

        let master_mapel_id = $('#master_mapel_id')
        let kelas = $('#kelas')
        let start_date = $('#start_date')
        let start_time = $('#start_time')
        let end_date = $('#end_date')
        let end_time = $('#end_time')

        let uniqid = $('#uniqid')
        let pertanyaan_pg = $('#pertanyaan_pg')
        let pertanyaan_gambar_pg = $('#pertanyaan_gambar_pg')
        let jawaban_a = $('#jawaban_a')
        let jawaban_b = $('#jawaban_b')
        let jawaban_c = $('#jawaban_c')
        let jawaban_d = $('#jawaban_d')
        let jawaban_e = $('#jawaban_e')
        let right_answer = $('#right_answer')
        let v_pg = $('#v_pg')

        let pertanyaan_essay = $('#pertanyaan_essay')
        let pertanyaan_gambar_essay = $('#pertanyaan_gambar_essay')
        let essay_bobot = $('#essay_bobot')
        let v_essay = $('#v_essay')

        $(document).ready(() => {
            $('#btn_pg').on('click', e => {
                e.preventDefault()

                let check = validasiPG()

                if (check === true) {
                    storePG()
                }
            })

            $('#btn_essay').on('click', e => {
                e.preventDefault()

                let check = validasiEssay()

                if (check === true) {
                    storeEssay()
                }
            })


            $('form').on('submit', e => {
                e.preventDefault()

                let check = validasiForm()
                console.log(check)

                if (check == true) {
                    storeSoal()
                }
            })
        })

        function validasiPG() {
            if (pertanyaan_pg.val().length == 0) {
                pertanyaan_pg.focus()
                return false
            } else if (jawaban_a.val().length == 0) {
                jawaban_a.focus()
                return false
            } else if (jawaban_b.val().length == 0) {
                jawaban_b.focus()
                return false
            } else if (jawaban_c.val().length == 0) {
                jawaban_c.focus()
                return false
            } else if (jawaban_d.val().length == 0) {
                jawaban_d.focus()
                return false
            } else if (jawaban_e.val().length == 0) {
                jawaban_e.focus()
                return false
            } else if (right_answer.val().length == 0) {
                right_answer.focus()
                return false
            }
            return true
        }

        function storePG() {
            let form_data = new FormData()
            form_data.append('uniqid', uniqid.val());
            form_data.append('pertanyaan_pg', pertanyaan_pg.val());
            form_data.append('pertanyaan_gambar_pg', pertanyaan_gambar_pg[0].files[0]);
            form_data.append('jawaban_a', jawaban_a.val());
            form_data.append('jawaban_b', jawaban_b.val());
            form_data.append('jawaban_c', jawaban_c.val());
            form_data.append('jawaban_d', jawaban_d.val());
            form_data.append('jawaban_e', jawaban_e.val());
            form_data.append('right_answer', right_answer.val());

            $.ajax({
                url: `{{ route('store_pg') }}`,
                method: 'post',
                dataType: 'json',
                data: form_data,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $.blockUI()
                }
            }).always(() => {
                $.unblockUI()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)

                if (e.success) {
                    renderPG(e)
                }
            })
        }

        function resetPG() {
            pertanyaan_pg.val('')
            pertanyaan_gambar_pg.val('')
            jawaban_a.val('')
            jawaban_b.val('')
            jawaban_c.val('')
            jawaban_d.val('')
            jawaban_e.val('')
            right_answer.val('')
        }

        function removePG(id) {
            $.ajax({
                url: `{{ route('destroy_pg') }}`,
                method: 'delete',
                dataType: 'json',
                data: {
                    uniqid: uniqid.val(),
                    id: id,
                },
                beforeSend: function() {
                    $.blockUI()
                }
            }).always(() => {
                $.unblockUI()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)

                if (e.success) {
                    renderPG(e)
                }
            })
        }

        function renderPG(e) {
            let htmlnya = ''

            e.data.forEach(el => {
                let gambar = ''
                if (el.gambar) {
                    gambar =
                        `<img src="{{ config('app.url') }}/storage/${el.gambar}" class="img-thumbnail" style="width: 100px;" />`
                }

                let id = el.id
                let a = el.jawaban_a
                let b = el.jawaban_b
                let c = el.jawaban_c
                let d = el.jawaban_d
                let e = el.jawaban_e

                if (el.right_answer == "a") {
                    a += `<br /><span class="text-success"><i class="fas fa-check-circle"></i></span>`
                } else if (el.right_answer == "b") {
                    b += `<br /><span class="text-success"><i class="fas fa-check-circle"></i></span>`
                } else if (el.right_answer == "c") {
                    c += `<br /><span class="text-success"><i class="fas fa-check-circle"></i></span>`
                } else if (el.right_answer == "d") {
                    d += `<br /><span class="text-success"><i class="fas fa-check-circle"></i></span>`
                } else if (el.right_answer == "e") {
                    e += `<br /><span class="text-success"><i class="fas fa-check-circle"></i></span>`
                }

                htmlnya += `
                <tr>
                    <td class="text-center">
                        <button id="btn_pg_${id}" type="button" class="btn btn-danger btn-sm" onclick="removePG(${id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>${el.pertanyaan}</td>
                    <td>
                        ${gambar}
                    </td>
                    <td>${a}</td>
                    <td>${b}</td>
                    <td>${c}</td>
                    <td>${d}</td>
                    <td>${e}</td>
                </tr>
                `

                count_pg++;
            });

            v_pg.html(htmlnya)
            resetPG()
            pertanyaan_pg.focus()
        }






        function validasiEssay() {
            if (pertanyaan_essay.val().length == 0) {
                pertanyaan_essay.focus()
                return false
            } else if (essay_bobot.val().length == 0) {
                essay_bobot.focus()
                return false
            }
            return true
        }

        function storeEssay() {
            let form_data = new FormData()
            form_data.append('uniqid', uniqid.val());
            form_data.append('pertanyaan_essay', pertanyaan_essay.val());
            form_data.append('pertanyaan_gambar_essay', pertanyaan_gambar_essay[0].files[0]);
            form_data.append('essay_bobot', essay_bobot.val());

            $.ajax({
                url: `{{ route('store_essay') }}`,
                method: 'post',
                dataType: 'json',
                data: form_data,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $.blockUI()
                }
            }).always(() => {
                $.unblockUI()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)

                if (e.success) {
                    renderEssay(e)
                }
            })
        }

        function resetEssay() {
            pertanyaan_essay.val('')
            pertanyaan_gambar_essay.val('')
            essay_bobot.val('')
        }

        function removeEssay(id) {
            $.ajax({
                url: `{{ route('destroy_essay') }}`,
                method: 'delete',
                dataType: 'json',
                data: {
                    uniqid: uniqid.val(),
                    id: id,
                },
                beforeSend: function() {
                    $.blockUI()
                }
            }).always(() => {
                $.unblockUI()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)

                if (e.success) {
                    renderEssay(e)
                }
            })
        }

        function renderEssay(e) {
            let htmlnya = ''

            e.data.forEach(el => {
                let gambar = ''
                if (el.gambar) {
                    gambar =
                        `<img src="{{ config('app.url') }}/storage/${el.gambar}" class="img-thumbnail" style="width: 100px;" />`
                }

                let id = el.id
                let bobot = el.essay_bobot

                htmlnya += `
                    <tr>
                        <td class="text-center">
                            <button id="btn_essay_${id}" type="button" class="btn btn-danger btn-sm" onclick="removeEssay(${id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        <td>${el.pertanyaan}</td>
                        <td>
                            ${gambar}
                        </td>
                        <td>${bobot}</td>
                    </tr>
                `

                count_essay++;
            });

            v_essay.html(htmlnya)
            resetEssay()
            pertanyaan_essay.focus()
        }

        function validasiForm() {

            if (master_mapel_id.val().length == 0) {
                console.log("master_mapel_id")
                master_mapel_id.focus()
                return false
            } else if (kelas.val().length == 0) {
                console.log("kelas")
                kelas.focus()
                return false
            } else if (start_date.val().length == 0) {
                console.log("start_date")
                start_date.focus()
                return false
            } else if (start_time.val().length == 0) {
                console.log("start_time")
                start_time.focus()
                return false
            } else if (end_date.val().length == 0) {
                console.log("end_date")
                end_date.focus()
                return false
            } else if (end_time.val().length == 0) {
                console.log("end_time")
                end_time.focus()
                return false
            } else if (count_pg == 0) {
                console.log("count_pg")
                pertanyaan_pg.focus()
                return false
            }
            return true
        }

        function storeSoal() {
            $.ajax({
                url: `{{ route('admin.bank_soal.store') }}`,
                method: 'post',
                dataType: 'json',
                data: {
                    master_mapel_id: master_mapel_id.val(),
                    kelas: kelas.val(),
                    start_date: start_date.val(),
                    start_time: start_time.val(),
                    end_date: end_date.val(),
                    end_time: end_time.val(),
                    uniqid: uniqid.val(),
                },
                beforeSend: function() {
                    $.blockUI()
                }
            }).always(() => {
                $.unblockUI()
            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                if (e.success) {
                    window.location.replace(`{{ route('admin.bank_soal') }}`);
                }
            })
        }
    </script>
@endsection
