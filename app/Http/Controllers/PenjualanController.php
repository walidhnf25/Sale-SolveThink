<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\AsetBarangBaru;
use App\Models\NamaBarang;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        // Ambil stok berdasarkan id_nama_barang
        $stokPerBarang = DB::table('aset_barang_baru')->select('id_nama_barang', DB::raw('COUNT(*) as stok'))->groupBy('id_nama_barang')->pluck('stok', 'id_nama_barang');

        // Ambil barang Microcontroller dan Sensor dengan harga
        $barangMicrocontroller = AsetBarangBaru::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Microcontroller')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangSensor = AsetBarangBaru::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Sensor')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangActuator = AsetBarangBaru::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Actuator')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangPower = AsetBarangBaru::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Power')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        $barangEquipment = AsetBarangBaru::select('id_nama_barang', 'harga_jual_barang', DB::raw('COUNT(*) as stok'))->with('namaBarang')->where('jenis_barang', 'Equipment')->groupBy('id_nama_barang', 'harga_jual_barang')->get();
        
        return view('index', compact('stokPerBarang', 'barangMicrocontroller', 'barangSensor', 'barangActuator', 'barangPower', 'barangEquipment'
        ));
    }

    public function apipenjualan(Request $request)
    {
        $penjualan = Penjualan::latest()->get();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar Semua Penjualan',
                'data' => $penjualan
            ]);
        }

        return view('penjualan.index', compact('penjualan'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_pembeli' => 'required|string|max:255',
                'no_pembeli' => 'required|string|max:20',
                'alamat_pembeli' => 'required|string',
                'pengambilan_barang_pembeli' => 'required|string',
                'pembelian' => 'required|string',
                'total_harga' => 'required|numeric',
                'bukti_pembayaran_pembeli' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            // Upload file jika ada
            if ($request->hasFile('bukti_pembayaran_pembeli')) {
                $validated['bukti_pembayaran_pembeli'] = $request->file('bukti_pembayaran_pembeli')
                    ->store('bukti_pembayaran', 'public');
            }

            // Tambahkan tanggal pembelian sekarang
            $validated['tanggal_pembelian'] = now(); // atau \Carbon\Carbon::now()

            // Simpan data penjualan
            $penjualan = Penjualan::create($validated);

            // Kurangi stok barang
            $pembelianList = explode(',', $validated['pembelian']);
            foreach ($pembelianList as $item) {
                [$namaBarang, $jumlah] = explode(':', trim($item));
                $jumlah = (int) trim($jumlah);

                $idNamaBarang = NamaBarang::where('nama_barang', $namaBarang)->value('id');

                if ($idNamaBarang) {
                    DB::table('aset_barang_baru')
                        ->where('id_nama_barang', $idNamaBarang)
                        ->limit($jumlah)
                        ->delete();
                }
            }

            return redirect()->back()->with('success', 'Pesanan berhasil dikirim! Silakan konfirmasi melalui WhatsApp.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Tolong Cek Kembali Pesanan Anda.');
        }
    }
}
