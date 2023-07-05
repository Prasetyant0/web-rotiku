<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', compact('kategori'));
    }

    public function create()
    {
        return view('admin.proses.tambahkategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|unique:kategori',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->gambar) {
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $gambar->move('gallery', $filename);

            $kategori = new Kategori();
            $kategori->kategori = $request->input('kategori');
            $kategori->gambar = $filename;

            $kategori->save();
                 return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');

        }

        return redirect()->back()->withInput()->with('error', 'Gagal mengunggah foto!');

    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        return view('admin.proses.editkategori', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $data = $request->all();

        $isChanged = false;

        if ($request->hasFile('gambar')) {
            if ($kategori->gambar) {
                $imagePath = public_path('gallery/', $kategori->gambar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gallery'), $gambarName);
            $kategori->gambar = $gambarName;
            $isChanged = true;
        }



        if ($kategori->kategori != $request->input('kategori')) {
            $kategori->kategori = $request->input('kategori');
            $isChanged = true;
        }



        if (!$isChanged) {
            return redirect()->route('admin.kategori.index')->with('info', 'Tidak ada perubahan data!');
        }

        $kategori->save();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diupdate');

    }

    public function destroy($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $kategori->delete($kategori);

        return redirect()->route('admin.kategori.index');
    }
}
