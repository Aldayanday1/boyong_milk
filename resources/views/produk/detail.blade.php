@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid" alt="{{ $produk->nama }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $produk->nama }}</h2>
                <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 2, ',', '.') }}</p>
                <p><strong>Stok:</strong> {{ $produk->stok }}</p>
                <p><strong>Kategori:</strong> {{ ucfirst($produk->kategori) }}</p>
                <p><strong>Berat Bersih:</strong> {{ $produk->berat_isi_bersih }}</p>
                <p><strong>Tgl Produksi:</strong> {{ $produk->tgl_produksi }}</p>
                <p><strong>Tgl Kadaluarsa:</strong> {{ $produk->tgl_kadaluarsa }}</p>
                <p><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p>
                <a href="{{ route('landingpage') }}" class="mt-3 btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
