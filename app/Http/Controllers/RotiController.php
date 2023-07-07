<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RotiController extends Controller
{
    public function index()
    {
        // SET @p0='18'; SET @p1=''; CALL `hitungStok`(@p0, @p1); SELECT @p1 AS `hasil`;
        $roti = Roti::all();
        // $res = DB::select(DB::raw("CALL `hitungStok`(18, @output)"));
        // $opt = DB::select(DB::raw("SELECT roti.id_roti, roti.roti as nama_roti, roti.description, kategori.kategori, roti.gambar, roti.harga as hasil FROM roti JOIN kategori ON roti.id_kategori = kategori.id_kategori"));
        // die(json_encode($opt));
        return view('admin.dataroti', compact('roti'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.proses.tambahroti', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roti' => 'required',
            'description' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $gambar->move('gallery', $filename);

            $roti = new Roti;
            $roti->roti = $request->input('roti');
            $roti->description = $request->input('description');
            $roti->gambar = $filename;
            $roti->harga = $request->input('harga');
            $roti->stok = $request->input('stok');

            $kategori = Kategori::find($request->input('id_kategori'));
            $roti->kategori()->associate($kategori);

            $roti->save();

            return redirect()->route('admin.dataroti.index')->with('success', 'Roti berhasil disimpan.');
        }
        return redirect()->back()->withInput()->with('error', 'Gagal mengunggah foto!');
    }

    public function edit($id_roti)
    {
        $roti = Roti::find($id_roti);
        $kategori = Kategori::all();
        return view('admin.proses.editroti', compact('roti', 'kategori'));
    }

    public function update($id_roti, Request $request)
    {
        $roti = Roti::find($id_roti);

        $isChanged = false;

        if ($request->hasFile('gambar')) {
            if ($roti->gambar) {
                $imagePath = public_path('gallery/' . $roti->gambar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gallery'), $gambarName);
            $roti->gambar = $gambarName;
            $isChanged = true;
        }

        if ($request->has('roti') && $roti->roti != $request->input('roti')) {
            $roti->roti = $request->input('roti');
            $isChanged = true;
        }

        if ($request->has('description') && $roti->description != $request->input('description')) {
            $roti->description = $request->input('description');
            $isChanged = true;
        }

        if ($request->has('id_kategori') && $roti->id_kategori != $request->input('id_kategori')) {
            $roti->id_kategori = $request->input('id_kategori');
            $isChanged = true;
        }

        if ($roti->harga != $request->input('harga')) {
            $roti->harga = $request->input('harga');
            $isChanged = true;
        }

        if ($roti->stok != $request->input('stok')) {
            $roti->stok = $request->input('stok');
            $isChanged = true;
        }

        if (!$isChanged) {
            return redirect()->route('admin.dataroti.index')->with('info', 'Tidak ada perubahan data');
        }

        $roti->save();

        return redirect()->route('admin.dataroti.index')->with('success', 'Data roti berhasil diupdate');
    }

    public function destroy($id_roti)
    {
        $roti = Roti::find($id_roti);
        $roti->visibility = 0;
        $roti->save();

        return redirect()->route('admin.dataroti.index');
    }

    public function showMenu() {
        $menu = Roti::where('visibility', 1)->get();
        $kategori = Kategori::all();
        return view('frontend.menuroti', compact('menu', 'kategori'));
    }
}
