<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = User::where('role', 'admin')->orderBy('nama_lengkap', 'asc')->get();

        $data = [
            'page_title' => 'User Management | Admin',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.admin.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'User Management | Create Admin',
        ];
        return view('pages.admin.user.admin.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email'        => 'required',
            'no_hp'        => 'required',
            'password'     => 'required|confirmed',
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'no_hp'        => $request->no_hp,
            'password'     => $request->password,
            'created_by'   => Auth::user()->id,
        ]);

        return redirect()->route('admin.user.admin')->with('success', 'Create Success');
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
            'page_title' => 'User Management | Edit Admin',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.admin.form_edit', $data);
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
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp'        => $request->no_hp,
            'updated_by'   => Auth::user()->id,
        ]);

        Auth::user()->nama_lengkap = $request->nama_lengkap;
        Auth::user()->no_hp        = $request->no_hp;

        return redirect()->route('admin.user.admin')->with('success', 'Update Success');
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

        return redirect()->route('admin.user.admin')->with('success', 'Destroy Success');
    }

    /**
     * Show the form for reset password.
     */
    public function reset(string $id)
    {
        $lists       = User::findOrFail($id);
        $data        = [
            'page_title' => 'User Management | Reset Password Admin',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.admin.form_reset', $data);
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

        return redirect()->route('admin.user.admin')->with('success', 'Reset Success');
    }
}
