<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Produk_masuk;
use Illuminate\Http\Request;

class ProdukMasukController extends Controller
{
    public function index()
    {
        return view('produk_masuk');
    }

    public function showForm()
    {
        return view('tambah_produk_masuk');
    }

    public function storeProduk(Request $request)
    {
        $request->validate([
            'id_roti' => 'required|exists:roti,id_roti',
            'jumlah_masuk' => 'required',
            'catatan' => 'required'
        ]);

        $produkMasuk = new Produk_masuk();
        $produkMasuk = $produkMasuk->$request->input('jumlah_masuk');
        $produkMasuk = $$produkMasuk->$request->input('catatan');

        $namaRoti = Roti::find($request->input('id_roti'));
        $produkMasuk->produkMasuk()->associate($namaRoti);

        $produkMasuk->save();

        return redirect()->route('admin.produk_masuk')->with('success', 'Produk masuk berhasil.');
    }

    public function editForm($id_pemasukan)
    {
        $produkMasuk = Produk_masuk::find($id_pemasukan);
        $namaRoti = Roti::all();
        return view('edit_produk_masuk', compact('produkMasuk', 'namaRoti'));
    }

    public function updateProduk($id_pemasukan, Request $request)
    {

    }
}
