<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('img/jjj.jpg') }}">
    <title>intranusa.id</title>
    <!-- Link to your CSS files -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

    <style type="text/css">
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .badge-success {
            background-color: #28a745;
            color: #fff;
            padding: 0.4em 0.7em;
            border-radius: 10px;
            font-size: 0.9em;
        }
        .badge-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 0.4em 0.7em;
            border-radius: 10px;
            font-size: 0.9em;
        }
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
            text-decoration: none;
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


    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('assets1/images/usstwo.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('assets1/images/usstwo.png') }}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="{{ asset('assets1/images/gege.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{ asset('assets1/images/gege.png') }}" class="light-logo" alt="homepage" />
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
                                {{-- <img src="{{ asset('assets/images/users/profile-pic.jpg') }}" alt="user" class="rounded-circle" width="40"> --}}

                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span>
            <span class="text-dark">

            </span>  <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Profil saya</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Berhenti berlangganan</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Keluar</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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

                        <li class="sidebar-item"> <a class="sidebar-link" href="history pay.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
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
            <a href="/logout.php" class="logout-btn">Keluar</a>
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
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="p-2 bg-primary text-center">
                <h1 class="font-light text-white">
                </h1>
                <h6 class="text-white">Total Pembayaran Berhasil</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="p-2 bg-cyan text-center">
                <h1 class="font-light text-white">
                </h1>
                <h6 class="text-white">Jumlah Tagihan Tertunda</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="p-2 bg-success text-center">
                <h1 class="font-light text-white">
                </h1>
                <h6 class="text-white">Pembayaran Terakhir</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="p-2 bg-danger text-center">
                <h1 class="font-light text-white"></h1>
                <h6 class="text-white">Status Tagihan</h6>
            </div>
        </div>
    </div>
</div>
                    <div class="table-responsive mt-4">
                        <table id="payment_table" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Status Pembayaran</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Jumlah yang Dibayar</th>
                                    <th>Jenis Paket</th>
                                    <th>Tanggal Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>

                                        <tr>
                                            <td>
                                                <span class="badge badge">
                                                </span>
                                            </td>

                                        </tr>

                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada riwayat pembayaran.</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
        <div class="alert alert-warning mt-4 elegant-alert">
    <h4 class="alert-title">Belum Berlangganan</h4>
    <p class="alert-description">Untuk mengaktifkan layanan kami, Anda perlu mendaftar paket berlangganan terlebih dahulu. Klik tombol di bawah untuk memulai perjalanan Anda bersama kami.</p>
    <a href="{{ route('form.lokasi') }}" class="btn btn-secondary">Daftar Sekarang</a>
</div>


            </div>
        </div>
    </div>
    </html>
