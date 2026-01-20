<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/edit_page.css') }}">

    <div class="py-10">
        <div class="max-w-lg px-6 mx-auto lg:px-6">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    {{-- <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" --}}
                    <form method="POST" action="{{ route('produk.update', $produk->id) }}"
                        enctype="multipart/form-data" class="p-4 space-y-4">
                        @csrf
                        @method('PUT') <!-- Gunakan PUT agar sesuai dengan route -->

                        <h2 class="mb-5 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            {{ __('Edit Produk') }}
                        </h2>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <!-- Nama Produk -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Produk</label>
                                <input type="text" name="nama" value="{{ old('nama', $produk->nama) }}"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                    required>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                <textarea name="deskripsi" rows="3"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                            </div>

                            <!-- Stok & Harga -->
                            <div class="grid grid-cols-2 gap-2">
                                {{-- <div>
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
                                </div> --}}

                                <!-- Stok -->
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stok</label>
                                    <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}"
                                        class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                        required>
                                </div>

                                <!-- Harga -->
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga</label>
                                    <input type="text" name="harga" value="{{ intval($produk->harga) }}"
                                        class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                        required>
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                                <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                    required>
                            </div>

                            <!-- Gambar Produk (Edit Page) -->
                            <div class="mt-3">
                                <label for="gambar"
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Gambar Produk
                                </label>

                                <!-- Area Drag & Drop untuk Upload Gambar -->
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

                                    <!-- Input File (Hidden) -->
                                    <input type="file" name="gambar" id="gambar" class="hidden"
                                        accept="image/png, image/jpeg, image/jpg" onchange="previewImage(event)">
                                </div>

                                <!-- Tambahan Notes: Jenis file yang diperbolehkan -->
                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                    * Hanya format gambar <strong>JPG, JPEG, dan PNG</strong> yang diperbolehkan.
                                </p>

                                <!-- Preview Gambar -->
                                <div id="preview-container" class="mt-3">
                                    <p class="text-sm text-gray-500">Preview Gambar:</p>
                                    <img id="preview-image" class="object-cover w-40 h-40 mt-2 rounded-lg shadow-md"
                                        src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://via.placeholder.com/150?text=No+Image' }}"
                                        alt="Preview">

                                </div>

                                @error('gambar')
                                    <div class="mt-1 text-sm error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Produksi & Kadaluarsa -->
                            <div class="grid grid-cols-2 gap-2">
                                {{-- <div>
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
                                </div> --}}

                                <!-- Tanggal Produksi -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                        Produksi</label>
                                    <input type="date" name="tgl_produksi"
                                        value="{{ old('tgl_produksi', $produk->tgl_produksi) }}"
                                        class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                        required>
                                </div>

                                <!-- Tanggal Kadaluarsa -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                        Kadaluarsa</label>
                                    <input type="date" name="tgl_kadaluarsa"
                                        value="{{ old('tgl_kadaluarsa', $produk->tgl_kadaluarsa) }}"
                                        class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                        required>
                                </div>
                            </div>

                            {{-- <!-- Tanggal Produksi -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Produksi</label>
                                <input type="date" name="tgl_produksi"
                                    value="{{ old('tgl_produksi', $produk->tgl_produksi) }}"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                    required>
                            </div>

                            <!-- Tanggal Kadaluarsa -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Kadaluarsa</label>
                                <input type="date" name="tgl_kadaluarsa"
                                    value="{{ old('tgl_kadaluarsa', $produk->tgl_kadaluarsa) }}"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                    required>
                            </div> --}}

                            <!-- Berat Isi Bersih -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Berat / Isi
                                    Bersih</label>
                                <input type="text" name="berat_isi_bersih"
                                    value="{{ old('berat_isi_bersih', $produk->berat_isi_bersih) }}"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                    required>
                            </div>

                            <!-- Status Produk -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status
                                    Produk</label>
                                <select name="status_produk"
                                    class="w-full mt-1 border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                    required>
                                    <option value="tersedia"
                                        {{ $produk->status_produk == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="habis" {{ $produk->status_produk == 'habis' ? 'selected' : '' }}>
                                        Habis</option>
                                    <option value="pre_order"
                                        {{ $produk->status_produk == 'pre_order' ? 'selected' : '' }}>Pre Order
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- <!-- Tombol Submit -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-6 py-2 text-black transition bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                                Update Produk
                            </button>
                        </div> --}}

                        <!-- Tombol -->
                        <div class="flex justify-center gap-4 mt-4">
                            <button type="button" onclick="window.history.back()"
                                class="px-4 py-2 text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400">
                                Kembali
                            </button>
                            <button type="submit" class="submit-btn">
                                Update Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isDropped = false; // Flag untuk deteksi apakah file diunggah via drag-drop

        function validateFile(file) {
            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

            if (!file || !allowedTypes.includes(file.type)) {
                alert("Format file tidak didukung! Harap unggah file berformat JPG, JPEG, atau PNG.");
                resetPreview(); // Hapus gambar jika tidak valid
                return false;
            }
            return true;
        }

        function previewImage(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("preview-image").src = e.target.result;
                document.getElementById("preview-container").classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }

        function resetPreview() {
            document.getElementById("preview-image").src = "";
            document.getElementById("preview-container").classList.add("hidden");
        }

        // Event untuk input file (klik manual)
        document.getElementById("gambar").addEventListener("change", function(event) {
            const file = event.target.files[0];

            if (!validateFile(file)) return; // Hentikan jika file tidak valid
            previewImage(file);
        });

        // Event untuk drag & drop
        const dropArea = document.getElementById("drop-area");

        dropArea.addEventListener("dragover", function(event) {
            event.preventDefault();
            dropArea.classList.add("drag-over");
        });

        dropArea.addEventListener("dragleave", function() {
            dropArea.classList.remove("drag-over");
        });

        dropArea.addEventListener("drop", function(event) {
            event.preventDefault();
            dropArea.classList.remove("drag-over");

            const file = event.dataTransfer.files[0];

            if (!validateFile(file)) return; // Hentikan jika file tidak valid

            document.getElementById("gambar").files = event.dataTransfer.files;
            previewImage(file);
        });

        dropArea.addEventListener("click", function() {
            document.getElementById("gambar").click();
        });
    </script>
</x-app-layout>
