{{-- <h2>Step 2: Email dan NPWP</h2>
<form action="/form/step3" method="POST">
    @csrf
     <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}">
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

 <div>
        <label for="nik">NIK</label>
        <input type="text" id="nik" name="nik" required value="{{ old('nik') }}">
        @error('nik') <span>{{ $message }}</span> @enderror
    </div>

     <div>
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required value="{{ old('nama_pelanggan') }}">
        @error('nama_pelanggan') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="no_handphone_wa">No Handphone Wa</label>
        <input type="text" id="no_handphone_wa" name="no_handphone_wa" required value="{{ old('no_handphone_wa') }}">
        @error('no_handphone_wa') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="no_handphone_2">No Handphone No</label>
        <input type="text" id="no_handphone_2" name="no_handphone_2" required value="{{ old('no_handphone_2') }}">
        @error('no_handphone_2') <span>{{ $message }}</span> @enderror
    </div>


    <div>
        <label for="npwp">NPWP</label>
        <input type="text" id="npwp" name="npwp" required value="{{ old('npwp') }}">
        @error('npwp') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="sumber_informasi">sumber_informasi</label>
        <input type="text" id="sumber_informasi" name="sumber_informasi" required value="{{ old('sumber_informasi') }}">
        @error('sumber_informasi') <span>{{ $message }}</span> @enderror
    </div>
    <button type="submit">Next</button>
</form> --}}

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berlangganan - Datadiri</title>
    <link href="{{ asset('asset/img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('asset/img/jjj.jpg') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style1.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
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

         .bullet:hover{
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

         .step.active .bullet{
             box-shadow: 0 0 20px rgba(52, 152, 219, 0.7);
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

        <!-- Langkah Multistep Horizontal -->
        <div class="steps">
            <div class="step active">
                <div class="bullet"><span>1</span></div>
                <div class="check fas fa-check"></div>
                <p>Pilih Lokasi</p>
            </div>
            <div class="step">
                <div class="bullet"><span>2</span></div>
                <div class="check fas fa-check"></div>
                <p>Data Diri</p>
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

        <!-- Tampilkan hasil pemilihan lokasi pemasangan -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 col-lg-5">
                <div class="alert alert-info">
                    <strong>Lokasi Pemasangan:</strong>
                    {{ session('lokasi_pemasangan', 'Belum memilih lokasi.') }}
                </div>
            </div>
        </div>

        <!-- Form pendaftaran -->
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url({{ asset('asset/img/login2.jpg') }});"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-2">Data Diri</h3>
                                <h6>Silahkan lengkapi data diri anda</h6>
                                @if(request('info') == 'error')
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h6><i class="icon fas fa-exclamation-triangle"></i> Terjadi kesalahan. Silakan periksa input Anda!</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Form Data Diri -->
                        {{-- <form action="{{ url('/form/datadiri') }}" class="signin-form" method="POST"> --}}
                            <form action="{{ route('user.form.datadiri') }}" class="signin-form" method="POST">

                            @csrf
                            <div class="form-group mt-3">
                                <input type="email" name="email" class="form-control" required>
                                <label class="form-control-placeholder" for="email">Email Address</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nik" class="form-control" required>
                                <label class="form-control-placeholder" for="nik">NIK</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_pelanggan" class="form-control" required>
                                <label class="form-control-placeholder" for="nama_pelanggan">Nama Pelanggan</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="no_handphone_wa" class="form-control" required>
                                <label class="form-control-placeholder" for="no_handphone_wa">No Handphone WA</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="no_handphone_2" class="form-control" required>
                                <label class="form-control-placeholder" for="no_handphone_2">No Handphone 2</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="npwp" class="form-control" required>
                                <label class="form-control-placeholder" for="npwp">NPWP</label>
                            </div>
                            <div class="form-group mt-3">
                                <label for="sumber_informasi">Sumber Informasi:</label>
                                <textarea name="sumber_informasi" id="sumber_informasi" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="bsimpan" class="form-control btn btn-primary rounded submit px-3">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('asset/dist/adminlte.min.js') }}"></script>
<script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/js/popper.js') }}"></script>
<script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script defer src="{{ asset('asset/js/beacon.min.js') }}"></script>
<script type="text/javascript">
    function goToPaket() {
        window.location.href = '{{ url('paket') }}';
    }

    function handleFormSubmit() {
        setTimeout(function() {
            window.location.href = '{{ url('paket') }}';
        }, 1000);
        return true;
    }
</script>
</body>
</html>
