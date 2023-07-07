<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk_keluar;
use App\Models\Roti;

class ProdukKeluarController extends Controller
{
    public function index()
    {
        $produkKeluar = Produk_keluar::all();
        return view('admin.produkkeluar', compact('produkKeluar'));
    }

    public function showForm()
    {
    $namaRoti = Roti::where('visibility', 1)->get();
    return view('admin.proses.tambahprodukkeluar', compact('namaRoti'));
    }

    public function storeProduk(Request $request)
    {
    $request->validate([
    'id_roti' => 'required|exists:roti,id_roti',
    'jumlah_keluar' => 'required',
    'catatan' => 'required'
    ]);

    $produkKeluar = new Produk_keluar;
    $produkKeluar->jumlah_keluar = $request->input('jumlah_keluar');
    $produkKeluar->catatan = $request->input('catatan');

    $namaRoti = Roti::find($request->input('id_roti'));
    $produkKeluar->produkKeluar()->associate($namaRoti);

    $produkKeluar->save();

    return redirect()->route('admin.produk_keluar')->with('success', 'Produk keluar berhasil.');
    }

    public function editForm($id_keluar)
    {
    $produkKeluar = Produk_keluar::find($id_keluar);
    $namaRoti = Roti::all();
    return view('admin.proses.editprodukkeluar', compact('produkKeluar', 'namaRoti'));
    }

    public function updateProduk($id_keluar, Request $request)
    {
    $produkKeluar = Produk_keluar::find($id_keluar);
    $isChanged = false;

    if ($produkKeluar->id_roti != $request->input('id_roti')) {
    $produkKeluar->id_roti = $request->input('id_roti');
    $isChanged = true;
    }

    if ($produkKeluar->jumlah_keluar != $request->input('jumlah_keluar')) {
    $produkKeluar->jumlah_keluar = $request->input('jumlah_keluar');
    $isChanged = true;
    }

    if ($produkKeluar->catatan != $request->input('catatan')) {
    $produkKeluar->catatan = $request->input('catatan');
    $isChanged = true;
    }

    if (!$isChanged) {
    return redirect()->route('admin.produk_keluar')->with('info', 'Tidak ada perubahan data.');
    }

    $produkKeluar->save();

    return redirect()->route('admin.produk_keluar')->with('success', 'Perubahan data berhasil');

    }

    public function destroy($id_keluar)
    {
    $produkKeluar = Produk_keluar::find($id_keluar);
    $produkKeluar->delete($id_keluar);

    return redirect()->route('admin.produk_keluar');
    }
}
