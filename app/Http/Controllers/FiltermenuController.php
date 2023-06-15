<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Roti;
use Illuminate\Http\Request;

class FiltermenuController extends Controller
{
    function filterView($id_kategori){
        // select menu
        $menu = Roti::where('id_kategori', $id_kategori)->get();
        
        // select kategori
        $kategori = Kategori::findOrFail($id_kategori);
        
        // return value
        return view('frontend.filter', compact('menu', 'kategori'));
    }
}
