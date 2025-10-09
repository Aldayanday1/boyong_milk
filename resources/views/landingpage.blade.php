<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padukuhan Boyong Milk</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_boyong.png') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    @vite('resources/css/app.css')
</head>

<body>
    <header class="header">
        <a href="#" class="logo" style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
            <img src="{{ asset('images/logo_boyong.png') }}" alt="Boyong Milk Logo"
                style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.2); margin-right: 10px;">
            <span style="color: #fff; font-size: 1.6rem; font-weight: 700;">Boyong</span>
        </a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <i class='bx bx-menu' id="menu-icon"></i>
            <i class='bx bx-x' id="close-icon"></i>
        </label>

        <nav class="navbar">
            <a href="#home" style="--i:0">Home</a>
            <a href="#tentang" style="--i:1">Tentang</a>
            <a href="#galeri" style="--i:2">Galeri</a>
            <a href="#produk" style="--i:4">Produk</a>
            <a href="#kontak" style="--i:5">Kontak</a>

            <!-- Tombol Login -->
            <a href="{{ route('login') }}" class="login-btn" style="--i:6">
                Log in
            </a>
        </nav>
    </header>

    <!-- INTRO CONTAINER -->
    <section class="intro-container" id="home">
        <div class="intro-text">
            <h1>Boyong Milk</h1>
            <p>Padukuhan Boyong, Hargobinangun, Sleman, DIY</p>
        </div>
    </section>

    <!-- PROFILE SECTION -->
    <section class="profile-section" id="tentang">
        <div class="profile-container">
            <div class="profile-content">
                <!-- Bagian teks -->
                <div class="profile-text">
                    <h2 class="fade-up">Profil Padukuhan Boyong</h2>
                    <p class="fade-up">Boyong adalah Padukuhan yang terletak di Kalurahan Hargobinangun, Sleman, DIY.
                        Dikenal sebagai daerah peternakan sapi perah dan kambing perah yang menghasilkan susu
                        berkualitas tinggi,
                        masyarakat di sini mengembangkan peternakan secara berkelanjutan dengan dukungan Koperasi
                        Pemasaran Boyong Sari Mulya,
                        yang menaungi dan mewadahi para peternak dalam pengelolaan usaha mereka.</p>
                </div>

                <!-- Gambar profil -->
                <div class="profile-image fade-up">
                    <img src="{{ asset('images/profil_padukuhan_boyong.jpeg') }}" alt="Padukuhan Boyong">
                </div>
            </div>
        </div>
    </section>

    <!-- VIDEO SECTION -->
    <section class="video-section">
        <div class="video-container">
            <h2 class="fade-up">Kehidupan di Padukuhan Boyong</h2>
            <br>
            <p class="fade-up">Berikut beberapa cuplikan kegiatan di Padukuhan Boyong, termasuk kehidupan masyarakat
                serta proses pengolahan susu dan es krim menjadi produk olahan.</p>
            <br>
            <div class="video-row">
                <!-- Video 1: Profil Dusun Padukuhan Boyong -->
                <div class="video-item fade-up">
                    <video controls>
                        <source src="{{ asset('images/profil_padukuhan_boyong.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung video ini.
                    </video>
                    <br>
                    <p>Profil Dusun Padukuhan Boyong</p>
                </div>

                <!-- Video 2: Pengolahan Susu & Es Krim Menjadi Produk Olahan -->
                <div class="video-item fade-up">
                    <video controls>
                        <source src="{{ asset('images/pengolahan_susu.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung video ini.
                    </video>
                    <br>
                    <p>Proses Pengolahan Susu & Es Krim</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFILE SECTION PICTURE -->
    <section class="profile-section-2" id="galeri">
        <div class="profile-container-2">
            <div class="profile-content-2">
                <!-- Bagian teks -->
                <div class="profile-text-2">
                    <h2 class="fade-up">Galeri Produk</h2>
                    <p class="fade-up">Padukuhan Boyong memiliki beragam produk olahan susu berkualitas yang dihasilkan
                        dari peternakan lokal. Berikut adalah beberapa produk unggulan terbaru kami yang siap dinikmati
                        oleh pelanggan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ANIMATION SLIDE PICTURE -->
    <section class="cow-section">
        <div class="cow__wrapper-1">
            <div class="cow__images fade-up">
                <img src="{{ asset('images/shepi-1.jpeg') }}" alt="cow">
                <img src="{{ asset('images/milk-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/shepi-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/eskrim-3.jpeg') }}" alt="cow">
                <img src="{{ asset('images/pengolahan-1.jpeg') }}" alt="cow">

                <!-- DUPLIKASI GAMBAR UNTUK LOOP INFINITE -->
                <img src="{{ asset('images/milk-3.png') }}" alt="cow">
                <img src="{{ asset('images/pengolahan-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/eskrim-1.jpeg') }}" alt="cow">
                <img src="{{ asset('images/milk-1.jpeg') }}" alt="cow">
                <img src="{{ asset('images/eskrim-2.jpeg') }}" alt="cow">
            </div>
        </div>

        <div class="cow__wrapper-2">
            <div class="cow__images fade-up">
                <!-- DUPLIKASI GAMBAR UNTUK LOOP INFINITE -->
                <img src="{{ asset('images/eskrim-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/milk-1.jpeg') }}" alt="cow">
                <img src="{{ asset('images/eskrim-1.jpeg') }}" alt="cow">
                <img src="{{ asset('images/pengolahan-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/milk-3.png') }}" alt="cow">

                <img src="{{ asset('images/pengolahan-1.jpeg') }}" alt="cow">
                <img src="{{ asset('images/eskrim-3.jpeg') }}" alt="cow">
                <img src="{{ asset('images/shepi-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/milk-2.jpeg') }}" alt="cow">
                <img src="{{ asset('images/shepi-1.jpeg') }}" alt="cow">
            </div>
        </div>
    </section>

    <!-- PROFILE SECTION -->
    <section class="profile-section-3" id="produk">
        <div class="profile-container-3">
            <div class="profile-content-3">
                <!-- Gambar profil (utama + tambahan kecil) -->
                <div class="profile-image-3 fade-up">
                    <img class="main-image" src="{{ asset('images/milk-2.jpeg') }}" alt="Padukuhan Boyong">
                    <img class="overlay-image" src="{{ asset('images/milk-3.png') }}" alt="Produk Susu">
                </div>

                <!-- Bagian teks -->
                <div class="profile-text-3">
                    <h1 class="fade-up">Produk Kami</h1>
                    <p class="fade-up">Kami menghadirkan berbagai produk olahan susu berkualitas tinggi dari sapi perah
                        dan kambing perah
                        terbaik di Padukuhan Boyong. Susu Segar (Fresh Milk), Susu Pasteurisasi, dan Eskrim Susu adalah
                        beberapa produk
                        unggulan
                        kami yang dihasilkan dengan standar kebersihan dan kualitas tinggi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUK SECTION -->
    <section class="produk-section">
        <div class="container">
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="mb-4 col-md-4">
                        <div class="card produk-card fade-up" onclick="showDetail('{{ $produk->id }}')">
                            <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top"
                                alt="{{ $produk->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $produk->nama }}
                                </h5>
                                <p class="card-text">
                                    <i class="fa-solid fa-tag"></i> Rp
                                    {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                                <p class="card-text">
                                    <i class="fa-solid fa-list"></i> Kategori : {{ ucfirst($produk->kategori) }}
                                </p>
                                {{-- <p class="card-text">
                                    <i class="fa-solid fa-circle-check"></i> Status :
                                    <b>{{ ucfirst($produk->status_produk) }}</b>
                                </p> --}}
                                <p class="card-text">
                                    <i class="fa-solid fa-circle-check"></i> Status :
                                    <b class="kategori-text {{ strtolower($produk->status_produk) }}">
                                        {{ ucfirst(str_replace('_', ' ', $produk->status_produk)) }}
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $produks->links() }}
            </div>
        </div>
    </section>

    <!-- MODAL DETAIL PRODUK -->
    <div class="modal fade" id="produkDetailModal" tabindex="-1" aria-labelledby="produkDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produkDetailModalLabel">Detail Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detailContent"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Sebelum Footer -->
    <section class="cta-section">
        <div class="container text-center" id="kontak">
            <h2 class="cta-title fade-up">Tertarik dengan Produk Kami?</h2>
            <p class="cta-text fade-up">
                Jika Anda tertarik dengan produk kami atau memiliki pertanyaan lebih lanjut,
                jangan ragu untuk menghubungi kami. Kami siap membantu Anda!
            </p>
            <a href="https://wa.me/6285642595771" target="_blank" class="cta-button fade-up">
                <i class="fa-brands fa-whatsapp"></i> Hubungi Kami
            </a>
        </div>
    </section>

    <!-- FOOTER PROFESIONAL -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-info fade-up">
                <h3>Padukuhan Boyong</h3>
                <p>Website ini dikembangkan oleh <strong>KKN REGULER 090 UMY</strong> sebagai bagian dari kontribusi
                    untuk masyarakat.</p>
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
                <p>Email: <a href="mailto:win.are.one@gmail.com">win.are.one@gmail.com</a></p>
                <p>Telepon: <a href="tel:+6285642595771">+62 856-4259-5771</a></p>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bx bxl-twitter"></i></a>
                </div>
            </div>

            <!-- Kontak teknis untuk pengembang -->
            <div class="footer-support fade-up">
                <h4>Dukungan Teknis</h4>
                <p>Jika menemukan bug atau masalah teknis, hubungi:</p><br>
                {{-- <p>Email: <a href="mailto:support.kkn090@umy.ac.id">support.kkn090@umy.ac.id</a></p> --}}
                <p>Email: <a href="mailto:kkn90umyogya@gmail.com">kkn90umyogya@gmail.com</a></p>
                <p>WhatsApp: <a href="https://wa.me/6285184541785" target="_blank">+62 851-8454-1785</a></p>
            </div>
        </div>

        <div class="footer-bottom fade-up">
            <p>&copy; 2025 Padukuhan Boyong. Dibuat oleh <strong>KKN REGULER 090 UMY</strong>. All rights reserved.</p>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6285642595771" target="_blank" class="whatsapp-float">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    {{-- <script src="https://unpkg.com/scrollreveal"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.querySelectorAll(".fade-up");

            const observer = new IntersectionObserver(
                function(entries) {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add("visible");
                            }, index * 300); // Delay bertahap: h2 → p → img
                            observer.unobserve(entry.target); // Hanya animasi 1x
                        }
                    });
                }, {
                    threshold: 0.2
                }
            );

            elements.forEach(el => observer.observe(el));

            // Pastikan animasi slide tetap berjalan meskipun belum terlihat
            document.querySelectorAll(".cow__images").forEach(el => {
                el.classList.add("visible");
            });
        });

        // --------- SHOW MODAL ---------

        function showDetail(produkId) {
            fetch(`/produk/${produkId}`)
                .then(response => response.json())
                .then(data => {
                    let content = `
    <div class="text-center">
        <img src="/storage/${data.gambar}" class="rounded shadow product-image img-fluid" alt="${data.nama}">
    </div>
    <div class="mt-4 product-info">
        <h4 class="mb-3 text-center">${data.nama}</h4>
        <div class="product-details">
            <p><strong><i class="fas fa-tag icon-blue"></i> Harga :</strong> <span class="detail-value">Rp ${data.harga.toLocaleString('id-ID')}</span></p>
            <p><strong><i class="fas fa-boxes icon-green"></i> Stok :</strong> <span class="detail-value">${data.stok}</span></p>
            <p><strong><i class="fas fa-th-large icon-orange"></i> Kategori :</strong> <span class="detail-value">${data.kategori}</span></p>
            <p><strong><i class="fas fa-weight icon-purple"></i> Berat Bersih :</strong> <span class="detail-value">${data.berat_isi_bersih}</span></p>
            <p><strong><i class="fas fa-calendar-alt icon-red"></i> Tgl Produksi :</strong> <span class="detail-value">${data.tgl_produksi}</span></p>
            <p><strong><i class="fas fa-calendar-times icon-darkred"></i> Tgl Kadaluarsa :</strong> <span class="detail-value">${data.tgl_kadaluarsa}</span></p>
        </div>
        <div class="mt-4 product-description">
            <h5 class="text-center">Deskripsi Produk</h5>
            <p>${data.deskripsi}</p>
        </div>
    </div>
    `;
                    document.getElementById("detailContent").innerHTML = content;
                    $('#produkDetailModal').modal('show');
                })
                .catch(error => console.error('Error:', error));
        }

        // -------- NAVBAR CHECKED --------

        document.querySelectorAll('.navbar a[href^="#"]').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('check').checked = false; // Menutup navbar setelah memilih menu
            });
        });
    </script>
</body>

</html>
