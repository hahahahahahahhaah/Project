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
        <main class="p-4">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-xl font-bold">Manajemen Pertanyaan & Jawaban</h4>
        <button class="btn btn-primary" onclick="document.getElementById('addModal').showModal()">
            <i class="bx bx-plus mr-2"></i> Tambah Pertanyaan
        </button>
    </div>

    <div class="overflow-x-auto shadow rounded-lg">
        <table class="table table-zebra w-full">
            <thead class="bg-base-200 text-base-content">
                <tr>
                    <th>#</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Jumlah Ditanya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($qnas as $index => $qna)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $qna->question }}</td>
                    <td>{{ Str::limit($qna->answer, 50) }}</td>
                    <td>{{ $qna->asked_count }}</td>
                    <td class="flex gap-2">
                        <button class="btn btn-sm btn-warning" onclick="document.getElementById('editModal{{ $qna->id }}').showModal()">
                            <i class="bx bx-edit-alt mr-1"></i>Edit
                        </button>
                        <form action="{{ route('admin.qna.destroy', $qna->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-error">
                                <i class="bx bx-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <dialog id="editModal{{ $qna->id }}" class="modal">
                    <div class="modal-box !p-10">
                        <h3 class="font-bold text-lg !mb-4">Edit Pertanyaan</h3>
                        <form method="POST" action="{{ route('admin.qna.update', $qna->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="!mb-4">
                                <label class="label">Pertanyaan</label>
                                <input type="text" name="question" class="input input-bordered w-full" value="{{ $qna->question }}" required />
                            </div>
                            <div class="!mb-4">
                                <label class="label">Jawaban</label>
                                <textarea name="answer" class="textarea textarea-bordered w-full" rows="4" required>{{ $qna->answer }}</textarea>
                         </div>
                            <div class="modal-action">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn" onclick="document.getElementById('editModal{{ $qna->id }}').close()">Batal</button>
                            </div>
                        </form>
                    </div>
                </dialog>
                @endforeach
            </tbody>
        </table>
       
    </div>

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







    <!-- Pagination -->
   

    <!-- Modal Tambah -->
    <dialog id="addModal" class="modal">
    <div class="modal-box ">
        <div class="!p-10">
        <h3 class="font-bold text-lg !mb-4">Tambah Pertanyaan</h3>
        <form method="POST" action="{{ route('admin.qna.store') }}">
            @csrf

            <div class="form-control !mb-4">
                <label class="label">
                    <span class="label-text font-semibold">Pertanyaan</span>
                </label>
                <input type="text" name="question" class="input input-bordered w-full" placeholder="Masukkan pertanyaan" required />
            </div>

            <div class="!form-control !mb-4">
                <label class="label">
                    <span class="label-text font-semibold">Jawaban</span>
                </label>
                <textarea name="answer" class="textarea textarea-bordered w-full" placeholder="Masukkan jawaban" rows="4" required></textarea>
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn" onclick="document.getElementById('addModal').close()">Batal</button>
            </div>
        </form>
        </div>
       
    </div>
</dialog>

</main>




        <!-- MAIN -->
    </section>
</body>

</html>
