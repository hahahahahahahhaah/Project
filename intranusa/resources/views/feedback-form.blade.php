<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactivity -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    <style>
        input[type="radio"]:checked+svg {
            transform: scale(1.1);
        }
    </style>

</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-blue-700 mb-6 bg-gradient-to-r from-[#4b88b9] to-[#82c9e8] text-white py-4 rounded-lg">Survey Kepuasan Pelanggan</h2>

        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full border rounded px-4 py-2" required placeholder="Cth: Joni">
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded px-4 py-2" required placeholder="Cth: internusa@gmail.com">
            </div>

            <div>
                <label for="alamat" class="block font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full border rounded px-4 py-2" required placeholder="Cth: Laladon">
            </div>

            @foreach([
            'koneksi' => 'Bagaimana kualitas koneksi internet Anda secara keseluruhan?',
            'puas_cs' => 'Seberapa puas Anda dengan layanan Customer Service?',
            'puas_teknisi' => 'Seberapa puas Anda dengan layanan Teknisi?'
            ] as $name => $label)
            <div>
                <label class="block font-medium text-gray-700 mb-2">{{ $label }}</label>
                <div class="flex space-x-1" x-data="{ rating: 0, hover: 0 }">
                    @for ($i = 1; $i <= 5; $i++)
                        <label>
                        <input type="radio" name="{{ $name }}" value="{{ $i }}" class="hidden" @click="rating = {{ $i }}">
                        <svg
                            @mouseover="hover = {{ $i }}"
                            @mouseleave="hover = 0"
                            :class="(hover >= {{ $i }} || rating >= {{ $i }}) ? 'text-yellow-400' : 'text-gray-300'"
                            class="w-8 h-8 transition-colors duration-200 cursor-pointer"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.1 3.385a1 1 0 00.95.69h3.562c.969 0 1.371 1.24.588 1.81l-2.882 2.093a1 1 0 00-.364 1.118l1.1 3.385c.3.921-.755 1.688-1.538 1.118L10 13.347l-2.882 2.093c-.783.57-1.838-.197-1.538-1.118l1.1-3.385a1 1 0 00-.364-1.118L3.434 8.812c-.783-.57-.38-1.81.588-1.81h3.562a1 1 0 00.95-.69l1.1-3.385z" />
                        </svg>
                        </label>
                        @endfor
                </div>
            </div>
            @endforeach


            <div class="mb-6">
                <label class="block font-medium text-gray-700 mb-2">Seberapa sering Anda mengalami gangguan (putus/koneksi lambat)?</label>
                <div class="flex flex-wrap gap-4 text-sm">
                    @foreach(['Tidak pernah', 'Jarang', 'Kadang-kadang', 'Sering', 'Sangat sering'] as $value)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gangguan" value="{{ $value }}" required class="accent-blue-600">
                        {{ $value }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-medium text-gray-700 mb-2">Bagaimana penilaian Anda terhadap kecepatan internet sesuai dengan paket?</label>
                <div class="flex flex-wrap gap-4 text-sm">
                    @foreach(['Sangat sesuai', 'Sesuai', 'Cukup sesuai', 'Tidak sesuai'] as $value)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="kecepatan" value="{{ $value }}" required class="accent-blue-600">
                        {{ $value }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-medium text-gray-700 mb-2">Apakah harga layanan internet sebanding dengan kualitasnya?</label>
                <div class="flex flex-wrap gap-4 text-sm">
                    @foreach(['Ya, sebanding', 'Tidak, tidak sebanding'] as $value)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="harga" value="{{ $value }}" required class="accent-blue-600">
                        {{ $value }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-medium text-gray-700 mb-2">Apakah Anda akan merekomendasikan layanan ini?</label>
                <div class="flex flex-wrap gap-4 text-sm">
                    @foreach(['Sangat mungkin', 'Mungkin', 'Tidak mungkin'] as $value)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rekomendasi" value="{{ $value }}" required class="accent-blue-600">
                        {{ $value }}
                    </label>
                    @endforeach
                </div>
            </div>


            <div>
                <label for="saran" class="block font-medium text-gray-700 mb-1">Saran / Komentar <span class="text-gray-500 font-light text-sm">(Opsional)</span></label>
                <textarea name="saran" id="saran" rows="4" class="w-full border rounded px-4 py-2"></textarea>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Kirim</button>
                <a href="/" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>