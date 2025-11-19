<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ManagePengaduanController extends Controller
{

    public function index()
    {
        $semua_laporan = Pengaduan::with('user')->latest()->paginate(10);

        return view('admin.laporan.index', ['daftar_laporan' => $semua_laporan]);
    }

    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load(['fotos', 'user', 'fasilitas', 'tanggapans.user']);
        return view('admin.laporan.show', ['laporan' => $pengaduan]);
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:dikirim,diproses,selesai,ditolak',
            'isi_tanggapan' => 'nullable|string|min:5',
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        if ($request->filled('isi_tanggapan')) {
            Tanggapan::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id' => Auth::id(),
                'isi_tanggapan' => $request->isi_tanggapan,
            ]);
        }

        return back()->with('success', 'Laporan berhasil diperbarui!');
    }
    public function cetak(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        if (!$bulan || !$tahun) {
            return back()->with('error', 'Silakan pilih bulan dan tahun terlebih dahulu.');
        }

        $laporan = Pengaduan::with(['user', 'fotos', 'tanggapans.user', 'fasilitas'])
                            ->whereMonth('created_at', $bulan)
                            ->whereYear('created_at', $tahun)
                            ->latest()
                            ->get();

        if ($laporan->isEmpty()) {
            return back()->with('error', "Data laporan tidak ditemukan untuk Bulan $bulan Tahun $tahun.");
        }

        $pdf = Pdf::loadView('admin.laporan.print', compact('laporan', 'bulan', 'tahun'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('Rekap-Laporan-'.$bulan.'-'.$tahun.'.pdf');
    }
}
