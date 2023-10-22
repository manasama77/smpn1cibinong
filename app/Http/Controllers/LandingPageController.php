<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $page_title = "Beranda";

        $informasi_kegiatan_count = Blog::count();
        $informasi_kegiatan       = Blog::latest()->limit(6)->get();

        $galeri_count = Gallery::count();
        $galeri       = Gallery::latest()->limit(6)->get();

        $data = [
            'page_title'               => $page_title,
            'informasi_kegiatan_count' => $informasi_kegiatan_count,
            'informasi_kegiatan'       => $informasi_kegiatan,
            'galeri_count'             => $galeri_count,
            'galeri'                   => $galeri,
        ];
        return view('pages.beranda', $data);
    }

    public function profil_sekolah()
    {
        $page_title = "Profil Sekolah";

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.profil_sekolah', $data);
    }

    public function informasi_kegiatan()
    {
        $page_title = "Informasi Kegiatan";

        $informasi_kegiatan       = Blog::latest()->paginate(6);

        $data = [
            'page_title'         => $page_title,
            'informasi_kegiatan' => $informasi_kegiatan,
        ];
        return view('pages.informasi_kegiatan', $data);
    }

    public function informasi_kegiatan_detail($slug)
    {
        $exec = Blog::where('slug', $slug)->first();

        $page_title = $exec->judul;

        $data = [
            'page_title' => $page_title,
            'exec'       => $exec,
        ];
        return view('pages.informasi_kegiatan_detail', $data);
    }


    public function galeri()
    {
        $page_title = "Galeri";
        $galeri     = Gallery::latest()->paginate(6);

        $data = [
            'page_title' => $page_title,
            'galeri'     => $galeri,
        ];
        return view('pages.galeri', $data);
    }
}
