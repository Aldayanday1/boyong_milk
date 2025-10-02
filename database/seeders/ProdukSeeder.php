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
        // Produk::create([
        //     'nama' => 'Susu Sapi Segar',
        //     'deskripsi' => 'Susu sapi segar dari peternakan Boyong Milk.',
        //     'stok' => 100,
        //     'harga' => 25000.00,
        //     'kategori' => 'Susu',
        //     'gambar' => 'path/to/image.jpg',
        //     'tgl_produksi' => '2025-01-01',
        //     'tgl_kadaluarsa' => '2025-06-01',
        //     'berat_isi_bersih' => '1 Liter',
        //     'status_produk' => 'tersedia',
        // ]);

        Produk::create([
            'nama' => 'Susu UHT',
            'deskripsi' => 'Susu UHT segar dari sapi pilihan.',
            'stok' => 100,
            'harga' => 15000.00,
            'kategori' => 'Susu',
            'gambar' => 'produk1.jpg',
            'tgl_produksi' => '2025-01-01',
            'tgl_kadaluarsa' => '2025-12-31',
            'berat_isi_bersih' => '1 Liter',
            'status_produk' => 'tersedia',
        ]);

        Produk::create([
            'nama' => 'Keju Cheddar',
            'deskripsi' => 'Keju cheddar olahan susu sapi.',
            'stok' => 50,
            'harga' => 30000.00,
            'kategori' => 'Keju',
            'gambar' => 'produk2.jpg',
            'tgl_produksi' => '2025-01-01',
            'tgl_kadaluarsa' => '2025-06-30',
            'berat_isi_bersih' => '200 gram',
            'status_produk' => 'pre_order',
        ]);
    }
}
