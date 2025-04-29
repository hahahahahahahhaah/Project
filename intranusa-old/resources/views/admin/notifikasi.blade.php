
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Boxicons -->
<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="/style2.css">
<link rel="stylesheet" href="/style.css">


<!-- jsPDF for PDF generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

<!-- Custom JavaScript -->
<script src="{{ asset('js/script.js') }}"></script>




    <title>From admin - pesan masuk admin</title>
    <link href="{{ asset('img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('img/jjj.jpg') }}" rel="apple-touch-icon">
    <style>
        /* Base styles for sidebar and content */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100%;
            background: var(--light);
            z-index: 2000;
            font-family: var(--lato);
            transition: .3s ease;
            overflow-x: hidden;
        }

        #content {
            position: relative;
            width: calc(100% - 280px);
            left: 280px;
            transition: .3s ease;
        }

        /* Navigation styles */
        nav {
            position: relative;
            width: 100%;
            padding: 15px;
            background: var(--light);
            display: flex;
            align-items: center;
            grid-gap: 24px;
            height: 64px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 28px;
            padding: 8px;
            cursor: pointer;
            color: var(--dark);
        }

       .detail-box {
    position: relative; /* Pastikan posisi relatif untuk ikon di dalamnya */
}

.confirm-icon, .reject-icon {
    position: absolute;
    right: 70px; /* Jarak antara ikon */
    bottom: 65px;
    margin-right: 20px;
    font-size: 24px; /* Ukuran ikon */
    margin: 0;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border-radius: 50%; /* Membuat ikon terlihat bulat */
    padding: 10px;
}

.confirm-icon {
    color: #4caf50; /* Hijau untuk centang */
    background-color: #e8f5e9;
    box-shadow: 0 2px 5px rgba(76, 175, 80, 0.5); /* Bayangan */
}

.reject-icon {
    color: #f44336; /* Merah untuk silang */
    background-color: #ffebee;
    box-shadow: 0 2px 5px rgba(244, 67, 54, 0.5); /* Bayangan */
}

/* Penempatan ikon silang di kanan paling pojok */
.reject-icon {
    right: 10px; /* Silang lebih kanan dibandingkan centang */
}

/* Efek hover */
.confirm-icon:hover, .reject-icon:hover {
    transform: scale(1.2); /* Membesarkan sedikit saat hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar */
}


        /* Mobile Responsive Styles */
        @media screen and (max-width: 768px) {
            body {
                font-size: 16px;
            }

            #sidebar {
                width: 280px;
                transform: translateX(-100%);
            }

            #sidebar.active {
                transform: translateX(0);
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            #content {
                width: 100% !important;
                left: 0 !important;
                padding: 15px;
            }

            .menu-toggle {
                display: block;
                position: absolute;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
                z-index: 1001;
            }

            nav {
                padding-left: 60px; /* Make room for burger menu */
            }

            .notification-icon {
                position: absolute !important;
                right: 15px !important;
                left: auto !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
            }

            /* Notification specific styles */
            .notif-container {
                padding: 15px;
                margin: 10px;
            }

            .notif-box {
                padding: 20px;
                margin-bottom: 15px;
                font-size: 18px !important;
            }

            .notif-box p {
                font-size: 16px !important;
                margin: 0;
                line-height: 1.5;
            }

            .detail-box {
                padding: 20px;
                margin-top: 10px;
                font-size: 16px !important;
            }

            .detail-box p {
                margin-bottom: 15px;
                line-height: 1.6;
            }

            .detail-box strong {
                font-size: 16px;
                display: inline-block;
                min-width: 150px;
            }

            /* Notification icons */
            .notif-box i {
                font-size: 24px;
                margin-right: 15px;
            }

            .delete-icon {
                font-size: 24px;
                padding: 10px;
            }

            /* Title styling */
            h1 {
                font-size: 24px !important;
                padding: 15px !important;
                margin: 10px 0 !important;
                text-align: center;
            }

            /* New notification indicator */
            .notif-box.new::before {
                width: 12px;
                height: 12px;
                top: 15px;
                left: 15px;
            }

            /* Popup notification */
            .popup-notification {
                width: 90%;
                max-width: 300px;
                right: 10px;
                top: 10px;
                padding: 15px 20px;
                font-size: 16px;
            }
        }

        /* Very small screens */
        @media screen and (max-width: 480px) {
            .notif-box {
                padding: 15px;
            }

            .detail-box {
                padding: 15px;
            }

            .notif-box p {
                font-size: 14px !important;
            }

            .detail-box p {
                font-size: 14px !important;
            }

            .detail-box strong {
                min-width: 120px;
                margin-right: 10px;
            }

            h1 {
                font-size: 20px !important;
            }

            .popup-notification {
                width: calc(100% - 20px);
                max-width: none;
                right: 10px;
                left: 10px;
            }
        }

        /* Sidebar: Menghilangkan garis setiap kata */
