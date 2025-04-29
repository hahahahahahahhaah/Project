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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS (Bundle with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <title>Form Admin</title>
    <link href="{{ asset('img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('img/jjj.jpg') }}" rel="apple-touch-icon">
</head>


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
                <a href="survei">
                    <i class='bx bxs-data'></i>
                    <span class="text">Data survey</span>
                </a>
            </li>
            <li>
                <a href="qna" >
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">ChatBot</span>
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
    <a href="notification.php">
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
                    <td>{{ $data->paket }}</td>
                    <td>{{ $data->lokasi_pemasangan }}</td>
                </tr>
                @endforeach
                       </tbody>
                   </table>
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
</body>

</html>
