<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Kelola Laporan Data Pelanggan</h2>

        <form id="pdfForm" action="{{ route('laporan.view') }}" method="GET" target="_blank">
            <div class="input-group">
                <select id="pdfAction" class="form-select">
                    <option value="{{ route('laporan.view') }}">Lihat PDF</option>
                    <option value="{{ route('laporan.download') }}">Download PDF</option>
                </select>
                <button type="submit" class="btn btn-primary">Proses</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("pdfAction").addEventListener("change", function() {
            document.getElementById("pdfForm").action = this.value;
        });
    </script>
</body>
</html>
