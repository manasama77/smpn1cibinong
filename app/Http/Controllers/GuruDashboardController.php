<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruDashboardController extends Controller
{
    public function index()
    {
        $page_title = "Guru Dashboard";

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.guru.dashboard.main', $data);
    }
}
