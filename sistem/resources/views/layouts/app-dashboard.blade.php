<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(Auth::user()->level == 'admin')
    <title>Dashboard Admin</title>
    @endif

    @if(Auth::user()->level == 'guru')
    <title>Dashboard Guru</title>
    @endif

    @if(Auth::user()->level == 'kepsek')
    <title>Dashboard Kepala Sekolah</title>
    @endif

    @if(Auth::user()->level == 'siswa')
    <title>SIAKAD Siswa</title>
    @endif

    <link rel="icon" href="sistem/img/logo.png" type="image">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('sistem\css\style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2" style="margin-left: -130px;">
                <div class="sidebar">
                    <ul class="menu-content">
                        <img src="sistem/img/logo.png" alt="sekolah" style="width: 70px; margin-left: 30px;"
                            class="d-inline-block align-text-center" />
                        @if(Auth::user()->level == 'admin')
                        <a style="margin-top: 30px;" href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a>
                        <hr class="menu-separator">
                        <a href="{{url('/berita-admin')}}"><i class="far fa-newspaper"></i> Berita</a>
                        <hr class="menu-separator">
                        <a href="{{url('/adminuser')}}"><i class="fas fa-users"></i> Pengguna</a>
                        <hr class="menu-separator">
                        <a href="{{url('/guru')}}"><i class="fas fa-chalkboard-teacher"></i> Data Guru</a>
                        <hr class="menu-separator">
                        <a href="{{url('/siswa')}}"><i class="far fa-address-book"></i> Data Siswa</a>
                        <hr class="menu-separator">
                        <a href="{{url('/ruang')}}"><i class="fa fa-door-open"></i> Data Ruangan</a>
                        <hr class="menu-separator">
                        <a href="{{url('/mapel')}}"><i class="far fa-file-alt"></i> Data Mapel</a>
                        <hr class="menu-separator">
                        <a href="{{url('/kelas')}}"><i class="far fa-building"></i> Kelas</a>
                        <hr class="menu-separator">
                        <a href="{{url('/jadwal')}}"><i class="far fa-calendar-alt"></i> Jadwal</a>
                        <hr class="menu-separator">
                        <a href="{{url('/daftarhadir')}}"><i class="far fa-calendar-check"></i> Daftar Hadir</a>
                        <hr class="menu-separator">
                        <a href="{{url('/nilai')}}"><i class="far fa-file-alt"></i> Nilai</a>
                        <hr class="menu-separator">
                        @else
                        @endif

                        @if(Auth::user()->level == 'kepsek')
                        <a style="margin-top: 30px;" href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a>
                        <hr class="menu-separator">
                        <a href="{{url('/guru')}}"><i class="fas fa-chalkboard-teacher"></i> Data Guru</a>
                        <hr class="menu-separator">
                        <a href="{{url('/siswa')}}"><i class="far fa-address-book"></i> Data Siswa</a>
                        <hr class="menu-separator">
                        <a href="{{url('/ruang')}}"><i class="fa fa-door-open"></i> Data Ruangan</a>
                        <hr class="menu-separator">
                        <a href="{{url('/mapel')}}"><i class="far fa-file-alt"></i> Data Mapel</a>
                        <hr class="menu-separator">
                        <a href="{{url('/kelas')}}"><i class="far fa-building"></i> Kelas</a>
                        <hr class="menu-separator">
                        <a href="{{url('/jadwal')}}"><i class="far fa-calendar-alt"></i> Jadwal</a>
                        <hr class="menu-separator">
                        <a href="{{url('/daftarhadir')}}"><i class="far fa-calendar-check"></i> Daftar Hadir</a>
                        <hr class="menu-separator">
                        <a href="{{url('/nilai')}}"><i class="far fa-file-alt"></i> Nilai</a>
                        <hr class="menu-separator">
                        @else
                        @endif
                        @if(Auth::user()->level == 'guru')
                        <a style="margin-top: 30px;" href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a>
                        <hr class="menu-separator">
                        <a href="{{url('/siswa')}}"><i class="far fa-address-book"></i> Data Siswa</a>
                        <hr class="menu-separator">
                        <a href="{{url('/mapel')}}"><i class="far fa-file-alt"></i> Data Mapel</a>
                        <hr class="menu-separator">
                        <a href="{{url('/kelas')}}"><i class="far fa-building"></i> Kelas</a>
                        <hr class="menu-separator">
                        <a href="{{url('/jadwal')}}"><i class="far fa-calendar-alt"></i> Jadwal</a>
                        <hr class="menu-separator">
                        <a href="{{url('/daftarhadir')}}"><i class="far fa-calendar-check"></i> Daftar Hadir</a>
                        <hr class="menu-separator">
                        <a href="{{url('/nilai')}}"><i class="far fa-file-alt"></i> Nilai</a>
                        <hr class="menu-separator">
                        @else
                        @endif
                        @if(Auth::user()->level == 'siswa')
                        <a style="margin-top: 30px;" href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a>
                        <hr class="menu-separator">
                        <a href="{{url('/kelas')}}"><i class="far fa-building"></i> Kelas</a>
                        <hr class="menu-separator">
                        <a href="{{url('/jadwal')}}"><i class="far fa-calendar-alt"></i> Jadwal</a>
                        <hr class="menu-separator">
                        <a href="{{url('/daftarhadir')}}"><i class="far fa-calendar-check"></i> Daftar Hadir</a>
                        <hr class="menu-separator">
                        <a href="{{url('/nilai')}}"><i class="far fa-file-alt"></i> Nilai</a>
                        <hr class="menu-separator">
                        @else
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col" style="margin: 5px -110px 0 30px;">
                <nav class="navbar navbar-expand-md bg-body-tertiary shadow p-3 mb-5 rounded"
                    style="background-color: #135E69;">
                    <div class="container-fluid">
                        <a class="navbar-brand me-auto" href="#" style="margin: -15px 0 0 20px;">
                            <h4 style="color: white; font-weight: bold;">Dashboard</h4>
                        </a>
                    </div>
                    <div class="top_bar_content ms-auto">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="navarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                style="color: white; margin: 0px 20px 0 0;"><i class="fa fa-user"></i>
                                {{Auth::user()->username}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            </nav>
        </div>
    </div>
    </div>


    <!-- Page content -->
    <div class="content">
        @yield('content')
    </div>
</body>

</html>