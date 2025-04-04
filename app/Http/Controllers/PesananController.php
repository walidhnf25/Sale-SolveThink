<?php

namespace App\Http\Controllers;

use App\Models\CustomerPayment;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'bukti_bayar' => 'required|file|image|max:2048',
            'pengiriman' => 'required|in:diantar,ambil',
        ]);

        // Komponen dummy
        $komponenFields = [
            'komponen_a_jenis1', 'komponen_b_jenis1',
            'komponen_a_jenis2', 'komponen_b_jenis2'
        ];

        $pesananDetail = [];
        $totalHarga = 0;

        foreach ($komponenFields as $komponen) {
            $quantity = (int) $request->input($komponen, 0);
            $pesananDetail[$komponen] = $quantity;

            // Harga dummy (misal 10.000/item)
            $totalHarga += $quantity * 10000;
        }

        // Simulasi upload file
        $buktiBayarPath = null;
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $buktiBayarPath = $file->storeAs('bukti_bayar', $filename, 'public');
        }

        // Buat data dummy
        $data = [
            'nama' => $request->nama,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
            'pengiriman' => $request->pengiriman,
            'pesanan_detail' => $pesananDetail,
            'total_harga' => $totalHarga,
            'bukti_bayar' => $buktiBayarPath
        ];

        // Simpan ke session
        return redirect()->route('pesanan.konfirmasi')->with('konfirmasi', $data);
    }

    public function konfirmasi()
    {
        $data = session('konfirmasi');

        if (!$data) {
            return redirect('/')->with('error', 'Data tidak ditemukan.');
        }

        return view('pesanan.konfirmasi', compact('data'));
    }
}