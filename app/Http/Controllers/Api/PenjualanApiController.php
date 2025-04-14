<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
