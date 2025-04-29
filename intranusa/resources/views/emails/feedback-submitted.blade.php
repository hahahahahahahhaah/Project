<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f6f6f6;
}

.email-body {
    padding: 40px 0;
    display: flex;
    justify-content: center;
}

.email-container {
    background-color: #ffffff;
    border-radius: 12px;
    width: 600px;
    padding: 30px;
}

.email-header {
    text-align: center;
    padding-bottom: 20px;
}

.email-header img {
    height: 60px;
    margin-bottom: 10px;
}

.email-header h1 {
    color: #1e3a8a;
    font-size: 24px;
    margin: 0;
}

.email-greeting {
    border-top: 1px solid #ddd;
    padding-top: 20px;
}

.email-greeting h2 {
    color: #1e3a8a;
}

.email-greeting p {
    font-size: 16px;
    color: #333;
}

.email-content {
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.email-content h3 {
    color: #1e3a8a;
}

.email-content ul {
    font-size: 15px;
    color: #333;
    padding-left: 20px;
}

.email-content a {
    color: #2563eb;
}

.email-footer {
    padding-top: 20px;
    font-size: 15px;
    color: #333;
    text-align: left;
}

.email-footer strong {
    color: #1e3a8a;
}

.email-footer small {
    display: block;
    margin-top: 10px;
    font-size: 12px;
    color: #777;
    text-align: center;
}

</style>
</head>
<body>
    <div class="email-body">
        <div class="email-container">
            <div class="email-header">
                <img src="{{ asset('images/logo.png') }}" alt="Intranusa Logo">
                <h1>INTRANUSA</h1>
            </div>

            <div class="email-greeting">
                <h2>Halo {{ $feedback['nama'] }},</h2>
                <p>
                    Terima kasih telah memberikan feedback kepada kami.<br>
                    Kami sangat menghargai pendapat Anda 🙏
                </p>
            </div>

            <div class="email-content">
                <h3>Isi Feedback Anda:</h3>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:{{ $feedback['email'] }}">{{ $feedback['email'] }}</a></li>
                    <li><strong>Alamat:</strong> {{ $feedback['alamat'] }}</li>
                    <li><strong>Bagaimana kualitas koneksi internet Anda secara keseluruhan?</strong> {{ $feedback['koneksi'] }}</li>
                    <li><strong>Seberapa puas Anda dengan layanan Customer Service?</strong> {{ $feedback['puas_cs'] }}</li>
                    <li><strong>Seberapa puas Anda dengan layanan Teknisi?</strong> {{ $feedback['puas_teknisi'] }}</li>
                    <li><strong>Seberapa sering Anda mengalami gangguan (putus/koneksi lambat)?</strong> {{ $feedback['gangguan'] }}</li>
                    <li><strong>Bagaimana penilaian Anda terhadap kecepatan internet sesuai dengan paket?</strong> {{ $feedback['kecepatan'] }}</li>
                    <li><strong>Apakah harga layanan internet sebanding dengan kualitasnya?</strong> {{ $feedback['harga'] }}</li>
                    <li><strong>Apakah Anda akan merekomendasikan layanan ini?</strong> {{ $feedback['rekomendasi'] }}</li>
                    <li><strong>Saran:</strong> {{ $feedback['saran'] }}</li>
                </ul>
            </div>

            <div class="email-footer">
                <p>Salam hangat,</p>
                <p><strong>Tim Kami</strong></p>
                <small>© {{ date('Y') }} NusaBott Internet. All rights reserved.</small>
            </div>
        </div>
    </div>
</body>
</html>