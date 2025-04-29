<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ secure_asset('img/jjj.jpg') }}">

    <title>intranusa.id</title>

    <!-- Custom CSS -->
    <link href="{{ secure_asset('assets1/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets1/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets1/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />

    <!-- Custom Style -->
    <link href="{{  secure_asset('dist/css/style.min.css') }}" rel="stylesheet">

    <style type="text/css">
        .elegant-alert {
            background: #fdfdfd;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        .alert-title {
            font-size: 1.8rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .alert-description {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .btn-elegant {
            background: #4a90e2;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .btn-elegant:hover {
            background: #3b78c0;
            color: #fff;
        }

        /* Modal Styles */
        .logout-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeIn 0.3s ease-in-out;
        }

        .logout-modal-content {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.3s ease-out;
        }

        .logout-modal-header h3 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #333;
        }

        .logout-modal-body p {
            margin-bottom: 20px;
            font-size: 1rem;
            color: #666;
        }

        .logout-modal-footer {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .logout-btn, .cancel-btn {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .cancel-btn {
            background-color: #95a5a6;
            color: white;
        }

        .cancel-btn:hover {
            background-color: #7f8c8d;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
            }
            to {
                transform: translateY(0);
            }
        }
    </style>
</head>


<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>

                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <img src="{{ secure_asset('assets1/images/usstwo.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ secure_asset('assets1/images/usstwo.png') }}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- Dark Logo text -->
            <img src="{{ secure_asset('assets1/images/gege.png') }}" alt="homepage" class="dark-logo" />
            <!-- Light Logo text -->
            <img src="{{ secure_asset('assets1/images/gege.png') }}" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                        data-feather="calendar" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                        a reminder that you have event</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="settings" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                        can customize this template
                                                        as you want</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>

                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <!-- Tampilkan Foto Profil -->

                                    @if(auth()->user()->profile_picture)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile" className=" rounded-full object-cover" width="40"
                                    >
                                @else
                                    <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-gray-600">No Image</span>
                                    </div>
                                @endif
                                <span class="ml-2 d-none d-lg-inline-block">
                                    <span>Hello,</span>
                                    <span class="text-dark">{{ Auth::user()->username ?? 'Guest' }}</span>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{ route('user.edit') }}">
                                    <i data-feather="user" class="svg-icon mr-2 ml-1"></i> Profil saya
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i data-feather="mail" class="svg-icon mr-2 ml-1"></i> Berhenti berlangganan
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="power" class="svg-icon mr-2 ml-1"></i> Keluar
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                                </form>

                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-info">View Profile</a>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="history" aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">History Pembayaran
                                </span></a>
                        </li>
                        <li class="sidebar-item">
    <a class="sidebar-link sidebar-link" href="#" onclick="openLogoutModal()">
        <i data-feather="log-out" class="feather-icon"></i>
        <span class="hide-menu">Keluar</span>
    </a>
</li>

<!-- Logout Modal -->
<div id="logoutModal" class="logout-modal">
    <div class="logout-modal-content">
        <div class="logout-modal-header">
            <h3>Konfirmasi Logout</h3>
        </div>
        <div class="logout-modal-body">
            <p>Apakah Anda yakin ingin keluar?</p>
        </div>
        <div class="logout-modal-footer">
            <button class="cancel-btn" onclick="closeLogoutModal()">Batal</button>
            <a href="http://localhost/intranusa/user%20on/login.php" class="logout-btn">Keluar</a>
        </div>
    </div>
