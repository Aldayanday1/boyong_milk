<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="responsive-container fade-up">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                </div>

                {{-- @if (session('success'))
                    <script>
                        Swal.fire({
                            title: "Berhasil!",
                            text: "{{ session('success') }}",
                            icon: "success",
                            timer: 3000,
                            showConfirmButton: true
                        });
                    </script>
                @endif --}}

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
                                    showConfirmButton: true
                                }).then(() => {
                                    sessionStorage.setItem("alertShown",
                                        "{{ session('success') }}"); // Simpan pesan terbaru
                                });
                            }
                        });
                    </script>
                @endif

                <!-- Tampilkan Data Produk dalam Tabel -->
                <div class="p-6">
                    <!-- Container Flex -->
                    <div class="flex items-center justify-between mb-4 ml-3">
                        <!-- Judul Daftar Produk dengan Ikon -->
                        <h3 class="flex items-center gap-4 text-lg font-semibold">
                            {{-- <i class="fas fa-box"
                                style="color: black; font-size: 1.25rem; position: relative; top: -1px;"></i> --}}
                            Daftar Produk
                        </h3>

                        <!-- Tombol Tambah Produk dengan Ikon -->
                        <a href="{{ route('produk.create') }}" class="tombol-tambah">
                            <i class="fas fa-plus"></i>
                            <span>Tambah Produk</span>
                        </a>
                    </div>

                    <!-- Deskripsi Singkat dengan Ikon -->
                    <div
                        class="flex items-center gap-3 p-4 mb-4 text-gray-700 rounded-lg shadow-sm bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                        <i class="fas fa-info-circle"
                            style="color: #3b82f6; font-size: 1rem; position: relative; top: -0.55rem;"></i>
                        <p class="pl-2 text-sm">
                            Di halaman ini, Anda dapat melihat, menambah, mengedit, dan menghapus produk dengan mudah.
                            Gunakan tombol <b style="color: #3b82f6;">"Tambah Produk"</b> untuk menambahkan produk baru.
                        </p>
                    </div>

                    <!-- Wrapper untuk Responsivitas -->
                    <div class="w-full overflow-x-auto">
                        <table class="w-full min-w-[800px] border border-gray-300">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-center border border-gray-300">Gambar</th>
                                    <th class="px-4 py-2 text-center border border-gray-300">Nama Produk</th>
                                    <th class="px-4 py-2 text-center border border-gray-300">Deskripsi</th>
                                    <th class="px-4 py-2 text-center border border-gray-300">Harga</th>
                                    <th class="px-4 py-2 text-center border border-gray-300">Status</th>
                                    <th class="px-4 py-2 text-center border border-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr class="dark:bg-gray-700">
                                        <td class="px-4 py-2 text-center border border-gray-300">
                                            @if ($produk->gambar)
                                                <img src="{{ asset('storage/' . $produk->gambar) }}"
                                                    class="image-preview"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 text-center border border-gray-300">{{ $produk->nama }}
                                        </td>
                                        <td class="px-4 py-2 text-center border border-gray-300">
                                            {{ $produk->deskripsi }}</td>
                                        <td class="px-4 py-2 text-center border border-gray-300">Rp
                                            {{ number_format($produk->harga, 2) }}</td>
                                        <td class="px-4 py-2 text-center border border-gray-300">
                                            {{ ucwords(str_replace('_', ' ', $produk->status_produk)) }}
                                        </td>
                                        <!-- Aksi -->
                                        <td class="px-4 py-2 text-center border border-gray-300">
                                            <!-- Action buttons -->
                                            <div class="flex justify-center gap-2">
                                                <!-- Tombol Edit dengan Ikon -->
                                                <a href="{{ route('produk.edit', $produk->id) }}"
                                                    class="action-btn edit-btn">
                                                    <div
                                                        class="flex items-center gap-1 px-2 py-1 text-sm bg-blue-200 rounded-md">
                                                        <i class="text-blue-500 fas fa-edit"></i>
                                                        <span class="text-xs text-blue-600">Edit</span>
                                                    </div>
                                                </a>
                                                <!-- Form untuk menghapus produk -->
                                                <form id="delete-form-{{ $produk->id }}"
                                                    action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <!-- Tombol Hapus -->
                                                    <button type="button" class="action-btn delete-btn"
                                                        onclick="confirmDelete({{ $produk->id }})">
                                                        <div
                                                            class="flex items-center gap-1 px-2 py-1 text-sm bg-red-200 rounded-md">
                                                            <i class="text-red-500 fas fa-trash"></i>
                                                            <span class="text-xs">Hapus</span>
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($produks->isEmpty())
                                    <tr>
                                        <td colspan="6"
                                            class="px-4 py-4 text-center text-gray-500 border border-gray-300">
                                            Belum ada produk yang tersedia.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $produks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // function confirmDelete(url) {
    //     Swal.fire({
    //         title: 'Apakah Anda yakin?',
    //         text: 'Produk ini akan dihapus secara permanen!',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Hapus',
    //         cancelButtonText: 'Batal',
    //         reverseButtons: true
    //     })..then((result) => {
    //         if (result.isConfirmed) {
    //             // Submit form delete sesuai ID produk
    //             document.getElementById('delete-form-' + id).submit();
    //         }
    //     });
    // }

    // function confirmDelete(produkId) {
    //     Swal.fire({
    //         title: 'Apakah Anda yakin?',
    //         text: 'Produk ini akan dihapus secara permanen!',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Hapus',
    //         cancelButtonText: 'Batal',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Jika pengguna menekan "Hapus", submit form dengan ID yang sesuai
    //             document.getElementById('delete-form-' + produkId).submit();
    //         } else {
    //             Swal.fire('Dibatalkan', 'Produk tidak jadi dihapus', 'info');
    //         }
    //     });
    // }

    function confirmDelete(id) {
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menghapus produk ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                sessionStorage.removeItem("alertShown"); // Hapus sessionStorage sebelum submit
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

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
    });

    // document.addEventListener("DOMContentLoaded", function() {
    //     let successMessage = sessionStorage.getItem('success-message');
    //     if (successMessage) {
    //         Swal.fire({
    //             title: "Berhasil!",
    //             text: successMessage,
    //             icon: "success",
    //             timer: 3000,
    //             showConfirmButton: true
    //         }).then(() => {
    //             sessionStorage.removeItem('success-message');
    //         });
    //     }
    // });
</script>
