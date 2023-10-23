@extends('layouts.app-dashboard')
@extends('layouts.alert')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Kelas</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                @if(Auth::user()->level == 'admin')
                <button type="button" title="tambah data" class="btn btn-primary" data-toggle="modal"
                    data-target="#TambahDataKelas"><i class="fa fa-plus"></i> Tambah Data Kelas</button>
                @endif
                <a href="{{url('download-laporankelas')}}" target="_blank"><button class="btn btn-danger"><i
                            class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive" style="margin: 10px;">
        <table class="table table-responsive table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Guru Pengampu</th>
                    <th class="text-center">Nama Kelas</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Tahun Ajaran</th>
                    @if(Auth::user()->level == 'admin')
                    <th class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $no => $value)
                <tr>
                    <td align="center">{{$no+1}}</td>
                    <td align="center">{{$value->mapel->nama_mapel}}</td>
                    <td align="center">{{$value->guru->nama_guru}}</td>
                    <td align="center">{{$value->nama_kelas}}</td>
                    <td align="center">{{$value->kategori}}</td>
                    <td align="center">{{$value->tahun_ajaran}}</td>
                    @if(Auth::user()->level == 'admin')
                    <td align="center">
                        <button type="button" title="Edit Data" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#UbahKelas{{$value->kode_kelas}}" style="margin: 5px;"><i
                                class="fa fa-edit"></i></button>
                        <a href="{{url($value->kode_kelas.'/hapus-kelas')}}">
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

@foreach($kelas as $no => $value)
<div class="modal fade" id="TambahDataKelas" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kelas</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-kelas')}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_mapel">{{ __('Mata Pelajaran') }}</label>
                            <select class="form-select" name="kode_mapel" id="kode_mapel"
                                value="{{ $value->kode_mapel }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Mata Pelajaran</option>
                                @foreach ($mapel as $data)
                                <option value="{{$data->kode_mapel}}">{{$data->nama_mapel}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_guru">{{ __('Guru Pengampu') }}</label>
                            <select class="form-select" name="kode_guru" id="kode_guru" value="{{ $value->kode_guru }}"
                                style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Guru Pengampu</option>
                                @foreach ($guru as $data)
                                <option value="{{$data->kode_guru}}">{{$data->nama_guru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="nama_kelas">{{ __('Nama Kelas') }}</label>
                            <input id="nama_kelas" type="text"
                                class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas"
                                value="{{ old('nama_kelas') }}" required autofocus>
                            @error('nama_kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="kategori">{{ __('Kategori Kelas') }}</label>
                            <input id="kategori" type="text"
                                class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                value="{{ old('kategori') }}" required autofocus>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="tahun_ajaran">{{ __('Tahun Ajaran') }}</label>
                            <input id="tahun_ajaran" type="text"
                                class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran"
                                value="{{ old('tahun_ajaran') }}" required autofocus>
                            @error('tahun_ajaran')
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

@foreach($kelas as $no => $value)
<div class="modal fade" id="UbahKelas{{$value->kode_kelas}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Kelas</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-kelas/'.$value->kode_kelas)}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_mapel">{{ __('Mata Pelajaran') }}</label>
                            <select class="form-select" name="kode_mapel" id="kode_mapel"
                                value="{{ $value->kode_mapel }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Mata Pelajaran</option>
                                @foreach ($mapel as $data)
                                <option value="{{$data->kode_mapel}}">{{$data->nama_mapel}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_guru">{{ __('Guru Pengampu') }}</label>
                            <select class="form-select" name="kode_guru" id="kode_guru" value="{{ $value->kode_guru }}"
                                style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Guru Pengampu</option>
                                @foreach ($guru as $data)
                                <option value="{{$data->kode_guru}}">{{$data->nama_guru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="nama_kelas">{{ __('Nama Kelas') }}</label>
                            <input id="nama_kelas" type="text"
                                class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas"
                                value="{{ $value->nama_kelas }}" required autofocus>
                            @error('nama_kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="kategori">{{ __('Kategori Kelas') }}</label>
                            <input id="kategori" type="text"
                                class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                value="{{ $value->kategori }}" required autofocus>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="tahun_ajaran">{{ __('Tahun Ajaran') }}</label>
                            <input id="tahun_ajaran" type="text"
                                class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran"
                                value="{{ $value->tahun_ajaran }}" required autofocus>
                            @error('tahun_ajaran')
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


<script>
window.onload = function() {
    if (!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>

@endsection