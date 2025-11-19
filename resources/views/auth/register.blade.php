<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun - Pengaduan Fasilitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #080053;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .card-registration {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem;
        }
        .btn-register {
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 0.5rem;
        }
        .back {
            position: fixed;
            top: 20px;
            left: 20px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s;
            z-index: 999;
        }
    </style>
</head>
<body>

    <a href="{{ url('/') }}" class="back">&larr; Kembali</a>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="text-center mb-4">
                    <h2 class="fw-bold text-white">Buat Akun Baru</h2>
                    <p class="text-white">Silakan isi data diri Anda dengan benar</p>
                </div>

                <div class="card card-registration bg-white">
                    <div class="card-body p-4 p-md-5">

                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       id="nama"
                                       value="{{ old('nama') }}"
                                       placeholder="Masukkan nama lengkap Anda" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Alamat Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       value="{{ old('email') }}"
                                       placeholder="contoh@email.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="no_telp" class="form-label fw-semibold">No. Telepon / WA</label>
                                    <input type="number"
                                           name="no_telp"
                                           class="form-control @error('no_telp') is-invalid @enderror"
                                           id="no_telp"
                                           value="{{ old('no_telp') }}"
                                           placeholder="08xxxxxxxxxx" required>
                                    @error('no_telp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label fw-semibold">Alamat Lengkap</label>
                                <textarea name="alamat"
                                          class="form-control @error('alamat') is-invalid @enderror"
                                          id="alamat"
                                          rows="3"
                                          placeholder="Nama Jalan, RT/RW, Desa/Kelurahan" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-4">

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       placeholder="Minimal 5 karakter" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       id="password_confirmation"
                                       placeholder="Ulangi password di atas" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-register text-white">Daftar Sekarang</button>
                            </div>

                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Masuk disini</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
