{{--
<h2>Step 1: Lokasi Pemasangan dan Alamat Lengkap</h2>
<form action="/form/datadiri" method="POST">
    @csrf
    <div>
        <label for="lokasi_pemasangan">Lokasi Pemasangan</label>
        <input type="text" id="lokasi_pemasangan" name="lokasi_pemasangan" required value="{{ old('lokasi_pemasangan') }}">
        @error('lokasi_pemasangan') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="alamat_lengkap">Alamat Lengkap</label>
        <textarea id="alamat_lengkap" name="alamat_lengkap" required>{{ old('alamat_lengkap') }}</textarea>
        @error('alamat_lengkap') <span>{{ $message }}</span> @enderror
    </div>
    <button type="submit">Next</button>
</form> --}}




<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berlangganan - Lokasi Pemasangan</title>
    <link href="{{ asset('asset/img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('asset/img/jjj.jpg') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style1.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPgITzScR5cR1Omqp7BFe8tww8G2qOt4&libraries=places"></script>

    <style>
        #map {
            height: 300px;
            width: 100%;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 8px;
        }
        .form-container {
            display: flex;
            justify-content: center;
        }
        .img-container {
            width: 100%;
            overflow: hidden;
            border-radius: 4px 4px 0 0;
        }
        .img-container img {
            width: 100%;
            display: block;
        }
        .login-wrap {
            padding: 0;
            background: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body style="background: linear-gradient(#aeccea, #8fb5e1, #b1b2b4);">
<section class="ftco-section">
    <div class="container">
        <!-- Logo Container -->
        <div class="logo-container">
            <img src="{{ asset('asset/img/lloo.png') }}" alt="Intranusa.id" width="250" height="250"/>
        </div>

        <div class="row justify-content-center form-container">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img-container">
                        <img src="{{ asset('asset/img/login1.jpg') }}" alt="Background Image">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-2">Lokasi Pemasangan</h3>
                                <h6>Silahkan tentukan lokasi pemasangan</h6>

                                <!-- Pesan kesalahan -->
                                @if(request()->query('info') == 'error')
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h6><i class="icon fas fa-exclamation-triangle"></i> Anda belum memilih lokasi! Silakan pilih lokasi terlebih dahulu.</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
<se
                        <!-- Form Lokasi Pemasangan -->
                        {{-- <form action="{{ route('user.form.lokasi') }}" class="signin-form" method="POST">

                            @csrf
                            <div class="form-group mt-3">
                                <label for="pilihan-lokasi">Pilih Lokasi Pemasangan:</label>
                                <select name="lokasi_pemasangan" id="pilihan-lokasi" class="form-control" required>
                                    <option>-- Pilih lokasi --</option>
                                    <option value="perumahan graha arradea">Perumahan Graha Arradea</option>
                                    <option value="perumahan arta bina">Perumahan Arta Bina</option>
                                    <option value="perumahan bogor alam asri">Perumahan Bogor Alam Asri</option>
                                    <option value="perumahan bumi kartika dramaga raya">Perumahan Bumi Kartika Dramaga Raya</option>
                                    <option value="perumahan the manzil">Perumahan The Manzil</option>
                                    <option value="perumahan salak view">Perumahan Salak View</option>
                                    <option value="ciherang kaum">Ciherang Kaum</option>
                                    <option value="ciherang stamplas">Ciherang Stamplas</option>
                                    <option value="ciherang hegarsari">Ciherang Hegarsari</option>
                                    <option value="margajaya">Margajaya</option>
                                    <option value="sukawening">Sukawening</option>
                                    <option value="laladon">Laladon</option>
                                </select>
                            </div>

                            <div id="map-container" class="mt-3">
                                <div id="map"></div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="alamat-lengkap">Alamat Lengkap:</label>
                                <textarea name="alamat_lengkap" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Next</button>
                            </div>
                        </form> --}}

                        <form action="{{ route('user.form.lokasi') }}" class="signin-form" method="POST">
                            @csrf

                            <div class="form-group mt-3">
                                <label for="pilihan-lokasi">Pilih Lokasi Pemasangan:</label>
                                <select name="lokasi_pemasangan" id="pilihan-lokasi" class="form-control" required>
                                    <option>-- Pilih lokasi --</option>
                                    <option value="perumahan graha arradea">Perumahan Graha Arradea</option>
                                    <option value="perumahan arta bina">Perumahan Arta Bina</option>
                                    <option value="perumahan bogor alam asri">Perumahan Bogor Alam Asri</option>
                                    <option value="perumahan bumi kartika dramaga raya">Perumahan Bumi Kartika Dramaga Raya</option>
                                    <option value="perumahan the manzil">Perumahan The Manzil</option>
                                    <option value="perumahan salak view">Perumahan Salak View</option>
                                    <option value="ciherang kaum">Ciherang Kaum</option>
                                    <option value="ciherang stamplas">Ciherang Stamplas</option>
                                    <option value="ciherang hegarsari">Ciherang Hegarsari</option>
                                    <option value="margajaya">Margajaya</option>
                                    <option value="sukawening">Sukawening</option>
                                    <option value="laladon">Laladon</option>
                                </select>
                            </div>

                            <div id="map-container" class="mt-3">
                                <div id="map" style="height: 300px;"></div>
                            </div>

                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">

                            <div class="form-group mt-3">
                                <label for="alamat-lengkap">Alamat Lengkap:</label>
                                <textarea name="alamat_lengkap" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Next</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('asset/dist/adminlte.min.js') }}"></script>
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.js') }}"></script>
    <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script defer src="{{ asset('asset/js/beacon.min.js') }}"></script>

       {{-- <script>

        let map, marker, autocomplete;

        function initMap() {
            // Inisialisasi peta dengan posisi default di Bogor
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -6.595038, lng: 106.816635 },  // Koordinat untuk Bogor
                zoom: 13,  // Zoom level yang sesuai untuk melihat Bogor secara umum
            });

            // Inisialisasi marker
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
            });

            // Menghubungkan input dengan Google Places Autocomplete
            autocomplete = new google.maps.places.Autocomplete(document.getElementById("cari-lokasi"), {
                types: ['geocode'], // Membatasi jenis pencarian pada alamat (geocode)
                componentRestrictions: {'country': ['ID']} // Membatasi pencarian pada Indonesia
            });

            // Menghubungkan bounds autocomplete dengan peta
            autocomplete.bindTo("bounds", map);

            // Event listener untuk saat lokasi dipilih dari Autocomplete
            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();

                // Pastikan lokasi ditemukan dan memiliki geometri
                if (!place.geometry) {
                    alert("Lokasi tidak ditemukan. Silakan coba lokasi lain.");
                    return;
                }

                // Jika tempat memiliki viewport, sesuaikan peta dengan viewport tersebut
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);  // Pan peta ke lokasi yang dipilih
                    map.setZoom(17);  // Zoom ke lokasi yang dipilih
                }

                // Set posisi marker ke lokasi yang dipilih
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
            });

            // Event listener untuk dropdown pilihan lokasi
            document.getElementById('pilihan-lokasi').addEventListener('change', function() {
                const location = this.value;
                let latLng;

                switch (location) {
                    case 'perumahan graha arradea':
                        latLng = { lat: -6.58940, lng: 106.74736 }; // Koordinat untuk Perumahan Graha Arradea
                        break;
                    case 'perumahan arta bina':
                        latLng = { lat: -6.58653, lng: 106.74780 }; // Koordinat untuk Perumahan Antarbina
                        break;
                    case 'perumahan bogor alam asri':
                        latLng = { lat: -6.59297, lng: 106.74822 }; // Koordinat untuk Perumahan Bogor Alam Sari
                        break;
                    case 'perumahan bumi kartika dramaga raya':
                        latLng = { lat: -6.58183, lng: 106.73946 }; // Koordinat untuk Perumahan Bumi Kartika Dramaga Raya
                        break;
                    case 'perumahan the manzil':
                        latLng = { lat: -6.58095, lng: 106.74533 }; // Koordinat untuk Perumahan The Manzil
                        break;
                    case 'perumahan salak view':
                        latLng = { lat: -6.59220, lng: 106.74741 }; // Koordinat untuk Perumahan Salak View
                        break;
                    case 'ciherang kaum':
                        latLng = { lat: -6.58959, lng: 106.74548 }; // Koordinat untuk Ciherang Kaum
                        break;
                    case 'ciherang stamplas':
                        latLng = { lat: -6.58387, lng: 106.74574 }; // Koordinat untuk Ciherang Stamplas
                        break;
                    case 'ciherang hegarsari':
                        latLng = { lat: -6.58041, lng: 106.74365 }; // Koordinat untuk Ciherang Hegarsari
                        break;
                    case 'margajaya':
                        latLng = { lat: -6.57228, lng: 106.74060 }; // Koordinat untuk Margajaya
                        break;
                    case 'sukawening':
                        latLng = { lat: -6.59710, lng: 106.73794 }; // Koordinat untuk Sukawening
                        break;
                    case 'laladon':
                        latLng = { lat: -6.57625, lng: 106.75351 }; // Koordinat untuk Laladon
                        break;
                }

                map.setCenter(latLng);
                map.setZoom(17);
                marker.setPosition(latLng);
                marker.setVisible(true);
            });

            // Event listener untuk memindahkan marker secara manual
            google.maps.event.addListener(marker, 'dragend', function() {
                const position = marker.getPosition();
                map.setCenter(position);
            });
        }

        window.onload = function() {
            initMap();
        }

        function handleFormSubmit() {
                // Simpan data ke database melalui koneksi.php
                // Setelah submit berhasil, redirect ke halaman thank you
                setTimeout(function() {
                    window.location.href = 'datadiri.php';
                }, 1000); // Redirect setelah 1 detik untuk memberi waktu proses submit selesai
                return true; // Tetap submit form ke koneksi.php
            }
    </script> --}}

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places"></script> --}}
    <script>
        let map, marker, autocomplete;

        function initMap() {
            // Inisialisasi peta dengan posisi default di Bogor
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -6.595038, lng: 106.816635 },
                zoom: 13,
            });

            // Inisialisasi marker yang bisa digeser
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: { lat: -6.595038, lng: 106.816635 }
            });

            // Autocomplete pada input pencarian lokasi
            autocomplete = new google.maps.places.Autocomplete(document.getElementById("cari-lokasi"), {
                types: ['geocode'],
                componentRestrictions: {'country': ['ID']}
            });

            autocomplete.bindTo("bounds", map);

            // Saat user memilih lokasi dari autocomplete
            autocomplete.addListener("place_changed", function () {
                let place = autocomplete.getPlace();
                if (!place.geometry) {
                    alert("Lokasi tidak ditemukan. Silakan coba lagi.");
                    return;
                }

                // Update peta dan marker
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                // Simpan latitude dan longitude ke input hidden
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });

            // Event listener untuk dropdown pilihan lokasi
            document.getElementById('pilihan-lokasi').addEventListener('change', function() {
                const location = this.value;
                let latLng;

                switch (location) {
                    case 'perumahan graha arradea': latLng = { lat: -6.58940, lng: 106.74736 }; break;
                    case 'perumahan arta bina': latLng = { lat: -6.58653, lng: 106.74780 }; break;
                    case 'perumahan bogor alam asri': latLng = { lat: -6.59297, lng: 106.74822 }; break;
                    case 'perumahan bumi kartika dramaga raya': latLng = { lat: -6.58183, lng: 106.73946 }; break;
                    case 'perumahan the manzil': latLng = { lat: -6.58095, lng: 106.74533 }; break;
                    case 'perumahan salak view': latLng = { lat: -6.59220, lng: 106.74741 }; break;
                    case 'ciherang kaum': latLng = { lat: -6.58959, lng: 106.74548 }; break;
                    case 'ciherang stamplas': latLng = { lat: -6.58387, lng: 106.74574 }; break;
                    case 'ciherang hegarsari': latLng = { lat: -6.58041, lng: 106.74365 }; break;
                    case 'margajaya': latLng = { lat: -6.57228, lng: 106.74060 }; break;
                    case 'sukawening': latLng = { lat: -6.59710, lng: 106.73794 }; break;
                    case 'laladon': latLng = { lat: -6.57625, lng: 106.75351 }; break;
                }

                if (latLng) {
                    map.setCenter(latLng);
                    map.setZoom(17);
                    marker.setPosition(latLng);
                    marker.setVisible(true);

                    // Simpan latitude dan longitude ke input hidden
                    document.getElementById('latitude').value = latLng.lat;
                    document.getElementById('longitude').value = latLng.lng;
                }
            });

            // Event listener untuk menangkap lokasi saat marker dipindahkan
            google.maps.event.addListener(marker, 'dragend', function() {
                const position = marker.getPosition();
                document.getElementById('latitude').value = position.lat();
                document.getElementById('longitude').value = position.lng();
                map.setCenter(position);
            });
        }

        window.onload = function() {
            initMap();
        }
    </script>

</section>
</body>
</html>
