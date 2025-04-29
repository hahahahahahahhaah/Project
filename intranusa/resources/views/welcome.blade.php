<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>intranusa.id</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ secure_asset('assets/img/jj.jpg') }}" rel="icon">
  <link href="{{ secure_asset('assets/img/jj.jpg') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ secure_asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- Swiper CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <style>

    /* Style untuk menampilkan dropdown-menu */
    .dropdown {
      position: relative;
    }

    .dropdown-menu {
      display: none;
      /* Default disembunyikan */
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      /* Efek bayangan */
      padding: 12px 0;
      z-index: 1;
      border-radius: 5px;
      list-style-type: none;
      margin: 0;
    }

    .dropdown-menu li {
      padding: 8px 16px;
    }

    .dropdown-menu li a {
      text-decoration: none;
      color: black;
      display: block;
    }

    .dropdown-menu li a:hover {
      background-color: #f1f1f1;
    }

    /* Hover untuk menampilkan dropdown */
    .dropdown:hover .dropdown-menu {
      display: block;
      /* Tampilkan menu saat hover */
    }

    /* Chevron icon */
    .dropdown a i {
      margin-left: 5px;
    }

    .pic img {
      object-fit: cover;
    }

    .icon-box {
      width: 195px;
    }

    @media (max-width: 1000px) {
      .icon-container {
        gap: 20px 15px;
        justify-content: center !important;
        flex-wrap: wrap;
      }

      .icon-box {}
    }

    @media (max-width: 768px) {
      .icon-box {
        width: 45%;
      }
    }
  </style>
</head>

<body>


@if(session('success'))
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      toastr.success("{{ session('success') }}");
    });
  </script>
@endif

@if(session('error'))
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      toastr.error("{{ session('error') }}");
    });
  </script>
@endif


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="">Intranusa</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Quality</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown">
            <a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ url('/paket') }}"><span>Paket</span></a></li>

