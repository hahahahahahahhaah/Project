{{-- <form action="{{ route('form.syarat') }}" method="POST">
    @csrf
    <h2>Syarat dan Ketentuan</h2>
    <p>Silakan baca dan setujui syarat sebelum melanjutkan.</p>

    <label>
        <input type="checkbox" name="syarat" value="1">
        Saya menyetujui syarat dan ketentuan.
    </label>

    <button type="submit">Lanjut</button>
</form>
 --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan ketentuan</title>
    <link href="{{  secure_asset('asset/img/jjj.jpg') }}" rel="icon">
    <link href="{{  secure_asset('asset/img/jjj.jpg') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{  secure_asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{  secure_asset('style1.css') }}">
    <link rel="stylesheet" href="{{  secure_asset('asset/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{  secure_asset('js/jquery-3.7.1.min.js') }}" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        /* Mengatur tampilan section multistep */
        .steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
            position: relative;
            padding: 0 250px;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
            flex: 1;
        }

        .steps::before {
            content: '';
            position: absolute;
            top: 28%;
            left: 28%;
            right: 28%;
            height: 1px;
            background-color: rgba(52, 152, 219, 0.8);
            box-shadow: 0px 0px 15px rgba(52, 152, 219, 0.7);
            transform: translateY(-30%);
            z-index: 0;
        }

        .bullet {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid rgba(52, 152, 219, 0.9);
            border-radius: 60%;
            color: rgba(52, 152, 219, 0.9);
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1;
        }

        bullet:hover {
            box-shadow: 0px 0px 15px rgba(52, 152, 219, 0.9);
            transform: scale(1.1);
        }

        .check {
            display: none;
            color: #2ecc71;
            font-size: 20px;
        }

        .step.active .bullet {
            background-color: #3498db;
            color: #fff;
            border-color: #3498db;
            box-shadow: 0px 0px 15px rgba(52, 152, 219, 0.9);
        }

        .step.active .check {
            display: block;
        }

        .step.active .bullet:hover {
            transform: scale(1.2);
            box-shadow: 0px 0px 20px rgba(52, 1252, 219, 1);
        }

        /* Font setting untuk teks lebih HD */
        .step p {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            font-weight: 600;
            color: #333;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .step,
        .bullet {
            transition: all 0.3 ease-in-out;
        }

        .step.active .bullet {
            box-shadow: 0 0 20px rgba(52, 152, 219, 0.7);
        }

        /* Styling untuk syarat dan ketentuan */
        .terms-section {
            margin-top: 20px;
            padding: 15px;
            border: 2px solid #3498db;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-height: 400px;
            overflow-y: scroll;
        }

        .terms-section h4 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #3498db;
        }

        .terms-section p {
            text-align: justify;
            margin-bottom: 10px;
        }

        .terms-section ul {
            margin-left: 20px;
        }

        .form-group.check-agree {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .form-group.check-agree input {
            margin-right: 10px;
        }

        @media screen and (max-width: 768px) {
            .steps {
                padding: 0 50px;
            }

            .bullet {
                width: 35px;
                height: 35px;
            }

            .step p {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 768px) {
            .steps {
                padding: 0 50px;
            }

            .bullet {
                width: 35px;
                height: 35px;
            }

            .step p {
                font-size: 10px;
            }
        }

        @media screen and (max-width: 576px) {
            .steps {
                padding: 0 15px;

            }

            .bullet {
                width: 30px;
                height: 30px;
            }

            .step p {
                font-size: 12px;
            }

            .steps::before {
                content: '';
                position: absolute;
                top: 25%;
                left: 5vh;
                right: 5vh;
                height: 1px;
                z-index: 0;
            }
        }
    </style>
</head>

<body style="background: linear-gradient(#aeccea, #8fb5e1, #b1b2b4);">
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-2 d-flex align-items-center justify-content-center">
                    <img src="{{  secure_asset('asset/img/lloo.png') }}" alt="Intranusa.id" width="300" height="300"/>

                </div>
            </div>

            <!-- Langkah Multistep Horizontal -->
            <div class="steps">
                <div class="step active">
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                    <p>Pilih lokasi</p>
                </div>
                <div class="step active">
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                    <p>Data diri</p>
                </div>
                <div class="step active">
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                    <p>Paket</p>
                </div>
                <div class="step">
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                    <p>Syarat</p>
                </div>
            </div>

            <!-- Notifikasi jika data paket berhasil disimpan -->



            <!-- Form persetujuan syarat dan ketentuan -->
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(asset/img/sk.jpeg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-2">Syarat dan Ketentuan</h3>
                                    <!-- Notifikasi berdasarkan info -->

                                </div>
                            </div>
                            <form  class="signin-form" action="{{ route('user.form.syarat.accept') }}" method="POST">
                                @csrf
                            <div class=" terms-section">
                                <h4>Syarat dan Ketentuan Berlangganan</h4>
                                <p>
                                    Dengan ini Anda menyetujui semua syarat dan ketentuan berikut dalam berlangganan layanan internet Intranusa:
                                </p>
                                <ul>
                                    <li>Harga berlangganan sudah termasuk PPN 11%.Pembayaran pertama dilakukan setelah alat selesai terpasang (PRABAYAR).</li>
                                    <li>Router wifi/onu kami pinjamkan.</li>
                                    <li>Apabila terjadi kerusakan pada Router/onu karena kelalaian user:
                                        <p>- Bencana alam</p>
                                        <p>- Reset</p>
                                        <p>- Modifikasi system</p>
                                        <p>- Modifikasi kelistrikan</p>
                                        <p>Maka user di kenakan biaya pergantian sebesar Rp 250.000.</p>
                                    <li>Bagi wilayah yang belum tercover fiber optic maka menggunakan opsi radio atas.</li>
                                    <li>Jatuh tempo pembayaran pertanggal 10,20 dan 30
                                        <p>- Registrasi tgl 1-10 Jatuh Tempo per-tgl 10</p>
                                        <p>- Registrasi tgl 11-20 Jatuh Tempo per-tgl 20</p>
                                        <p>- Registrasi tgl 21-31 Jatuh Tempo per-tgl 30 atau akhir bulan di februari</p>
                                    </li>
                                    <li>Pemutusan layanan sementara terjadi jika dalam waktu +10 hari dari tanggal jatuh tempo tidak ada konfirmasi pembayaran & konfirmasi izin telat pembayaran</li>
                                    <li>Jika dalam 1 bulan tidak ada konfirmasi maka pemutusan permanen layanan internet dan teknisi akan mengambil perangkat router/onu pada tanggal tersebut.</li>
                                    <li>Apabila cust ingin berlangganan kembali kurang dari 6 bulan maka di kenakan biaya sebesar Rp 250.000 karena free pemasangan hanya berlaku sekali</li>
                                    <li>Komplain/Keluhan ditangani pada jam kerja 08.00-20.00 WIB (Senin-Minggu), jika komplain di atas jam kerja maka akan ditangani besok hari sesuai dengan jam kerja</li>
                                    <li>Pelayanan Komplain user diluar gangguan masal/gangguan jalur induk akan dilakukan:
                                        <p>-Dedicated 0x24 Jam</p>
                                        <p>-Broadband 1x24 Jam</p>
                                    </li>
                                    <li>Kompensasi Komplain user khusus dedicated akan mendapatkan pelayanan VVIP oleh NOC 24 Jam dimana pemabayaran menggunakan system prorata sedangkan paket broadband tidak ada kompensasi</li>
                                    <li>Berhenti berlangganan, user dipersilahkan mengajukan berhenti berlangganan minimal tiga bulan berlangganan dengan menyerahkan bukti sudah melunasi biaya berlangganan di bulan berjlan dan menyerahkan router/onu yang dipinjamkan kepada teknisi intranusa</li>
                                    <li>Jika user tetap ingin berhenti berlangganan belum tiga bulan, maka user wajib membayar untuk tiga bulan kedepan</li>
                                    <li>Pelanggan dilarang melakukan penjualan kembali baik sebagian maupun keseluruhan layanan Intranusa dalam bentuk apapun tanpa izin tertulis dari PT. Global Media Data Prima</li>
                                </ul>
                        </div>
                        <!-- Checkbox persetujuan syarat dan ketentuan -->
                        <div class="form-group check-agree">
                            <label for="agree">
                            <input type="checkbox" id="agree" name="syarat" value="1" required>
                          Saya menyetujui syarat dan ketentuan yang berlaku</label>
                        </div>
                        <!-- Tombol submit -->
                        <div class="form-group">
                            <button type="submit" id="submitBtn" name="bsimpan" class="form-control btn btn-primary rounded submit px-3">Kirim</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="{{  secure_asset('dist/adminlte.min.js') }}"></script>
    <script src="{{  secure_asset('jquery/jquery.min.js') }}"></script>
    <script src="{{  secure_asset('js/popper.js') }}"></script>
    <script src="{{  secure_asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{  secure_asset('js/main.js') }}"></script>
    <script defer src="{{  secure_asset('js/beacon.min.js') }}"></script>

    <script src="{{  secure_asset('fetch-data.js') }}"></script>

    {{-- <script>
        document.getElementById("submitBtn").addEventListener("click", function(e) {
            e.preventDefault();
            var agreeCheckbox = document.getElementById('agree');

            if (!agreeCheckbox.checked) {
                alert('Harap setujui syarat dan ketentuan sebelum melanjutkan.');
                return;
            }

            const form = document.getElementById("sign-form");
            const formData = new FormData(form);


            fetch("save_data.php?step=syarat", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('data nih:', data);

                        const conn = new WebSocket('ws://localhost:8080');

                        conn.onopen = function(e) {
                            console.log("Connection established!");

                            const message = {
                                type: 'CREATE_DATA',
                                payload: {
                                    nama_pelanggan: data.nama_pelanggan,
                                    email: data.email,
                                    lokasi_pemasangan: data.lokasi_pemasangan,
                                    paket: data.paket,
                                    nik: data.nik,
                                    no_handphone_wa: data.no_handphone_wa,
                                    no_handphone_2: data.no_handphone_2,
                                    npwp: data.npwp,
                                    alamat_lengkap: data.alamat_lengkap,
                                    sumber_informasi: data.sumber_informasi
                                }
                            };

                            conn.send(JSON.stringify(message));

                             window.location.href = "confirm.php";
                        };

                        conn.onerror = function(e) {
                            console.log("Connection error:", e);
                        }
                    } else {
                        alert("gagal menambahkan data");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                })
        })
    </script>

    <script>
        function validateForm() {
            let valid = true;
            const requiredFields = document.querySelectorAll("input[required], textarea[required]");

            requiredFields.forEach(field => {
                if (!field.value) {
                    valid = false;
                    field.style.boxShadow = "0 0 10px red";
                    alert('Harap isi semua kolom yang diperlukan sebelum melanjutkan.');
                } else {
                    field.style.boxShadow = "none";
                }
            });

            if (valid) {
                handleFormSubmit(); // Memanggil fungsi submit jika validasi sukses
            }

            return valid; // Jika valid, form akan disubmit, jika tidak, form tidak akan disubmit
        }

        function handleFormSubmit() {
            // Simpan data ke database melalui koneksi.php
            // Setelah submit berhasil, redirect ke halaman konfirmassi
            setTimeout(function() {
                window.location.href = 'confirm.php';
            }, 1000); // Redirect setelah 1 detik untuk memberi waktu proses submit selesai
            return true; // Tetap submit form ke koneksi.php
        }
        // document.getElementById('submitBtn').addEventListener('click', function(event) {
        //     // Cek apakah checkbox sudah dicentang

        //     if (!agreeCheckbox.checked) {
        //         // Jika belum, tampilkan pesan dan cegah pengiriman form
        //         alert('Anda harus menyetujui syarat dan ketentuan yang berlaku.');
        //         event.preventDefault(); // Mencegah pengiriman form
        //     }
        // });

        document.querySelectorAll('.alert .close').forEach(function(element) {
            element.addEventListener('click', function() {
                this.parentElement.style.display = 'none';
            });
        });

        function goToConfirm() {
            window.location.href = 'confirm.php';
        }

        // Mengambil elemen gambar
        const logo = document.getElementById('logo');

        // Menambahkan event listener ketika kursor menyentuh gambar
        logo.addEventListener('mouseenter', () => {
            logo.classList.add('animate'); // Menambahkan kelas untuk memulai animasi
        });

        // Menghapus animasi setelah selesai
        logo.addEventListener('animationend', () => {
            logo.classList.remove('animate'); // Menghapus kelas untuk mengulang animasi saat disentuh lagi
        });

        function handleFormSubmit() {
            // Simpan data ke database melalui koneksi.php
            // Setelah submit berhasil, redirect ke halaman thank you
            setTimeout(function() {
                window.location.href = 'confirm.php';
            }, 1000); // Redirect setelah 1 detik untuk memberi waktu proses submit selesai
            return true; // Tetap submit form ke koneksi.php
        }
    </script> --}}
</body>

</html>
