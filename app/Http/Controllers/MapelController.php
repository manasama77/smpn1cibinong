<?php

namespace App\Http\Controllers;

use App\Models\MasterMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = MasterMapel::orderBy('name', 'asc')->get();

        $data = [
            'page_title' => 'Master Mapel | List',
            'lists'      => $lists,
        ];
        return view('pages.admin.mapel.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Master Mapel | Create',
        ];
        return view('pages.admin.mapel.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        MasterMapel::create([
            'name'       => $request->name,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.mapel')->with('success', 'Create Success');
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
            'page_title' => 'Master Mapel | Edit',
            'lists'      => $lists,
        ];
        return view('pages.admin.mapel.form_edit', $data);
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

        return redirect()->route('admin.mapel')->with('success', 'Update Success');
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

        return redirect()->route('admin.mapel')->with('success', 'Destroy Success');
    }
}
