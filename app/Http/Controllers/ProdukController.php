<?php

// app/Http/Controllers/ProdukController.php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        // Get products with pagination for landing page
        $produks = Produk::orderBy('created_at', 'desc')->paginate(6);
        return view('landingpage', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.detail', compact('produk'));
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        // Analytics Data
        $totalProduk = Produk::count();
        $produkTersedia = Produk::where('status_produk', 'tersedia')->count();
        $produkHabis = Produk::where('status_produk', 'habis')->count();
        $produkPreOrder = Produk::where('status_produk', 'pre_order')->count();
        // $totalStok = Produk::sum('stok');

        // Chart Data - Distribusi per Kategori
        $kategoriData = Produk::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('total')
            ->toArray();
        
        $kategoriLabels = Produk::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('kategori')
            ->toArray();

        // Produk list with pagination
        $produks = Produk::orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard', compact(
            'produks',
            'totalProduk',
            'produkTersedia',
            'produkHabis',
            'produkPreOrder',
            // 'totalStok',
            'kategoriData',
            'kategoriLabels'
        ));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }
        return view('produk.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:10240', // 10MB
            // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tgl_produksi' => 'required|date',
            'tgl_kadaluarsa' => 'required|date',
            'berat_isi_bersih' => 'required',
            'status_produk' => 'required',
        ], [
            'gambar.required' => 'Gambar produk wajib diisi.',
            'gambar.mimes' => 'Format gambar hanya boleh JPG, JPEG, atau PNG.',
            'gambar.image' => 'Format gambar hanya boleh JPG, JPEG, atau PNG.',
        ]);

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->kategori = $request->kategori;
        if ($request->hasFile('gambar')) {
            $produk->gambar = $request->file('gambar')->store('produk', 'public');
        }
        $produk->tgl_produksi = $request->tgl_produksi;
        $produk->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $produk->berat_isi_bersih = $request->berat_isi_bersih;
        $produk->status_produk = $request->status_produk;
        $produk->save();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10MB
            'tgl_produksi' => 'required|date',
            'tgl_kadaluarsa' => 'required|date',
            'berat_isi_bersih' => 'required|string|max:255',
            'status_produk' => 'required|in:tersedia,habis,pre_order',
        ]);

        // Update data produk
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->kategori = $request->kategori;
        $produk->tgl_produksi = $request->tgl_produksi;
        $produk->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $produk->berat_isi_bersih = $request->berat_isi_bersih;
        $produk->status_produk = $request->status_produk;

        // Jika ada gambar baru yang di-upload, simpan gambar dan update path-nya
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $imagePath;
        }

        // Simpan perubahan ke database
        $produk->save();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        $produk->delete();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil dihapus.');
    }
}
