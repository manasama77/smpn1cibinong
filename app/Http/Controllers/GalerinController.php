<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Gallery::orderBy('created_at', 'desc')->get();

        $data = [
            'page_title' => 'Galeri | List',
            'lists'      => $lists,
        ];
        return view('pages.admin.galeri.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Galeri | Create',
        ];
        return view('pages.admin.galeri.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto'        => 'required',
            'active'      => 'required',
            'description' => 'required',
        ]);

        $foto = Storage::disk('public')->put('gallery', $request->file('foto'));

        Gallery::create([
            'foto'      => $foto,
            'description' => $request->description,
            'active'      => $request->active,
            'created_by'  => Auth::user()->id,
        ]);

        return redirect()->route('admin.galeri')->with('success', 'Create Success');
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
        $lists       = Gallery::findOrFail($id);
        $data        = [
            'page_title' => 'Galeri | Edit',
            'lists'      => $lists,
        ];
        return view('pages.admin.galeri.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto'        => 'nullable',
            'active'      => 'required',
            'description' => 'required',
        ]);

        $exec              = Gallery::findOrFail($id);
        $exec->description = $request->description;
        $exec->active      = $request->active;

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($exec->foto);
            $foto       = Storage::disk('public')->put('gallery', $request->file('foto'));
            $exec->foto = $foto;
        }

        $exec->updated_by  = Auth::user()->id;
        $exec->save();

        return redirect()->route('admin.galeri')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec             = Gallery::findOrFail($id);
        $exec->deleted_by = Auth::user()->id;
        $exec->save();
        $exec->delete();

        return redirect()->route('admin.galeri')->with('success', 'Destroy Success');
    }
}
