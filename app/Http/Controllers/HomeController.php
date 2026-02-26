<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Beranda;
use App\Models\HomeFeature;
use App\Models\HomeMaterial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        $home_materials = HomeMaterial::all();
        $home_features = HomeFeature::all();
        $home_about = About::all();
        return view('pages.home.index', compact('beranda', 'home_materials', 'home_features', 'home_about'));
    }
}
