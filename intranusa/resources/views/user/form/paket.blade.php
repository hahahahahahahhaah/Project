
{{-- @section('content') --}}
    {{-- <h2>Step 3: Pilih Paket Data</h2>
    <form action="/form/syarat" method="POST">
        @csrf
        <div>
            <label for="paket">Pilih Paket Data</label>
            <select id="paket" name="paket" required>
                <option value="Basic">Paket Basic</option>
                <option value="Premium">Paket Premium</option>
                <option value="Deluxe">Paket Deluxe</option>
            </select>
            @error('paket') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Next</button>
    </form> --}}
{{-- @endsection --}}


{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar berlangganan - paket</title>
    <link href="{{ asset('asset/img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('asset/img/jjj.jpg') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
    <style>
        /* Styling tetap sama */
        .steps { display: flex; justify-content: space-between; padding: 0 250px; }
        .step { display: flex; flex-direction: column; align-items: center; flex: 1; }
        .bullet { width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border: 2px solid rgba(52, 152, 219, 0.9); border-radius: 50%; color: rgba(52, 152, 219, 0.9); background: #fff; transition: all 0.3s ease; }
        .bullet:hover { box-shadow: 0px 0px 15px rgba(52, 152, 219, 0.9); transform: scale(1.1); }
        .check { display: none; color: #2ecc71; font-size: 20px; }
        .step.active .bullet { background-color: #3498db; color: #fff; }
        .step.active .check { display: block; }
        .step p { font-size: 12px; font-weight: 600; color: #333; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body style="background: linear-gradient(#aeccea, #8fb5e1, #b1b2b4);">
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-2 d-flex align-items-center justify-content-center">
                <img src="{{ asset('asset/img/lloo.png') }}" alt="Intranusa.id" width="300" height="300"/>
            </div>
        </div>

        <div class="steps">
            <div class="step active"><div class="bullet"><span>1</span></div><p>Pilih Lokasi</p></div>
            <div class="step active"><div class="bullet"><span>2</span></div><p>Data diri</p></div>
            <div class="step"><div class="bullet"><span>3</span></div><p>Paket</p></div>
            <div class="step"><div class="bullet"><span>4</span></div><p>Syarat</p></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url({{ asset('asset/img/ppket.jpeg') }});"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-2">Tarif internet intranusa</h3>

                        @if (session('info'))
                            <div class="alert alert-success">{{ session('info') }}</div>
                        @endif

                        <form action="{{ route('form.syarat') }}" class="signin-form" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group mt-3">
                                <div class="qa-section">
                                    @foreach ([
                                        ['10mbps', 'Rp 166,500', '1-2', 'Tidak disarankan', '3-5', '2-3', '1-2'],
                                        ['15mbps', 'Rp 194,250', '2-3', '1 (terbatas)', '5-7', '3-4', '2-3'],
                                        ['20mbps', 'Rp 222,000', '3-4', '1-2', '7-10', '4-5', '3-4'],
                                        ['35mbps', 'Rp 249,750', '4-5', '1-3', '10-15', '6-8', '4-6'],
                                        ['50mbps', 'Rp 333,000', '6-10', '2-4', '15-20', '8-12', '5-8'],
                                    ] as $index => $paket)
                                        <details>
                                            <summary>{{ $paket[0] }} dengan tarif {{ $paket[1] }}/Bulan</summary>
                                            <p>- Streaming Video (HD): {{ $paket[2] }} Perangkat</p>
                                            <p>- Streaming Video (4K): {{ $paket[3] }} Perangkat</p>
                                            <p>- Browsing Media Sosial: {{ $paket[4] }} Perangkat</p>
                                            <p>- Video Call (HD): {{ $paket[5] }} Perangkat</p>
                                            <p>- Gaming Online: {{ $paket[6] }} Perangkat</p>
                                            <label><input type="radio" name="paket" value="{{ $paket[0] }}"> Pilih Paket Ini</label>
                                        </details>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    function validateForm() {
        if (!$("input[name='paket']:checked").val()) {
            alert("Silakan pilih paket terlebih dahulu.");
            return false;
        }
        return true;
    }
</script>
</body>
</html> --}}



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar berlangganan - paket</title>
    <link href="{{  secure_asset('asset/img/jjj.jpg') }}" rel="icon">
    <link href="{{  secure_asset('asset/img/jjj.jpg') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{  secure_asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{  secure_asset('style1.css') }}">
    <link rel="stylesheet" href="{{  secure_asset('asset/bootstrap/css/bootstrap.min.css') }}">
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

        bullet:hover{
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

        .step.active .bullet:hover{
            transform: scale(1.2);
            box-shadow: 0px 0px 20px rgba(52, 1252, 219, 1);
        }

        /* Font setting untuk teks lebih HD */
.step p {
    font-family: 'Arial', sans-serif; /* Menggunakan font yang tajam */
    font-size: 12px;                  /* Ukuran font lebih besar */
    font-weight: 600;                 /* Menambah ketebalan font */
    color: #333;                      /* Warna teks yang lebih kontras */
    text-rendering: optimizeLegibility;/* Optimalisasi rendering font */
    -webkit-font-smoothing: antialiased; /* Haluskan rendering font di Webkit */
    -moz-osx-font-smoothing: grayscale;  /* Haluskan rendering font di macOS */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Menambah sedikit bayangan */
}


        .step,
        .bullet {
            transition: all 0.3 ease-in-out;
        }

        .step.active .bullet{
            box-shadow: 0 0 20px rgba(52, 152, 219, 0.7);
        }

        .qa-section {
            margin-top: 20px;
        }

        .qa-section label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        details {
            margin-bottom: 20px;
            border: 2px solid #3498db;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        summary {
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        details p {
            margin-top: 10px;
            padding-left: 20px;
        }

        /* Styling untuk mengubah ikon saat detail terbuka */
        summary::before {
            content: "\25B6"; /* Panah kanan */
            display: inline-block;
            margin-right: 10px;
        }

        details[open] summary::before {
            content: "\25BC"; /* Panah bawah */
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
                width:  30px;
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
                <img src="{{ asset('asset/img/lloo.png') }}" alt="Intranusa.id" width="300" height="300"/>
            </div>
        </div>

        <div class="steps">
            <div class="step active">
                <div class="bullet"><span>1</span></div>
                <div class="check fas fa-check"></div>
                <p>Pilih Lokasi</p>
            </div>
            <div class="step active">
                <div class="bullet"><span>2</span></div>
                <div class="check fas fa-check"></div>
                <p>Data diri</p>
            </div>
            <div class="step">
                <div class="bullet"><span>3</span></div>
                <div class="check fas fa-check"></div>
                <p>Paket</p>
            </div>
            <div class="step">
                <div class="bullet"><span>4</span></div>
                <div class="check fas fa-check"></div>
                <p>Syarat</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url({{ asset('asset/img/ppket.jpeg') }});"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-2">Tarif internet intranusa</h3>

                        @if(session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="{{ route('user.form.paket') }}" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group mt-3">
                                <div class="qa-section">
                                    @foreach($pakets as $paket)  <!-- Loop melalui paket yang diambil dari database -->
                                        <details>
                                            <summary>{{ $paket->nama_paket }} dengan tarif Rp {{ number_format($paket->harga) }}/Bulan</summary>
                                            <p>- Streaming Video (HD) : {{ $paket->deskripsi_video_hd }} Perangkat</p>
                                            <p>- Streaming Video (4k) : {{ $paket->deskripsi_video_4k }} Perangkat</p>
                                            <p>- Browsing Media Sosial : {{ $paket->deskripsi_browsing }} Perangkat</p>
                                            <p>- Video Call (HD) : {{ $paket->deskripsi_video_call }} Perangkat</p>
                                            <p>- Gaming Online : {{ $paket->deskripsi_gaming }} Perangkat</p>
                                            <label>
                                                <input type="radio" name="paket" value="{{ $paket->id }}"> Pilih Paket Ini
                                            </label>
                                        </details>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Next</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{  secure_asset('asset/dist/adminlte.min.js') }}"></script>
<script src="{{  secure_asset('asset/jquery/jquery.min.js') }}"></script>
<script src="{{  secure_asset('asset/js/popper.js') }}"></script>
<script src="{{  secure_asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{  secure_asset('asset/js/main.js') }}"></script>
<script defer src="{{  secure_asset('asset/js/beacon.min.js') }}"></script>
<script>
    function validateForm() {
        if (!$("input[name='paket']:checked").val()) {
            alert("Silakan pilih paket terlebih dahulu sebelum melanjutkan.");
            return false;
        }
        return true;
    }

    function handleFormSubmit() {
        setTimeout(() => {
            window.location.href = '{{ url('syarat') }}';
        }, 1000);
        return true;
    }
</script>
</body>
</html>
