<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = User::where('role', 'guru')->orderBy('nama_lengkap', 'asc')->get();

        $data = [
            'page_title' => 'User Management | Guru',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.guru.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'User Management | Create Guru',
        ];
        return view('pages.admin.user.guru.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'        => 'required',
            'password'     => 'required|confirmed',
            'nama_lengkap' => 'required',
            'no_hp'        => 'required',
        ]);

        User::create([
            'email'        => $request->email,
            'password'     => $request->password,
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp'        => $request->no_hp,
            'role'         => 'guru',
            'created_by'   => Auth::user()->id,
        ]);

        return redirect()->route('admin.user.guru')->with('success', 'Create Success');
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
            'page_title' => 'User Management | Edit Guru',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.guru.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp'        => 'required',
        ]);

        User::where('id', $id)->update([
            'nama_lengkap'          => $request->nama_lengkap,
            'no_hp'                 => $request->no_hp,
            'updated_by'   => Auth::user()->id,
        ]);

        if ($id == Auth::user()->id) {
            Auth::user()->nama_lengkap = $request->nama_lengkap;
            Auth::user()->no_hp        = $request->no_hp;
        }

        return redirect()->route('admin.user.guru')->with('success', 'Update Success');
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

        return redirect()->route('admin.user.guru')->with('success', 'Destroy Success');
    }

    /**
     * Show the form for reset password.
     */
    public function reset(string $id)
    {
        $lists       = User::findOrFail($id);
        $data        = [
            'page_title' => 'User Management | Reset Password Guru',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.guru.form_reset', $data);
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

        return redirect()->route('admin.user.guru')->with('success', 'Reset Success');
    }
}
