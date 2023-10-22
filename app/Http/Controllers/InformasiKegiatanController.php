<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformasiKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Blog::orderBy('created_at', 'desc')->get();

        $data = [
            'page_title' => 'Informasi Kegiatan | List',
            'lists'      => $lists,
        ];
        return view('pages.admin.informasi_kegiatan.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Informasi Kegiatan | Create',
        ];
        return view('pages.admin.informasi_kegiatan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required',
            'active'      => 'required',
            'description' => 'required',
            'banner'      => 'required',
        ]);

        $banner = Storage::disk('public')->put('blog', $request->file('banner'));
        $slug   = Str::slug($request->judul);

        Blog::create([
            'judul'       => $request->judul,
            'description' => $request->description,
            'banner'      => $banner,
            'active'      => $request->active,
            'slug'        => $slug,
            'created_by'  => Auth::user()->id,
        ]);

        return redirect()->route('admin.informasi_kegiatan')->with('success', 'Create Success');
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
        $lists       = Blog::findOrFail($id);
        $data        = [
            'page_title' => 'Informasi Kegiatan | Edit',
            'lists'      => $lists,
        ];
        return view('pages.admin.informasi_kegiatan.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'       => 'required',
            'active'      => 'required',
            'description' => 'required',
            'banner'      => 'nullable',
        ]);

        $exec              = Blog::findOrFail($id);


        $exec->judul       = $request->judul;
        $exec->description = $request->description;
        $exec->active      = $request->active;

        $slug   = Str::slug($request->judul);
        $exec->slug      = $slug;

        if ($request->hasFile('banner')) {
            Storage::disk('public')->delete($exec->banner);
            $banner       = Storage::disk('public')->put('blog', $request->file('banner'));
            $exec->banner = $banner;
        }

        $exec->updated_by  = Auth::user()->id;
        $exec->save();

        return redirect()->route('admin.informasi_kegiatan')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec             = Blog::findOrFail($id);
        $exec->deleted_by = Auth::user()->id;
        $exec->save();
        $exec->delete();

        return redirect()->route('admin.informasi_kegiatan')->with('success', 'Destroy Success');
    }

    public function upload(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path     = $request->file('file')->storeAs('blog_asset', $fileName, 'public');
        return response()->json(['location' =>  config('app.url') . '/storage/' . $path]);
    }
}
