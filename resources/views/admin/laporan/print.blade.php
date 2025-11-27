<!DOCTYPE html>
<html>
<head>
    <title>Laporan Lengkap Bulanan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }

        /* Utility untuk Pindah Halaman */
        .page-break { page-break-after: always; }

        /* Style untuk Header */
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; }
        .header p { margin: 5px 0; color: #555; }

        /* Style untuk Tabel Rekap (Halaman 1) */
        table.rekap { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.rekap, table.rekap th, table.rekap td { border: 1px solid black; }
        table.rekap th { background-color: #f2f2f2; padding: 8px; text-align: center; }
        table.rekap td { padding: 6px; }

        /* Style untuk Halaman Detail */
        .detail-box { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; }
        .row { display: flex; margin-bottom: 5px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .label { width: 140px; font-weight: bold; color: #333; }
        .value { flex: 1; color: #000; }

        /* Badge Status */
        .status { font-weight: bold; text-transform: uppercase; }
        .status-dikirim { color: blue; }
        .status-diproses { color: orange; }
        .status-selesai { color: green; }
        .status-ditolak { color: red; }

        /* Foto & Tanggapan */
        .foto-container img { max-width: 150px; max-height: 150px; margin: 5px; border: 1px solid #ddd; padding: 3px; }
        .tanggapan-box { background-color: #f9f9f9; padding: 10px; border-left: 4px solid #ccc; margin-top: 10px; }
    </style>
</head>
<body>
    <table style="width: 100%; border-bottom: 4px double black; margin-bottom: 20px;">
        <tr>
            <td style="width: 15%; text-align: center; vertical-align: middle;">
                <img src="{{ public_path('img/logo.png') }}" alt="Logo" style="height: 80px; width: auto;">
            </td>

            <td style="width: 85%; text-align: center; vertical-align: middle;">
                <div class="kop-text">
                    <h1 style="font-size: 14pt; margin: 0; font-weight: bold; text-transform: uppercase;">
                        SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER
                    </h1>
                    <h2 style="font-size: 14pt; margin: 5px 0; font-weight: bold; text-transform: uppercase;">
                        STMIK PPKIA PRADNYA PARAMITA
                    </h2>
                    <p style="font-size: 10pt; margin: 0; line-height: 1.4;">
                        Kampus : Jl. Laksda Adi Sucipto No. 249-A Malang - 65141
                    </p>
                    <p style="font-size: 10pt; margin: 0; line-height: 1.4;">
                        Telp. (0341) 412699, Fax. (0341) 412782
                    </p>
                    <p style="font-size: 10pt; margin: 0; line-height: 1.4;">
                        Website : ppkpt.stimata.ac.id | E-mail : satgas-ppkpt@stimata.ac.id
                    </p>
                </div>
            </td>
        </tr>
    </table>

    <div class="header">
        <h2>REKAPITULASI PENGADUAN MASYARAKAT</h2>
        <p>Periode: Bulan {{ $bulan }} Tahun {{ $tahun }}</p>
    </div>

    <table class="rekap">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Pelapor</th>
                <th>Judul Laporan</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
                <tr>
                    <td style="text-align:center">{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                    <td>{{ $item->user->nama ?? 'Anonim' }}</td>
                    <td>{{ $item->judul_laporan ?? Str::limit($item->isi, 30) }}</td>
                    <td style="text-align:center">{{ ucfirst($item->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: right;">
        <p>Total Laporan: {{ $laporan->count() }}</p>
    </div>

    <table class="ttd" style="width: 100%; margin-top: 50px;">
        <tr>
            <td style="width: 70%;"></td>
            <td style="width: 30%; text-align: left;">
                <p>Malang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p>Mengetahui,</p>
                <p>Penanggung Jawab SARPRAS</p>
                <br><br><br>
                <p style="text-decoration: underline; font-weight: bold; margin: 0;">
                    Heri Purnomo, S.Kom., MMSI
                </p>
            </td>
        </tr>
    </table>

    <div class="page-break"></div>


    @foreach($laporan as $index => $row)

        <table style="width: 100%; border-bottom: 4px double black; margin-bottom: 20px;">
            <tr>
                <td style="width: 15%; text-align: center; vertical-align: middle;">
                    <img src="{{ public_path('img/logo.png') }}" alt="Logo" style="height: 80px; width: auto;">
                </td>

                <td style="width: 85%; text-align: center; vertical-align: middle;">
                    <div class="kop-text">
                        <h1 style="font-size: 14pt; margin: 0; font-weight: bold; text-transform: uppercase;">
                            SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER
                        </h1>
                        <h2 style="font-size: 14pt; margin: 5px 0; font-weight: bold; text-transform: uppercase;">
                            STMIK PPKIA PRADNYA PARAMITA
                        </h2>
                        <p style="font-size: 10pt; margin: 0; line-height: 1.4;">
                            Kampus : Jl. Laksda Adi Sucipto No. 249-A Malang - 65141
                        </p>
                        <p style="font-size: 10pt; margin: 0; line-height: 1.4;">
                            Telp. (0341) 412699, Fax. (0341) 412782
                        </p>
                        <p style="font-size: 10pt; margin: 0; line-height: 1.4;">
                            Website : ppkpt.stimata.ac.id | E-mail : satgas-ppkpt@stimata.ac.id
                        </p>
                    </div>
                </td>
            </tr>
        </table>

        <div class="header">
            <h3>LAMPIRAN DETAIL </h3>
            <p>ID Pengaduan: {{ $row->id }}</p>
        </div>

        <div class="detail-box">
            <div class="row">
                <div class="label">Tanggal Lapor</div>
                <div class="value">{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y, H:i') }}</div>
            </div>
            <div class="row">
                <div class="label">Nama Pelapor</div>
                <div class="value">{{ $row->user->nama ?? 'Tidak Diketahui' }} (Telp: {{ $row->user->no_telp ?? '-' }})</div>
            </div>
            <div class="row">
                <div class="label">Lokasi / Fasilitas</div>
                <div class="value">{{ $row->fasilitas->nama_fasilitas ?? '-' }} - {{ $row->lokasi ?? 'Lokasi tidak spesifik' }}</div>
            </div>
            <div class="row">
                <div class="label">Status</div>
                <div class="value status status-{{ $row->status }}">{{ ucfirst($row->status) }}</div>
            </div>

            <br>

            <div style="margin-bottom: 10px;">
                <strong>Isi Laporan:</strong><br>
                <div style="border: 1px solid #eee; padding: 10px; background: #fff; margin-top: 5px;">
                    {{ $row->isi }}
                </div>
            </div>

            <div style="margin-top: 10px;">
                <strong>Foto Bukti:</strong>
            </div>
            @if($row->fotos->count() > 0)
                <div style="margin-top: 10px;">
                    <div class="foto-container">
                        @foreach($row->fotos as $foto)
                            {{-- Gunakan public_path agar gambar terbaca oleh dompdf di server lokal --}}
                            <img src="{{ public_path('storage/' . $foto->path) }}" alt="Foto">
                        @endforeach
                    </div>
                </div>
            @endif

            @if($row->tanggapans->count() > 0)
                <div style="margin-top: 15px;">
                    <strong>Riwayat Tanggapan:</strong>
                    @foreach($row->tanggapans as $tanggapan)
                        <div class="tanggapan-box">
                            <small>
                                <b>{{ $tanggapan->user->name ?? 'Admin' }}</b> -
                                {{ \Carbon\Carbon::parse($tanggapan->created_at)->format('d/m/Y H:i') }}
                            </small>
                            <p style="margin-top: 5px;">{{ $tanggapan->isi_tanggapan }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p style="color: #888; font-style: italic; margin-top: 15px;">Belum ada tanggapan.</p>
            @endif
        </div>
            
        <table class="ttd" style="width: 100%; margin-top: 50px;">
            <tr>
                <td style="width: 70%;"></td>
                <td style="width: 30%; text-align: left;">
                    <p>Malang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    <p>Mengetahui,</p>
                    <p>Penanggung Jawab SARPRAS</p>
                    <br><br><br>
                    <p style="text-decoration: underline; font-weight: bold; margin: 0;">
                        Heri Purnomo, S.Kom., MMSI
                    </p>
                </td>
            </tr>
        </table>

        @if(!$loop->last)
            <div class="page-break"></div>
        @endif

    @endforeach

</body>
</html>
