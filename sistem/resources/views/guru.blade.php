@extends('layouts.app-dashboard')
@extends('layouts.alert')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Guru</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                @if(Auth::user()->level == 'admin')
                <button style="margin: 20px;" type="button" title="tambah data" class="btn btn-primary"
                    data-toggle="modal" data-target="#TambahDataGuru"><i class="fa fa-plus"></i> Tambah Data
                    Guru</button>
                @endif
                <a href="{{url('download-laporanguru')}}" target="_blank">
                    <button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
            <div>
                <form class="d-flex" style="float: right; margin-top: 20px; margin-right: 30px;" action="{{url('guru')}}" method="GET">
                    <input style="width: 200px" class="form-control me-2" type="text" name="search"
                        value="{{$request->search}}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-responsive table-striped table-hover table-bordered" style="margin: 10px;">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIP</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Agama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Jabatan Guru</th>
                    <th class="text-center">Jenis Guru</th>
                    <th class="text-center">Tugas Mengajar</th>
                    <th class="text-center">Keterangan</th>
                    @if(Auth::user()->level == 'admin')
                    <th class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no => $value)
                <tr>
                    <td align="center">{{$no+1}}</td>
                    <td>{{$value->nip}}</td>
                    <td>{{$value->nama_guru}}</td>
                    <td>{{$value->jenis_kelamin}}</td>
                    <td>{{$value->tempat_lahir}}</td>
                    <td>{{$value->tanggal_lahir}}</td>
                    <td align="center">{{$value->agama}}</td>
                    <td>{{$value->alamat}}</td>
                    <td>{{$value->jabatan_guru}}</td>
                    <td>{{$value->jenis_guru}}</td>
                    <td>{{$value->tugas_mengajar}}</td>
                    <td align="center">{{$value->keterangan}}</td>
                    @if(Auth::user()->level == 'admin')
                    <td align="center">
                        <button type="button" title="Edit Data" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#ModalUbah{{$value->kode_guru}}" style="margin: 5px;"><i
                                class="fa fa-edit"></i></button>
                        <a href="{{url($value->kode_guru.'/hapus-guru')}}">
                            <button title="Hapus Data" class="btn btn-danger btn-xs"><i
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
<!-- Modal -->
@foreach($data as $no => $value)
<div id="ModalUbah{{$value->kode_guru}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Guru</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-right: -300px;">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{url('update-guru/'.$value->kode_guru)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-14 col-xs-12">
                            <div class="form-group row">
                                <label for="nip" class="col-md-2 col-form-label text-md-end">{{ __('NIP') }}</label>
                                <div class="col-md-8">
                                    <input id="nip" type="text"
                                        class="form-control @error('nip') is-invalid @enderror" name="nip"
                                        value="{{ $value->nip }}" required autofocus>

                                    @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_guru"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Nama Guru') }}</label>
                                <div class="col-md-8">
                                    <input id="nama_guru" type="text"
                                        class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru"
                                        value="{{ $value->nama_guru }}" required>

                                    @error('nama_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelamin"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>
                                <div class="col-md-8">
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin"
                                        value="{{ $value->jenis_kelamin }}"
                                        style="width: 100%; height: 35px; font-size: 13px;">
                                        <option value="l">L</option>
                                        <option value="p">P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Tempat Lahir') }}</label>
                                <div class="col-md-8">
                                    <input id="tempat_lahir" type="text"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ $value->tempat_lahir }}" required>

                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>
                                <div class="col-md-8">
                                    <input id="tanggal_lahir" type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ $value->tanggal_lahir }}" required>

                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col-md-2 col-form-label text-md-end">{{ __('Agama') }}</label>
                                <div class="col-md-8">
                                    <select class="form-select" name="agama" id="agama" value="{{ $value->agama }}"
                                        style="width: 100%; height: 35px; font-size: 13px;">
                                        <option value="islam">Islam</option>
                                        <option value="kristen_protestan">Kristen Protestan</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Alamat') }}</label>
                                <div class="col-md-8">
                                    <input id="alamat" type="text"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        value="{{ $value->alamat }}" required>

                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan_guru"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Jabatan Guru') }}</label>
                                <div class="col-md-8">
                                    <input id="jabatan_guru" type="text"
                                        class="form-control @error('jabatan_guru') is-invalid @enderror"
                                        name="jabatan_guru" value="{{ $value->jabatan_guru }}" required>

                                    @error('jabatan_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_guru"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Jenis Guru') }}</label>
                                <div class="col-md-8">
                                    <input id="jenis_guru" type="text"
                                        class="form-control @error('jenis_guru') is-invalid @enderror" name="jenis_guru"
                                        value="{{ $value->jenis_guru }}" required>

                                    @error('jenis_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tugas_mengajar"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Tugas Mengajar') }}</label>
                                <div class="col-md-8">
                                    <input id="tugas_mengajar" type="text"
                                        class="form-control @error('tugas_mengajar') is-invalid @enderror"
                                        name="tugas_mengajar" value="{{ $value->tugas_mengajar }}" required>

                                    @error('tugas_mengajar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Keterangan') }}</label>
                                <div class="col-md-8">
                                    <input id="keterangan" type="text"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        value="{{ $value->keterangan }}" required>

                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-end"></label>
                                <div class="col-md-8">
                                    <button class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<div id="TambahDataGuru" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Guru</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-right: -300px;">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('simpan-data-guru')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group row">
                                <label for="nip" class="col-md-2 col-form-label text-md-end">{{ __('NIP') }}</label>
                                <div class="col-md-6">
                                    <input id="nip" type="number"
                                        class="form-control @error('nip') is-invalid @enderror" name="nip"
                                        value="{{ old('nip') }}" required autofocus>

                                    @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_guru"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Nama Guru') }}</label>
                                <div class="col-md-6">
                                    <input id="nama_guru" type="text"
                                        class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru"
                                        value="{{ old('nama_guru') }}" required>

                                    @error('nama_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelamin"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin"
                                        style="width: 100%; height: 35px; font-size: 13px;">
                                        <option value="l">L</option>
                                        <option value="p">P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Tempat Lahir') }}</label>
                                <div class="col-md-6">
                                    <input id="tempat_lahir" type="text"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>

                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>
                                <div class="col-md-6">
                                    <input id="tanggal_lahir" type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>

                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col-md-2 col-form-label text-md-end">{{ __('Agama') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="agama" id="agama"
                                        style="width: 100%; height: 35px; font-size: 13px;">
                                        <option value="islam">Islam</option>
                                        <option value="kristen_protestan">Kristen Protestan</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Alamat') }}</label>
                                <div class="col-md-6">
                                    <input id="alamat" type="text"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        value="{{ old('alamat') }}" required>

                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan_guru"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Jabatan Guru') }}</label>
                                <div class="col-md-6">
                                    <input id="jabatan_guru" type="text"
                                        class="form-control @error('jabatan_guru') is-invalid @enderror"
                                        name="jabatan_guru" value="{{ old('jabatan_guru') }}" required>

                                    @error('jabatan_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_guru"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Jenis Guru') }}</label>
                                <div class="col-md-6">
                                    <input id="jenis_guru" type="text"
                                        class="form-control @error('jenis_guru') is-invalid @enderror" name="jenis_guru"
                                        value="{{ old('jenis_guru') }}" required>

                                    @error('jenis_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tugas_mengajar"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Tugas Mengajar') }}</label>
                                <div class="col-md-6">
                                    <input id="tugas_mengajar" type="text"
                                        class="form-control @error('tugas_mengajar') is-invalid @enderror"
                                        name="tugas_mengajar" value="{{ old('tugas_mengajar') }}" required>

                                    @error('tugas_mengajar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Keterangan') }}</label>
                                <div class="col-md-6">
                                    <input id="keterangan" type="text"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        value="{{ old('keterangan') }}" required>

                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-end"></label>
                                <div class="col-md-8">
                                    <button class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
window.onload = function() {
    if (!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>
@endsection