<?php
session_start();
// Periksa apakah data sesi ada
if (!isset($_SESSION['nama_pelanggan']) ||
    !isset($_SESSION['email']) ||
    !isset($_SESSION['paket']) ||
    !isset($_SESSION['lokasi_pemasangan'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran</title>
    <link href="asset/img/jjj.jpg" rel="icon">
    <link href="asset/img/jjj.jpg" rel="apple-touch-icon">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #add8e6, #dda0dd),
                        url('asset/img/background.jpg');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .confirmation-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 600px;
            margin: auto;
        }

        .confirmation-container h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .confirmation-container p {
            font-size: 16px;
            color: #34495e;
        }

        .confirmation-container .details h3 {
            color: #2c3e50;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .confirmation-container .details p {
            font-size: 18px;
            color: #7f8c8d;
        }

        .confirmation-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #2980b9;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .confirmation-container a:hover {
            background-color: #1abc9c;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .shiny-shadow {
        width: 105px;
        height: 105px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1),
                    0 0 10px rgba(255, 255, 255, 0.8); /* Efek menyala */
        border-radius: 50%; /* Jika Anda ingin gambar berbentuk bulat */
        transition: box-shadow 0.3s ease-in-out;
    }

    .shiny-shadow:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2),
                    0 0 17px rgba(275, 275, 275, 2); /* Efek menyala lebih kuat saat hover */
    }


    /* Media Queries untuk responsif di perangkat mobile */
@media (max-width: 768px) {
    .confirmation-container {
        padding: 30px;
        max-width: 90%; /* Sesuaikan lebar form di tablet */
    }

    .confirmation-container h1 {
        font-size: 24px;
    }

    .confirmation-container p,
    .confirmation-container .details h3,
    .confirmation-container .details p {
        font-size: 16px;
    }

    .confirmation-container a {
        padding: 10px 20px;
    }
}

@media (max-width: 480px) {
    .confirmation-container {
        padding: 20px;
        max-width: 100%; /* Lebar penuh untuk layar kecil */
        margin: 10px;
    }

    .confirmation-container h1 {
        font-size: 20px;
    }

    .confirmation-container p,
    .confirmation-container .details h3,
    .confirmation-container .details p {
        font-size: 14px;
    }

    .confirmation-container a {
        padding: 8px 16px;
        font-size: 14px;
    }
}
    </style>
</head>
<body>

<div class="confirmation-container">
<img src="asset/img/ic.png" class="shiny-shadow">
    <h1>Terima Kasih Telah Mendaftar!</h1>
    <p>Pendaftaran Anda telah berhasil.</p>
    <div class="details">
        <h3>Rincian Pendaftaran Anda:</h3>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($_SESSION['nama_pelanggan']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <p><strong>Paket yang Dipilih:</strong> <?php echo htmlspecialchars($_SESSION['paket']); ?></p>
        <p><strong>Lokasi Pemasangan:</strong> <?php echo htmlspecialchars($_SESSION['lokasi_pemasangan']); ?></p>
    </div>

    <p>Tim kami akan segera menghubungi Anda untuk mengatur pemasangan dan langkah selanjutnya. Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami di <strong>087714242347</strong>.</p>
    <a href="../index.php">Kembali</a>
</div>
</body>
</html>
