<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\MasterBankSoal;
use App\Models\MasterMapel;
use App\Models\User;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index()
    {
        $count_admin              = 0;
        $count_siswa              = 0;
        $count_guru               = 0;
        $count_informasi_kegiatan = 0;
        $count_galeri             = 0;
        $count_mata_pelajaran     = 0;
        $count_bank_soal          = 0;


        $users = User::get();
        foreach ($users as $u) {
            if ($u->role == "admin") {
                $count_admin++;
            }

            if ($u->role == "siswa") {
                $count_siswa++;
            }

            if ($u->role == "guru") {
                $count_guru++;
            }
        }

        $count_informasi_kegiatan = Blog::where('active', 1)->count();
        $count_galeri             = Gallery::where('active', 1)->count();
        $count_mata_pelajaran     = MasterMapel::count();
        $count_bank_soal          = MasterBankSoal::where('active', 1)->count();

        $data = [
            'count_admin'              => $count_admin,
            'count_siswa'              => $count_siswa,
            'count_guru'               => $count_guru,
            'count_informasi_kegiatan' => $count_informasi_kegiatan,
            'count_galeri'             => $count_galeri,
            'count_mata_pelajaran'     => $count_mata_pelajaran,
            'count_bank_soal'          => $count_bank_soal,
        ];

        return response()->json([
            'data' => $data,
        ]);
    }
}
