<?php

namespace App\Http\Controllers;

use App\Models\JawabanUjian;
use App\Models\Ujian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index($id)
    {
        $lists = Ujian::where([
            'master_bank_soal_id' => $id,
        ])->get();

        $data = [
            'page_title' => 'Penilaian | List',
            'lists'      => $lists,
        ];
        return view('pages.guru.penilaian.main', $data);
    }

    public function siswa($id)
    {
        $lists = Ujian::with(['user', 'master_bank_soal.sub_bank_soal_pg', 'master_bank_soal.sub_bank_soal_essay', 'jawaban_ujian_pg', 'jawaban_ujian_essay'])->findOrFail($id);

        // dd($lists);

        $data = [
            'page_title' => 'Penilaian Siswa | List',
            'lists'      => $lists,
        ];
        return view('pages.guru.penilaian.form', $data);
    }

    public function store_nilai_essay($jawaban_ujian_id, Request $request)
    {
        $exec = JawabanUjian::find($jawaban_ujian_id);
        $exec->essay_bobot = $request->nilai;
        $ujian_id = $exec->ujian_id;
        $exec->save();

        $total_nilai = 0;
        $nilai_pg    = 0;
        $nilai_essay = 0;
        $exec        = JawabanUjian::where('ujian_id', $ujian_id)->get();
        foreach ($exec as $e) {
            $tipe_pertanyaan = $e->tipe_pertanyaan;

            if ($tipe_pertanyaan == 'pg') {
                $total_nilai += $e->pg_bobot;
                $nilai_pg += $e->pg_bobot;
            }

            if ($tipe_pertanyaan == 'essay') {
                $total_nilai += $e->essay_bobot;
                $nilai_essay += $e->essay_bobot;
            }
        }

        $exec_ujian              = Ujian::find($ujian_id);
        $exec_ujian->total_nilai = $total_nilai;
        $exec_ujian->nilai_pg    = $nilai_pg;
        $exec_ujian->nilai_essay = $nilai_essay;
        $exec_ujian->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
