<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{   
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 10,
                'kategori_kode' => 'FD',
                'kategori_nama' => 'Food & Drink',
            ],
            [
                'kategori_id' => 11,
                'kategori_kode' => 'FHL',
                'kategori_nama' => 'Fashion & Lifestyle',
            ],
            [
                'kategori_id' => 12,
                'kategori_kode' => 'SPT',
                'kategori_nama' => 'Sports & Fitness',
            ],
            [
                'kategori_id' => 13,
                'kategori_kode' => 'AUT',
                'kategori_nama' => 'Automotive',
            ],
            [
                'kategori_id' => 14,
                'kategori_kode' => 'GAD',
                'kategori_nama' => 'Gadgets',
            ],
            [
                'kategori_id' => 15,
                'kategori_kode' => 'ELC',
                'kategori_nama' => 'Electronics',
            ],
            [
                'kategori_id' => 16,
                'kategori_kode' => 'BKS',
                'kategori_nama' => 'Books & Stationery',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
