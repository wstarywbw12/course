<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        return view('pages.home.index', compact('beranda'));
    }
}
