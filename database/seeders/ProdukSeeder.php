<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produkData = [

            /*
            ==========================================================
            1. SUSU SEGAR
            TARGET TOTAL STOK = 162
            ==========================================================
            */

            [
                'nama' => 'Fresh Milk 1L Boyong',
                'deskripsi' => 'Susu segar full cream berkualitas tinggi dari peternakan Boyong.',
                'stok' => 32,
                'harga' => 25000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-01',
                'tgl_kadaluarsa' => '2026-06-01',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Fresh Milk 500ml Boyong',
                'deskripsi' => 'Susu segar ukuran praktis untuk konsumsi harian.',
                'stok' => 24,
                'harga' => 15000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2026-05-02',
                'tgl_kadaluarsa' => '2026-06-02',
                'berat_isi_bersih' => '500 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Pasteurized Milk Boyong',
                'deskripsi' => 'Susu pasteurisasi higienis dengan rasa natural.',
                'stok' => 21,
                'harga' => 22000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2026-05-03',
                'tgl_kadaluarsa' => '2026-06-03',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Low Fat Milk Boyong',
                'deskripsi' => 'Susu rendah lemak untuk gaya hidup sehat.',
                'stok' => 18,
                'harga' => 28000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-04',
                'tgl_kadaluarsa' => '2026-06-04',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Steril Milk Boyong',
                'deskripsi' => 'Susu steril tahan lama tanpa pengawet.',
                'stok' => 15,
                'harga' => 26000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2026-05-05',
                'tgl_kadaluarsa' => '2026-06-05',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Daily Fresh Milk',
                'deskripsi' => 'Susu segar harian dengan rasa ringan dan natural.',
                'stok' => 27,
                'harga' => 24000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2026-05-06',
                'tgl_kadaluarsa' => '2026-06-06',
                'berat_isi_bersih' => '750 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Farm Fresh Milk',
                'deskripsi' => 'Susu segar langsung dari peternakan modern Boyong.',
                'stok' => 25,
                'harga' => 29000,
                'kategori' => 'Susu Segar',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-07',
                'tgl_kadaluarsa' => '2026-06-07',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'pre_order',
            ],

            /*
            ==========================================================
            2. SUSU PREMIUM
            TARGET TOTAL STOK = 482
            ==========================================================
            */

            [
                'nama' => 'Organic Milk Premium',
                'deskripsi' => 'Susu organik tanpa hormon dengan kualitas premium.',
                'stok' => 170,
                'harga' => 38000,
                'kategori' => 'Susu Premium',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-01',
                'tgl_kadaluarsa' => '2026-06-01',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'High Calcium Milk',
                'deskripsi' => 'Susu tinggi kalsium untuk membantu menjaga kesehatan tulang dan tubuh.',
                'stok' => 152,
                'harga' => 45000,
                'kategori' => 'Susu Premium',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2026-05-02',
                'tgl_kadaluarsa' => '2026-06-02',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'pre_order',
            ],
            [
                'nama' => 'Royal Dairy Milk',
                'deskripsi' => 'Susu eksklusif kualitas ekspor dengan stok terbatas.',
                'stok' => 160,
                'harga' => 52000,
                'kategori' => 'Susu Premium',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2026-05-03',
                'tgl_kadaluarsa' => '2026-06-03',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'pre_order',
            ],

            /*
            ==========================================================
            3. OLAHAN SUSU
            TARGET TOTAL STOK = 252
            ==========================================================
            */

            [
                'nama' => 'Chocolate Milk Boyong',
                'deskripsi' => 'Susu cokelat premium dengan rasa creamy.',
                'stok' => 62,
                'harga' => 27000,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu4.jpg',
                'tgl_produksi' => '2026-05-01',
                'tgl_kadaluarsa' => '2026-06-01',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Strawberry Milk Boyong',
                'deskripsi' => 'Susu rasa stroberi segar dan manis alami.',
                'stok' => 54,
                'harga' => 24000,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu5.jpg',
                'tgl_produksi' => '2026-05-02',
                'tgl_kadaluarsa' => '2026-06-02',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Melon Milk Fresh',
                'deskripsi' => 'Susu melon segar dengan aroma buah alami.',
                'stok' => 47,
                'harga' => 23500,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu4.jpg',
                'tgl_produksi' => '2026-05-03',
                'tgl_kadaluarsa' => '2026-06-03',
                'berat_isi_bersih' => '1 Liter',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Vanilla Milkshake',
                'deskripsi' => 'Milkshake vanilla creamy dengan tekstur lembut.',
                'stok' => 43,
                'harga' => 32000,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu5.jpg',
                'tgl_produksi' => '2026-05-04',
                'tgl_kadaluarsa' => '2026-06-04',
                'berat_isi_bersih' => '500 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Coffee Milk Latte',
                'deskripsi' => 'Susu kopi latte ringan dengan aroma khas.',
                'stok' => 46,
                'harga' => 28500,
                'kategori' => 'Olahan Susu',
                'gambar' => 'produk/susu4.jpg',
                'tgl_produksi' => '2026-05-05',
                'tgl_kadaluarsa' => '2026-06-05',
                'berat_isi_bersih' => '500 ml',
                'status_produk' => 'pre_order',
            ],

            /*
            ==========================================================
            4. YOGURT
            TARGET TOTAL STOK = 621
            ==========================================================
            */

            [
                'nama' => 'Yogurt Blueberry',
                'deskripsi' => 'Yogurt probiotik rasa blueberry segar.',
                'stok' => 180,
                'harga' => 21000,
                'kategori' => 'Yogurt',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-01',
                'tgl_kadaluarsa' => '2026-05-25',
                'berat_isi_bersih' => '250 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Yogurt Strawberry',
                'deskripsi' => 'Yogurt creamy dengan rasa stroberi alami.',
                'stok' => 165,
                'harga' => 22500,
                'kategori' => 'Yogurt',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2026-05-02',
                'tgl_kadaluarsa' => '2026-05-26',
                'berat_isi_bersih' => '250 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Greek Yogurt',
                'deskripsi' => 'Yogurt kental tinggi protein premium.',
                'stok' => 144,
                'harga' => 26000,
                'kategori' => 'Yogurt',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2026-05-03',
                'tgl_kadaluarsa' => '2026-05-27',
                'berat_isi_bersih' => '250 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Mango Yogurt',
                'deskripsi' => 'Yogurt rasa mangga tropis segar.',
                'stok' => 132,
                'harga' => 21500,
                'kategori' => 'Yogurt',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-04',
                'tgl_kadaluarsa' => '2026-05-28',
                'berat_isi_bersih' => '250 ml',
                'status_produk' => 'habis',
            ],

            /*
            ==========================================================
            5. ES KRIM
            TARGET TOTAL STOK = 384
            ==========================================================
            */

            [
                'nama' => 'Vanilla Cup Ice Cream',
                'deskripsi' => 'Es krim vanilla premium dengan tekstur lembut.',
                'stok' => 74,
                'harga' => 12000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/eskrim2.jpg',
                'tgl_produksi' => '2026-05-01',
                'tgl_kadaluarsa' => '2026-07-01',
                'berat_isi_bersih' => '120 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Chocolate Cone Ice Cream',
                'deskripsi' => 'Cone cokelat creamy favorit pelanggan.',
                'stok' => 66,
                'harga' => 15000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-02',
                'tgl_kadaluarsa' => '2026-07-02',
                'berat_isi_bersih' => '150 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Matcha Ice Cream',
                'deskripsi' => 'Es krim matcha premium ala Jepang.',
                'stok' => 58,
                'harga' => 24000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2026-05-03',
                'tgl_kadaluarsa' => '2026-07-03',
                'berat_isi_bersih' => '180 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Strawberry Ice Cream',
                'deskripsi' => 'Es krim stroberi segar creamy.',
                'stok' => 49,
                'harga' => 18000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2026-05-04',
                'tgl_kadaluarsa' => '2026-07-04',
                'berat_isi_bersih' => '150 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Family Pack Ice Cream',
                'deskripsi' => 'Es krim ukuran keluarga premium.',
                'stok' => 22,
                'harga' => 45000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/eskrim2.jpg',
                'tgl_produksi' => '2026-05-05',
                'tgl_kadaluarsa' => '2026-07-05',
                'berat_isi_bersih' => '500 ml',
                'status_produk' => 'habis',
            ],
            [
                'nama' => 'Cookies Ice Cream',
                'deskripsi' => 'Es krim cookies dengan topping crunchy.',
                'stok' => 43,
                'harga' => 22000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/susu1.jpg',
                'tgl_produksi' => '2026-05-06',
                'tgl_kadaluarsa' => '2026-07-06',
                'berat_isi_bersih' => '170 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Caramel Ice Cream',
                'deskripsi' => 'Es krim caramel manis creamy premium.',
                'stok' => 39,
                'harga' => 21000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/susu2.jpg',
                'tgl_produksi' => '2026-05-07',
                'tgl_kadaluarsa' => '2026-07-07',
                'berat_isi_bersih' => '160 ml',
                'status_produk' => 'tersedia',
            ],
            [
                'nama' => 'Choco Mint Ice Cream',
                'deskripsi' => 'Perpaduan cokelat dan mint yang menyegarkan.',
                'stok' => 33,
                'harga' => 25000,
                'kategori' => 'Es Krim',
                'gambar' => 'produk/susu3.jpg',
                'tgl_produksi' => '2026-05-08',
                'tgl_kadaluarsa' => '2026-07-08',
                'berat_isi_bersih' => '180 ml',
                'status_produk' => 'pre_order',
            ],
        ];

        foreach ($produkData as $data) {
            Produk::create($data);
        }
    }
}
