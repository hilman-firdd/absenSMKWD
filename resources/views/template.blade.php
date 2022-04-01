<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
    <script nonce="9dd4fb4c-e0a0-4b9c-b897-c07129cb3314">
        (function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);
    </script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/guru" class="navbar-brand">
                    <img src="{{ asset('adminlte/dist/img/logo.png')}}" alt="AdminLTE Logo"
                        class="brand-image img-circle" style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>Absensi</b></span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->is('guru') ? 'active' : '' }}">
                            <a href="/guru" class="nav-link"><i class="fa-solid fa-elevator"></i> Data Guru</a>
                        </li>

                        <li class="nav-item {{ request()->is('setting') ? 'active' : '' }}">
                            <a href="/setting" class="nav-link"><i class="fa-solid fa-gears"></i>
                                Pengaturan</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle"><i
                                    class="fas fa-calendar-day"></i> Modul Kehadiran & Lembur</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li class="nav-item {{ request()->is('kehadiran') ? 'active' : '' }}">
                                    <a href="/kehadiran" class="nav-link"><i class="fas fa-calendar-day"></i>
                                        Kehadiran</a>
                                </li>
                                <li class="nav-item {{ request()->is('kehadiran') ? 'active' : '' }}">
                                    <a href="/lembur" class="nav-link"><i class="fas fa-calendar-day"></i>
                                        lembur</a>
                                </li>
                                <li class="nav-item {{ request()->is('polakerja') ? 'active' : '' }}">
                                    <a href="/polakerja" class="nav-link"><i class="fa-solid fa-gears"></i>
                                        Pola Kerja</a>
                                </li>
                                <li class="nav-item {{ request()->is('kelompokkerja') ? 'active' : '' }}">
                                    <a href="/kelompokkerja" class="nav-link"><i class="fa-solid fa-gears"></i>
                                        K. Kerja</a>
                                </li>
                                <li class="nav-item {{ request()->is('kalenderKerja') ? 'active' : '' }}">
                                    <a href="/kalenderKerja" class="nav-link"><i class="fa-solid fa-calendar-days"></i>
                                        Kalender Kerja</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle"><i
                                    class="fa-solid fa-bars-staggered"></i> Modul Data Master</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li class="nav-item  {{ request()->is('departemen') ? 'active' : '' }}">
                                    <a href="/departemen" class="nav-link"><i class="fa-solid fa-building-columns"></i>
                                        Departemen</a>
                                </li>
                                <li class="nav-item {{ request()->is('jabatan') ? 'active' : '' }}">
                                    <a href="/jabatan" class="nav-link"><i class="fa-solid fa-address-card"></i>
                                        Jabatan</a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle"><i
                                    class="fa-solid fa-bars-staggered"></i> Gaji Guru</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li class="nav-item  {{ request()->is('laporangaji') ? 'active' : '' }}">
                                    <a href="/laporangaji" class="nav-link"><i class="fa-solid fa-building-columns"></i>
                                        Laporan Gaji</a>
                                </li>
                                <li class="nav-item  {{ request()->is('komponengaji') ? 'active' : '' }}">
                                    <a href="/komponengaji" class="nav-link"><i
                                            class="fa-solid fa-building-columns"></i>
                                        Komponen Gaji</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                <img src="{{ asset('') }}" alt="">
                                <span class="hidden-xs">Hai, User {{ Auth::user()->name }}</span>
                            </a>
                        </li>
                    </ul>



                </div>
            </div>
        </nav>
        <aside class="control-sidebar control-sidebar-dark" style="display: block;">

            <div class="p-3 control-sidebar-content" style="">
                <h5>Customize AdminLTE</h5>
                <hr class="mb-2">
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </aside>


        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                @yield('title')
                            </div>
                            <div class="card-body overflow-auto">
                                @yield('content')
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="https://hilfideveloper.com">hilfideveloper.com</a>.</strong> All
            rights
            reserved.
        </footer>
    </div>



    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('adminlte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>



    @stack('script')

</body>

</html>