<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkData = [
            // 3 Produk kategori: Susu Segar
            [
                'nama' => 'Susu Segar Boyong 1L',
                'deskripsi' => 'Susu segar berkualitas tinggi dari peternakan Boyong, kaya nutrisi dan bebas bahan pengawet.',
                'stok' => 50,
                'harga' => 25000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2025-10-01',
                'tgl_kadaluarsa' => '2025-11-01',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Susu Segar Boyong 500ml',
                'deskripsi' => 'Kemasan praktis susu segar untuk konsumsi harian dengan cita rasa alami.',
                'stok' => 30,
                'harga' => 15000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2025-09-25',
                'tgl_kadaluarsa' => '2025-10-25',
                'berat_isi_bersih' => '500 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Susu Pasteurisasi Boyong',
                'deskripsi' => 'Susu pasteurisasi segar dengan proses higienis untuk menjaga kesegaran alami.',
                'stok' => 25,
                'harga' => 22000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2025-09-28',
                'tgl_kadaluarsa' => '2025-10-28',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],

            // 2 Produk kategori: Produk Olahan Susu
            [
                'nama' => 'Susu Cokelat Premium Boyong',
                'deskripsi' => 'Susu olahan rasa cokelat premium dengan tekstur lembut dan kaya rasa.',
                'stok' => 20,
                'harga' => 27000,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu4.jpg',
                'tgl_produksi' => '2025-09-22',
                'tgl_kadaluarsa' => '2025-10-22',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'pre_order',
            ],
            [
                'nama' => 'Susu Melon Boyong',
                'deskripsi' => 'Susu olahan rasa melon segar yang manis alami dan menyegarkan, cocok untuk semua usia.',
                'stok' => 18,
                'harga' => 23000,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu5.jpg',
                'tgl_produksi' => '2025-09-29',
                'tgl_kadaluarsa' => '2025-11-29',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'pre_order',
            ],

            // 1 Produk kategori: Es Krim
            [
                'nama' => 'Es Krim Boyong Family Pack',
                'deskripsi' => 'Kemasan keluarga es krim Boyong, dibuat dari susu murni dengan tekstur lembut.',
                'stok' => 0,
                'harga' => 45000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/eskrim2.jpg',
                'tgl_produksi' => '2025-09-15',
                'tgl_kadaluarsa' => '2025-10-20',
                'berat_isi_bersih' => '500 ml',
                'status_produk' => 'habis',
            ],
        ];

        foreach ($produkData as $data) {
            Produk::create($data);
        }
    }
}
