<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">

    <!-- My Custom CSS -->
    <link rel="stylesheet" href="/style2.css">
    <link rel="stylesheet" href="/admin.css">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->

    <!-- Bootstrap JS (Bundle with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (Bundle dengan Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!-- jQuery -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <title>Form Admin</title>
    <link href="{{ asset('img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('img/jjj.jpg') }}" rel="apple-touch-icon">
</head>

<style>
    .whatsapp-button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        color: white;
        background-color: #25D366;
        border-radius: 8px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        transition: background 0.3s;
    }

    .whatsapp-button:hover {
        background-color: #1DA851;
    }

    .whatsapp-icon {
        width: 20px;
        height: 20px;
    }

    .container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-wifi' ></i>
            <span class="text">Intranusa</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="dashboard">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="data">
                    <i class='bx bxs-group' ></i>
                    <span class="text">Data Berlangganan</span>
                </a>
            </li>
            <li>
                <a href="data-pelanggan">
                    <i class='bx bxs-group' ></i>
                    <span class="text">Laporan Pelanggan</span>
                </a>
            </li>
            <li>
                <a href="survei">
                    <i class='bx bxs-message-dots' ></i>
                    <span class="text">Data survey</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
    <li>
    <a class="logout" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
    <i class='bx bxs-log-out-circle'></i>
    <span class="text">Logout</span>
</a>

    </li>
</ul>
{{-- <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;">Ready to leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
            Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="btn btn-primary" style="padding: 9px; margin: 10px;" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div> --}}

</section>

<section id="content">
    <div class="notif-container"></div>
        <!-- NAVBAR -->
        <nav>
            <button class="menu-toggle" id="menuToggle">
                <i class='bx bx-menu'></i>
            </button>
            <div class="notification-icon" style="position: relative; display: inline-block; left: 93%; margin-right: 20px;">
    <a href="/admin/notifikasi">
        <i class="bx bxs-bell" style="font-size: 24px;"></i> <!-- Lonceng -->
            <span class="badge" style="position: absolute; top: -5px; right: -5px; background-color: red; color: white; border-radius: 50%; padding: 4px 8px; font-size: 12px;">
            </span>
    </a>
    <audio id="notificationSound" src="path/to/your/notification-sound.mp3" preload="auto"></audio>

</div>


        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard admin</h1>
                    <ul class="breadcrumb">

                    </ul>
                </div>

            </div>

            <ul class="box-info">
    <li>
        <i class='bx bxs-calendar-check'></i>
        <span class="text">
            <h3 id="total-survey"></h3> <!-- Menampilkan total survey -->
            <p>Survey</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-group'></i>
        <span class="text">

            <h3  id="total-pelanggan">{{ $totalPelanggan }}</h3> <!-- Menampilkan total pelanggan -->
            <p>Pelanggan</p>
        </span>
    </li>
</ul>

<div class="clearfix">
<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Berlangganan</h3>
            <i class='bx bx-filter'></i>
             <i class='bx bxs-data'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Email</th>
                    <th>Paket</th>
                    <th>Lokasi Pemasangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $index => $data)
                <tr>
                    {{-- <td>{{ $index + 1 }}</td> --}}
                    <td>{{ $data->nama_pelanggan }}</td>
                    <td>{{ $data->email }}</td>
                    {{-- <td>{{ $data->paket }}</td> --}}
                    <td>{{ $data->paket->kecepatan_mbps ?? '-' }} Mbps</td>

                    <td>{{ $data->lokasi_pemasangan }}</td>
                    <td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-detail" data-id="{{ $data->id_pelanggan }}">
                                Lihat Detail
                            </button>
                        </td>

                    </td>
                </tr>

                @endforeach
                       </tbody>
                   </table>
                   <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Detail Pelanggan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- <div class="modal-body" style="position: relative; padding-bottom: 40px;">
                                <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
                                <p><strong>Email:</strong> <span id="detail-email"></span></p>
                                <p><strong>Paket:</strong> <span id="detail-paket"></span></p>
                                <p style="margin-bottom: 30px;"><strong>Lokasi Pemasangan:</strong> <span id="detail-lokasi"></span></p>

                                <!-- Elemen tanggal di kanan bawah -->
                                <p style="position: absolute; bottom: 10px; right: 20px; font-size: 14px; color: gray;">
                                    <strong>Tanggal Pemasangan:</strong> <span id="detail-created_at"></span>
                                </p>
                            </div> --}}
                            {{-- <div class="modal-body" style="position: relative; padding-bottom: 40px;">
                                <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
                                <p><strong>Email:</strong> <span id="detail-email"></span></p>
                                <p><strong>Paket:</strong> <span id="detail-paket"></span></p>
                                <p style="margin-bottom: 30px;"><strong>Lokasi Pemasangan:</strong> <span id="detail-lokasi"></span></p>

                                <!-- Elemen tanggal di kanan bawah -->
                                <p style="position: absolute; bottom: 10px; right: 20px; font-size: 14px; color: gray;">
                                    <strong>Tanggal Pemasangan:</strong> <span id="detail-created_at"></span>
                                </p>

                                <!-- Container Google Maps (Awalnya tersembunyi) -->
                                <div id="map-container" style="display: none; margin-top: 20px;">
                                    <h6>Lokasi Pemasangan:</h6>
                                    <div id="map" style="width: 100%; height: 300px; border-radius: 10px;"></div>
                                </div>
                            </div> --}}

                            <div class="modal-body relative pb-10">
                                <div class="space-y-2 text-gray-700">
                                    <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
                                    <p><strong>Email:</strong> <span id="detail-email"></span></p>
                                    <p><strong>Paket:</strong> <span id="detail-paket"></span></p>
                                    <p class="mb-6"><strong>Lokasi Pemasangan:</strong> <span id="detail-lokasi"></span></p>
                                </div>

                                <!-- Elemen tanggal di kanan bawah -->
                                <p class="absolute bottom-2 right-5 text-sm text-gray-500">
                                    <strong>Tanggal Pemasangan:</strong> <span id="detail-created_at"></span>
                                </p>

                                <!-- Container Google Maps (Ditampilkan secara default) -->
                                <div id="map-container" class="mt-5">
                                    <h6 class="font-semibold">Lokasi Pemasangan:</h6>
                                    {{-- <div id="map" class="w-full h-72 rounded-lg border"></div> --}}
                                    <div id="map" style="width: 100%; height: 300px; border-radius: 10px;"></div>

                                    <div class="container">
                                        <a id="share-whatsapp"
                                           href="#"
                                           target="_blank"
                                           class="whatsapp-button">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            Share to WhatsApp
                                        </a>
                                    </div>


                                </div>


                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="pagination d-flex justify-content-left mt-4" style="margin-left: 75%;">
                   <a href="" class="btn btn-secondary me-2">
                       <i class="fas fa-arrow-left" style="margin-top: 5px;"></i>
                   </a>

               <span class="btn btn-light"></span>

                   <a href="" class="btn btn-secondary ms-5">
                       <i class="fas fa-arrow-right" style=" margin-top: 5px;"></i>
                   </a>
           </div>


               </div>
           </div>
