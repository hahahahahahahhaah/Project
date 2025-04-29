<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/style2.css">
    <link rel="stylesheet" href="/admin.css">

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- jsPDF untuk generasi PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <!-- JS SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <title>From Admin - Data Survey</title>

    <!-- Favicon -->
    <link href="{{ asset('img/jjj.jpg') }}" rel="icon">
    <link href="{{ asset('img/jjj.jpg') }}" rel="apple-touch-icon">

    @stack('styles') <!-- Untuk menambahkan style tambahan di halaman tertentu -->
    @stack('scripts') <!-- Untuk menambahkan script tambahan di halaman tertentu -->
</head>


<body class="light-theme">
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-wifi'></i>
            <span class="text">Intranusa</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <a href="data">
                <i class='bx bxs-group'></i>
                <span class="text">Data Berlangganan</span>
            </a>
            <li class="active">
                <a href="survei">
                    <i class='bx bxs-message-dots'></i>
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
    <!-- SIDEBAR -->



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


            </div>
        </nav>
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Survey kepuasan pelanggan
            </div>
            <div class="container">
                <div class="row mb-3">
                    <!-- Tombol "Tambah Data" di sisi kiri -->
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
                                    <a href="survei.php" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Koneksi</th>
                            <th>CS</th>
                            <th>Teknisi</th>
                            <th>Gangguan</th>
                            <th>Kecepatan</th>
                            <th>Harga</th>
                            <th>Rekomendasi</th>
                            <th>Saran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($feedback as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->koneksi }}</td>
                            <td>{{ $item->puas_cs }}</td>
                            <td>{{ $item->puas_teknisi }}</td>
                            <td>{{ $item->gangguan }}</td>
                            <td>{{ $item->kecepatan }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->rekomendasi }}</td>
                            <td>{{ $item->saran }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="text-center">Tidak ada data feedback.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-left mt-4">
                    <button class="btn btn-success" type="button" id="downloadButtonId" style="margin-left: 20px;" onclick="generatePDF()">
                        <i class="bi bi-download"></i> Download as PDF
                    </button>
                    <button id="previewButtonId" class="btn btn-info" style="margin-left: 40px;">
                        <i class="bi bi-eye"></i> View PDF
                    </button>
                    <div aria-label="Page navigation" style="margin-left: 40px;">
                        <ul class="pagination" id="pagination">

                        </ul>
                    </div>
                </div>

                <!-- Modal untuk preview PDF -->
                <div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
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

                    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
                    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
                    <script src="fetch-survey.js"></script>
                    <script src="notification.js"></script>
                    <script>
                        $(document).ready(function() {
                            const conn = new WebSocket('ws://localhost:8080');
                            var notificationSound = document.getElementById('notificationSound');
                            conn.onmessage = function(e) {
                                const message = JSON.parse(e.data);
                                if (message.type === 'NEW_DATA') {
                                    loadTableData();
                                    loadNotification();
                                };
                            }

                            $('#formTambahData').on('submit', function(e) {
                                e.preventDefault();

                                fetch('add_survei.php', {
                                        method: 'POST',
                                        body: new FormData(this)
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);
                                        alert('Data berhasil disimpan!');
                                        notificationSound.play();
                                        $('#modalTambah').modal('hide');
                                        $('#formTambahData')[0].reset();
                                        loadNotification();
                                        loadTableData();




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
                    </script>
                    <script src="script.js"></script>
                    <script>
                    // Fungsi untuk mengambil data langsung dari tabel HTML
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
        fileName: "data_survey",
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
            name: "Survey Kepuasan Pelanggan",
        },
        invoice: {
            invDate: "Tanggal : " + new Date().toLocaleDateString("id-ID"),
            headerBorder: true,
            tableBodyBorder: true,
            header: [
                { title: "No", style: { width: 7 } },
                { title: "Nama & alamat Pelanggan", style: { width: 45 } },
                { title: "Email", style: { width: 28 } },
                { title: "Kualitas Internet", style: { width: 30 } },
                { title: "Customer Service", style: { width: 30 } },
                { title: "Teknisi", style: { width: 13 } },
                { title: "Gangguan", style: { width: 19 } },
                { title: "Kecepatan", style: { width: 19 } },
                { title: "Kualitas Harga", style: { width: 25 } },
                { title: "Rekomendasi", style: { width: 25 } },
                { title: "Komentar", style: { width: 30 } },
                { title: "Created", style: { width: 15 } },
            ],
            table: tableData,
            additionalRows: [
                {
                    col1: "Total Survey Masuk:",
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
