<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Redirect;
use Session;
use Image;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        return view('berita', compact('berita'));
    }
    
    public function detail(Request $request, $id)
    {
        $berita = berita::where('kode_berita', $id)->first();
        return view('berita-detail', compact('berita'));
    }

}
