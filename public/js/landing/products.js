/* ========================================
   PRODUCTS JavaScript - Product Modal & Details
   ======================================== */

// Function to show product detail in modal
function showDetail(productId) {
    // Show loading state
    const detailContent = document.getElementById('detailContent');
    if (detailContent) {
        detailContent.innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3 text-muted">Memuat detail produk...</p>
            </div>
        `;
    }
    
    // Fetch product details
    fetch(`/produk/${productId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Format price
            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(data.harga);
            
            // Format dates
            const formatDate = (dateString) => {
                if (!dateString) return 'Tidak tersedia';
                const date = new Date(dateString);
                return date.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });
            };
            
            // Format status
            const statusClass = data.status_produk.toLowerCase().replace('_', '-');
            const statusText = data.status_produk.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
            
            // Create modal content with horizontal layout design
            const modalContent = `
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="modal-image-wrapper">
                            <img src="/storage/${data.gambar}" 
                                 alt="${data.nama}" 
                                 class="img-fluid">
                            <div class="modal-image-badge">
                                <i class="fa-solid fa-star"></i> Premium
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-info-section">
                            <div class="product-details">
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Harga</strong>
                                        <span class="detail-value">${formattedPrice}</span>
                                    </div>
                                </div>
                                
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-boxes"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Stok</strong>
                                        <span class="detail-value">${data.stok} unit</span>
                                    </div>
                                </div>
                                
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-list"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Kategori</strong>
                                        <span class="detail-value">${data.kategori.charAt(0).toUpperCase() + data.kategori.slice(1)}</span>
                                    </div>
                                </div>
                                
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-weight"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Berat</strong>
                                        <span class="detail-value">${data.berat_isi_bersih} gram</span>
                                    </div>
                                </div>
                                
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-calendar-plus"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Tanggal Produksi</strong>
                                        <span class="detail-value">${formatDate(data.tgl_produksi)}</span>
                                    </div>
                                </div>
                                
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-calendar-times"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Tanggal Kadaluarsa</strong>
                                        <span class="detail-value">${formatDate(data.tgl_kadaluarsa)}</span>
                                    </div>
                                </div>
                                
                                <div class="product-detail-item">
                                    <div class="product-detail-icon">
                                        <i class="fas fa-circle-check"></i>
                                    </div>
                                    <div class="product-detail-content">
                                        <strong>Status</strong>
                                        <span class="kategori-text ${statusClass}">${statusText}</span>
                                    </div>
                                </div>
                            </div>
                            
                            ${data.deskripsi ? `
                            <div class="product-description">
                                <h5>Deskripsi Produk</h5>
                                <p>${data.deskripsi}</p>
                            </div>
                            ` : ''}
                            
                            <div class="modal-footer mt-auto">
                                <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20produk%20${encodeURIComponent(data.nama)}" 
                                   target="_blank" 
                                   class="modal-cta-button">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    Pesan via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            detailContent.innerHTML = modalContent;
            
            // Show modal using Bootstrap
            const modal = new bootstrap.Modal(document.getElementById('produkDetailModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
            detailContent.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Error!</strong> Gagal memuat detail produk. Silakan coba lagi.
                </div>
            `;
        });
}

// Event delegation for product cards
document.addEventListener('DOMContentLoaded', function() {
    const productContainer = document.querySelector('.produk-section .container');
    
    if (productContainer) {
        productContainer.addEventListener('click', function(e) {
            const card = e.target.closest('.produk-card');
            if (card) {
                const productId = card.getAttribute('data-product-id');
                if (productId) {
                    showDetail(productId);
                }
            }
        });
    }
    
    // Add smooth hover effects to product cards
    const productCards = document.querySelectorAll('.produk-card');
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
