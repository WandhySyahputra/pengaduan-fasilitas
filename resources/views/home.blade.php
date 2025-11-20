<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARPRAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("{{ asset('img/beranda.jpeg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .card-step {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-step:hover {
            transform: translateY(-10px);
        }
        .galeri-img-box {
            height: 250px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .galeri-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .galeri-img-box:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <header class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Sistem Informasi Pengaduan Fasilitas Kampus STIMATA</h1>
            <p class="lead mb-4">Sampaikan laporan Anda terkait kerusakan fasilitas kampus secara online, transparan, dan terpercaya.</p>

            @auth
                <a href="#" class="btn btn-primary btn-lg px-5">Tulis Pengaduan</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5">Login Untuk Melapor</a>
            @endauth
        </div>
    </header>

    <section id="galeri" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">Galeri Fasilitas</h2>
                <p class="text-muted">Foto-foto fasilitas terbaru yang tersedia</p>
            </div>
            <div class="row g-4">
                @forelse($files as $file)
                    <div class="col-md-4 col-sm-6">
                        <div class="galeri-img-box">
                            <img src="{{ asset('galeri/' . $file->getFilename()) }}"
                                alt="Fasilitas Desa"
                                loading="lazy">
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada foto di folder public/galeri.</p>
                    </div>
                @endforelse
            </div>
            </div>
        </div>
    </section>

    <section id="cara-lapor" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Alur Pengaduan</h2>
                <p class="text-muted">Hanya dengan 3 langkah mudah</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card card-step h-100 p-4 text-center">
                        <div class="h1 text-primary mb-3">📝</div>
                        <h4>1. Tulis Laporan</h4>
                        <p>Laporkan keluhan Anda dengan jelas dan lampirkan foto bukti kerusakan fasilitas.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-step h-100 p-4 text-center">
                        <div class="h1 text-primary mb-3">🔄</div>
                        <h4>2. Proses Verifikasi</h4>
                        <p>Laporan Anda akan diverifikasi dan diteruskan ke sarpras untuk ditindaklanjuti.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-step h-100 p-4 text-center">
                        <div class="h1 text-primary mb-3">✅</div>
                        <h4>3. Selesai</h4>
                        <p>Pantau status laporan Anda hingga selesai diperbaiki oleh petugas sarpras.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
