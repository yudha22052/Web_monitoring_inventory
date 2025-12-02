<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;
use App\Models\Gudang;

class StokController extends Controller
{
    public function lihatStokSurabaya()
    {
        // ... (Fungsi untuk Gudang Surabaya) ...
        $gudangSurabaya = Gudang::where('nama_gudang', 'Gudang Surabaya')->first();
        
        if (!$gudangSurabaya) {
            return response()->json(['error' => 'Gudang Surabaya tidak ditemukan'], 404);
        }

        $stokData = Stok::with('reagen')
            ->where('id_gudang', $gudangSurabaya->id_gudang)
            ->get()
            ->map(function ($item) {
                return [
                    'Kode' => $item->reagen->kode_reagen,
                    'Nama Reagen' => $item->reagen->nama_reagen,
                    'Kategori' => $item->reagen->kategori,
                    'Stok' => $item->jumlah,
                    'Satuan' => $item->reagen->satuan,
                    'Status' => $item->jumlah <= $item->reagen->stok_minimum ? '⚠ PERLU RESTOCK' : '✅ AMAN',
                ];
            });

        return view('inventori.stok_surabaya', compact('stokData'));
    }
    
    // Fungsi untuk Pemantauan Pusat (Semua Gudang)
    public function lihatStokPusat()
    {
        $stokDataAll = Stok::with(['reagen', 'gudang'])
            ->get();
        
        $stokByGudang = $stokDataAll->map(function ($item) {
            return [
                'Gudang' => $item->gudang->nama_gudang,
                'Kode' => $item->reagen->kode_reagen,
                'Nama Reagen' => $item->reagen->nama_reagen,
                'Kategori' => $item->reagen->kategori,
                'Stok' => $item->jumlah,
                'Satuan' => $item->reagen->satuan,
                'Stok_Minimum' => $item->reagen->stok_minimum,
                'Status' => $item->jumlah <= $item->reagen->stok_minimum ? '⚠ PERLU RESTOCK' : '✅ AMAN',
            ];
        })->groupBy('Gudang');

        return view('inventori.stok_pusat', compact('stokByGudang'));
    }
}