#sidebar ul li a {
    text-decoration: none; /* Menghilangkan garis */
}
/* Container styling */
.notif-container {
    display: flex;               /* Flexbox layout */
    flex-direction: column;      /* Notifikasi berjajar ke bawah */
    gap: 15px;                   /* Jarak antar notifikasi */
    max-width: 800px;            /* Lebar maksimum container */
    margin: 20px auto;           /* Center the container */
}

/* Horizontal notifikasi styling */
.notif-box {
    width: 100%;                 /* Full width */
    padding: 20px 30px;          /* Spacing inside the box */
    background-color: #ffffff;   /* Background putih */
    border-radius: 10px;         /* Rounded corners */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    display: flex;               /* Flex layout for horizontal design */
    justify-content: space-between; /* Distribute items horizontally */
    align-items: center;         /* Center items vertically */
    cursor: pointer;             /* Pointer cursor on hover */
    transition: transform 0.3s ease, background-color 0.3s ease; /* Hover effect */
}

/* Hover effect to slightly lift the notification */
.notif-box:hover {
    transform: translateY(-3px); /* Slight lift on hover */
    background-color: #f1f1f1;   /* Change background on hover */
}

/* Notification text styling */
.notif-box p {
    margin: 0;
    font-size: 16px;
    color: #333;
    flex: 1;                     /* Fill available space */
}

/* Hidden detail box (default: hidden) */
.detail-box {
    display: none;               /* Initially hidden */
    padding: 10px 20px;
    background-color: #f8f9fa;   /* Light gray background */
    border-radius: 8px;
    margin-top: 10px;
    box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1); /* Soft inner shadow */
}

/* Show the detail box when clicked */
.notif-box.active + .detail-box {
    display: block;              /* Show details */
}

/* Optional: Icon or indicator for notification */
.notif-box i {
    font-size: 24px;
    color: #007bff;              /* Icon color */
    margin-right: 10px;
}

/* Styling untuk tanda notifikasi baru (belum dibaca) */
.notif-box.new::before {
    content: '';
    width: 10px;
    height: 10px;
    background-color: red;    /* Lingkaran merah */
    border-radius: 50%;
    position: absolute;       /* Absolute position untuk menempatkan lingkaran */
    top: 20px;                /* Atur posisi vertikal */
    left: 20px;               /* Atur posisi horizontal */
}

/* Sesuaikan ikon dan teks notifikasi agar tidak tertutup oleh lingkaran */
.notif-box {
    position: relative;       /* Menambahkan posisi relatif untuk referensi */
    padding-left: 40px;       /* Beri jarak agar ikon tidak tertutup oleh lingkaran */
}
/* Style untuk ikon hapus (X) */
.delete-icon {
    font-size: 20px;
    color: #ff0000;  /* Warna merah */
    cursor: pointer;
    margin-left: 10px;
    transition: color 0.3s;
}

/* Hover efek untuk ikon hapus */
.delete-icon:hover {
    color: #ff5555;
}

/* Style untuk pop-up notifikasi */
.popup-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    font-size: 16px;
    opacity: 0.9;
    transition: opacity 0.3s ease;
}

.popup-notification:hover {
    opacity: 1;
}

h1 {
            text-align: center;
            font-size: 2.5rem; /* Ukuran font untuk judul */
            color: #2c3e50; /* Warna judul */
            text-transform: uppercase; /* Ubah semua huruf menjadi kapital */
            letter-spacing: 2px; /* Jarak antar huruf */
            padding: 10px 0; /* Padding atas dan bawah */
            border-bottom: 3px ; /* Garis bawah */
            margin-bottom: 20px; /* Margin bawah untuk jarak dengan elemen lain */
        }

