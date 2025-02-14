<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- My CSS -->
    <link rel="stylesheet" href="/style2.css">
    <link rel="stylesheet" href="/admin.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>From admin - data berlangganan</title>
    <link href="{{ asset('img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('img/jjj.jpg') }}" rel="apple-touch-icon">
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-wifi' ></i>
            <span class="text">Intranusa</span>

        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="data">
                    <i class='bx bxs-group'></i>
                    <span class="text">Data Berlangganan</span>
                </a>
            </li>
            <li>
                <a href="survei">
                    <i class='bx bxs-message-dots'></i>
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


    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <div class="notification-icon" style="position: relative; display: inline-block; left: 93%; margin-right: 20px;">
                <a href="notification.php">
                    <i class="bx bxs-bell" style="font-size: 24px;"></i> <!-- Lonceng -->

                    <span class="badge" style="position: absolute; top: -5px; right: -5px; background-color: red; color: white; border-radius: 50%; padding: 4px 8px; font-size: 12px;">

                    </span>

                </a>
                <audio id="notificationSound" src="assets/audio/notification.mp3" reload="auto"></audio>

            </div>
        </nav>
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Data pelanggan
            </div>
            <div class="container">
                <div class="row mb-3">
                    <!-- Tombol "Tambah Data" di sisi kiri -->
                    <div class="col-md-2 mb-2">
                        <button type="button" class="btn btn-success mb-3 custom-btn-margin" data-bs-toggle="modal"
                            data-bs-target="#modalTambah">
                            <i class="bi bi-plus"></i> Tambah data
                        </button>
                    </div>

                    <div class="col-md-10">
                        <form id="filter-form">
                            <div class="filter-container">
                                <!-- Filter by Date -->
                                <div class="filter-group">
                                    <label for="date">Pertanggal:</label>
                                    <input type="date" name="date" class="form-control">
                                </div>

                                <!-- Filter by Month -->
                                <div class="filter-group">
                                    <label for="month">Perbulan:</label>
                                    <input type="month" name="month" class="form-control">
                                </div>
                                <!-- Filter by Day of the Week -->
                                <div class="filter-group">
                                    <label for="day_of_week">Perhari:</label>
                                    <select name="day_of_week" class="form-control">
                                        <option value="">Select Day</option>
                                        <option value="1">Sunday</option>
                                        <option value="2">Monday</option>
                                        <option value="3">Tuesday</option>
                                        <option value="4">Wednesday</option>
                                        <option value="5">Thursday</option>
                                        <option value="6">Friday</option>
                                        <option value="7">Saturday</option>
                                    </select>
                                </div>
                                <!-- Button group di sebelah kanan -->
                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                     <a href="data.php" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <div class="table-container">
                    <table class="table table-bordered table-striped table-hover cihuy">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama pelanggan</th>
                                <th>Email</th>
                                <th>Lokasi pemasangan</th>
                                <th>Paket</th>
                                <th>NIK</th>
                                <th>No handphone wa</th>
                                <th>No handphone 2</th>
                                <th>NPWP</th>
                                <th>Alamat lengkap</th>
                                <th>Sumber informasi</th>
                                <th>Tanggal Mulai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->nama_pelanggan }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->lokasi_pemasangan }}</td>
                                <td>{{ $data->paket }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->no_handphone_wa }}</td>
                                <td>{{ $data->no_handphone_2 }}</td>
                                <td>{{ $data->npwp }}</td>
                                <td>{{ $data->alamat_lengkap }}</td>
                                <td>{{ $data->sumber_informasi }}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                </div>
                <!-- Start modal hapus -->

                <!-- finish modal hapus -->

                <!-- Start modal ubah -->


                <!-- finish modal ubah -->



                </table>


                <div class="d-flex justify-content-left mt-4 bawah">
                    <button class="btn btn-success" type="button" id="downloadButtonId" style="margin-left: 20px;">
                        <i class="bi bi-download"></i> Download as PDF
                    </button>
                    <button id="previewButtonId" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pdfPreviewModal" style="margin-left: 40px;">
                        <i class="bi bi-eye"></i> View PDF
                    </button>
                    <div aria-label="Page navigation" style="margin-left: 40px;">
                        <ul class="pagination" id="pagination">

                        </ul>
                    </div>
                </div>
                <!-- Modal untuk preview PDF -->
                <div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pdfPreviewModalLabel">Preview PDF</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe id="pdfPreviewIframe" width="100%" height="500px"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>










                <!-- start modal tambah -->
                <div class="modal fade" id="modalTambah" data-bs-keyboard="false"
                    tabindex="-1" aria-LabeLLedby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Data Pelanggan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.store') }}" method="POST">
                                @csrf

                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="form-label">Nama Pelanggan</label>
                                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama lengkap" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat email" >
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Lokasi Pemasangan</label>
                                        <select class="form-control" id="lokasi_pemasangan" name="lokasi_pemasangan" required>
                                            <option></option>
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
                                    <div class="form-group">
                                        <label class="form-label">Pilih paket</label>
                                        <select class="form-control"  id="paket" name="paket" required>
                                            <option></option>
                                            <option value="10 mbps">10 mbps</option>
                                            <option value="15 mbps">15 mbps</option>
                                            <option value="20 mbps">20 mbps</option>
                                            <option value="35 mbps">35 mbps</option>
                                            <option value="50 mbps">50 mbps</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" ceholder="Masukkan NIK" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">No handphone WA</label>
                                        <input type="text" class="form-control"  id="no_handphone_wa" name="no_handphone_wa" placeholder="Masukkan no handphone WA" >

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">No handphone 2</label>
                                        <input type="text" class="form-control"  id="no_handphone_2" name="no_handphone_2" placeholder="Masukkan no handphone 2" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">NPWP</label>
                                        <input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan NPWP" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Alamat lengkap</label>
                                        <textarea class="form-control"  id="alamat_lengkap" name="alamat_lengkap" required rows="3"  placeholder="Masukkan Alamat lengkap" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sumber informasi</label>
                                        <textarea class="form-control" id="sumber_informasi" name="sumber_informasi"  rows="3"  ></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                            {{-- <form action="{{ route('admin.store') }}" method="POST">
                                @csrf
                                <label for="nama_pelanggan">Nama Pelanggan:</label>
                                <input type="text" id="nama_pelanggan" name="nama_pelanggan" required><br>

                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required><br>

                                <label for="lokasi_pemasangan">Lokasi Pemasangan:</label>
                                <input type="text" id="lokasi_pemasangan" name="lokasi_pemasangan" required><br>

                                <label for="paket">Paket:</label>
                                <input type="text" id="paket" name="paket" required><br>

                                <label for="nik">NIK:</label>
                                <input type="text" id="nik" name="nik" required><br>

                                <label for="no_handphone_wa">No. Handphone WA:</label>
                                <input type="text" id="no_handphone_wa" name="no_handphone_wa" required><br>

                                <label for="no_handphone_2">No. Handphone 2:</label>
                                <input type="text" id="no_handphone_2" name="no_handphone_2"><br>

                                <label for="npwp">NPWP:</label>
                                <input type="text" id="npwp" name="npwp"><br>

                                <label for="alamat_lengkap">Alamat Lengkap:</label>
                                <textarea id="alamat_lengkap" name="alamat_lengkap" required></textarea><br>

                                <label for="sumber_informasi">Sumber Informasi:</label>
                                <input type="text" id="sumber_informasi" name="sumber_informasi" required><br>

                                <button type="submit">Simpan</button>
                            </form> --}}

                            <!-- finish modal tambah -->
                        </div>

                        <script src="fetch-data.js"></script>
                        <script src="notification.js"></script>

                        {{-- <script>
                            $(document).ready(function() {
                                var notificationSound = document.getElementById('notificationSound');
                                var isSubmitting = false;
                                var conn = new WebSocket('ws://localhost:8080');
                                conn.onopen = function(e) {
                                    console.log("Connection established!");
                                };

                                conn.onmessage = function(e) {
                                    const message = JSON.parse(e.data);
                                    console.log(e.data);

                                    if (message.type === 'NEW_DATA') {
                                        alert('Data berhasil disimpan!');
                                        notificationSound.play();
                                        loadTableData();
                                        loadNotification();
                                    };
                                }




                                $('#formTambahData').on('submit', function(e) {
                                    e.preventDefault();

                                    fetch('subscription.php', {
                                            method: 'POST',
                                            body: new FormData(this)
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);
                                            alert('Data berhasil disimpan!');
                                            notificationSound.play();
                                            $('#modalTambah').modal('hfore');
                                            $('#formTambahData')[0].reset();
                                            loadNotification();
                                            loadTableData();



                                            // if (data.success) {
                                            //     const message = {
                                            //         type: 'CREATE_DATA',
                                            //         payload: {
                                            //             nama_pelanggan: data.nama_pelanggan,
                                            //             email: data.email,
                                            //             lokasi_pemasangan: data.lokasi_pemasangan,
                                            //             paket: data.paket,
                                            //             nik: data.nik,
                                            //             no_handphone_wa: data.no_handphone_wa,
                                            //             no_handphone_2: data.no_handphone_2,
                                            //             npwp: data.npwp,
                                            //             alamat_lengkap: data.alamat_lengkap,
                                            //             sumber_informasi: data.sumber_informasi
                                            //         }
                                            //     }

                                            //     conn.send(JSON.stringify(message));

                                            //     alert('Data berhasil disimpan!');
                                            //     notificationSound.play();
                                            //     $('#modalTambah').modal('hide');
                                            //     $('#formTambahData')[0].reset();
                                            //     loadNotification();
                                            //     loadTableData();
                                            // }
                                        });
                                })


                                $('#filter-form').on('submit', function(e) {
                                    e.preventDefault();


                                    const fillters = {
                                        date: $('input[name="date"]').val(),
                                        month: $('input[name="month"]').val(),
                                        day_of_week: $('select[name="day_of_week"]').val(),
                                        page: 1,
                                    };
                                    console.log(fillters);

                                    loadTableData(1, fillters);
                                });

                                $('#resetFillter').on('click', function(e) {
                                    e.preventDefault();

                                    $('#filter-Form')[0].reset();
                                    loadTableData();

                                })
                            })
                        </script> --}}




                        <script src="script.js"></script>
                       {{-- <script>
                           function extractTableDataFromDOM() {
    const tableRows = document.querySelectorAll(".cihuy tbody tr");
    const extractedData = [];

    tableRows.forEach((row, index) => {
        const cells = row.querySelectorAll("td");
        if (cells.length > 0) {
            extractedData.push([
                index + 1, // Nomor
                cells[1]?.innerText || "-", // Nama & alamat pelanggan
                cells[2]?.innerText || "-", // Email
                cells[3]?.innerText || "-", // Kualitas internet
                cells[4]?.innerText || "-", // Customer service
                cells[5]?.innerText || "-", // Teknisi
                cells[6]?.innerText || "-", // Gangguan
                cells[7]?.innerText || "-", // Kecepatan
                cells[8]?.innerText || "-", // Kualitas harga
                cells[9]?.innerText || "-", // Rekomendasi
                cells[10]?.innerText || "-", // Komentar
                cells[11]?.innerText || "-", // Created
            ]);
        }
    });

    return extractedData;
}

// Fungsi untuk menyiapkan properti PDF dengan data tabel
function preparePDFProps() {
    const tableData = extractTableDataFromDOM();

    if (tableData.length === 0) {
        alert("Tidak ada data yang tersedia untuk diunduh.");
        return null;
    }

    return {
        outputType: jsPDFInvoiceTemplate.OutputType.Save,
        returnJsPDFDocObject: true,
        fileName: "data_berlangganan",
        orientationLandscape: true,
        format: "a1",
        compress: true,
        logo: {
            src: "img/Llogo.png",
            type: "PNG",
            width: 55.33,
            height: 35.66,
            margin: { top: -8, left: 0 },
        },
        business: {
            name: "Intranusa.id",
            address: "Jl.Graha Arradea Blok CB no 2, Ciherang, Dramaga, Bogor Regency",
            phone: "+628771424247",
            email: "intranusa.id@gmail.com",
        },
        contact: {
            name: "Daftar berlangganan",
        },
        invoice: {
            invDate: "Tanggal : " + new Date().toLocaleDateString("id-ID"),
            headerBorder: true,
            tableBodyBorder: true,
            header: [
                { title: "No", style: { width: 7 } },
                { title: "Nama Pelanggan", style: { width: 35 } },
                { title: "Email", style: { width: 30 } },
                { title: "Lokasi Pemasangan", style: { width: 35 } },
                { title: "Paket", style: { width: 15 } },
                { title: "NIK", style: { width: 20 } },
                { title: "No HP WA", style: { width: 20 } },
                { title: "No HP 2", style: { width: 20 } },
                { title: "NPWP", style: { width: 20 } },
                { title: "Alamat Lengkap", style: { width: 33 } },
                { title: "Sumber Informasi", style: { width: 30 } },
                { title: "Tanggal Mulai", style: { width: 20 } }
            ],
            table: tableData,
            additionalRows: [
                {
                    col1: "Total Pelanggan Masuk:",
                    col2: tableData.length.toString(),
                    col3: "Orang",
                    style: { fontSize: 10 },
                },
            ],
        },
        footer: {
            text: "Data ini dihasilkan otomatis oleh sistem dan sah tanpa tanda tangan atau stempel.",
        },
        pageEnable: true,
        pageLabel: "Halaman ",
    };
}

// Fungsi untuk menampilkan preview PDF dalam modal
function previewPDF() {
    const props = preparePDFProps();
    if (!props) return; // Jika tidak ada data, berhenti

    try {
        const previewProps = { ...props, outputType: jsPDFInvoiceTemplate.OutputType.DataUriString };
        const pdfObject = jsPDFInvoiceTemplate.default(previewProps);

        // Dapatkan URL DataURI dari PDF
        const pdfDataUri = pdfObject.jsPDFDocObject.output("datauristring");
        console.log("Preview PDF DataURI:", pdfDataUri);

        // Tampilkan PDF dalam iframe di modal
        document.getElementById("pdfPreviewIframe").src = pdfDataUri;

        // Tampilkan modal
        const pdfModal = new bootstrap.Modal(document.getElementById("pdfPreviewModal"));
        pdfModal.show();
    } catch (error) {
        console.error("Error saat membuat preview PDF:", error);
    }
}

// Fungsi untuk mendownload PDF
function generatePDF() {
    const props = preparePDFProps();
    if (!props) return; // Jika tidak ada data, berhenti

    try {
        jsPDFInvoiceTemplate.default(props);
        console.log("PDF berhasil diunduh.");
    } catch (error) {
        console.error("Error saat mengunduh PDF:", error);
    }
}

// Event listeners untuk tombol Preview dan Download
document.getElementById("previewButtonId").addEventListener("click", previewPDF);
document.getElementById("downloadButtonId").addEventListener("click", generatePDF);
                       </script> --}}

</body>

</html>
{{-- <script>
document.querySelector('.bx-menu').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
});

document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.querySelector('.bx-menu');

    if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
        sidebar.classList.remove('active');
    }
});

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        document.getElementById('sidebar').classList.remove('active');
    }
});
</script> --}}
