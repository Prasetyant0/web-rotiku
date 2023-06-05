<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Bayar;
use App\Models\Roti;

class PesananController extends Controller
{
    public function show()
    {
        $pesanan = Bayar::with('beliRoti')->get();
        return view('admin.pesanan', compact('pesanan'));
    }

    public function delete($id) {
        $pesanan = Bayar::find($id);
        $pesanan->delete();
        return redirect()->back();
    }
}
