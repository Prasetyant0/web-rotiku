<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Produk_masuk;
use Illuminate\Http\Request;

class ProdukMasukController extends Controller
{
    public function index()
    {
        $produkMasuk = Produk_masuk::all();
        return view('admin.produkmasuk', compact('produkMasuk'));
    }

    public function showForm()
    {
        $namaRoti = Roti::where('visibility', 1)->get();
        return view('admin.proses.tambahprodukmasuk', compact('namaRoti'));
    }

    public function storeProduk(Request $request)
    {
        $request->validate([
            'id_roti' => 'required|exists:roti,id_roti',
            'jumlah_masuk' => 'required',
            'catatan' => 'required'
        ]);

        $produkMasuk = new Produk_masuk;
        $produkMasuk->jumlah_masuk = $request->input('jumlah_masuk');
        $produkMasuk->catatan = $request->input('catatan');

        $namaRoti = Roti::find($request->input('id_roti'));
        $produkMasuk->produkMasuk()->associate($namaRoti);

        $produkMasuk->save();

        return redirect()->route('admin.produk_masuk')->with('success', 'Produk masuk berhasil.');
    }

    public function editForm($id_pemasukan)
    {
        $produkMasuk = Produk_masuk::find($id_pemasukan);
        $namaRoti = Roti::all();
        return view('admin.proses.editprodukmasuk', compact('produkMasuk', 'namaRoti'));
    }

    public function updateProduk($id_pemasukan, Request $request)
    {
        $produkMasuk = Produk_masuk::find($id_pemasukan);
        $isChanged = false;

        if ($produkMasuk->id_roti != $request->input('id_roti')) {
            $produkMasuk->id_roti = $request->input('id_roti');
            $isChanged = true;
        }

        if ($produkMasuk->jumlah_masuk != $request->input('jumlah_masuk')) {
            $produkMasuk->jumlah_masuk = $request->input('jumlah_masuk');
            $isChanged = true;
        }

        if ($produkMasuk->catatan != $request->input('catatan')) {
            $produkMasuk->catatan = $request->input('catatan');
            $isChanged = true;
        }

        if (!$isChanged) {
            return redirect()->route('admin.produk_masuk')->with('info', 'Tidak ada perubahan data.');
        }

        $produkMasuk->save();

        return redirect()->route('admin.produk_masuk')->with('success', 'Perubahan data berhasil');

    }

    public function destroy($id_pemasukan)
    {
        $produkMasuk = Produk_masuk::find($id_pemasukan);
        $produkMasuk->delete($id_pemasukan);

        return redirect()->route('admin.produk_masuk');
    }
}
