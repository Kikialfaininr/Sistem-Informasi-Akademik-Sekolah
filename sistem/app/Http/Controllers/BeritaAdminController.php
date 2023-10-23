<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Redirect;
use Session;
use Image;

use Illuminate\Http\Request;

class BeritaAdminController extends Controller
{
    public function index()
    {
        $data = berita::all();
        return view('berita-admin', compact('data'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_berita'=>'unique:berita',
            'foto' => 'mimes:jpg,jpeg,png',        
            ]
        );

        $file = $request->file('foto');
        $name = 'FT'.date('Ymdhis').'.'.$request->file('foto')->getClientOriginalExtension();

        $resize_foto = Image::make($file->getRealPath());
        $resize_foto->resize(200, 200, function($constraint){
            $constraint->aspectRatio();
        })->save('image/foto'.$name);

        $data = new berita();
            $data->tanggal_berita = $request->tanggal_berita;
            $data->judul_berita = $request->judul_berita;
            $data->isi = $request->isi;
            $data->foto = $name;
        $data->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/berita-admin');
            
    }

    public function edit(Request $request, $id)
    {
        $data = berita::where('kode_berita',$id)->first();
        return view('berita-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate( [
            'foto' => 'mimes:jpg,jpeg,png',
        ]
        );

        $file = $request->file('foto');  
        $name = 'FT'.date('Ymdhis').'.'.$request->file('foto')->getClientOriginalExtension();

        $resize_foto = Image::make($file->getRealPath());
        $resize_foto->resize(200, 200, function($constraint){
            $constraint->aspectRatio();
        })->save('image/foto'.$name);

        $data = berita::where('kode_berita', $id)->first();
            $data->tanggal_berita = $request->tanggal_berita;
            $data->judul_berita = $request->judul_berita;
            $data->isi = $request->isi;
            $data->foto = $name;
        $data->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/berita-admin');
    }

    public function hapus(Request $request, $id)
    {
        $data = berita::where('kode_berita',$id);
        $data->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/berita-admin');
    }
}