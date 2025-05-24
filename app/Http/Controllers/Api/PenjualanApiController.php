<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Penjualan;

class PenjualanApiController extends Controller
{
    public function index()
    {
        $data = Penjualan::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Semua Penjualan',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Data penjualan tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Penjualan',
            'data' => $penjualan
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_pembeli' => 'required',
            'no_pembeli' => 'required',
            'alamat_pembeli' => 'required',
            'pembelian' => 'required',
            'total_harga' => 'required',
            'tanggal_pembelian' => 'required',
            'pengambilan_barang_pembeli' => 'required',
            'bukti_pembayaran_pembeli' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Cari data berdasarkan ID
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Data penjualan tidak ditemukan',
            ], 404);
        }

        // Update data dasar
        $penjualan->nama_pembeli = $request->nama_pembeli;
        $penjualan->no_pembeli = $request->no_pembeli;
        $penjualan->alamat_pembeli = $request->alamat_pembeli;
        $penjualan->pembelian = $request->pembelian;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->tanggal_pembelian = $request->tanggal_pembelian;
        $penjualan->pengambilan_barang_pembeli = $request->pengambilan_barang_pembeli;

        // Jika ada upload bukti pembayaran baru
        if ($request->hasFile('bukti_pembayaran_pembeli')) {
            // Hapus file lama jika ada
            if ($penjualan->bukti_pembayaran_pembeli && Storage::disk('public')->exists($penjualan->bukti_pembayaran_pembeli)) {
                Storage::disk('public')->delete($penjualan->bukti_pembayaran_pembeli);
            }

            // Simpan file baru
            $file = $request->file('bukti_pembayaran_pembeli');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('bukti_pembayaran', $filename, 'public');
            $penjualan->bukti_pembayaran_pembeli = $path;
        }

        // Simpan perubahan
        $penjualan->save();

        return response()->json([
            'success' => true,
            'message' => 'Data penjualan berhasil diperbarui',
            'data' => $penjualan
        ]);
    }
}
