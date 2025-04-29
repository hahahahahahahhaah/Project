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

      <h1 class="logo me-auto"><a href="index.php">Intranusa</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a href="{{ url('/#home') }}">Home</a></li>
            <li><a href="{{ url('/#services') }}">Quality</a></li>
            <li><a href="{{ url('/#portfolio') }}">Portofolio</a></li>
            <li><a href="{{ url('/#team') }}">Team</a></li>
        <li class="dropdown">
            <a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="paket.php"><span>Paket</span></a></li>
              <li><a href="profile.php"><span>Profile</span></a></li>
            </ul>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a class="getstarted" href="{{ route('admin.login') }}">Login Admin</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- ======= Profile Section ======= -->
  <section id="Profile" class="Profile">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Profile</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Intranusa berdiri di bawah naungan CV. Maju Jaya Cipta Karya, sebuah perusahaan yang bergerak di bidang teknologi informasi dan jasa instalasi. Salah satu produk unggulan kami adalah Intranusa, yang merupakan layanan penyedia bandwidth internet.
          </p>
          <p>
            Intranusa didirikan dengan visi menjadi penyedia layanan internet terdepan di Indonesia. Kami berkomitmen untuk memberikan koneksi internet berkualitas tinggi kepada pelanggan kami, sehingga mereka dapat menikmati browsing yang lancar dan stabil.
          </p>
          <p>
            Selain Intranusa, CV. Maju Jaya Cipta Karya juga menyediakan layanan instalasi dan servis CCTV, serta instalasi hotspot. Kami memiliki tim teknisi profesional dan berpengalaman yang siap melakukan instalasi perangkat teknologi tersebut, sehingga pelanggan kami dapat menggunakan layanan ini dengan maksimal.
          </p>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Kami selalu berusaha memberikan pelayanan terbaik kepada pelanggan kami, dengan memberikan solusi yang tepat dan tepat waktu sesuai kebutuhan mereka. Kepercayaan dan kepuasan pelanggan merupakan prioritas utama bagi kami.
          </p>
          <p>
            Dengan pengalaman dan keahlian yang kami miliki, CV. Maju Jaya Cipta Karya siap memberikan solusi teknologi informasi terbaik bagi bisnis dan kebutuhan pribadi Anda.
          </p>
          <a href="index.php" class="btn-learn-more">Learn More</a>
        </div>

        </div>
      </div>

    </div>
  </section><!-- End Profile Section -->

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
            <li><a href="{{ url('/#home') }}">Home</a></li>
            <li><a href="{{ url('/#services') }}">Quality</a></li>
            <li><a href="{{ url('/#portfolio') }}">Portofolio</a></li>
            <li><a href="{{ url('/#team') }}">Team</a></li>
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
