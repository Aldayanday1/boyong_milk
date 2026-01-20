<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Boyong Milk</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_boyong.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css'])
</head>

<body class="admin-body">

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <x-admin-sidebar />

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Header -->
            <header class="top-header">
                <div class="header-left">
                    <h1 class="page-title">Dashboard</h1>
                    <p class="page-subtitle">Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>
                <div class="header-right">
                    <div class="header-time">
                        <i class="fas fa-calendar-alt"></i>
                        <span id="current-date"></span>
                    </div>
                </div>
            </header>

            <!-- Analytics Cards -->
            <section class="analytics-section">
                <div class="analytics-grid">
                    <!-- Card 1: Total Produk -->
                    <div class="analytics-card card-blue">
                        <div class="card-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value">{{ $totalProduk }}</h3>
                            <p class="card-label">Total Produk</p>
                        </div>
                    </div>

                    <!-- Card 2: Stok Tersedia -->
                    <div class="analytics-card card-green">
                        <div class="card-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value">{{ $produkTersedia }}</h3>
                            <p class="card-label">Produk Tersedia</p>
                        </div>
                    </div>

                    <!-- Card 3: Stok Habis -->
                    <div class="analytics-card card-red">
                        <div class="card-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value">{{ $produkHabis }}</h3>
                            <p class="card-label">Stok Habis</p>
                        </div>
                    </div>

                    {{-- <!-- Card 4: Total Stok -->
                    <div class="analytics-card card-purple">
                        <div class="card-icon">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value">{{ $totalStok }}</h3>
                            <p class="card-label">Total Stok Item</p>
                        </div>
                    </div> --}}

                    <!-- Card 4: Stok Pre Order (Warning style) -->
                    <div class="analytics-card card-warning">
                        <div class="card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value">{{ $produkPreOrder }}</h3>
                            <p class="card-label">Stok Pre-Order</p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Charts Section -->
            <section class="charts-section">
                <div class="charts-grid">
                    <!-- Chart 1: Distribusi Produk -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Distribusi Produk</h3>
                        </div>
                        <div class="chart-body">
                            <canvas id="productChart"></canvas>
                        </div>
                    </div>

                    <!-- Chart 2: Status Produk -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Status Ketersediaan</h3>
                        </div>
                        <div class="chart-body">
                            <canvas id="statusChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Products Table Section -->
            <section class="table-section">
                <div class="table-card">
                    <!-- Table Header -->
                    <div class="table-card-header">
                        <div class="header-left">
                            <h3 class="table-title">
                                <i class="fas fa-list"></i>
                                Daftar Produk
                            </h3>
                            <p class="table-subtitle">Kelola semua produk Anda</p>
                        </div>
                        <div class="header-right">
                            <a href="{{ route('produk.create') }}" class="btn-add-product">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Produk</span>
                            </a>
                        </div>
                    </div>

                    <!-- Table Wrapper -->
                    <div class="table-wrapper">
                        <table class="products-table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td>
                                            @if ($produk->gambar)
                                                <img src="{{ asset('storage/' . $produk->gambar) }}"
                                                    alt="{{ $produk->nama }}" class="product-img">
                                            @else
                                                <div class="product-img-placeholder">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="product-name">{{ $produk->nama }}</div>
                                        </td>
                                        <td>
                                            <span class="category-badge">{{ $produk->kategori }}</span>
                                        </td>
                                        <td>
                                            <div class="product-price">Rp
                                                {{ number_format($produk->harga, 0, ',', '.') }}</div>
                                        </td>
                                        <td>
                                            <div class="stock-info">{{ $produk->stok }} pcs</div>
                                        </td>
                                        <td>
                                            @if ($produk->status_produk == 'tersedia')
                                                <span class="status-badge status-available">
                                                    <i class="fas fa-check-circle"></i> Tersedia
                                                </span>
                                            @elseif($produk->status_produk == 'habis')
                                                <span class="status-badge status-outofstock">
                                                    <i class="fas fa-times-circle"></i> Habis
                                                </span>
                                            @else
                                                <span class="status-badge status-preorder">
                                                    <i class="fas fa-clock"></i> Pre-Order
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('produk.edit', $produk->id) }}"
                                                    class="btn-action btn-edit" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form id="delete-form-{{ $produk->id }}"
                                                    action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn-action btn-delete"
                                                        onclick="confirmDelete({{ $produk->id }})" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($produks->isEmpty())
                                    <tr>
                                        <td colspan="7" class="empty-state">
                                            <div class="empty-state-content">
                                                <i class="fas fa-box-open"></i>
                                                <p>Belum ada produk. Klik "Tambah Produk" untuk memulai.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="table-pagination">
                        {{ $produks->links() }}
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Success Alert Handler -->
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (!sessionStorage.getItem("alertShown") || sessionStorage.getItem("alertShown") !==
                    "{{ session('success') }}") {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        timer: 3000,
                        showConfirmButton: true,
                        confirmButtonColor: '#3b82f6'
                    }).then(() => {
                        sessionStorage.setItem("alertShown", "{{ session('success') }}");
                    });
                }
            });
        </script>
    @endif

    <!-- Scripts -->
    <script>
        // Delete Confirmation
        function confirmDelete(id) {
            Swal.fire({
                title: "Konfirmasi Hapus",
                text: "Apakah Anda yakin ingin menghapus produk ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    sessionStorage.removeItem("alertShown");
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Sidebar Toggle - Start collapsed by default
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggle-sidebar');
            const mainContent = document.querySelector('.main-content');

            // Set main content to expanded on initial load (since sidebar starts collapsed)
            if (mainContent && sidebar && sidebar.classList.contains('collapsed')) {
                mainContent.classList.add('expanded');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                });
            }

            // Current Date
            const currentDate = new Date().toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            document.getElementById('current-date').textContent = currentDate;

            // Chart.js - Product Distribution by Category
            const productCtx = document.getElementById('productChart');
            if (productCtx) {
                new Chart(productCtx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($kategoriLabels) !!},
                        datasets: [{
                            label: 'Jumlah Produk',
                            data: {!! json_encode($kategoriData) !!},
                            backgroundColor: [
                                'rgba(59, 130, 246, 0.8)',
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(245, 158, 11, 0.8)',
                                'rgba(239, 68, 68, 0.8)',
                                'rgba(139, 92, 246, 0.8)'
                            ],
                            borderColor: [
                                'rgba(59, 130, 246, 1)',
                                'rgba(16, 185, 129, 1)',
                                'rgba(245, 158, 11, 1)',
                                'rgba(239, 68, 68, 1)',
                                'rgba(139, 92, 246, 1)'
                            ],
                            borderWidth: 2,
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            }

            // Chart.js - Status Distribution (Doughnut)
            const statusCtx = document.getElementById('statusChart');
            if (statusCtx) {
                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Tersedia', 'Habis', 'Pre-Order'],
                        datasets: [{
                            data: [{{ $produkTersedia }}, {{ $produkHabis }},
                                {{ $produkPreOrder }}
                            ],
                            backgroundColor: [
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(239, 68, 68, 0.8)',
                                'rgba(245, 158, 11, 0.8)'
                            ],
                            borderColor: [
                                'rgba(16, 185, 129, 1)',
                                'rgba(239, 68, 68, 1)',
                                'rgba(245, 158, 11, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