</div>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                            Halo, selamat datang  {{ Auth::user()->username }}👋
                </h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>


            </div>
         <div class="container-fluid">
    <div class="card-group">
         <!-- Status Langganan -->
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <span class="text-dark">{{ Auth::user()->status_langganan ?? 'Tidak aktif' }}</span>
                                {{-- {{  Auth::user()->status_langganan === 'Aktif' ? 'check-circle' : 'alert-circle' }} --}}

                            </h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Status langganan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted">
                            <i data-feather="{{ Auth::user()->status_langganan === 'Aktif' ? 'check-circle' : 'alert-circle' }}"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        @if (Auth::user()->status_langganan === 'Aktif')
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                Langganan Aktif
                            </h2>
                        @elseif (Auth::user()->status_langganan === 'Disetujui')
                            <h2 class="text-warning mb-1 w-100 text-truncate font-weight-medium">
                                Disetujui - Silakan lakukan pembayaran
                            </h2>
                            <a href="{{ route('bayar.langganan') }}" class="btn btn-primary btn-sm mt-2">Bayar Sekarang</a>
                        @else
                            <h2 class="text-secondary mb-1 w-100 text-truncate font-weight-medium">
                                Status: {{ Auth::user()->status_langganan ?? 'Belum mendaftar' }}
                            </h2>
                        @endif
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Paket berlangganan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="wifi"></i></span>
                    </div>
                </div>
            </div>
        </div> --}}


        <!-- Paket Berlangganan -->
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                            {{-- {{Auth::user()->status_langganan === 'Aktif'}} --}}
                            {{ Auth::user()->pelanggan && Auth::user()->pelanggan->paket ? Auth::user()->pelanggan->paket->nama_paket : 'Paket tidak tersedia' }}
                        </h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Paket berlangganan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted">
                                    {{-- {{ Auth::user()->pelanggan && Auth::user()->pelanggan->paket ? Auth::user()->pelanggan->paket->nama_paket : 'Paket tidak tersedia' }} --}}
                                    <i data-feather="wifi"></i>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mulai Berlangganan -->
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">
                                {{ Auth::user()->pelanggan ? Auth::user()->pelanggan->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}

                            </h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Mulai berlangganan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted">

                            <i data-feather="calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Jika Belum Berlangganan -->
{{-- @if (Auth::check())

    @if (strtolower(Auth::user()->status_langganan) === 'Tidak Aktif')
        <div class="alert alert-warning mt-4 elegant-alert">
            <h4 class="alert-title">Belum Berlangganan</h4>
            <p class="alert-description">
                Untuk mengaktifkan layanan kami, Anda perlu mendaftar paket berlangganan terlebih dahulu.
                Klik tombol di bawah untuk memulai perjalanan Anda bersama kami.
            </p>
            <a href="{{ url('/daftar/lokasi') }}" class="btn btn-secondary">Daftar Sekarang</a>
        </div>
    @endif

    @if (strtolower(Auth::user()->status_langganan) === 'Aktif')
        <div class="alert alert-success mt-4">
            <h4>Selamat!</h4>
            <p>
                Anda sudah berlangganan paket <strong></strong> sejak .
            </p>
        </div>
    @endif
@else
    <p>Anda belum login.</p>
@endif --}}

@if (Auth::check())

    @if (strtolower(trim(Auth::user()->status_langganan)) === 'tidak aktif')
        <div class="alert alert-warning mt-4 elegant-alert">
            <h4 class="alert-title">Belum Berlangganan</h4>
            <p class="alert-description">
                Untuk mengaktifkan layanan kami, Anda perlu mendaftar paket berlangganan terlebih dahulu.
                Klik tombol di bawah untuk memulai perjalanan Anda bersama kami.
            </p>
            <a href="{{ route('user.form.lokasi') }}" class="btn btn-secondary">Daftar Sekarang</a>
        </div>

    @elseif (strtolower(trim(Auth::user()->status_langganan)) === 'pending')
        <div class="alert alert-info mt-4">
            <h4 class="alert-title">Menunggu Persetujuan</h4>
            <p class="alert-description">
                Pendaftaran paket berlangganan Anda sedang diproses. Mohon tunggu hingga admin menyetujui permohonan Anda.
                Anda akan menerima notifikasi setelah langganan Anda aktif.
            </p>
        </div>

    @elseif (strtolower(trim(Auth::user()->status_langganan)) === 'aktif')
        <div class="alert alert-success mt-4">
            <h4>Selamat!</h4>
            <p>
                Anda sudah berlangganan paket <strong></strong> sejak .
            </p>
        </div>

        <div class="row">
            <!-- Tagihan Bulanan -->
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tagihan Bulanan</h4>
                        <div class="mt-2" style="height:100px; width:100%; text-align: center;">
                            <h2 class="text-dark font-weight-medium">Lunas</h2>
                            <span class="text-muted">Status Pembayaran</span>
                        </div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Paket Langganan</span>
                                <span class="text-dark float-right font-weight-medium"></span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Total Biaya Bulanan</span>
                                <span class="text-dark float-right font-weight-medium"></span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                <span class="text-muted">Pembayaran Terakhir</span>
                                <span class="text-dark float-right font-weight-medium"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

@else
    <p>Anda belum login.</p>
@endif




@if (Auth::check())

    @php
        $status = strtolower(trim(Auth::user()->pelanggan->status_langganan ?? ''));
    @endphp

    @if ($status === 'Tidak aktif')
        <div class="alert alert-warning mt-4 elegant-alert">
            <h4 class="alert-title">Belum Berlangganan</h4>
            <p class="alert-description">
                Untuk mengaktifkan layanan kami, Anda perlu mendaftar paket berlangganan terlebih dahulu.
                Klik tombol di bawah untuk memulai perjalanan Anda bersama kami.
            </p>
            <a href="{{ route('user.form.lokasi') }}" class="btn btn-secondary">Daftar Sekarang</a>
        </div>

    @elseif ($status === 'pending')
        <div class="alert alert-info mt-4">
            <h4 class="alert-title">Menunggu Persetujuan</h4>
            <p class="alert-description">
                Pendaftaran paket berlangganan Anda sedang diproses. Mohon tunggu hingga admin menyetujui permohonan Anda.
                Anda akan menerima notifikasi setelah langganan Anda aktif.
            </p>
        </div>

    @elseif ($status === 'disetujui')
        <div class="alert alert-warning mt-4">
            <h4 class="alert-title">Tagihan Belum Dibayar</h4>
            <p class="alert-description">
                Permohonan Anda telah disetujui. Silakan selesaikan pembayaran terlebih dahulu untuk mengaktifkan langganan Anda.
            </p>
        </div>

        <div class="row">
            <!-- Card Tagihan -->
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tagihan Awal</h4>
                        <div class="mt-2" style="height:100px; width:100%; text-align: center;">
                            <h2 class="text-dark font-weight-medium">Belum Dibayar</h2>
                            <span class="text-muted">Status Pembayaran</span>
                        </div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Paket Langganan</span>
                                <span class="text-dark float-right font-weight-medium">
                                    {{ Auth::user()->pelanggan && Auth::user()->pelanggan->paket ? Auth::user()->pelanggan->paket->nama_paket : 'Paket tidak tersedia' }}
                                </span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Total Biaya</span>
                                <span class="text-dark float-right font-weight-medium">
                                    Rp{{ Auth::user()->pelanggan && Auth::user()->pelanggan->paket ? number_format(Auth::user()->pelanggan->paket->harga, 0, ',', '.') : 'Biaya tidak tersedia' }}
                                </span>
                            </li>
                        </ul>

                        <!-- Link ke halaman pembayaran -->
                        <div class="text-center mt-4">
                            <a href="{{ route('user.payment', Auth::user()->id) }}" class="btn btn-success">Bayar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif ($status === 'aktif')
        <div class="alert alert-success mt-4">
            <h4>Selamat!</h4>
            <p>
                Anda sudah berlangganan paket <strong>{{ Auth::user()->pelanggan->paket->nama_paket ?? '-' }}</strong> sejak {{ Auth::user()->pelanggan->tanggal_aktif ?? '-' }}.
            </p>
        </div>

        <div class="row">
            <!-- Tagihan Bulanan -->
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tagihan Bulanan</h4>
                        <div class="mt-2" style="height:100px; width:100%; text-align: center;">
                            <h2 class="text-dark font-weight-medium">Lunas</h2>
                            <span class="text-muted">Status Pembayaran</span>
                        </div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Paket Langganan</span>
                                <span class="text-dark float-right font-weight-medium">
                                    {{ Auth::user()->pelanggan->paket->nama_paket ?? '-' }}
                                </span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Total Biaya Bulanan</span>
                                <span class="text-dark float-right font-weight-medium">
                                    Rp{{ Auth::user()->pelanggan->paket ? number_format(Auth::user()->pelanggan->paket->harga, 0, ',', '.') : '-' }}
                                </span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                <span class="text-muted">Pembayaran Terakhir</span>
                                <span class="text-dark float-right font-weight-medium">
                                    {{ Auth::user()->pelanggan->tanggal_bayar_terakhir ?? '-' }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @elseif ($status === 'non-aktif')
        <div class="alert alert-danger mt-4">
            <h4 class="alert-title">Langganan Dinonaktifkan</h4>
            <p class="alert-description">
                Langganan Anda telah dinonaktifkan karena menunggak pembayaran bulanan. Silakan selesaikan pembayaran agar layanan Anda kembali aktif.
            </p>

            <ul class="list-style-none mb-3">
                <li>
                    <i class="fas fa-circle text-primary font-10 mr-2"></i>
                    <span class="text-muted">Paket Langganan</span>
                    <span class="text-dark float-right font-weight-medium">
                        {{ Auth::user()->pelanggan->paket->nama_paket ?? '-' }}
                    </span>
                </li>
                <li class="mt-2">
                    <i class="fas fa-circle text-danger font-10 mr-2"></i>
                    <span class="text-muted">Tagihan Bulanan</span>
                    <span class="text-dark float-right font-weight-medium">
                        Rp{{ Auth::user()->pelanggan->paket ? number_format(Auth::user()->pelanggan->paket->harga, 0, ',', '.') : '-' }}
                    </span>
                </li>
            </ul>

            <div class="text-center">
                <a href="{{ route('user.tagihan', Auth::user()->id) }}" class="btn btn-danger">
                    Bayar Sekarang
                </a>
            </div>
        </div>

        <div class="alert alert-secondary mt-4">
            <p>Status langganan tidak diketahui.</p>
        </div>
    @endif

@else
    <p>Anda belum login.</p>
@endif



{{-- @if (Auth::user()->status_langganan === 'Aktif')
    <div class="alert alert-success mt-4">
        <h4>Selamat!</h4>
        <p>
            Anda sudah berlangganan paket <strong>{{ Auth::user()->paket_langganan }}</strong> sejak {{ Auth::user()->tanggal_mulai }}.
        </p>
    </div>

    <div class="row">
        <!-- Tagihan Bulanan -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tagihan Bulanan</h4>
                    <div class="mt-2" style="height:100px; width:100%; text-align: center;">
                        <h2 class="text-dark font-weight-medium">Lunas</h2>
                        <span class="text-muted">Status Pembayaran</span>
                    </div>
                    <ul class="list-style-none mb-0">
                        <li>
                            <i class="fas fa-circle text-primary font-10 mr-2"></i>
                            <span class="text-muted">Paket Langganan</span>
                            <span class="text-dark float-right font-weight-medium">{{ Auth::user()->paket_langganan }}</span>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-circle text-danger font-10 mr-2"></i>
                            <span class="text-muted">Total Biaya Bulanan</span>
                            <span class="text-dark float-right font-weight-medium">
                                Rp {{ number_format(Auth::user()->total_biaya, 0, ',', '.') }}
                            </span>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                            <span class="text-muted">Pembayaran Terakhir</span>
                            <span class="text-dark float-right font-weight-medium">{{ Auth::user()->pembayaran_terakhir }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif --}}


</div>


            <footer class="footer text-center text-muted">
                All Rights Reserved by Intranusa
            </footer>

        </div>
    </div>
    <script src="{{ secure_asset('assets1/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ secure_asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ secure_asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ secure_asset('dist/js/custom.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ secure_asset('assets1/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ secure_asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>

    <script type="text/javascript">
        // Function to open modal
    function openLogoutModal() {
        document.getElementById('logoutModal').style.display = 'flex';
    }

    // Function to close modal
    function closeLogoutModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }
    </script>
</body>

</html>
