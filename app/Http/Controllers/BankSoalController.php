<?php

namespace App\Http\Controllers;

use App\Models\PgBankSoal;
use App\Models\MasterMapel;
use App\Models\SubBankSoal;
use Illuminate\Http\Request;
use App\Models\MasterBankSoal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BankSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = MasterBankSoal::orderBy('created_at', 'desc')->get();

        $data = [
            'page_title' => 'Bank Soal | List',
            'lists'      => $lists,
        ];
        return view('pages.admin.bank_soal.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uniqid = uniqid();
        $mapels = MasterMapel::get();
        $data = [
            'page_title' => 'Bank Soal | Create',
            'uniqid'     => $uniqid,
            'mapels'     => $mapels,
        ];
        return view('pages.admin.bank_soal.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uniqid'          => 'required',
            'master_mapel_id' => 'required',
            'kelas'           => 'required',
            'start_date'      => 'required',
            'start_time'      => 'required',
            'end_date'        => 'required',
            'end_time'        => 'required',
        ]);

        $master_bank_soal = MasterBankSoal::create([
            'master_mapel_id' => $request->master_mapel_id,
            'kelas'           => $request->kelas,
            'start_datetime'  => $request->start_date . " " . $request->start_time,
            'end_datetime'    => $request->end_date . " " . $request->end_time,
            'active'          => $request->active,
            'slug'            => $request->uniqid,
            'active'          => 1,
            'created_by'      => Auth::user()->id,
        ]);

        $master_bank_soal_id = $master_bank_soal->id;

        SubBankSoal::where('temp', $request->uniqid)->update([
            'master_bank_soal_id' => $master_bank_soal_id,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lists       = MasterMapel::findOrFail($id);
        $data        = [
            'page_title' => 'Bank Soal | Edit',
            'lists'      => $lists,
        ];
        return view('pages.admin.bank_soal.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        MasterMapel::where('id', $id)->update([
            'name'       => $request->name,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.bank_soal')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec             = MasterMapel::findOrFail($id);
        $exec->deleted_by = Auth::user()->id;
        $exec->save();
        $exec->delete();

        return redirect()->route('admin.bank_soal')->with('success', 'Destroy Success');
    }

    public function store_pg(Request $request)
    {
        $uniqid               = $request->uniqid;
        $pertanyaan_pg        = $request->pertanyaan_pg;
        $pertanyaan_gambar_pg = $request->pertanyaan_gambar_pg ?? null;
        $jawaban_a            = $request->jawaban_a;
        $jawaban_b            = $request->jawaban_b;
        $jawaban_c            = $request->jawaban_c;
        $jawaban_d            = $request->jawaban_d;
        $jawaban_e            = $request->jawaban_e;
        $right_answer         = $request->right_answer;

        if ($request->pertanyaan_gambar_pg != "undefined") {
            $pertanyaan_gambar_pg = Storage::disk('public')->put('soal', $request->file('pertanyaan_gambar_pg'));
        } else {
            $pertanyaan_gambar_pg = null;
        }

        $sub_bank_soals = SubBankSoal::create([
            'bank_soal_id'    => null,
            'tipe_pertanyaan' => 'pg',
            'pertanyaan'      => $pertanyaan_pg,
            'gambar'          => $pertanyaan_gambar_pg,
            'essay_bobot'     => 0,
            'temp'            => $uniqid,
        ]);

        PgBankSoal::create([
            'sub_bank_soal_id' => $sub_bank_soals->id,
            'jawaban_a'        => $jawaban_a,
            'jawaban_b'        => $jawaban_b,
            'jawaban_c'        => $jawaban_c,
            'jawaban_d'        => $jawaban_d,
            'jawaban_e'        => $jawaban_e,
            'right_answer'     => $right_answer,
        ]);

        $exec = SubBankSoal::select([
            'sub_bank_soals.id',
            'sub_bank_soals.pertanyaan',
            'sub_bank_soals.gambar',
            'pg_bank_soals.jawaban_a',
            'pg_bank_soals.jawaban_b',
            'pg_bank_soals.jawaban_c',
            'pg_bank_soals.jawaban_d',
            'pg_bank_soals.jawaban_e',
            'pg_bank_soals.right_answer',
        ])
            ->leftJoin('pg_bank_soals', 'pg_bank_soals.sub_bank_soal_id', '=', 'sub_bank_soals.id')
            ->where('sub_bank_soals.temp', $uniqid)
            ->where('tipe_pertanyaan', 'pg')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $exec,
        ]);
    }

    public function destroy_pg(Request $request)
    {
        $id     = $request->id;
        $uniqid = $request->uniqid;

        SubBankSoal::where('id', $id)->delete();
        PgBankSoal::where('sub_bank_soal_id', $id)->delete();

        $exec = SubBankSoal::select([
            'sub_bank_soals.id',
            'sub_bank_soals.pertanyaan',
            'sub_bank_soals.gambar',
            'pg_bank_soals.jawaban_a',
            'pg_bank_soals.jawaban_b',
            'pg_bank_soals.jawaban_c',
            'pg_bank_soals.jawaban_d',
            'pg_bank_soals.jawaban_e',
            'pg_bank_soals.right_answer',
        ])
            ->leftJoin('pg_bank_soals', 'pg_bank_soals.sub_bank_soal_id', '=', 'sub_bank_soals.id')
            ->where('sub_bank_soals.temp', $uniqid)
            ->where('tipe_pertanyaan', 'pg')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $exec,
        ]);
    }

    public function store_essay(Request $request)
    {
        $uniqid                  = $request->uniqid;
        $pertanyaan_essay        = $request->pertanyaan_essay;
        $pertanyaan_gambar_essay = $request->pertanyaan_gambar_essay ?? null;
        $essay_bobot             = $request->essay_bobot;

        if ($request->pertanyaan_gambar_essay != "undefined") {
            $pertanyaan_gambar_essay = Storage::disk('public')->put('soal', $request->file('pertanyaan_gambar_essay'));
        } else {
            $pertanyaan_gambar_essay = null;
        }

        SubBankSoal::create([
            'bank_soal_id'    => null,
            'tipe_pertanyaan' => 'essay',
            'pertanyaan'      => $pertanyaan_essay,
            'gambar'          => $pertanyaan_gambar_essay,
            'essay_bobot'     => $essay_bobot,
            'temp'            => $uniqid,
        ]);

        $exec = SubBankSoal::select([
            'sub_bank_soals.id',
            'sub_bank_soals.pertanyaan',
            'sub_bank_soals.gambar',
            'sub_bank_soals.essay_bobot',
        ])
            ->where('sub_bank_soals.temp', $uniqid)
            ->where('tipe_pertanyaan', 'essay')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $exec,
        ]);
    }

    public function destroy_essay(Request $request)
    {
        $id     = $request->id;
        $uniqid = $request->uniqid;

        SubBankSoal::where('id', $id)->delete();

        $exec = SubBankSoal::select([
            'sub_bank_soals.id',
            'sub_bank_soals.pertanyaan',
            'sub_bank_soals.gambar',
            'sub_bank_soals.essay_bobot',
        ])
            ->where('sub_bank_soals.temp', $uniqid)
            ->where('tipe_pertanyaan', 'essay')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $exec,
        ]);
    }
}
