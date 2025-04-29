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
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

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

<style>
    .custom-pagination {
        display: flex;
        justify-content: center;
        gap: 4px;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .custom-pagination .page-item {
        display: inline-block;
        padding: 6px 12px;
        background-color: #fff;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        min-width: 36px;
        text-align: center;
    }

    .custom-pagination .page-item:hover:not(.disabled):not(.active) {
        background-color: #f3f4f6;
        color: #111;
    }

    .custom-pagination .page-item.active {
        background-color: #3b82f6;
        color: white;
        border-color: #3b82f6;
        font-weight: bold;
        cursor: default;
    }

    .custom-pagination .page-item.disabled {
        background-color: #f9fafb;
        color: #9ca3af;
        cursor: not-allowed;
    }
</style>


<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-wifi'></i>
            <span class="text">Intranusa</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="data">
                    <i class='bx bxs-group'></i>
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
        <main class="!p-6 md:!p-10 !bg-white !min-h-screen">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Manajemen Pertanyaan & Jawaban</h1>
        
    </div>

    <!-- Filter & Export -->
    <form method="GET" action="{{ route('admin.feedback') }}" class="!mb-6 flex !flex-wrap !gap-4 !items-center">
        <select name="month" class="select select-bordered">
            <option value="">Pilih Bulan</option>
            @foreach (range(1, 12) as $m)
            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline btn-primary !p-3">Filter</button>
        <a href="{{ route('feedback.exportPdf', ['month' => request('month')]) }}" class="btn btn-outline btn-secondary !p-3">Export PDF</a>
    </form>

    <!-- Tabel Data -->
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="table w-full">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
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
            <tbody class="text-sm text-gray-800">
                @forelse ($qnas as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        @for ($i = 0; $i < $item->koneksi; $i++)
                            <i class="fas fa-star text-yellow-500"></i>
                        @endfor
                    </td>
                    <td>
                        @for ($i = 0; $i < $item->puas_cs; $i++)
                            <i class="fas fa-star text-green-500"></i>
                        @endfor
                    </td>
                    <td>
                        @for ($i = 0; $i < $item->puas_teknisi; $i++)
                            <i class="fas fa-star text-blue-500"></i>
                        @endfor
                    </td>
                    <td>{{ $item->gangguan }}</td>
                    <td>{{ $item->kecepatan }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->rekomendasi }}</td>
                    <td>{{ $item->saran }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center text-gray-400 py-4">Tidak ada data feedback.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="custom-pagination">
    {{-- Tombol Sebelumnya --}}
    @if ($qnas->onFirstPage())
        <span class="page-item disabled">«</span>
    @else
        <a href="{{ $qnas->previousPageUrl() }}" class="page-item">«</a>
    @endif

    {{-- Nomor Halaman --}}
    @foreach ($qnas->getUrlRange(1, $qnas->lastPage()) as $page => $url)
        @if ($page == $qnas->currentPage())
            <span class="page-item active">{{ $page }}</span>
        @else
            <a href="{{ $url }}" class="page-item">{{ $page }}</a>
        @endif
    @endforeach

    {{-- Tombol Berikutnya --}}
    @if ($qnas->hasMorePages())
        <a href="{{ $qnas->nextPageUrl() }}" class="page-item">»</a>
    @else
        <span class="page-item disabled">»</span>
    @endif
</div>

 






        <!-- MAIN -->
    </section>
</body>

</html>