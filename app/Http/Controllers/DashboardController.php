<?php

namespace App\Http\Controllers;
use App\Models\Roti;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahRoti = Roti::where('visibility', 1)->count();
        $jumlahKategori = Kategori::count();

        $roti = Roti::where('visibility', 1)->get();
         $hasilStoks = 0 ;
         foreach ($roti as $d) {
         $hitung = DB::select(DB::raw('CALL hitungStok(?, @output)'), [$d->id_roti]);
        $hasil = DB::select('select @output as hasil')[0]->hasil;
        //  $hasilStoks = collect($hasil->hasil)->map(function ($hasil) {
        //      return $hasil ?: 0;
        //  })->sum();
        $hasilStoks += $hasil;
         }
        return view('admin.dashboard', compact('jumlahRoti', 'jumlahKategori', 'hasilStoks'));
    }

}
