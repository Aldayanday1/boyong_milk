<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/create_page.css') }}">

    <div class="py-10">
        <div class="max-w-lg px-6 mx-auto lg:px-6">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data"
                        class="p-4 space-y-4"> <!-- Kurangi padding form -->
                        @csrf

                        <h2 class="mb-5 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            {{ __('Tambah Produk') }}
                        </h2>

                        <!-- Nama Produk -->
                        <div>
                            <label for="nama"
                                class="block mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                Produk</label>
                            <input type="text" name="nama" id="nama" class="input-field"
                                placeholder="Masukkan nama produk" required>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi"
                                class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="h-20 input-field" placeholder="Tambahkan deskripsi produk..." required></textarea>
                        </div>

                        <!-- Stok & Harga -->
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="stok"
                                    class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Stok</label>
                                <input type="number" name="stok" id="stok" class="input-field"
                                    placeholder="Jumlah stok" required>
                            </div>
                            <div>
                                <label for="harga"
                                    class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Harga</label>
                                <input type="number" name="harga" id="harga" class="input-field"
                                    placeholder="Harga produk" required>
                            </div>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="kategori"
                                class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="input-field"
                                placeholder="Masukkan kategori produk" required>
                        </div>

                        <!-- Gambar Produk -->
                        <div class="mt-3">
                            <label for="gambar"
                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gambar
                                Produk</label>

                            <div id="drop-area"
                                class="relative flex flex-col items-center justify-center w-full h-48 p-4 transition border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:border-blue-500">
                                <svg class="w-12 h-12 text-gray-400 transition dark:text-gray-200" id="upload-icon"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16l3.586-3.586a2 2 0 012.828 0L14 18m0 0l3.586-3.586a2 2 0 012.828 0L21 16M14 18l3 3m-6 0h6">
                                    </path>
                                </svg>
                                <p id="upload-text"
                                    class="mt-2 text-sm text-center text-gray-500 transition dark:text-gray-300">
                                    Klik atau seret gambar ke sini
                                </p>
                                <input type="file" name="gambar" id="gambar" class="absolute opacity-0"
                                    accept="image/*" onchange="previewImage(event)" required>
                            </div>

                            <!-- Tambahan Notes: Jenis file yang diperbolehkan -->
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                * Hanya format gambar <strong>JPG, JPEG, dan PNG</strong> yang diperbolehkan.
                            </p>

                            <!-- Preview Gambar -->
                            <div id="preview-container" class="hidden mt-3">
                                <p class="text-sm text-gray-500">Preview Gambar:</p>
                                <img id="preview-image" class="object-cover w-40 h-40 mt-2 rounded-lg shadow-md"
                                    src="" alt="Preview">
                            </div>

                            @error('gambar')
                                <div class="mt-1 text-sm error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Produksi & Kadaluarsa -->
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="tgl_produksi"
                                    class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Produksi</label>
                                <input type="date" name="tgl_produksi" id="tgl_produksi" class="input-field"
                                    required>
                            </div>
                            <div>
                                <label for="tgl_kadaluarsa"
                                    class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Kadaluarsa</label>
                                <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa" class="input-field"
                                    required>
                            </div>
                        </div>

                        <!-- Berat / Isi Bersih -->
                        <div>
                            <label for="berat_isi_bersih"
                                class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Berat / Isi
                                Bersih</label>
                            <input type="text" name="berat_isi_bersih" id="berat_isi_bersih" class="input-field"
                                placeholder="Contoh: 500g, 1L" required>
                        </div>

                        <!-- Status Produk -->
                        <div>
                            <label for="status_produk"
                                class="block mt-3 mb-3 text-sm font-medium text-gray-700 dark:text-gray-300">Status
                                Produk</label>
                            <select name="status_produk" id="status_produk" class="input-field" required>
                                <option value="tersedia">Tersedia</option>
                                <option value="habis">Habis</option>
                                <option value="pre_order">Pre Order</option>
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-center gap-4 mt-4">
                            <button type="button" onclick="window.history.back()"
                                class="px-4 py-2 text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400">
                                Kembali
                            </button>
                            <button type="submit" class="submit-btn">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateFile(file) {
            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
            if (!file || !allowedTypes.includes(file.type)) {
                alert("Format file tidak didukung! Harap unggah file berformat JPG, JPEG, atau PNG.");
                return false; // File tidak valid
            }
            return true; // File valid
        }

        function previewImage(file) {
            const previewImage = document.getElementById("preview-image");
            const previewContainer = document.getElementById("preview-container");

            // Jika file valid, tampilkan preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }

        // Menangani perubahan file dari input manual
        document.getElementById("gambar").addEventListener("change", function(event) {
            const file = event.target.files[0];

            // Validasi dulu, baru preview
            if (validateFile(file)) {
                previewImage(file);
            } else {
                // Sembunyikan preview jika file tidak valid
                document.getElementById("preview-container").classList.add("hidden");
            }
        });

        // Menangani event drag & drop
        const dropArea = document.getElementById("drop-area");

        dropArea.addEventListener("dragover", function(event) {
            event.preventDefault(); // Mencegah default browser membuka file
            dropArea.classList.add("drag-over"); // Tambahkan efek visual
        });

        dropArea.addEventListener("dragleave", function() {
            dropArea.classList.remove("drag-over"); // Hapus efek jika keluar dari area
        });

        dropArea.addEventListener("drop", function(event) {
            event.preventDefault(); // Mencegah default behavior
            dropArea.classList.remove("drag-over"); // Hapus efek saat gambar dijatuhkan

            const file = event.dataTransfer.files[0];

            // Set file input agar dikirim ke backend
            document.getElementById("gambar").files = event.dataTransfer.files;

            // Validasi dulu, baru preview
            if (validateFile(file)) {
                previewImage(file);
            } else {
                // Sembunyikan preview jika file tidak valid
                document.getElementById("preview-container").classList.add("hidden");
            }
        });

        // Menangani klik untuk memilih file
        document.getElementById("drop-area").addEventListener("click", function(event) {
            // Pastikan event hanya dieksekusi sekali tanpa menggandakan pemanggilan file picker
            if (event.target.id === "drop-area") {
                document.getElementById("gambar").click();
            }
        });
    </script>

</x-app-layout>
