<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $page_title = "Siswa Dashboard";

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.siswa.dashboard.main', $data);
    }
}
