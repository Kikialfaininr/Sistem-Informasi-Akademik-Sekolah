@extends('layouts.app-dashboard')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Siswa</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                @if(Auth::user()->level == 'admin')
                <button style="margin: 20px;" type="button" title="tambah data" class="btn btn-primary"
                    data-toggle="modal" data-target="#TambahDataSiswa"><i class="fa fa-plus"></i> Tambah Data
                    Siswa</button>
                @endif
                <a href="{{url('download-laporansiswa')}}" target="_blank">
                    <button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
            <div>
                <form class="d-flex" style="float: right; margin-bottom: 20px; margin-right: 20px;" action="{{url('siswa')}}" method="GET">
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
                        <th class="text-center">No Induk</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Tempat Lahir</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">Agama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Tahun Masuk</th>
                        @if(Auth::user()->level == 'admin')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $no => $value)
                    <tr>
                        <td align="center">{{$no+1}}</td>
                        <td>{{$value->no_induk}}</td>
                        <td>{{$value->nama_siswa}}</td>
                        <td>{{$value->jenis_kelamin}}</td>
                        <td>{{$value->tempat_lahir}}</td>
                        <td>{{$value->tanggal_lahir}}</td>
                        <td>{{$value->agama}}</td>
                        <td>{{$value->alamat}}</td>
                        <td>{{$value->tahun_masuk}}</td>
                        @if(Auth::user()->level == 'admin')
                        <td align="center">
                            <button type="button" title="edit data" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#UbahSiswa{{$value->kode_siswa}}"><i class="fa fa-edit"></i></button>
                            <a href="{{url($value->kode_siswa.'/hapus-siswa')}}">
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

<div class="modal fade" id="TambahDataSiswa" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Siswa</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-siswa')}}">
                    @csrf
                    <div>
                        <label for="no_induk">{{ __('No Induk') }}</label>
                        <input id="no_induk" type="number" class="form-control @error('no_induk') is-invalid @enderror"
                            name="no_induk" value="{{ old('no_induk') }}" required autofocus>
                        @error('no_induk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_siswa">{{ __('Nama') }}</label>
                        <input id="nama_siswa" type="text"
                            class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa"
                            value="{{ old('nama_siswa') }}" required autofocus>
                        @error('nama_siswa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required autofocus>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="l">L</option>
                            <option value="p">P</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tempat_lahir">{{ __('Tempat Lahir') }}</label>
                        <input id="tempat_lahir" type="text"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}" required autofocus>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_lahir">{{ __('No Induk') }}</label>
                        <input id="tanggal_lahir" type="date"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}" required autofocus>
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="agama">{{ __('Agama') }}</label>
                        <select name="agama" class="form-control @error('agama') is-invalid @enderror" name="agama"
                            value="{{ old('agama') }}" required autofocus>
                            <option value="">Pilih Agama</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                        @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat">{{ __('Alamat') }}</label>
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" value="{{ old('alamat') }}" required autofocus>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tahun_masuk">{{ __('Tahun Masuk') }}</label>
                        <input id="tahun_masuk" type="year" class="form-control @error('tahun_masuk') is-invalid @enderror"
                            name="tahun_masuk" value="{{ old('tahun_masuk') }}" required autofocus>
                        @error('tahun_masuk')
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
<div class="modal fade" id="UbahSiswa{{$value->kode_siswa}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Siswa</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-siswa/'.$value->kode_siswa)}}">
                    @csrf
                    <div>
                        <label for="no_induk">{{ __('No Induk') }}</label>
                        <input id="no_induk" type="number" class="form-control @error('no_induk') is-invalid @enderror"
                            name="no_induk" value="{{ $value->no_induk }}" required autofocus>
                        @error('no_induk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_siswa">{{ __('Nama') }}</label>
                        <input id="nama_siswa" type="text"
                            class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa"
                            value="{{ $value->nama_siswa }}" required autofocus>
                        @error('nama_siswa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            name="jenis_kelamin" value="{{ $value->jenis_kelamin }}" required autofocus>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="l">L</option>
                            <option value="p">P</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tempat_lahir">{{ __('Tempat Lahir') }}</label>
                        <input id="tempat_lahir" type="text"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                            value="{{ $value->tempat_lahir }}" required autofocus>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_lahir">{{ __('No Induk') }}</label>
                        <input id="tanggal_lahir" type="date"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                            value="{{ $value->tanggal_lahir }}" required autofocus>
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="agama">{{ __('Agama') }}</label>
                        <select name="agama" class="form-control @error('agama') is-invalid @enderror" name="agama"
                            value="{{ $value->agama }}" required autofocus>
                            <option value="">Pilih Agama</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                        @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat">{{ __('Alamat') }}</label>
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" value="{{ $value->alamat }}" required autofocus>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="tahun_masuk">{{ __('Tahun Masuk') }}</label>
                        <input id="tahun_masuk" type="year" class="form-control @error('tahun_masuk') is-invalid @enderror"
                            name="tahun_masuk" value="{{ $value->tahun_masuk }}" required autofocus>
                        @error('tahun_masuk')
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