@extends('layouts.app-dashboard')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Ruangan</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                @if(Auth::user()->level == 'admin')
                <button style="margin: 20px;" type="button" title="tambah data" class="btn btn-primary"
                    data-toggle="modal" data-target="#TambahDataRuang"><i class="fa fa-plus"></i> Tambah Data
                    Ruangan</button>
                @endif
                <a href="{{url('download-laporanruang')}}" target="_blank">
                    <button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
            <div>
                <form class="d-flex" style="float: right; margin-top: 20px; margin-right: 30px;" action="{{url('ruang')}}" method="GET">
                    <input style="width: 200px" class="form-control me-2" type="text" name="search"
                        value="{{$request->search}}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive" style="width: 97%; margin-left: 15px;">
            <table class="table table-responsive table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Ruangan</th>
                        @if(Auth::user()->level == 'admin')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $no => $value)
                    <tr>
                        <td align="center">{{$no+1}}</td>
                        <td>{{$value->nama_ruang}}</td>
                        @if(Auth::user()->level == 'admin')
                        <td align="center">
                            <button type="button" title="edit data" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#UbahRuang{{$value->kode_ruang}}"><i class="fa fa-edit"></i></button>
                            <a href="{{url($value->kode_ruang.'/hapus-ruang')}}">
                                <button title="hapus data" class="btn btn-danger btn-xs"><i
                                        class="fa fa-remove"></i></button>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="TambahDataRuang" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Ruangan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-ruang')}}">
                    @csrf
                    <div>
                        <label for="nama_ruang">{{ __('Nama Ruangan') }}</label>
                        <input id="nama_ruang" type="text"
                            class="form-control @error('nama_ruang') is-invalid @enderror" name="nama_ruang"
                            value="{{ old('nama_ruang') }}" required autofocus>
                        @error('nama_ruang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-md-end"></label>
                        <div class="col-md-8">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data as $no => $value)
<div class="modal fade" id="UbahRuang{{$value->kode_ruang}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Ruangan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-ruang/'.$value->kode_ruang)}}">
                    @csrf
                    <div>
                        <label for="nama_ruang">{{ __('Nama Ruangan') }}</label>
                        <input id="nama_ruang" type="text"
                            class="form-control @error('nama_ruang') is-invalid @enderror" name="nama_ruang"
                            value="{{ $value->nama_ruang }}" required autofocus>
                        @error('nama_ruang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-md-end"></label>
                        <div class="col-md-8">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection