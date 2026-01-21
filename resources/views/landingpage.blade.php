<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Boyong Milk - Produk susu segar berkualitas tinggi dari Padukuhan Boyong, Hargobinangun, Sleman, DIY">
    <meta name="keywords" content="boyong milk, susu segar, susu kambing, es krim, padukuhan boyong, sleman">
    <meta name="author" content="KKN REGULER 090 UMY">
    <title>Boyong Milk - Produk Susu Berkualitas dari Padukuhan Boyong</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_boyong.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Boxicons for Social Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Modular CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/products-redesign.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/footer.css') }}">

    @vite('resources/css/app.css')
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-spinner"></div>
    </div>

    <!-- Modern Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#home" class="nav-brand">
                <img src="{{ asset('images/logo_boyong.png') }}" alt="Boyong Milk Logo" class="nav-brand-logo">
                <span class="nav-brand-text">Boyong Milk</span>
            </a>

            <ul class="nav-menu">
                <li class="nav-item"><a href="#home" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="#tentang" class="nav-link">Tentang</a></li>
                <li class="nav-item"><a href="#galeri" class="nav-link">Galeri</a></li>
                <li class="nav-item"><a href="#produk" class="nav-link">Produk</a></li>
                <li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>
                </li>
            </ul>

            <button class="nav-toggle" aria-label="Toggle navigation">
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-container">
            <!-- Left: Content -->
            <div class="hero-content">
                <div class="hero-badge fade-up">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Padukuhan Boyong, Sleman, DIY</span>
                </div>

                <h1 class="hero-title fade-up">
                    Susu Segar <span class="hero-title-highlight">Berkualitas</span><br>
                    Dari Padukuhan Boyong
                </h1>

                <p class="hero-subtitle fade-up">
                    Nikmati kesegaran susu dan es krim berkualitas tinggi yang diproduksi langsung dari peternakan lokal
                    kami. 100% segar, alami, dan bergizi untuk keluarga Indonesia.
                </p>

                <div class="hero-cta fade-up">
                    <a href="#produk" class="hero-btn hero-btn-primary">
                        <span>Lihat Produk</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#tentang" class="hero-btn hero-btn-secondary">
                        <i class="fas fa-info-circle"></i>
                        <span>Tentang Kami</span>
                    </a>
                </div>
            </div>

            <!-- Right: Visual with Floating Cards -->
            <div class="hero-visual fade-up">
                <!-- Background Cow Image -->
                <div class="hero-cow-bg">
                    <img src="{{ asset('images/bg-landing-shepi.jpeg') }}" alt="Sapi Boyong">
                </div>

                <!-- Main Product Image -->
                <div class="hero-image">
                    <img src="{{ asset('images/milk-2.jpeg') }}" alt="Produk Boyong Milk">
                </div>

                <!-- Floating Cards -->
                <div class="hero-floating-card card-1">
                    <div class="hero-card-icon blue">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="hero-card-content">
                        <h4>100% Segar</h4>
                        <p>Kualitas Terjamin</p>
                    </div>
                </div>

                <div class="hero-floating-card card-2">
                    <div class="hero-card-icon green">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="hero-card-content">
                        <h4>Alami</h4>
                        <p>Tanpa Pengawet</p>
                    </div>
                </div>

                <div class="hero-floating-card card-3">
                    <div class="hero-card-icon orange">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="hero-card-content">
                        <h4>Produk Lokal</h4>
                        <p>Langsung dari Boyong</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-scroll">
            <div class="hero-scroll-indicator">
                <div class="hero-scroll-dot"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section section" id="tentang">
        <div class="about-container">
            <div class="about-content">
                <!-- Text Content -->
                <div class="about-text">
                    <h2 class="fade-up">Profil Padukuhan Boyong</h2>
                    <p class="fade-up">
                        Boyong adalah Padukuhan yang terletak di Kalurahan Hargobinangun, Sleman, DIY.
                        Dikenal sebagai daerah peternakan sapi perah dan kambing perah yang menghasilkan susu
                        berkualitas tinggi, masyarakat di sini mengembangkan peternakan secara berkelanjutan dengan
                        dukungan Koperasi Pemasaran Boyong Sari Mulya, yang menaungi dan mewadahi para peternak
                        dalam pengelolaan usaha mereka.
                    </p>

                    <!-- Statistics -->
                    <div class="about-stats">
                        <div class="about-stat fade-up">
                            <span class="about-stat-number">2</span>
                            <span class="about-stat-label">Jenis Susu</span>
                        </div>
                        <div class="about-stat fade-up">
                            <span class="about-stat-number">1</span>
                            <span class="about-stat-label">Koperasi</span>
                        </div>
                        <div class="about-stat fade-up">
                            <span class="about-stat-number percent">100</span>
                            <span class="about-stat-label">Murni</span>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="about-image fade-up">
                    <img src="{{ asset('images/profil_padukuhan_boyong.jpeg') }}" alt="Padukuhan Boyong"
                        class="about-image-main">
                    <div class="about-image-decorator"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="video-section section">
        <div class="video-container">
            <h2 class="fade-up">Kehidupan di Padukuhan Boyong</h2>
            <p class="fade-up">
                Berikut beberapa cuplikan kegiatan di Padukuhan Boyong, termasuk kehidupan masyarakat
                serta proses pengolahan susu dan es krim menjadi produk olahan.
            </p>

            <div class="video-row">
                <!-- Video 1 -->
                <div class="video-item fade-up">
                    <video autoplay muted loop playsinline preload="auto" controls onended="this.play()">
                        <source src="{{ asset('images/boyong1.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung video ini.
                    </video>
                    <div class="video-item-overlay"></div>
                    <div class="video-item-caption">
                        <div class="video-item-icon">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <p>Profil Dusun Padukuhan Boyong</p>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="video-item fade-up">
                    <video autoplay muted loop playsinline preload="auto" controls onended="this.play()">
                        <source src="{{ asset('images/boyong2.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung video ini.
                    </video>
                    <div class="video-item-overlay"></div>
                    <div class="video-item-caption">
                        <div class="video-item-icon">
                            <i class="fa-solid fa-industry"></i>
                        </div>
                        <p>Proses Pengolahan Susu & Es Krim</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section section" id="galeri">
        <div class="gallery-container">
            <div class="gallery-header">
                <h2 class="fade-up">Galeri Produk Kami</h2>
                <p class="fade-up">
                    Padukuhan Boyong memiliki beragam produk olahan susu berkualitas yang dihasilkan
                    dari peternakan lokal. Berikut adalah beberapa produk unggulan terbaru kami.
                </p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item fade-up">
                    <img src="{{ asset('images/shepi-1.jpeg') }}" alt="Peternakan Sapi Boyong">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fa-solid fa-cow"></i>
                        </div>
                        <div class="gallery-overlay-content">
                            <h4>Peternakan Sapi</h4>
                            <p>Sapi berkualitas dari Padukuhan Boyong</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item fade-up">
                    <img src="{{ asset('images/milk-2.jpeg') }}" alt="Susu Segar">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fa-solid fa-bottle-droplet"></i>
                        </div>
                        <div class="gallery-overlay-content">
                            <h4>Susu Segar</h4>
                            <p>100% segar dan alami</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item fade-up">
                    <img src="{{ asset('images/shepi-2.jpeg') }}" alt="Kambing Perah">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fa-solid fa-paw"></i>
                        </div>
                        <div class="gallery-overlay-content">
                            <h4>Kambing Perah</h4>
                            <p>Sumber susu kambing berkualitas</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item fade-up">
                    <img src="{{ asset('images/eskrim-3.jpeg') }}" alt="Produk Es Krim">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fa-solid fa-ice-cream"></i>
                        </div>
                        <div class="gallery-overlay-content">
                            <h4>Varian Es Krim</h4>
                            <p>Berbagai pilihan menarik</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item fade-up">
                    <img src="{{ asset('images/pengolahan-1.jpeg') }}" alt="Proses Pengolahan">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fa-solid fa-gears"></i>
                        </div>
                        <div class="gallery-overlay-content">
                            <h4>Proses Pengolahan</h4>
                            <p>Standar kebersihan tinggi</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item fade-up">
                    <img src="{{ asset('images/eskrim-1.jpeg') }}" alt="Es Krim Boyong">
                    <div class="gallery-overlay">
                        <div class="gallery-overlay-icon">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <div class="gallery-overlay-content">
                            <h4>Es Krim Premium</h4>
                            <p>Rasa yang menggugah selera</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section class="produk-section section" id="produk">
        <div class="container">
            <div class="produk-header">
                <h2 class="fade-up">Produk Kami</h2>
                <p class="fade-up">
                    Kami menghadirkan berbagai produk olahan susu berkualitas tinggi dari sapi perah
                    dan kambing perah terbaik di Padukuhan Boyong.
                </p>
            </div>

            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="produk-card-modern fade-up" onclick="showDetail('{{ $produk->id }}')">
                            <!-- Image Container with Overlay -->
                            <div class="produk-image-modern">
                                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}"
                                    loading="lazy">
                                <div class="produk-overlay">
                                    <div class="produk-badge-modern {{ strtolower($produk->status_produk) }}">
                                        @if ($produk->status_produk == 'tersedia')
                                            <i class="fas fa-check-circle"></i> Tersedia
                                        @elseif($produk->status_produk == 'habis')
                                            <i class="fas fa-times-circle"></i> Habis
                                        @else
                                            <i class="fas fa-clock"></i> Pre-Order
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="produk-content-modern">
                                <!-- Category with Icon -->
                                <div class="produk-category-modern">
                                    <i class="fas fa-tag"></i>
                                    <span>{{ ucfirst($produk->kategori) }}</span>
                                </div>

                                <!-- Product Name (single line with ellipsis) -->
                                <h3 class="produk-title-modern single-line" title="{{ $produk->nama }}"
                                    style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                    {{ $produk->nama }}
                                </h3>

                                <!-- Description -->
                                <p class="produk-desc-modern">{{ Str::limit($produk->deskripsi, 80) }}</p>

                                <!-- Info Grid -->
                                <div class="produk-info-grid">
                                    <div class="produk-info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-boxes"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Stok</span>
                                            <span class="info-value">{{ $produk->stok }} unit</span>
                                        </div>
                                    </div>
                                    <div class="produk-info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-weight"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">Berat</span>
                                            <span class="info-value">{{ $produk->berat_isi_bersih }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price & CTA Section -->
                                <div class="produk-footer-modern">
                                    <div class="produk-price-modern">
                                        <span class="price-label">Harga</span>
                                        <div class="price-value">
                                            <span class="currency">Rp</span>
                                            <span
                                                class="amount">{{ number_format($produk->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <button class="produk-btn-modern">
                                        <span>Detail</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div>
                {{ $produks->links() }}
            </div>
        </div>
    </section>

    <!-- Modal Detail Produk -->
    <div class="modal fade" id="produkDetailModal" tabindex="-1" aria-labelledby="produkDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produkDetailModalLabel">Detail Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="detailContent"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="cta-section" id="kontak">
        <div class="cta-container">
            <!-- Left Content -->
            <div class="cta-left fade-up">
                <div class="cta-eyebrow">
                    <span class="cta-eyebrow-dot"></span>
                    <span class="cta-eyebrow-text">Mari Berkolaborasi</span>
                </div>

                <h2 class="cta-heading">
                    Siap Merasakan
                    <span class="cta-heading-gradient">Kesegaran Alami?</span>
                </h2>

                <p class="cta-subtext">
                    Hubungi kami sekarang untuk pemesanan atau konsultasi produk.
                    Tim kami siap melayani dengan ramah dan profesional.
                </p>

                <div class="cta-stats">
                    <div class="cta-stat-item">
                        <div class="cta-stat-number">365</div>
                        <div class="cta-stat-label">Hari Operasional</div>
                    </div>
                    <div class="cta-stat-divider"></div>
                    <div class="cta-stat-item">
                        <div class="cta-stat-number">24/7</div>
                        <div class="cta-stat-label">Layanan Siap</div>
                    </div>
                    <div class="cta-stat-divider"></div>
                    <div class="cta-stat-item">
                        <div class="cta-stat-number">100%</div>
                        <div class="cta-stat-label">Produk Segar</div>
                    </div>
                </div>

                <div class="cta-trust-badges">
                    <div class="cta-trust-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Kualitas Terjamin</span>
                    </div>
                    <div class="cta-trust-item">
                        <i class="fas fa-truck"></i>
                        <span>Pengiriman Cepat</span>
                    </div>
                    <div class="cta-trust-item">
                        <i class="fas fa-award"></i>
                        <span>Produk Lokal Terbaik</span>
                    </div>
                </div>
            </div>

            <!-- Right Contact Card -->
            <div class="cta-right fade-up">
                <div class="cta-card">
                    <div class="cta-card-header">
                        <div class="cta-card-icon">
                            <div class="icon-outer-ring"></div>
                            <div class="icon-middle-ring"></div>
                            <div class="icon-inner-circle">
                                <div class="icon-glow"></div>
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="icon-particle icon-particle-1"></div>
                            <div class="icon-particle icon-particle-2"></div>
                            <div class="icon-particle icon-particle-3"></div>
                            <div class="icon-particle icon-particle-4"></div>
                        </div>
                        <h3 class="cta-card-title">Hubungi Kami</h3>
                        <p class="cta-card-subtitle">Pilih cara yang paling nyaman untuk Anda</p>
                    </div>

                    <div class="cta-card-body">
                        <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20produk%20Boyong%20Milk"
                            target="_blank" class="cta-contact-btn cta-contact-whatsapp">
                            <div class="cta-contact-btn-icon">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                            <div class="cta-contact-btn-content">
                                <span class="cta-contact-btn-label">WhatsApp</span>
                                <span class="cta-contact-btn-value">+62 812-3456-789</span>
                            </div>
                            <i class="fas fa-arrow-right cta-contact-btn-arrow"></i>
                        </a>

                        <a href="tel:+628123456789" class="cta-contact-btn cta-contact-phone">
                            <div class="cta-contact-btn-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="cta-contact-btn-content">
                                <span class="cta-contact-btn-label">Telepon</span>
                                <span class="cta-contact-btn-value">+62 812-3456-789</span>
                            </div>
                            <i class="fas fa-arrow-right cta-contact-btn-arrow"></i>
                        </a>

                        {{-- <a href="mailto:desaboyong@example.com" class="cta-contact-btn cta-contact-email">
                            <div class="cta-contact-btn-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="cta-contact-btn-content">
                                <span class="cta-contact-btn-label">Email</span>
                                <span class="cta-contact-btn-value">desaboyong@example.com</span>
                            </div>
                            <i class="fas fa-arrow-right cta-contact-btn-arrow"></i>
                        </a> --}}
                    </div>

                    <div class="cta-card-footer">
                        <div class="cta-card-footer-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="cta-card-footer-text">
                            <strong>Waktu Operasional</strong>
                            <span>Senin - Minggu: 07.00 - 20.00 WIB</span>
                        </div>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="cta-decoration cta-decoration-1"></div>
                <div class="cta-decoration cta-decoration-2"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-info fade-up">
                <h3>Padukuhan Boyong</h3>
                <p>
                    Website ini dikembangkan oleh <strong>KKN REGULER 090 UMY</strong> sebagai bagian dari
                    kontribusi untuk masyarakat.
                </p>
            </div>

            <div class="footer-links fade-up">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#produk">Produk</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>

            <div class="footer-contact fade-up">
                <h4>Kontak Padukuhan</h4>
                <p>Email: <a href="mailto:desaboyong@example.com">desaboyong@example.com</a></p>
                <p>Telepon: <a href="tel:+628123456789">+62 812-3456-789</a></p>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bx bxl-twitter"></i></a>
                </div>
            </div>

            <div class="footer-support fade-up">
                <h4>Dukungan Teknis</h4>
                <p>Jika menemukan bug atau masalah teknis, hubungi:</p>
                <p>Email: <a href="mailto:kkn90umy@example.com">kkn90umy@example.com</a></p>
                <p>WhatsApp: <a href="https://wa.me/628123456789" target="_blank">+62 812-3456-789</a></p>
            </div>
        </div>

        {{-- <div class="footer-bottom fade-up">
            <p>&copy; 2025 Padukuhan Boyong. Dibuat oleh <strong>KKN REGULER 090 UMY</strong>. All rights reserved.</p>
        </div> --}}
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/628123456789" target="_blank" class="whatsapp-float">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GSAP for Advanced Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Modular JavaScript -->
    <script src="{{ asset('js/landing/navbar.js') }}"></script>
    <script src="{{ asset('js/landing/animations.js') }}"></script>
    <script src="{{ asset('js/landing/products.js') }}"></script>
    <script src="{{ asset('js/landing/main.js') }}"></script>
