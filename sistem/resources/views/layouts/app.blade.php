<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Website Resmi SD Negeri Grugu 03</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('sistem\resources\css\app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #EEEEEE">
        <div class="container col-md-12">
            <a class="navbar-brand" href="#" style="color: #135E69;">
                <img src="sistem/img/logo.png" alt="sekolah" width="30px" class="d-inline-block align-text-center" />
                <h4 style="font-weight: bold;">SD Negeri Grugu 03</h4>
            </a>
            <div class="top_bar_content">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a style="color: #135E69;" class="nav-link nav-text" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #135E69" class="nav-link nav-text" href="{{url('/berita')}}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #135E69" class="nav-link nav-text" href="#kontak">Kontak</a>
                        </li>
                        <li>
                            <div class="d-flex top_bar_user nav-text">
                                @if(Auth::guest())
                                <div style="margin-top: 8px;"><a class="btn btn-primary" href="{{ url('login') }}">
                                        SIAKAD</a>
                                </div>
                            </div>
                            @else
                        <li class="nav-item dropdown">
                            <a style="color: #135E69" class="nav-link dropdown-toggle nav-text" href="{{ url('/') }}" id="navarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                                {{Auth::user()->username}}
                            </a>
                            <ul style="background-color: #135E69" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a style="color: white; font-weight: bold;" class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="footer-container" id="kontak">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin: 50px 0 20px 70px;">
                        <h3 style="font-weight: bold;">Alamat Sekolah</h3>
                        <p>Dusun Ajibarang Rt 02 Rw 06, Kelurahan Grugu, Kecamatan Kawunganten, Kab. Cilacap, Provinsi
                            Jawa Tengah</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="margin: 50px 0 20px 70px;">
                        <h3 style="font-weight: bold;">Kontak</h3>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> Email: sdngrugu_03@yahoo.co.id</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> Telepon: 085743456381</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin: 10px 0 20px 70px;">
                    <h3 style="font-weight: bold;">Maps</h3>
                    <div class="map" style="margin-top: 20px;">
                        <div class="container-fluid">
                            <div class="map-responsive">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15816.591640350638!2d108.9110793!3d-7.6672428!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65737b034fbb4b%3A0x5abead3edcb48571!2sSD%20Negeri%20Grugu%2003!5e0!3m2!1sid!2sid!4v1685636724700!5m2!1sid!2sid"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12 text-center" style="border-top: 1px solid #ccc; padding-top: 20px; margin-top: 40px;">
                <p>&copy; 2023 SD Negeri Grugu 03. All rights reserved.</p>
                <p>Powered by Sistem Informasi 2020</p>
            </div>
        </div>
        </div>
    </footer>

</body>

</html>