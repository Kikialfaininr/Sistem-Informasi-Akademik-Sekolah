@extends('layouts.app-dashboard')
@extends('layouts.alert')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Daftar Hadir Siswa</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                @if(Auth::user()->level == 'admin')
                <button type="button" title="tambah data" class="btn btn-primary" data-toggle="modal"
                    data-target="#TambahDataDH"><i class="fa fa-plus"></i> Tambah Data Daftar Hadir</button>
                @endif
                <a href="{{url('download-laporandaftarhadir')}}" target="_blank"><button class="btn btn-danger"><i
                            class="fa fa-file-pdf-o"></i> Cetak</button>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive" style="margin: 10px;">
        <table class="table table-responsive table-striped table-hover table-bordered">
            <thead>
                <tr>
                    @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru' || Auth::user()->level == 'kepsek')
                    <th class="text-center">No</th>
                    @endif
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Status Kehadiran</th>
                    @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                    <th class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($daftarhadir as $no => $value)
                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru' || Auth::user()->level == 'kepsek')
                <tr>
                    <td align="center">{{$no+1}}</td>
                    <td align="center">{{$value->kelas->nama_kelas}}</td>
                    <td align="center">{{$value->siswa->nama_siswa}}</td>
                    <td align="center">{{$value->tanggal}}</td>
                    <td align="center">{{$value->status_kehadiran}}</td>
                @endif
                    @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                    <td align="center">
                        <button type="button" title="Edit Data" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#UbahDaftarHadir{{$value->kode_dh}}" style="margin: 5px;"><i
                                class="fa fa-edit"></i></button>
                        <a href="{{url($value->kode_dh.'/hapus-daftarhadir')}}">
                            <button title="Hapus Data" class="btn btn-danger btn-xs"><i
                                    class="fa fa-remove"></i></button>
                        </a>
                    </td>
                    @endif
                </tr>
                @if(Auth::user()->level == 'siswa')
                @if($value->kode_siswa == Auth::user()->kode_siswa)
                <tr>
                    <td align="center">{{$value->kelas->nama_kelas}}</td>
                    <td align="center">{{$value->siswa->nama_siswa}}</td>
                    <td align="center">{{$value->tanggal}}</td>
                    <td align="center">{{$value->status_kehadiran}}</td>
                </tr>
                @endif
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach($daftarhadir as $no => $value)
<div class="modal fade" id="TambahDataDH" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Daftar Hadir</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-daftarhadir')}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_kelas">{{ __('Kelas') }}</label>
                            <select class="form-select" name="kode_kelas" id="kode_kelas"
                                value="{{ $value->kode_kelas }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Kelas</option>
                                @foreach ($kelas as $data)
                                <option value="{{$data->kode_kelas}}">{{$data->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_siswa">{{ __('Nama Siswa') }}</label>
                            <select class="form-select" name="kode_siswa" id="kode_siswa"
                                value="{{ $value->kode_siswa }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Nama Siswa</option>
                                @foreach ($siswa as $data)
                                <option value="{{$data->kode_siswa}}">{{$data->nama_siswa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tanggal">{{ __('Tanggal') }}</label>
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                name="tanggal" value="{{ old('tanggal') }}" required autofocus>
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="status_kehadiran">{{ __('Status Kehadiran') }}</label>
                            <div>
                                <input id="hadir" type="radio" name="status_kehadiran" value="Hadir"
                                    {{ $value->status_kehadiran === 'Hadir' ? 'checked' : '' }}>
                                <label for="hadir">Hadir</label>
                            </div>
                            <div>
                                <input id="ijin" type="radio" name="status_kehadiran" value="Ijin"
                                    {{ $value->status_kehadiran === 'Ijin' ? 'checked' : '' }}>
                                <label for="ijin">Ijin</label>
                            </div>
                            <div>
                                <input id="sakit" type="radio" name="status_kehadiran" value="Sakit"
                                    {{ $value->status_kehadiran === 'Sakit' ? 'checked' : '' }}>
                                <label for="sakit">Sakit</label>
                            </div>
                            <div>
                                <input id="terlambat" type="radio" name="status_kehadiran" value="Terlambat"
                                    {{ $value->status_kehadiran === 'Terlambat' ? 'checked' : '' }}>
                                <label for="terlambat">Terlambat</label>
                            </div>
                            <div>
                                <input id="alpa" type="radio" name="status_kehadiran" value="Alpa"
                                    {{ $value->status_kehadiran === 'Alpa' ? 'checked' : '' }}>
                                <label for="alpa">Alpa</label>
                            </div>
                            @error('status_kehadiran')
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

@foreach($daftarhadir as $no => $value)
<div class="modal fade" id="UbahDaftarHadir{{$value->kode_dh}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data daftarhadir</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-daftarhadir/'.$value->kode_dh)}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_kelas">{{ __('Kelas') }}</label>
                            <select class="form-select" name="kode_kelas" id="kode_kelas"
                                value="{{ $value->kode_kelas }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option>Pilihan Mata Pelajaran</option>
                                @foreach ($kelas as $data)
                                <option value="{{$data->kode_kelas}}" {{$value && $data->kode_kelas == $value->kode_kelas ? 'selected' : ''}}>{{$data->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_siswa">{{ __('Nama Siswa') }}</label>
                            <select class="form-select" name="kode_siswa" id="kode_siswa"
                                value="{{ $value->kode_siswa }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option>Pilihan Nama Siswa</option>
                                @foreach ($siswa as $data)
                                <option value="{{$data->kode_siswa}}" {{$value && $data->kode_siswa == $value->kode_siswa ? 'selected' : ''}}>{{$data->nama_siswa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tanggal">{{ __('Tanggal') }}</label>
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                name="tanggal" value="{{ $value->tanggal }}" required autofocus>
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="status_kehadiran">{{ __('Status Kehadiran') }}</label>
                            <div>
                                <input id="hadir" type="radio" name="status_kehadiran" value="Hadir"
                                    {{ $value->status_kehadiran === 'Hadir' ? 'checked' : '' }}>
                                <label for="hadir">Hadir</label>
                            </div>
                            <div>
                                <input id="ijin" type="radio" name="status_kehadiran" value="Ijin"
                                    {{ $value->status_kehadiran === 'Ijin' ? 'checked' : '' }}>
                                <label for="ijin">Ijin</label>
                            </div>
                            <div>
                                <input id="sakit" type="radio" name="status_kehadiran" value="Sakit"
                                    {{ $value->status_kehadiran === 'Sakit' ? 'checked' : '' }}>
                                <label for="sakit">Sakit</label>
                            </div>
                            <div>
                                <input id="terlambat" type="radio" name="status_kehadiran" value="Terlambat"
                                    {{ $value->status_kehadiran === 'Terlambat' ? 'checked' : '' }}>
                                <label for="terlambat">Terlambat</label>
                            </div>
                            <div>
                                <input id="alpa" type="radio" name="status_kehadiran" value="Alpa"
                                    {{ $value->status_kehadiran === 'Alpa' ? 'checked' : '' }}>
                                <label for="alpa">Alpa</label>
                            </div>
                            @error('status_kehadiran')
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