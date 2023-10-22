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
                <div class="col-sm-12">
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

                            <form action="{{ route('admin.informasi_kegiatan.update', $lists->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="{{ old('judul') ?? $lists->judul }}" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="active">Status</label>
                                            <select class="form-control" id="active" name="active" required>
                                                <option @selected($lists->active == '1') value="1">Aktif</option>
                                                <option @selected($lists->active == '0') value="0">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Konten</label>
                                    <textarea class="form-control" id="description" name="description">{{ $lists->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" id="banner" name="banner"
                                        accept="image/*" />
                                    <div class="text-muted">Kosongkan jika banner tidak ada perubahan</div>
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

@section('skrip_jawa')
    <script src="https://cdn.tiny.cloud/1/y1lbyegpvnufywjd7k7c8p0drp9rfup9gymycg4n6evr6nfs/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            menubar: true,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: `{{ route('informasi_kegiatan.upload') }}`,
            file_picker_types: 'image',
            convert_urls: false,
        });
    </script>
@endsection
