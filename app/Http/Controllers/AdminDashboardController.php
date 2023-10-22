<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $page_title = "Admin Dashboard";

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.admin.dashboard.main', $data);
    }
}
