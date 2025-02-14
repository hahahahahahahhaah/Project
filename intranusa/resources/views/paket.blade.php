<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intranusa</title>

  <!-- Favicons -->
  <link rel="icon" href="assets/img/jj.jpg">
  <link rel="apple-touch-icon" href="assets/img/jj.jpg">

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
#header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  text-align: center;  /* Menengahkan tulisan di dalam header */
  background-color: #0a0a5c;  /* Menggunakan satu warna biru tua */
  box-shadow: none;  /* Menghapus bayangan atau efek butek */
  z-index: 1000;
  padding: 3px 6px; /* Mengurangi padding header lebih lanjut */
  height: 50px; /* Menetapkan tinggi header lebih kecil */
  width: 100%;
  display: flex;
  justify-content: center;  /* Menyusun elemen di tengah secara horizontal */
  align-items: center;  /* Menyusun elemen di tengah secara vertikal */
}

  #main {
  padding: 60px 20px;
}

#footer {
  background: #f8f9fa;
  padding: 20px 0;
  color: #666666;
}
.getstarted {
  color: white;          /* Warna teks */
  padding: 10px 20px;    /* Padding tombol */
  border-radius: 5px;    /* Membuat sudut tombol melengkung */
  text-decoration: none; /* Menghapus garis bawah */
  display: inline-block; /* Agar terlihat seperti tombol */
}

.getstarted:hover {
  background-color: darkblue; /* Warna biru lebih gelap saat dihover */
}

  </style>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Intranusa</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="/#home">Home</a></li>
        <li><a href="/#services">Quality</a></li>
        <li><a href="/#portfolio">Portofolio</a></li>
        <li><a href="/#team">Team</a></li>
        <li class="dropdown">
            <a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="paket.php"><span>Paket</span></a></li>
              <li><a href="profile.php"><span>Profile</span></a></li>
            </ul>
            <li><a href="/#contact">Contact</a></li>
            <li><a class="getstarted" href="/login-register">Login</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Paket</h2>
      </div>

      <div class="row">
        <!-- Paket Cards -->
        <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box featured">
            <h4>10<sup>mbps</sup></h4>
            <h3>Rp.166.500/Bulan</h3>
            <ul>
              <li><i class="bx bx-check"></i> Streaming Video (HD): 1-2 Perangkat</li>
              <li><i class="bx bx-check"></i> Streaming Video (4k): Tidak Disarankan</li>
              <li><i class="bx bx-check"></i> Browsing Media Sosial: 3-5 Perangkat</li>
              <li><i class="bx bx-check"></i> Video Call (HD): 2-3 Perangkat</li>
              <li><i class="bx bx-check"></i> Gaming Online: 1-2 Perangkat</li>
            </ul>
            <a href="/login-register" class="buy-btn btn btn-primary">Berlangganan</a>
          </div>
        </div>

        <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="box featured">
          <h4><sup></sup>15<sup>mbps</sup></h4>
          <h3>Rp.194.250/Bulan</h3>
          <ul>
          <li><i class="bx bx-check"></i>Streaming Vidio (HD)   : 2-3 Perangkat</li>
            <li><i class="bx bx-check"></i>Streaming Vidio (4k) : 1 Perangkat (Terbatas)</li>
            <li><i class="bx bx-check"></i>Browsing Media Sosial: 5-7 Perangkat</li>
            <li><i class="bx bx-check"></i>Vidio Call (HD)      : 3-4 Perangkat</li>
            <li><i class="bx bx-check"></i>Gaming Online        : 2-3 Perangkat</li>
          </ul>
          <a href="/login-register" class="buy-btn">berlangganan</a>
        </div>
      </div>

      <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="box featured">
          <h4><sup></sup>20<sup>mbps</sup></h4>
          <h3>Rp.222.000/Bulan</h3>
          <ul>
          <li><i class="bx bx-check"></i>Streaming Vidio (HD)   : 3-4 Perangkat</li>
            <li><i class="bx bx-check"></i>Streaming Vidio (4k) : 1-2 Perangkat</li>
            <li><i class="bx bx-check"></i>Browsing Media Sosial: 7-10 Perangkat</li>
            <li><i class="bx bx-check"></i>Vidio Call (HD)      : 4-5 Perangkat</li>
            <li><i class="bx bx-check"></i>Gaming Online        : 3-4 Perangkat</li>
          </ul>
          <a href="/login-register" class="buy-btn">berlangganan</a>
        </div>
      </div>

      <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="box featured">
          <h4><sup></sup>35<sup>mbps</sup></h4>
          <h3>Rp.249.750/Bulan</h3>
          <ul>
          <li><i class="bx bx-check"></i>Streaming Vidio (HD)   : 4-5 Perangkat</li>
            <li><i class="bx bx-check"></i>Streaming Vidio (4k) : 1-3 Perangkat </li>
            <li><i class="bx bx-check"></i>Browsing Media Sosial: 10-15 Perangkat</li>
            <li><i class="bx bx-check"></i>Vidio Call (HD)      : 6-8 Perangkat</li>
            <li><i class="bx bx-check"></i>Gaming Online        : 4-6 Perangkat</li>
          </ul>
          <a href="/login-register" class="buy-btn">berlangganan</a>
        </div>
      </div>

      <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="box featured">
          <h4><sup></sup>50<sup>mbps</sup></h4>
          <h3>Rp.333.000/Bulan</h3>
          <ul>
          <li><i class="bx bx-check"></i>Streaming Vidio (HD)   : 6-10 Perangkat</li>
            <li><i class="bx bx-check"></i>Streaming Vidio (4k) : 2-3 Perangkat </li>
            <li><i class="bx bx-check"></i>Browsing Media Sosial: 15=20 Perangkat</li>
            <li><i class="bx bx-check"></i>Vidio Call (HD)      : 8-12 Perangkat</li>
            <li><i class="bx bx-check"></i>Gaming Online        : 5-8 Perangkat</li>
          </ul>
          <a href="/login-register" class="buy-btn">berlangganan</a>
        </div>
      </div>
    </div>
    </div>
</section><!-- End Pricing Section -->

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
          <strong>Phone:</strong>+62 87714242347<br>
          <strong>Email:</strong> intranusa.id@gmail.com<br>
        </p>
      </div>
       <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
    <li><i class="bx bx-chevron-right"></i> <a href="/#home">Home</a></li>
    <li><i class="bx bx-chevron-right"></i> <a href="/#services">Quality</a></li>
    <li><i class="bx bx-chevron-right"></i> <a href="/#contact">Contact</a></li>
    <li><i class="bx bx-chevron-right"></i> <a href="/#portfolio">Portofolio</a></li>
    <li><i class="bx bx-chevron-right"></i> <a href="/#team">Team</a></li>
  </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>product</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="profile.php">profile</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="paket.php">paket</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <div class="social-links mt-3">
          <a href="https://bit.ly/4cvJTCW" class="ri-whatsapp"><i class="bx bxl-whatsapp"></i></a>
          <a href="https://www.instagram.com/intranusa.id?igsh=MTByMGhwcHp1b3diZw==" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>

    </div>
        <!-- Repeat other packages -->
        <!-- ... -->
      </div>
    </div>
  </section>

  <!-- Vendor JS -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
  document.querySelectorAll('.scrollto').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});
</script>
</body>

</html>
