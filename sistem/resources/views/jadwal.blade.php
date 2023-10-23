@extends('layouts.app-dashboard')
@extends('layouts.alert')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Data Jadwal KBM</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                @if(Auth::user()->level == 'admin')
                <button type="button" title="tambah data" class="btn btn-primary" data-toggle="modal"
                    data-target="#TambahDataJadwal"><i class="fa fa-plus"></i> Tambah Data Jadwal</button>
                @endif
                <a href="{{url('download-laporanjadwal')}}" target="_blank"><button class="btn btn-danger"><i
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
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Hari</th>
                    <th class="text-center">Jam Mulai</th>
                    <th class="text-center">Jam Selesai</th>
                    @if(Auth::user()->level == 'admin')
                    <th class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $no => $value)
                <tr>
                    <td align="center">{{$no+1}}</td>
                    <td align="center">{{$value->kelas->nama_kelas}}</td>
                    <td align="center">{{$value->ruang->nama_ruang}}</td>
                    <td align="center">{{$value->hari}}</td>
                    <td align="center">{{$value->mulai}}</td>
                    <td align="center">{{$value->selesai}}</td>
                    @if(Auth::user()->level == 'admin')
                    <td align="center">
                        <button type="button" title="Edit Data" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#UbahJadwal{{$value->kode_jadwal}}" style="margin: 5px;"><i
                                class="fa fa-edit"></i></button>
                        <a href="{{url($value->kode_jadwal.'/hapus-jadwal')}}">
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

@foreach($jadwal as $no => $value)
<div class="modal fade" id="TambahDataJadwal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data jadwal</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-jadwal')}}">
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
                            <label for="kode_ruang">{{ __('Ruangan') }}</label>
                            <select class="form-select" name="kode_ruang" id="kode_ruang"
                                value="{{ $value->kode_ruang }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Ruangan</option>
                                @foreach ($ruang as $data)
                                <option value="{{$data->kode_ruang}}">{{$data->nama_ruang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="hari">{{ __('Hari') }}</label>
                            <select name="hari" class="form-control @error('hari') is-invalid @enderror" name="hari"
                                value="{{ old('hari') }}" required autofocus>
                                <option value="">Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                            @error('hari')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="mulai">{{ __('Jam Mulai') }}</label>
                            <input id="mulai" type="time" class="form-control @error('mulai') is-invalid @enderror"
                                name="mulai" value="{{ old('mulai') }}" required autofocus>
                            @error('mulai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="selesai">{{ __('Jam Selesai') }}</label>
                            <input id="selesai" type="time" class="form-control @error('selesai') is-invalid @enderror"
                                name="selesai" value="{{ old('selesai') }}" required autofocus>
                            @error('selesai')
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

@foreach($jadwal as $no => $value)
<div class="modal fade" id="UbahJadwal{{$value->kode_jadwal}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data jadwal</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-jadwal/'.$value->kode_jadwal)}}">
                    @csrf
                    <div class="form-group row">
                        <div>
                            <label for="kode_kelas">{{ __('Kelas') }}</label>
                            <select class="form-select" name="kode_kelas" id="kode_kelas"
                                value="{{ $value->kode_kelas }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Mata Pelajaran</option>
                                @foreach ($kelas as $data)
                                <option value="{{$data->kode_kelas}}"
                                    {{$value && $data->kode_kelas == $value->kode_kelas ? 'selected' : ''}}>
                                    {{$data->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kode_ruang">{{ __('Ruangan') }}</label>
                            <select class="form-select" name="kode_ruang" id="kode_ruang"
                                value="{{ $value->kode_ruang }}" style="width: 100%; height: 35px; font-size: 13px;">
                                <option disble value>Pilihan Ruangan</option>
                                @foreach ($ruang as $data)
                                <option value="{{$data->kode_ruang}}"
                                    {{$value && $data->kode_ruangan == $value->kode_ruangan ? 'selected' : ''}}>
                                    {{$data->nama_ruang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="hari">{{ __('Hari') }}</label>
                            <select name="hari" class="form-control @error('hari') is-invalid @enderror" name="hari"
                            value="{{ $value->hari }}" required autofocus>
                                <option value="">Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                            @error('hari')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="mulai">{{ __('Jam Mulai') }}</label>
                            <input id="mulai" type="time" class="form-control @error('mulai') is-invalid @enderror"
                                name="mulai" value="{{ $value->mulai }}" required autofocus>
                            @error('mulai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="selesai">{{ __('Jam Selesai') }}</label>
                            <input id="selesai" type="time" class="form-control @error('selesai') is-invalid @enderror"
                                name="selesai" value="{{ $value->selesai }}" required autofocus>
                            @error('selesai')
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