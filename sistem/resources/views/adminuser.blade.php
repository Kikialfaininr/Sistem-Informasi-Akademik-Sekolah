@extends('layouts.app-dashboard')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Pengguna Sistem Informasi Akdemik</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                <button style="margin: 20px;" type="button" title="tambah data" class="btn btn-primary"
                    data-toggle="modal" data-target="#TambahDataPengguna"><i class="fa fa-plus"></i> Tambah Data
                    Pengguna</button>
                <a href="{{url('download-laporanpengguna')}}" target="_blank">
                    <button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
        </div>
        <div class="table-responsive" style="width: 97%; margin-left: 15px;">
            <table class="table table-responsive table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pengguna</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminuser as $no => $value)
                    <tr>
                        <td align="center">{{$no+1}}</td>
                        <td align="center">
                            {{ isset($value->guru->nama_guru) ? $value->guru->nama_guru : optional($value->siswa)->nama_siswa }}
                        </td>
                        <td align="center">{{$value->name}}</td>
                        <td align="center">{{$value->level}}</td>
                        <td align="center">{{$value->username}}</td>
                        <td align="center">{{$value->kata_sandi}}</td>
                        <td align="center">
                            <button type="button" title="Edit Data" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#UbahPengguna{{$value->id}}"><i class="fa fa-edit"></i></button>
                            <a href="{{url($value->id.'/hapus-adminuser')}}">
                                <button title="hapus data" class="btn btn-danger btn-xs"><i
                                        class="fa fa-remove"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($adminuser as $no => $value)
<div class="modal fade" id="UbahPengguna{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Pengguna</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-adminuser/'.$value->id)}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_guru">{{ __('Nama Guru') }}</label>
                            <select class="form-select" name="kode_guru" id="kode_guru" value="{{ $value->kode_guru }}"
                                style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Guru</option>
                                @foreach ($guru as $data)
                                <option value="{{$data->kode_guru}}" {{$value && $data->kode_guru == $value->kode_guru ? 'selected' : ''}}>{{$data->nama_guru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_siswa">{{ __('Nama Siswa') }}</label>
                            <select class="form-select" name="kode_siswa" id="kode_siswa"
                                value="{{ $value->kode_siswa }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Siswa</option>
                                @foreach ($siswa as $data)
                                <option value="{{$data->kode_siswa}}" {{$value && $data->kode_siswa == $value->kode_siswa ? 'selected' : ''}}>{{$data->nama_siswa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="name">{{ __('Status') }}</label>
                            <select name="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $value->name }}" required autofocus>
                                <option value="">Pilih Status</option>
                                <option value="admin">Admin</option>
                                <option value="kepsek">Kepala Sekolah</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ $value->username }}" required autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="level">{{ __('Level') }}</label>
                            <select name="level" class="form-control @error('level') is-invalid @enderror" name="level"
                                value="{{ $value->level }}" required autofocus>
                                <option value="">Pilih Level Pengguna</option>
                                <option value="admin">Admin</option>
                                <option value="kepsek">Kepala Sekolah</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="text"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ $value->password }}" required autofocus>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="kata_sandi">{{ __('Ulangi Password') }}</label>
                            <input id="kata_sandi" type="text"
                                class="form-control @error('kata_sandi') is-invalid @enderror" name="kata_sandi"
                                value="{{ $value->kata_sandi }}" required autofocus>
                            @error('kata_sandi')
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($adminuser as $no => $value)
<div class="modal fade" id="TambahDataPengguna" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pengguna</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-adminuser')}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_guru">{{ __('Nama Guru') }}</label>
                            <select class="form-select" name="kode_guru" id="kode_guru" value="{{ old('kode_guru') }}"
                                style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Guru</option>
                                @foreach ($guru as $data)
                                <option value="{{$data->kode_guru}}">{{$data->nama_guru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_siswa">{{ __('Nama Siswa') }}</label>
                            <select class="form-select" name="kode_siswa" id="kode_siswa"
                            value="{{ old('kode_siswa') }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Siswa</option>
                                @foreach ($siswa as $data)
                                <option value="{{$data->kode_siswa}}">{{$data->nama_siswa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="name">{{ __('Status') }}</label>
                            <select name="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autofocus>
                                <option value="">Pilih Status</option>
                                <option value="admin">Admin</option>
                                <option value="kepsek">Kepala Sekolah</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="level">{{ __('Level') }}</label>
                            <select name="level" class="form-control @error('level') is-invalid @enderror" name="level"
                                value="{{ old('level') }}" required autofocus>
                                <option value="">Pilih Level</option>
                                <option value="admin">Admin</option>
                                <option value="kepsek">Kepala Sekolah</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" required autofocus>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="kata_sandi">{{ __('Ulangi Password') }}</label>
                            <input id="kata_sandi" type="kata_sandi"
                                class="form-control @error('kata_sandi') is-invalid @enderror" name="kata_sandi"
                                value="{{ old('kata_sandi') }}" required autofocus>
                            @error('kata_sandi')
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