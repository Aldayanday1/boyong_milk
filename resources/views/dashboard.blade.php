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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
                <!-- Top Bar -->
                <div class="header-top-bar">
                    <div class="breadcrumb-wrapper">
                        <nav class="breadcrumb">
                            <i class="fas fa-home"></i>
                            <span class="breadcrumb-separator">/</span>
                            <span class="breadcrumb-current">Dashboard</span>
                        </nav>
                    </div>

                    <div class="header-top-actions">
                        <!-- Live Time Display -->
                        <div class="live-time-display">
                            <div class="time-icon-wrapper">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="time-info">
                                <span class="current-time" id="current-time">00:00:00</span>
                                <span class="current-day" id="current-day">Hari, DD Bulan YYYY</span>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="header-notification">
                            <button class="notification-btn" aria-label="Notifikasi">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">3</span>
                            </button>
                        </div>

                        <!-- User Profile -->
                        <div class="header-user-profile">
                            <div class="profile-avatar-wrapper">
                                <div class="profile-avatar">
                                    <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <span class="profile-status-dot"></span>
                            </div>
                            <div class="profile-info">
                                <span class="profile-name">{{ Auth::user()->name }}</span>
                                <span class="profile-role">Administrator</span>
                            </div>
                            <i class="fas fa-chevron-down profile-dropdown-icon"></i>
                        </div>
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
                            <h3 class="card-value" data-target="{{ $totalProduk }}">0</h3>
                            <p class="card-label">Total Produk</p>
                        </div>
                    </div>

                    <!-- Card 2: Stok Tersedia -->
                    <div class="analytics-card card-green">
                        <div class="card-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value" data-target="{{ $produkTersedia }}">0</h3>
                            <p class="card-label">Produk Tersedia</p>
                        </div>
                    </div>

                    <!-- Card 3: Stok Habis -->
                    <div class="analytics-card card-red">
                        <div class="card-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-value" data-target="{{ $produkHabis }}">0</h3>
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
                            <h3 class="card-value" data-target="{{ $produkPreOrder }}">0</h3>
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
                            <div id="productChart"></div>
                        </div>
                    </div>

                    <!-- Chart 2: Status Produk -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Status Ketersediaan</h3>
                        </div>
                        <div class="chart-body">
                            <div id="statusChart"></div>
                        </div>
                    </div>

                    <!-- Chart 3: Total Stok per Kategori -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Total Stok per Kategori</h3>
                        </div>
                        <div class="chart-body">
                            <div id="stockChart"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Products Table Section -->
            <section class="table-section">
                <div class="table-card">
                    <!-- Table Header -->
                    <div class="table-card-header">
                        <div class="table-header-left">
                            <div class="table-header-content">
                                <div class="table-title-row">
                                    <div class="table-title-icon" aria-hidden="true">
                                        <i class="fas fa-boxes-stacked"></i>
                                    </div>
                                    <div class="table-title-text">
                                        <h3 class="table-title">Daftar Produk</h3>
                                        <p class="table-subtitle">Kelola produk, status, dan stok</p>
                                    </div>
                                </div>

                                <div class="table-meta" aria-label="Ringkasan data produk">
                                    <span class="table-meta-pill">
                                        <i class="fas fa-layer-group" aria-hidden="true"></i>
                                        <span>Total:</span>
                                        <span style="font-weight:500;">
                                            {{ method_exists($produks, 'total') ? $produks->total() : $produks->count() }}
                                        </span>
                                    </span>
                                    <span class="table-meta-dot" aria-hidden="true"></span>
                                    <span class="table-meta-pill table-meta-soft">
                                        <i class="fas fa-shield-halved" aria-hidden="true"></i>
                                        <span>Admin panel</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="table-header-right">
                            <div class="table-tools">
                                <!-- Modern Minimal Search -->
                                <div class="modern-search">
                                    <i class="fas fa-search table-search-icon" aria-hidden="true"></i>
                                    <input id="table-search-input" type="search" class="table-search-input"
                                        placeholder="Cari produk..." aria-label="Cari produk">
                                    <button id="table-search-clear" type="button" class="table-search-clear"
                                        aria-label="Bersihkan pencarian" title="Bersihkan">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>

                                <a href="{{ route('produk.create') }}" class="btn-add-product">
                                    <i class="fas fa-plus" style="font-size:13px;"></i>
                                    <span>Tambah Produk</span>
                                </a>
                            </div>
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
                                                    action="{{ route('produk.destroy', $produk->id) }}"
                                                    method="POST" style="display: inline;">
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

        // Store chart instances globally
        let productChart = null;
        let statusChart = null;
        let stockChart = null;

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

                    // After the sidebar CSS transition, trigger chart resize/reflow
                    setTimeout(function() {
                        // Dispatch a window resize event (ApexCharts listens to this)
                        try {
                            window.dispatchEvent(new Event('resize'));
                        } catch (e) {
                            // older browsers fallback
                            var evt = document.createEvent('UIEvents');
                            evt.initUIEvent('resize', true, false, window, 0);
                            window.dispatchEvent(evt);
                        }

                        // Also try to call resize() directly if available
                        try {
                            if (productChart && typeof productChart.resize === 'function')
                                productChart.resize();
                            if (statusChart && typeof statusChart.resize === 'function') statusChart
                                .resize();
                            if (stockChart && typeof stockChart.resize === 'function') stockChart
                                .resize();
                        } catch (e) {
                            // ignore any errors from resize calls
                        }
                    }, 340); // match typical CSS transition duration
                });
            }

            // Live Time & Date Update
            function updateTime() {
                const now = new Date();

                // Format time (HH:MM:SS)
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                const timeString = `${hours}:${minutes}:${seconds}`;

                // Format date (Hari, DD Bulan YYYY)
                const dateString = now.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                const timeElement = document.getElementById('current-time');
                const dayElement = document.getElementById('current-day');

                if (timeElement) timeElement.textContent = timeString;
                if (dayElement) dayElement.textContent = dateString;
            }

            // Update time immediately and every second
            updateTime();
            setInterval(updateTime, 1000);

            // Animate Counter for Analytics Cards
            function animateCounter(element) {
                const target = parseInt(element.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        element.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target;
                    }
                };

                updateCounter();
            }

            // Start counter animation after card animations
            setTimeout(() => {
                const cardValues = document.querySelectorAll('.card-value[data-target]');
                cardValues.forEach((value, index) => {
                    setTimeout(() => {
                        animateCounter(value);
                    }, index * 100); // Stagger each counter by 100ms
                });
            }, 500); // Wait 500ms for cards to fade in

            // ApexCharts - Product Distribution by Category (Bar Chart)
            const productCtx = document.getElementById('productChart');
            if (productCtx) {
                const productOptions = {
                    series: [{
                        name: 'Jumlah Produk',
                        data: {!! json_encode($kategoriData) !!}
                    }],
                    chart: {
                        type: 'bar',
                        height: 300,
                        width: '95%',
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 1500,
                            animateGradually: {
                                enabled: true,
                                delay: 200
                            },
                            dynamicAnimation: {
                                enabled: false
                            }
                        },
                        redrawOnParentResize: false,
                        redrawOnWindowResize: false
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            columnWidth: '60%',
                            distributed: true,
                            dataLabels: {
                                position: 'top'
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    xaxis: {
                        categories: {!! json_encode($kategoriLabels) !!},
                        labels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: 500
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            show: false
                        }
                    },
                    /* unified blue → purple tone scale (subtle single-family variations) */
                    colors: ['#3b82f6', '#5b7bf0', '#6f64e8', '#7c4de0', '#8b5cf6'],
                    legend: {
                        show: false
                    },
                    grid: {
                        borderColor: '#f3f4f6',
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: false
                            }
                        },
                        yaxis: {
                            lines: {
                                show: true
                            }
                        }
                    },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function(val) {
                                return val + ' produk';
                            }
                        }
                    }
                };

                productChart = new ApexCharts(productCtx, productOptions);
                productChart.render();
            }

            // ApexCharts - Status Distribution (Donut Chart)
            const statusCtx = document.getElementById('statusChart');
            if (statusCtx) {
                const statusOptions = {
                    series: [{{ $produkTersedia }}, {{ $produkHabis }}, {{ $produkPreOrder }}],
                    chart: {
                        type: 'donut',
                        height: 300,
                        width: '95%',
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 1500,
                            animateGradually: {
                                enabled: true,
                                delay: 300
                            },
                            dynamicAnimation: {
                                enabled: false
                            }
                        },
                        redrawOnParentResize: false,
                        redrawOnWindowResize: false
                    },
                    labels: ['Tersedia', 'Habis', 'Pre-Order'],
                    /* sync with product chart: blue → purple family (clean single-family tones) */
                    colors: ['#3b82f6', '#6f64e8', '#8b5cf6'],
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            expandOnClick: true,
                            offsetX: 0,
                            offsetY: 0,
                            customScale: 1,
                            dataLabels: {
                                offset: 0,
                                minAngleToShowLabel: 10
                            },
                            donut: {
                                size: '65%',
                                background: 'transparent',
                                labels: {
                                    show: false
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '13px',
                        fontWeight: 500,
                        offsetY: 10,
                        markers: {
                            width: 12,
                            height: 12,
                            radius: 12
                        },
                        itemMargin: {
                            horizontal: 15,
                            vertical: 5
                        }
                    },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function(val, opts) {
                                const total = opts.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                const percentage = ((val / total) * 100).toFixed(1);
                                return val + ' produk (' + percentage + '%)';
                            }
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'lighten',
                                value: 0.15
                            }
                        },
                        active: {
                            filter: {
                                type: 'darken',
                                value: 0.15
                            }
                        }
                    }
                };

                statusChart = new ApexCharts(statusCtx, statusOptions);
                statusChart.render();
            }

            // ApexCharts - Total Stok per Kategori (Area Chart)
            const stockCtx = document.getElementById('stockChart');
            if (stockCtx) {
                const stockOptions = {
                    series: [{
                        name: 'Total Stok',
                        data: {!! json_encode($stokPerKategori) !!}
                    }],
                    chart: {
                        type: 'area',
                        height: 300,
                        width: '95%',
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 1500,
                            animateGradually: {
                                enabled: true,
                                delay: 400
                            }
                        },
                        redrawOnParentResize: false,
                        redrawOnWindowResize: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.2,
                            stops: [0, 90, 100]
                        }
                    },
                    xaxis: {
                        categories: {!! json_encode($stokKategoriLabels) !!},
                        labels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: 500
                            }
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 120,
                        tickAmount: 6,
                        labels: {
                            style: {
                                fontSize: '12px'
                            },
                            formatter: function(val) {
                                return Math.round(val);
                            }
                        }
                    },
                    colors: ['#3b82f6'],
                    grid: {
                        borderColor: '#f3f4f6',
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: false
                            }
                        },
                        yaxis: {
                            lines: {
                                show: true
                            }
                        }
                    },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function(val) {
                                return val + ' unit stok';
                            }
                        }
                    }
                };

                stockChart = new ApexCharts(stockCtx, stockOptions);
                stockChart.render();
            }
        });
    </script>
</body>

</html>
