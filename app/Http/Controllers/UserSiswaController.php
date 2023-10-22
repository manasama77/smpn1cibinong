<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = User::where('role', 'siswa')->orderBy('nama_lengkap', 'asc')->get();

        $data = [
            'page_title' => 'User Management | Siswa',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.siswa.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'User Management | Create Siswa',
        ];
        return view('pages.admin.user.siswa.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'                 => 'required',
            'password'              => 'required|confirmed',
            'nama_lengkap'          => 'required',
            'no_hp'                 => 'required',
            'nisn'                  => 'required',
            'kelas'                 => 'required',
            'nama_orang_tua_wali'   => 'required',
            'no_ktp_orang_tua_wali' => 'required',
            'no_hp_orang_tua_wali'  => 'required',
        ]);

        User::create([
            'email'                 => $request->email,
            'password'              => $request->password,
            'nama_lengkap'          => $request->nama_lengkap,
            'no_hp'                 => $request->no_hp,
            'nisn'                  => $request->nisn,
            'kelas'                 => $request->kelas,
            'nama_orang_tua_wali'   => $request->nama_orang_tua_wali,
            'no_ktp_orang_tua_wali' => $request->no_ktp_orang_tua_wali,
            'no_hp_orang_tua_wali'  => $request->no_hp_orang_tua_wali,
            'role'                  => 'siswa',
            'created_by'            => Auth::user()->id,
        ]);

        return redirect()->route('admin.user.siswa')->with('success', 'Create Success');
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
        $lists       = User::findOrFail($id);
        $data        = [
            'page_title' => 'User Management | Edit Siswa',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.siswa.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap'          => 'required',
            'no_hp'                 => 'required',
            'nisn'                  => 'required',
            'kelas'                 => 'required',
            'nama_orang_tua_wali'   => 'required',
            'no_ktp_orang_tua_wali' => 'required',
            'no_hp_orang_tua_wali'  => 'required',
        ]);

        User::where('id', $id)->update([
            'nama_lengkap'          => $request->nama_lengkap,
            'no_hp'                 => $request->no_hp,
            'nisn'                  => $request->nisn,
            'kelas'                 => $request->kelas,
            'nama_orang_tua_wali'   => $request->nama_orang_tua_wali,
            'no_ktp_orang_tua_wali' => $request->no_ktp_orang_tua_wali,
            'no_hp_orang_tua_wali'  => $request->no_hp_orang_tua_wali,
            'updated_by'   => Auth::user()->id,
        ]);

        return redirect()->route('admin.user.siswa')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec             = User::findOrFail($id);
        $exec->deleted_by = Auth::user()->id;
        $exec->save();
        $exec->delete();

        return redirect()->route('admin.user.siswa')->with('success', 'Destroy Success');
    }

    /**
     * Show the form for reset password.
     */
    public function reset(string $id)
    {
        $lists       = User::findOrFail($id);
        $data        = [
            'page_title' => 'User Management | Reset Password Siswa',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.siswa.form_reset', $data);
    }

    public function reset_password(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        User::where('id', $id)->update([
            'password'   => $request->password,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.user.siswa')->with('success', 'Reset Success');
    }
}
