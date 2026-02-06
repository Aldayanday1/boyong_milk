<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/create_page.css') }}">

    <div class="create-page-wrapper">
        <div class="create-page-container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-header-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="page-header-text">
                        <h1 class="page-title">Edit Produk</h1>
                        <p class="page-subtitle">Perbarui detail produk di bawah ini</p>
                    </div>
                </div>
                <button type="button" onclick="window.history.back()" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </button>
            </div>

            <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data"
                class="modern-form">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-column">
                        <!-- Informasi Dasar -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon"><i class="fas fa-info-circle"></i></div>
                                <h3 class="section-title">Informasi Dasar</h3>
                            </div>
                            <div class="section-content">
                                <div class="form-group">
                                    <label for="nama" class="form-label"><i class="fas fa-box"></i> Nama
                                        Produk</label>
                                    <input type="text" id="nama" name="nama" class="form-input"
                                        value="{{ old('nama', $produk->nama) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="kategori" class="form-label"><i class="fas fa-tag"></i> Kategori</label>
                                    <input type="text" id="kategori" name="kategori" class="form-input"
                                        value="{{ old('kategori', $produk->kategori) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi" class="form-label"><i class="fas fa-align-left"></i>
                                        Deskripsi Produk</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-textarea" rows="4" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Harga & Stok -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon"><i class="fas fa-dollar-sign"></i></div>
                                <h3 class="section-title">Harga & Stok</h3>
                            </div>
                            <div class="section-content">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="harga" class="form-label"><i class="fas fa-money-bill-wave"></i>
                                            Harga (Rp)</label>
                                        <input type="number" id="harga" name="harga" class="form-input"
                                            value="{{ old('harga', $produk->harga) }}" min="0" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="stok" class="form-label"><i class="fas fa-boxes"></i> Stok
                                            Tersedia</label>
                                        <input type="number" id="stok" name="stok" class="form-input"
                                            value="{{ old('stok', $produk->stok) }}" min="0" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status_produk" class="form-label"><i class="fas fa-circle-check"></i>
                                        Status Produk</label>
                                    <select id="status_produk" name="status_produk" class="form-select" required>
                                        <option value="tersedia"
                                            {{ $produk->status_produk == 'tersedia' ? 'selected' : '' }}>Tersedia
                                        </option>
                                        <option value="habis"
                                            {{ $produk->status_produk == 'habis' ? 'selected' : '' }}>Habis</option>
                                        <option value="pre_order"
                                            {{ $produk->status_produk == 'pre_order' ? 'selected' : '' }}>Pre Order
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-column">
                        <!-- Media Upload -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon"><i class="fas fa-image"></i></div>
                                <h3 class="section-title">Gambar Produk</h3>
                            </div>
                            <div class="section-content">
                                <div class="upload-area" id="drop-area">
                                    <div class="upload-content">
                                        <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                        <h4 class="upload-title">Upload Gambar</h4>
                                        <p class="upload-text">Drag & drop atau klik untuk pilih file</p>
                                        <div class="upload-formats">
                                            <span class="format-badge">JPG</span>
                                            <span class="format-badge">JPEG</span>
                                            <span class="format-badge">PNG</span>
                                        </div>
                                        <input type="file" name="gambar" id="gambar"
                                            class="file-input-hidden" accept="image/*">
                                    </div>

                                    <div id="preview-container" class="preview-container">
                                        <img id="preview-image" class="preview-image"
                                            src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : '' }}"
                                            alt="Preview">
                                        <button type="button" class="btn-remove-image" onclick="removeImage()"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                @error('gambar')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Detail Produk -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon"><i class="fas fa-clipboard-list"></i></div>
                                <h3 class="section-title">Detail Produk</h3>
                            </div>
                            <div class="section-content">
                                <div class="form-group">
                                    <label for="berat_isi_bersih" class="form-label"><i
                                            class="fas fa-weight-hanging"></i> Berat / Isi Bersih</label>
                                    <input type="text" id="berat_isi_bersih" name="berat_isi_bersih"
                                        class="form-input"
                                        value="{{ old('berat_isi_bersih', $produk->berat_isi_bersih) }}" required>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="tgl_produksi" class="form-label"><i
                                                class="fas fa-calendar-plus"></i> Tanggal Produksi</label>
                                        <input type="date" id="tgl_produksi" name="tgl_produksi"
                                            class="form-input"
                                            value="{{ old('tgl_produksi', $produk->tgl_produksi) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_kadaluarsa" class="form-label"><i
                                                class="fas fa-calendar-times"></i> Tanggal Kadaluarsa</label>
                                        <input type="date" id="tgl_kadaluarsa" name="tgl_kadaluarsa"
                                            class="form-input"
                                            value="{{ old('tgl_kadaluarsa', $produk->tgl_kadaluarsa) }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" onclick="window.history.back()" class="btn-secondary"><i
                            class="fas fa-times"></i><span>Batal</span></button>
                    <button type="submit" class="btn-primary"><i class="fas fa-save"></i><span>Update
                            Produk</span></button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateFile(file) {
            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
            if (!file || !allowedTypes.includes(file.type)) {
                alert("Format file tidak didukung! Harap unggah file JPG, JPEG, atau PNG.");
                return false;
            }
            return true;
        }

        function previewImage(file) {
            const previewImage = document.getElementById('preview-image');
            const previewContainer = document.getElementById('preview-container');
            const uploadContent = document.querySelector('.upload-content');

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
                if (uploadContent) uploadContent.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            const previewImage = document.getElementById('preview-image');
            const previewContainer = document.getElementById('preview-container');
            const uploadContent = document.querySelector('.upload-content');
            const fileInput = document.getElementById('gambar');

            if (previewImage) previewImage.src = '';
            if (previewContainer) previewContainer.classList.add('hidden');
            if (uploadContent) uploadContent.style.display = 'flex';
            if (fileInput) fileInput.value = '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('gambar');
            const previewImageElem = document.getElementById('preview-image');
            const uploadContent = document.querySelector('.upload-content');

            if (previewImageElem && previewImageElem.src && previewImageElem.src.trim() !== '') {
                if (uploadContent) uploadContent.style.display = 'none';
                document.getElementById('preview-container').classList.remove('hidden');
            } else {
                document.getElementById('preview-container').classList.add('hidden');
            }

            dropArea.addEventListener('click', function(e) {
                if (!e.target.closest('.btn-remove-image')) fileInput.click();
            });

            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file && validateFile(file)) previewImage(file);
            });

            dropArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropArea.classList.add('drag-active');
            });
            dropArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                dropArea.classList.remove('drag-active');
            });
            dropArea.addEventListener('drop', function(e) {
                e.preventDefault();
                dropArea.classList.remove('drag-active');
                const file = e.dataTransfer.files[0];
                if (file) {
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    fileInput.files = dt.files;
                    if (validateFile(file)) previewImage(file);
                }
            });
        });
    </script>
</x-app-layout>