<div class="todo">
    <div class="head">
        <h3>Survey</h3>
        <i class='bx bx-filter'></i>
        <i class='bx bxs-color'></i>
    </div>
    <ul class="todo-list">

        <!-- Menampilkan persentase dengan kolom warna (progress bar) -->
{{-- <li class="completed">
    <p>Customer Service</p>
    <div class="progress-container">
        <div class="progress-bar" style="width: ">
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar " style="width">
               </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar" style="width">
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($cs_2_percentage) ?>" style="width: <?= $cs_2_percentage ?>%;">
            2: <?= $cs_2_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($cs_1_percentage) ?>" style="width: <?= $cs_1_percentage ?>%;">
            1: <?= $cs_1_percentage ?>%
        </div>
    </div>
</li>

<li class="completed">
    <p>Teknisi</p>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($tech_5_percentage) ?>" style="width: <?= $tech_5_percentage ?>%;">
            5: <?= $tech_5_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($tech_4_percentage) ?>" style="width: <?= $tech_4_percentage ?>%;">
            4: <?= $tech_4_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($tech_3_percentage) ?>" style="width: <?= $tech_3_percentage ?>%;">
            3: <?= $tech_3_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($tech_2_percentage) ?>" style="width: <?= $tech_2_percentage ?>%;">
            2: <?= $tech_2_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($tech_1_percentage) ?>" style="width: <?= $tech_1_percentage ?>%;">
            1: <?= $tech_1_percentage ?>%
        </div>
    </div>
</li>

<li class="completed">
    <p>Kualitas Internet</p>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($oq_5_percentage) ?>" style="width: <?= $oq_5_percentage ?>%;">
            5: <?= $oq_5_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($oq_4_percentage) ?>" style="width: <?= $oq_4_percentage ?>%;">
            4: <?= $oq_4_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($oq_3_percentage) ?>" style="width: <?= $oq_3_percentage ?>%;">
            3: <?= $oq_3_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($oq_2_percentage) ?>" style="width: <?= $oq_2_percentage ?>%;">
            2: <?= $oq_2_percentage ?>%
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar <?= getColorByPercentage($oq_1_percentage) ?>" style="width: <?= $oq_1_percentage ?>%;">
            1: <?= $oq_1_percentage ?>%
        </div>
    </div>
</li> --}}



    </ul>
