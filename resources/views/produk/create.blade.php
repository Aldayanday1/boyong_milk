<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/create_page.css') }}">

    <div class="create-page-wrapper">
        <div class="create-page-container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-header-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="page-header-text">
                        <h1 class="page-title">Tambah Produk Baru</h1>
                        <p class="page-subtitle">Lengkapi formulir di bawah untuk menambahkan produk ke katalog</p>
                    </div>
                </div>
                <button type="button" onclick="window.history.back()" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </button>
            </div>

            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" class="modern-form">
                @csrf

                <!-- Form Grid: 2 Columns -->
                <div class="form-grid">
                    <!-- Left Column -->
                    <div class="form-column">
                        <!-- Section 1: Informasi Dasar -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <h3 class="section-title">Informasi Dasar</h3>
                            </div>
                            <div class="section-content">
                                <!-- Nama Produk -->
                                <div class="form-group">
                                    <label for="nama" class="form-label">
                                        <i class="fas fa-box"></i>
                                        Nama Produk
                                    </label>
                                    <input type="text" name="nama" id="nama" class="form-input" 
                                           placeholder="Masukkan nama produk" required>
                                </div>

                                <!-- Kategori -->
                                <div class="form-group">
                                    <label for="kategori" class="form-label">
                                        <i class="fas fa-tag"></i>
                                        Kategori
                                    </label>
                                    <input type="text" name="kategori" id="kategori" class="form-input" 
                                           placeholder="Contoh: Susu Segar, Es Krim" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="deskripsi" class="form-label">
                                        <i class="fas fa-align-left"></i>
                                        Deskripsi Produk
                                    </label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-textarea" rows="4"
                                              placeholder="Deskripsikan produk Anda dengan detail..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Harga & Stok -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <h3 class="section-title">Harga & Stok</h3>
                            </div>
                            <div class="section-content">
                                <div class="form-row">
                                    <!-- Harga -->
                                    <div class="form-group">
                                        <label for="harga" class="form-label">
                                            <i class="fas fa-money-bill-wave"></i>
                                            Harga (Rp)
                                        </label>
                                        <input type="number" name="harga" id="harga" class="form-input" 
                                               placeholder="0" min="0" required>
                                    </div>

                                    <!-- Stok -->
                                    <div class="form-group">
                                        <label for="stok" class="form-label">
                                            <i class="fas fa-boxes"></i>
                                            Stok Tersedia
                                        </label>
                                        <input type="number" name="stok" id="stok" class="form-input" 
                                               placeholder="0" min="0" required>
                                    </div>
                                </div>

                                <!-- Status Produk -->
                                <div class="form-group">
                                    <label for="status_produk" class="form-label">
                                        <i class="fas fa-circle-check"></i>
                                        Status Produk
                                    </label>
                                    <select name="status_produk" id="status_produk" class="form-select" required>
                                        <option value="">Pilih Status</option>
                                        <option value="tersedia">Tersedia</option>
                                        <option value="habis">Habis</option>
                                        <option value="pre_order">Pre Order</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="form-column">

                        <!-- Section 3: Media Upload -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                                <h3 class="section-title">Gambar Produk</h3>
                            </div>
                            <div class="section-content">
                                <div class="upload-area" id="drop-area">
                                    <div class="upload-content">
                                        <div class="upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <h4 class="upload-title">Upload Gambar</h4>
                                        <p class="upload-text" id="upload-text">
                                            Drag & drop atau klik untuk pilih file
                                        </p>
                                        <div class="upload-formats">
                                            <span class="format-badge">JPG</span>
                                            <span class="format-badge">JPEG</span>
                                            <span class="format-badge">PNG</span>
                                        </div>
                                        <input type="file" name="gambar" id="gambar" class="file-input-hidden" 
                                               accept="image/*" required>
                                    </div>
                                    
                                    <!-- Preview Container -->
                                    <div id="preview-container" class="preview-container hidden">
                                        <img id="preview-image" class="preview-image" src="" alt="Preview">
                                        <button type="button" class="btn-remove-image" onclick="removeImage()">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('gambar')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 4: Detail Produk -->
                        <div class="form-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <h3 class="section-title">Detail Produk</h3>
                            </div>
                            <div class="section-content">
                                <!-- Berat / Isi Bersih -->
                                <div class="form-group">
                                    <label for="berat_isi_bersih" class="form-label">
                                        <i class="fas fa-weight-hanging"></i>
                                        Berat / Isi Bersih
                                    </label>
                                    <input type="text" name="berat_isi_bersih" id="berat_isi_bersih" 
                                           class="form-input" placeholder="Contoh: 500g, 1L, 250ml" required>
                                </div>

                                <div class="form-row">
                                    <!-- Tanggal Produksi -->
                                    <div class="form-group">
                                        <label for="tgl_produksi" class="form-label">
                                            <i class="fas fa-calendar-plus"></i>
                                            Tanggal Produksi
                                        </label>
                                        <input type="date" name="tgl_produksi" id="tgl_produksi" 
                                               class="form-input" required>
                                    </div>

                                    <!-- Tanggal Kadaluarsa -->
                                    <div class="form-group">
                                        <label for="tgl_kadaluarsa" class="form-label">
                                            <i class="fas fa-calendar-times"></i>
                                            Tanggal Kadaluarsa
                                        </label>
                                        <input type="date" name="tgl_kadaluarsa" id="tgl_kadaluarsa" 
                                               class="form-input" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" onclick="window.history.back()" class="btn-secondary">
                        <i class="fas fa-times"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i>
                        <span>Simpan Produk</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Validate file type
        function validateFile(file) {
            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
            if (!file || !allowedTypes.includes(file.type)) {
                showNotification("Format file tidak didukung! Harap unggah file JPG, JPEG, atau PNG.", "error");
                return false;
            }
            return true;
        }

        // Preview uploaded image
        function previewImage(file) {
            const previewImage = document.getElementById("preview-image");
            const previewContainer = document.getElementById("preview-container");
            const uploadContent = document.querySelector(".upload-content");

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove("hidden");
                uploadContent.style.display = "none";
            };
            reader.readAsDataURL(file);
        }

        // Remove uploaded image
        function removeImage() {
            const previewContainer = document.getElementById("preview-container");
            const uploadContent = document.querySelector(".upload-content");
            const fileInput = document.getElementById("gambar");
            
            previewContainer.classList.add("hidden");
            uploadContent.style.display = "flex";
            fileInput.value = "";
        }

        // Show notification
        function showNotification(message, type = "info") {
            // Simple alert for now, can be upgraded to toast notification
            alert(message);
        }

        // Initialize drag & drop
        document.addEventListener("DOMContentLoaded", function() {
            const dropArea = document.getElementById("drop-area");
            const fileInput = document.getElementById("gambar");

            // Click to upload
            dropArea.addEventListener("click", function(e) {
                if (!e.target.closest(".btn-remove-image")) {
                    fileInput.click();
                }
            });

            // File input change
            fileInput.addEventListener("change", function(e) {
                const file = e.target.files[0];
                if (file && validateFile(file)) {
                    previewImage(file);
                }
            });

            // Drag over
            dropArea.addEventListener("dragover", function(e) {
                e.preventDefault();
                dropArea.classList.add("drag-active");
            });

            // Drag leave
            dropArea.addEventListener("dragleave", function(e) {
                e.preventDefault();
                dropArea.classList.remove("drag-active");
            });

            // Drop
            dropArea.addEventListener("drop", function(e) {
                e.preventDefault();
                dropArea.classList.remove("drag-active");
                
                const file = e.dataTransfer.files[0];
                if (file) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;
                    
                    if (validateFile(file)) {
                        previewImage(file);
                    }
                }
            });

            // Form validation animation
            const form = document.querySelector(".modern-form");
            form.addEventListener("submit", function(e) {
                const submitBtn = form.querySelector(".btn-primary");
                submitBtn.innerHTML = '<i class=\"fas fa-spinner fa-spin\"></i><span>Menyimpan...</span>';
                submitBtn.disabled = true;
            });
        });
    </script>

</x-app-layout>
