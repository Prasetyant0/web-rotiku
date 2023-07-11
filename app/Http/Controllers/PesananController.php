<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Bayar;
use App\Models\Driver;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function show()
    {
        $pesanan = Bayar::with('beliRoti')->where('visibility', 1)->get();
        return view('admin.pesanan', compact('pesanan'));
    }

    public function delete($id_pesanan) {
        $pesanan = Bayar::find($id_pesanan);
        $pesanan->visibility = 0;
        $pesanan->save();
        return redirect()->back();  
    }

    public function showPesanan()
    {
        $showPesanan = Bayar::where('visibility', 0)->get();
        return view('driver.listpesanan', compact('showPesanan'));
    }

    public function transaksi($id_pesanan)
    {
        $produk = Bayar::where('id_pesanan',$id_pesanan)->where('visibility', 0)->first();
        return view('driver.transaksi', compact('produk'));
    }

}