</div>



        </main>
        <!-- MAIN -->
    </section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('.btn-detail').click(function() {
                let id = $(this).data('id'); // Ambil ID pelanggan dari tombol

                $.ajax({
                    url: `/admin/dashboard/detail/${id}`, // Panggil route
                    type: 'GET',
                    success: function(response) {
                        // Isi modal dengan data yang didapat
                        $('#detail-nama').text(response.nama_pelanggan);
                        $('#detail-email').text(response.email);
                        $('#detail-paket').text(response.paket);
                        $('#detail-lokasi').text(response.lokasi_pemasangan);
                        $('#detail-created_at').text(response.created_at);

                        // Tampilkan modal
                        $('#detailModal').modal('show');
                    },
                    error: function() {
                        alert('Gagal mengambil data pelanggan');
                    }
                });
            });
        });
    </script> --}}

    <div class="modal-body relative pb-10">
        <div class="space-y-2 text-gray-700">
            <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
            <p><strong>Email:</strong> <span id="detail-email"></span></p>
            <p><strong>Paket:</strong> <span id="detail-paket"></span></p>
            <p class="mb-6"><strong>Lokasi Pemasangan:</strong> <span id="detail-lokasi"></span></p>
        </div>

        <!-- Elemen tanggal di kanan bawah -->
        <p class="absolute bottom-2 right-5 text-sm text-gray-500">
            <strong>Tanggal Pemasangan:</strong> <span id="detail-created_at"></span>
        </p>

        <!-- Container Google Maps -->
        <div id="map-container" class="mt-5">
            <h6 class="font-semibold">Lokasi Pemasangan:</h6>
            <div id="map" class="w-full h-72 rounded-lg border"></div>
        </div>

        <!-- Tombol Share ke WhatsApp -->
        <div class="mt-4 text-center">
            <a id="share-whatsapp" href="#" target="_blank" class="bg-green-500 text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 16 16">
                    <path d="M13.6 2.4A7.947 7.947 0 0 0 8 0a8.003 8.003 0 0 0-7.6 10.6L0 16l5.6-1.4A8 8 0 0 0 16 8a7.947 7.947 0 0 0-2.4-5.6zM8 14.5a6.5 6.5 0 0 1-3.3-.9l-.2-.1L2 14l.5-2.4-.2-.3A6.5 6.5 0 1 1 8 14.5zm3-4.2c-.3-.2-1.6-.8-1.8-.9-.2 0-.4-.1-.5.2-.2.3-.6.9-.7 1-.1.1-.2.1-.4 0s-.5-.2-1-0.5a4.3 4.3 0 0 1-1.6-1.4c-.2-.3-.3-.5-.3-.7s0-.3.1-.4l.4-.5c.1-.1.1-.2 0-.4L4.2 6c-.2-.3-.5-.3-.6-.3h-.5c-.2 0-.4 0-.6.2s-.8.8-.8 2c0 1.1.8 2.2.9 2.4.1.2 1.5 2.3 3.6 3.1.5.2.9.3 1.3.4.5.1 1 .1 1.3.1.4 0 1.2-.2 1.6-.4.4-.2 1-.5 1.1-1s.1-1 .1-1.1c-.2-.2-.3-.3-.6-.4z"/>
                </svg>
                Share to WhatsApp
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.btn-detail').click(function () {
                let id = $(this).data('id'); // Ambil ID pelanggan dari tombol

                $.ajax({
                    url: `/admin/dashboard/detail/${id}`, // Panggil route
                    type: 'GET',
                    success: function (response) {
                        // Isi modal dengan data yang didapat
                        $('#detail-nama').text(response.nama_pelanggan);
                        $('#detail-email').text(response.email);
                        // $('#detail-paket').text(response.paket);
                        // $('#detail-paket').text(response.paket.nama_paket + ' - ' + response.paket.kecepatan_mbps + ' Mbps');
                        $('#detail-paket').text(response.paket.kecepatan_mbps + ' Mbps');

                        $('#detail-lokasi').text(response.lokasi_pemasangan);
                        $('#detail-created_at').text(response.created_at);

                        // Periksa apakah latitude & longitude tersedia
                        if (response.latitude && response.longitude) {
                            initMap(response.latitude, response.longitude);
                            $('#map-container').show(); // Tampilkan peta

                            // Perbarui link WhatsApp setelah mendapatkan lokasi
                            const message = `Lokasi Pemasangan: https://www.google.com/maps?q=${response.latitude},${response.longitude}`;
                            $('#share-whatsapp').attr('href', `https://wa.me/?text=${encodeURIComponent(message)}`);
                        } else {
                            $('#map-container').hide(); // Sembunyikan jika tidak ada lokasi
                            $('#share-whatsapp').attr('href', "#"); // Kosongkan link jika tidak ada lokasi
                        }

                        // Tampilkan modal
                        $('#detailModal').modal('show');
                    },
                    error: function () {
                        alert('Gagal mengambil data pelanggan');
                    }
                });
            });
        });

        function initMap(lat, lng) {
            var lokasi = { lat: parseFloat(lat), lng: parseFloat(lng) };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: lokasi
            });

            var marker = new google.maps.Marker({
                position: lokasi,
                map: map
            });
        }
    </script>


    {{-- <script>
        $(document).ready(function () {
            $('.btn-detail').click(function () {
                let id = $(this).data('id'); // Ambil ID pelanggan dari tombol

                $.ajax({
                    url: `/admin/dashboard/detail/${id}`, // Panggil route
                    type: 'GET',
                    success: function (response) {
                        // Isi modal dengan data yang didapat
                        $('#detail-nama').text(response.nama_pelanggan);
                        $('#detail-email').text(response.email);
                        $('#detail-paket').text(response.paket);
                        $('#detail-lokasi').text(response.lokasi_pemasangan);
                        $('#detail-created_at').text(response.created_at);

                        // Periksa apakah latitude & longitude tersedia
                        if (response.latitude && response.longitude) {
                            initMap(response.latitude, response.longitude);
                            $('#map-container').show(); // Tampilkan peta
                        } else {
                            $('#map-container').hide(); // Sembunyikan jika tidak ada lokasi
                        }

                        // Tampilkan modal
                        $('#detailModal').modal('show');
                    },
                    error: function () {
                        alert('Gagal mengambil data pelanggan');
                    }
                });
            });
        });

        function initMap(lat, lng) {
            var lokasi = { lat: parseFloat(lat), lng: parseFloat(lng) };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: lokasi
            });

            var marker = new google.maps.Marker({
                position: lokasi,
                map: map
            });
        }
    </script> --}}

    <!-- Tambahkan Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPgITzScR5cR1Omqp7BFe8tww8G2qOt4&libraries=places" async defer></script>

<!-- Bootstrap JS (Letakkan sebelum </body>) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const menuToggle = document.getElementById("menuToggle");

    if (!sidebar || !menuToggle) {
        console.error("Element sidebar atau menuToggle tidak ditemukan!");
        return;
    }

    menuToggle.addEventListener("click", function (event) {
        event.stopPropagation(); // Mencegah klik di luar langsung menutup
        sidebar.classList.toggle("active");
    });

    // Klik di luar sidebar untuk menutup (hanya di layar kecil)
    document.addEventListener("click", function (event) {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                sidebar.classList.remove("active");
            }
        }
    });

    // Pastikan saat pertama kali load, sidebar bisa ditutup/dibuka di semua layar
    window.addEventListener("resize", function () {
        if (window.innerWidth > 768) {
            return; // Biarkan toggle berjalan normal
        } else {
            sidebar.classList.remove("active");
        }
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("toggleBtn");
        const navMenu = document.getElementById("navMenu");

        toggleBtn.addEventListener("click", function () {
            console.log("Tombol diklik!"); // Cek apakah tombol bekerja
            navMenu.classList.toggle("hidden");
        });
    });
</script>


</body>

</html>
