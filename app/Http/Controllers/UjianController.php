<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\SubBankSoal;
use App\Models\JawabanUjian;
use Illuminate\Http\Request;
use App\Models\MasterBankSoal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    public function index()
    {
        $lists = MasterBankSoal::with('ujian')->where([
            'kelas' => Auth::user()->kelas,
        ])->orderBy('created_at', 'desc')->get();

        $data = [
            'page_title' => 'Ujian | List',
            'lists'      => $lists,
        ];
        return view('pages.siswa.ujian.main', $data);
    }

    public function show($slug)
    {
        $lists = MasterBankSoal::where([
            'kelas' => Auth::user()->kelas,
            'slug'  => $slug,
        ])->orderBy('created_at', 'desc')->first();

        $now      = Carbon::now();
        $start_dt = Carbon::parse($lists->start_datetime);
        $end_dt   = Carbon::parse($lists->end_datetime);

        if ($now->lt($start_dt)) {
            return redirect()->back()->with('warning', 'Waktu Ujian Belum dimulai');
        }

        if ($now->gt($end_dt)) {
            return redirect()->back()->with('warning', 'Waktu Ujian Telah Berakhir');
        }

        $ujian_check = Ujian::where([
            'user_id'             => Auth::user()->id,
            'master_bank_soal_id' => $lists->id,
        ])->count();

        if ($ujian_check > 0) {
            return redirect()->back()->with('success', 'Kamu telah berpartisipasi dalam ujian ini. Terima kasih');
        }

        $soal_pg = SubBankSoal::with('pg_bank_soal')->where([
            'master_bank_soal_id' => $lists->id,
            'tipe_pertanyaan'     => 'pg',
        ])->get();

        $soal_essay = SubBankSoal::where([
            'master_bank_soal_id' => $lists->id,
            'tipe_pertanyaan'     => 'essay',
        ])->get();

        $data = [
            'page_title'          => 'Ujian | ' . $lists->master_mapel->name . ' Kelas ' . $lists->kelas,
            'lists'               => $lists,
            'soal_pg'             => $soal_pg,
            'soal_essay'          => $soal_essay,
            'master_bank_soal_id' => $lists->id,
        ];
        return view('pages.siswa.ujian.form', $data);
    }

    public function store(Request $request)
    {
        $master_bank_soal_id = $request->master_bank_soal_id;

        $ujians = Ujian::create([
            'user_id'             => Auth::user()->id,
            'master_bank_soal_id' => $master_bank_soal_id,
            'total_nilai'         => 0,
            'nilai_pg'            => 0,
            'nilai_essay'         => 0,
        ]);
        $ujian_id = $ujians->id;

        $total_nilai = 0;
        $nilai_pg    = 0;
        $nilai_essay = 0;

        $soal_pg = SubBankSoal::with('pg_bank_soal')->where([
            'master_bank_soal_id' => $master_bank_soal_id,
            'tipe_pertanyaan'     => 'pg',
        ])->get();
        foreach ($soal_pg as $p) {
            $id      = $p->id;
            $jawaban = $request->{'jawaban_' . $id};

            if ($jawaban == $p->pg_bank_soal->right_answer) {
                $total_nilai++;
                $nilai_pg++;
            }

            JawabanUjian::create([
                'ujian_id'         => $ujian_id,
                'sub_bank_soal_id' => $id,
                'tipe_pertanyaan'  => 'pg',
                'answer'           => $jawaban,
                'pg_bobot'         => 1,
                'essay_bobot'      => 0,
            ]);
        }

        $soal_essay = SubBankSoal::with('pg_bank_soal')->where([
            'master_bank_soal_id' => $master_bank_soal_id,
            'tipe_pertanyaan'     => 'essay',
        ])->get();
        foreach ($soal_essay as $p) {
            $id      = $p->id;
            $jawaban = $request->{'jawaban_' . $id};

            JawabanUjian::create([
                'ujian_id'         => $ujian_id,
                'sub_bank_soal_id' => $id,
                'tipe_pertanyaan'  => 'essay',
                'answer'           => $jawaban,
                'pg_bobot'         => 0,
                'essay_bobot'      => 0,
            ]);
        }

        Ujian::where('id', $ujian_id)->update([
            'total_nilai' => $total_nilai,
            'nilai_pg'    => $nilai_pg,
        ]);

        return redirect()->route('siswa.ujian');
    }
}