/* Warna background untuk notifikasi baru (belum dibaca) */
.notif-box.new {
    background-color: #e6f7ff;  /* Biru muda untuk menandakan notifikasi baru */
    border-left: 5px solid #007bff; /* Garis tepi biru */
}

/* Warna background untuk notifikasi yang sudah dibaca */
.notif-box.read {
    background-color: #f8f9fa;  /* Warna abu-abu terang untuk notifikasi yang sudah dibaca */
    border-left: 5px solid #ccc; /* Garis tepi abu-abu */
}

</style>
</head>
    <body class="light-theme">



        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-lg-2 bg-dark text-white vh-100">
                    <!-- Isi Sidebar -->
                     <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bx-wifi' ></i>
                <span class="text">Intranusa</span>
            </a>
            <ul class="side-menu top">
                <li class="active">
                    <a href="/admin/dashboard">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/data">
                        <i class='bx bxs-group' ></i>
                        <span class="text">Data Berlangganan</span>
                    </a>
                </li>
                <li>
                    <a href="">
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

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to leave?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
                </div>
                <!-- Konten Utama -->
                <div class="col-md-9 col-lg-10 p-4">
                       <h1 style="text-align: center;">Notifikasi Admin</h1>
<div class="table-responsive container">
    <h2>Notifikasi Pendaftaran Pelanggan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>
                        <span class="badge bg-warning">{{ $pelanggan->status_langganan }}</span>
                    </td>
                    <td>
                        <form action="{{ route('notifikasi.approve', $pelanggan->id_pelanggan) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Terima</button>
                        </form>

                        <form action="{{ route('notifikasi.reject', $pelanggan->id_pelanggan) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>

    <!-- SIDEBAR -->

        <!-- SIDEBAR -->



<script>
function toggleDetail(element) {
    console.log("Notifikasi diklik!");
    element.classList.toggle('active');
    var detailBox = element.nextElementSibling;

    if (detailBox.style.display === "block") {
        detailBox.style.display = "none";
    } else {
        document.querySelectorAll('.detail-box').forEach(function(box) {
            box.style.display = 'none';
        });
        detailBox.style.display = "block";
    }

    if (element.classList.contains('new')) {
        console.log("Notifikasi baru. Mengubah status menjadi dibaca.");
        element.classList.remove('new');
        element.classList.add('read');

        var id = element.getAttribute('data-id');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_notif_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
    }
}

function checkDeletedNotifications() {
    let deletedNotifs = JSON.parse(localStorage.getItem('deletedNotifs')) || [];

    // Loop melalui semua notifikasi di halaman
    document.querySelectorAll('.notif-box').forEach(function(notifBox) {
        let notifId = notifBox.getAttribute('data-id');

        // Jika ID notifikasi ada di Local Storage, sembunyikan notifikasi
        if (deletedNotifs.includes(parseInt(notifId))) {
            notifBox.style.display = 'none';
        }
    });
}

function hideNotification(element, id) {
    if (confirm("Apakah Anda yakin ingin menyembunyikan notifikasi ini?")) {
        // Ambil elemen notifikasi (parent) dan sembunyikan
        var notifBox = element.closest('.notif-box');
        notifBox.style.display = 'none';

        // Simpan ID notifikasi yang dihapus ke Local Storage
        saveDeletedNotification(id);
    }
}

function saveDeletedNotification(id) {
    let deletedNotifs = JSON.parse(localStorage.getItem('deletedNotifs')) || [];

    // Jika notifikasi belum ada dalam daftar, tambahkan
    if (!deletedNotifs.includes(id)) {
        deletedNotifs.push(id);
        localStorage.setItem('deletedNotifs', JSON.stringify(deletedNotifs));
    }
}

// Jalankan fungsi checkDeletedNotifications saat halaman dimuat
window.onload = function() {
    checkDeletedNotifications();
};

function confirmNotification(element, id, type) {
    if (confirm("Apakah Anda yakin ingin mengonfirmasi notifikasi ini?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "confirme.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id + "&type=" + type);

        var notifBox = element.closest('.notif-box');
        notifBox.style.display = 'none';
    }
}

function rejectNotification(element, id, type) {
    if (confirm("Apakah Anda yakin ingin menolak notifikasi ini?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "reject_notif.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id + "&type=" + type);

        var notifBox = element.closest('.notif-box');
        notifBox.style.display = 'none';
    }
}
</script>


</body>
</html>
