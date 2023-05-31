<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roti;

class MenuController extends Controller
{
    public function index() {
        return view('frontend.menuroti');
    }

    public function search(Request $request) {
        $keyword = $request->get('keyword');
        $results = Roti::where('roti', 'like', '%' . $keyword . '%')->orWhere('harga', 'like', '%' . $keyword . '%')->get();

        return response()->json($results);

    }
}
