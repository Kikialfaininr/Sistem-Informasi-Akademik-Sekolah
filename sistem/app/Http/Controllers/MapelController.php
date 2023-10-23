<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Redirect;
use Session;
use PDF;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = mapel::where('nama_mapel', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = DB::select('select * from mapel order by created_at DESC');
        }
        return view('mapel', compact('data', 'request'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_mapel'=>'unique:mapel'
        ]);

        $data = new mapel();
            $data->nama_mapel = $request->nama_mapel;
        $data->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/mapel');
            
    }

    public function edit(Request $request, $id)
    {
        $data = mapel::where('kode_mapel',$id)->first();
        return view('mapel-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = mapel::where('kode_mapel', $id)->first();
            $data->nama_mapel = $request->nama_mapel;
        $data->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/mapel');
    }

    public function hapus(Request $request, $id)
    {
        $data = mapel::where('kode_mapel',$id);
        $data->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/mapel');
    }

    public function downloadpdf()
    {
        $data = mapel::get();
        $pdf = PDF::loadview('datamapel-pdf', compact('data'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatamapel.pdf');
    }
}