<li><a href="{{ url('/profile') }}"><span>Profile</span></a></li>

            </ul>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login-register') }}">Login</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Selamat Datang Di Intranusa</h1>
          <h2>Dengan intranusa,anda menikmati akses internet cepat, unlimated, dan pelayanan terbaik
            dengan harga ekonomis cocok untuk menunjang berbagai kegiatan anda.</h2>
          <h2>Innovate, Conneet,& Inspire</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('login-register') }}" class="btn-get-started ">Login Sekarang</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/intanusa-icon.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row justify-content-center" data-aos="zoom-in"> <!-- Menambahkan justify-content-center untuk memusatkan isi -->

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
            <img src="assets/img/clients/mnc-removebg-preview.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
            <img src="assets/img/clients/salak_view-removebg-preview.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
            <img src="assets/img/clients/manzil-removebg-preview.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
            <img src="assets/img/clients/ipb-removebg-preview.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
            <img src="assets/img/clients/bksda-removebg-preview.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menyediakan</h2>
        </div>

        <div class="d-flex justify-content-between icon-container">
          <div class=" icon-box p-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class='bx bx-wifi-2'></i></div>
            <h4><a href="">Instalasi Wifi</a></h4>
            <h6><a href="">Rumah&Kantor</a></h6>
          </div>

          <div class=" icon-box p-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Splicing Kabel</a></h4>
          </div>

          <div class=" icon-box p-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class='bx bx-station'></i></div>
            <h4><a href="">Pemasangan Hotspot</a></h4>
          </div>

          <div class=" icon-box p-3" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon"><i class="bx bx-layer"></i></div>
            <h4><a href="">Instalasi CCTV</a></h4>
            <h6><a href="">Ip Cam</a></h6>
          </div>

          <div class=" icon-box p-3" data-aos="zoom-in" data-aos-delay="500">
            <div class="icon"><i class="bx bx-wrench"></i></div>
            <h4><a href="">Perlengkapan & Sparepart Internet</a></h4>
          </div>

          <div class=" icon-box p-3" data-aos="zoom-in" data-aos-delay="600">
            <div class="icon"><i class="bx bx-sun"></i></div>
            <h4><a href="">Pemasangan Solar Panel</a></h4>
          </div>
        </div>



      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3><strong>Area Covered</strong></h3>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span></span>Covered Area (Bogor): <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Perumahan Graha Arradea
                    </p>
                    <p>
                      Perumahan Artabina
                    </p>
                    <p>
                      Perumahan Bogor Alam Asri
                    </p>
                    <p>
                      Perumahan Bumi Kartika Dramaga Raya
                    </p>
                    <p>
                      Ciherang Kaum
                    </p>
                    <p>
                      Ciherang Peuntas
                    </p>
                    <p>
                      Ciherang Stamplas
                    </p>
                    <p>
                      Ciherang Hegarsari
                    </p>
                    <p>
                      Perumahan The Manzil
                    </p>
                    <p>
                      Laladon
                    </p>
                    <p>
                      Margajaya
                    </p>
                    <p>
                      Perumahan Salak View
                    </p>
                    <p>
                      Sukawening
                    </p>
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/gatau.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p>Menjadikan pengalaman internet mu lebih cepat dan stabil dengan layanan wifi kami! Segera dapatkan akses wifi yang terpercaya dengan harga terjangkau klik tombol di bawah ini untuk memesan sekarang juga!</p>
          </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- Portfolio Section -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Portofolio</h2>
      <p></p>
    </div>

    <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">1</li>
      <li data-filter="*" class="filter-active">2</li>
      <li data-filter=".filter-card">3</li>
      <li data-filter=".filter-web">4</li>
    </ul>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      <!-- Portfolio Item 1 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>2</h4>
          <p>Splicing dan terminasi OLT Telkomsel</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title=" 1">
            <i class='bx bxs-zoom-in'></i>
  </a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 2 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio2.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>4</h4>
          <p>Splicing dan terminasi OLT Telkomsel</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link"></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 3 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio10.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>2</h4>
          <p>Instalasi Jaringan Internet Di Pulau Rambut,</p>
          <p> Kepulauan Seribu Bekerjasama Dengan BKSDA</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio10.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link" ></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 4 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio6.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>3</h4>
          <p>Kerja Sama Dengan MNCV</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2">
            <i class='bx bxs-zoom-in'></i>
            <a href="portfolio-details.php" class="details-link" ></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 5 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio3.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>4</h4>
          <p>Splicing dan terminasi OLT Telkomsel</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link"></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 6 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio5.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>2</h4>
          <p>Instalasi Jaringan Internet Dan </p>
            <p>CCTV Di Suka Margasatwa Jakarta</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link" ></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 7 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio7.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>3</h4>
          <p>Kerja Sama Dengan MNCV</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link"></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 8 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio9.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>3</h4>
          <p>Pemasangan CCTV Bawah Laut </p>
          <p>Bekerja Sama Dengan PKSPL</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link"></a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 9 -->
      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-img">
          <img src="assets/img/portofolioo/portofolio11.jpg" class="img-fluid" alt="">
        </div>
        <div class="portfolio-info">
          <h4>4</h4>
          <p>Instalasi Jaringan Internet Dan </p>
          <p>CCTV Di Suka Margasatwa Jakarta</p>
          <div class="portfolio-links">
            <a href="assets/img/portofolioo/portofolio11.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3">
            <i class='bx bxs-zoom-in'></i>
            </a>
            <a href="portfolio-details.php" class="details-link"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
        </div>
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">


            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team8.jpeg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Yoga Triswanto</h4>
                  <span>Direktur Utama</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/yogatriswanto?igsh=aWc3b2g3N3VvczA1"><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>


            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team6.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Joko Wiyono</h4>
                  <span>Manager</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/jokozaky0405?igsh=NTh2bTdnMTUybW50"><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team2.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Farid Hidayatu</h4>
                  <span>Supervisor Teknisi</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/farididoyyy?igsh=MXJpb3F2czFjODNtOA=="><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team5.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Azkia Naura</h4>
                  <span>Finance</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/azkiaaryasatya?igsh=MWNpbG9jNXo4Z29lNw=="><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>


            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Aqshal Nazillah</h4>
                  <span>Teknisi Jaringan</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/aqshalnzllh_?igsh=MXZ1dm0yNThucmZ3cg=="><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team4.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Siti Nurhamidah</h4>
                  <span>Customer Service</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/st.nrhmdh?igsh=MWdoMXVxcm8yc2h2cA=="><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team1.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Putra Aditya</h4>
                  <span>Asisten Teknisi</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/_adtyfhrz?igsh=YnM3bmQwM29yYTZi"><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/tram3.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Amanda ramadhan</h4>
                  <span>Asisten Teknisi</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/ramadhan_doy?igsh=ODAwd2M1aG9vczJj"><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="member d-flex align-items-start">
                <div class="pic">
                  <img src="assets/img/team/team7.jpg" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>Kahfi Ardhan</h4>
                  <span>Teknisi Jaringan</span>
                  <div class="social">
                    <a href="https://bit.ly/4cvJTCW"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.instagram.com/mokaf_?igsh=bXRqYThtM2szbWY5"><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>

        </div>


      </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apakah kelebihan intranusa? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  - intranusa sangat mengutamakan untuk memberikan pelayanan terbaik
                  - tarif paket ramah di kantong namun intranusa sangat mementingkan kualitas
                  - CS Responsive dan jika ada kendala akan di tangani dengan cepat oleh tim teknisi profesional.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Apakah nanti harga paket akan selalu naik? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  - Tidak ada kenaikan harga untuk costumer intranusa walaupun harga paket berubah-ubah, perubahan harga tersebut tidak berlaku untuk costumer intranusa.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana jika nanti rumah saya pindah? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  - Tenang saja, jika lokasinya masih tercover oleh intranusa akan di bantu direlokasikan oleh tim teknisi.
                </p>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row">
          <!-- Satu kotak untuk seluruh info kontak dan maps -->
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info-box" style="width: 100%; padding: 20px; background-color: #f9f9f9; border-top: 2px solid #47b2e4;border-bottom: 2px solid #47b2e4;  border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
              <div class="row">

                <!-- Bagian kiri: Info kontak -->
                <div class="col-lg-6">
                  <div class="address">
                    <i class="bi bi-geo-alt" style="color: #47b2e4;"></i>
                    <h4>Location:</h4>
                    <p>Jl. Graha Arradea Blok CB no 2, Ciherang, Dramaga, Bogor Regency, West Java 16610</p>
                  </div>

                  <div class="email">
                    <i class="bi bi-envelope" style="color: #47b2e4;"></i>
                    <h4>Email:</h4>
                    <p>intranusa.id@gmail.com</p>
                  </div>

                  <div class="phone">
                    <i class="bi bi-phone" style="color: #47b2e4;"></i>
                    <h4>Call:</h4>
                    <p>08771424247</p>
                  </div>
                </div>

                <!-- Bagian kanan: Google Maps -->
                <div class="col-lg-6">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1014644.1536879559!2d105.59754064687499!3d-6.590389199999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5de5652125d%3A0x8c60a077808473de!2sMJ%20Tech%20(IT%20%26%20CCTV%20Solution)!5e0!3m2!1sid!2sid!4v1722820873958!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </section>




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Intranusa</h3>
            <p>
              Jl. Graha Arradea Blok CB no 2, Ciherang, Dramaga,
              Bogor Regency, West Java 16610 <br><br>
              <strong>Phone:</strong>+6287714242347<br>
              <strong>Email:</strong> intranusa.id@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#home">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Quality</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portofolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>product</h4>
            <ul>
              <li><a href="{{ url('/profile') }}"><span>Profile</span></a></li>

              <li><a href="{{ url('/paket') }}"><span>Paket</span></a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <div class="social-links mt-3">
              <a href="https://bit.ly/4cvJTCW" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
              <a href="https://www.instagram.com/intranusa.id/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>intranusa</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="">Intranusa.id</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  @include('chatbot-widget', ['questions' => $questions])


  <!-- <div id="preloader"></div> -->


 <!-- Vendor JS Files -->
<script src="{{ secure_asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ secure_asset('assets/js/main.js') }}"></script>

<!-- JavaScript (Opsional) jika ingin klik untuk menampilkan -->
<script>
  // Toggle dropdown saat tombol diklik (jika diperlukan dengan klik bukan hover)
  document.querySelector('.dropdown > a').onclick = function(event) {
    event.preventDefault(); // Mencegah halaman reload
    var dropdownMenu = this.nextElementSibling;
    // Toggle dropdown
    if (dropdownMenu.style.display === 'block') {
      dropdownMenu.style.display = 'none';
    } else {
      dropdownMenu.style.display = 'block';
    }
  };

  // Sembunyikan dropdown jika mengklik di luar menu
  window.onclick = function(event) {
    if (!event.target.matches('.dropdown > a')) {
      var dropdowns = document.getElementsByClassName("dropdown-menu");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.style.display === 'block') {
          openDropdown.style.display = 'none';
        }
      }
    }
  };
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 2,
      spaceBetween: 20,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      breakpoints: {
        1024: {
          slidesPerView: 3,
        },
      },
    });
  });
</script>

</body>

</html>
