<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        return View('admin.pesanan');
    }
}
