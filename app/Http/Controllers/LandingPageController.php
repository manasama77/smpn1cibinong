<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $page_title = "Beranda";

        $data = [
            'page_title' => $page_title,
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

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.informasi_kegiatan', $data);
    }

    public function galeri()
    {
        $page_title = "Galeri";

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.galeri', $data);
    }
}
