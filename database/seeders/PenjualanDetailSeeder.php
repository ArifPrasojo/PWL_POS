<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualanIds = DB::table('t_penjualan')->pluck('penjualan_id');
        $data = [];
        
        foreach ($penjualanIds as $penjualanId) {
            $barangIds = DB::table('m_barang')->pluck('barang_id')->random(3);
        
            foreach ($barangIds as $barangId) {
                $hargaJual = DB::table('m_barang')->where('barang_id', $barangId)->value('harga_jual');
                $jumlah = rand(1, 10);
        
                $data[] = [
                    'barang_id' => $barangId,
                    'penjualan_id' => $penjualanId,
                    'harga' => $hargaJual * $jumlah,
                    'jumlah' => $jumlah,
                ];
            }
        }
        
        // Lakukan batch insert di luar loop untuk efisiensi
        DB::table('t_penjualan_detail')->insert($data);
        
    }
}