/* ========================================
   MAIN JavaScript - General Functionality
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    
    // === Page Loader ===
    const pageLoader = document.querySelector('.page-loader');
    
    window.addEventListener('load', () => {
        if (pageLoader) {
            setTimeout(() => {
                pageLoader.classList.add('hidden');
            }, 500);
        }
    });
    
    // === Intersection Observer for Fade Up Animation ===
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const fadeUpObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                fadeUpObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all elements with fade-up class
    document.querySelectorAll('.fade-up').forEach(element => {
        fadeUpObserver.observe(element);
    });
    
    // === Lazy Loading Images ===
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    });
    
    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
    
    // === Scroll to Top Button ===
    // const scrollToTop = document.createElement('button');
    // scrollToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
    // scrollToTop.className = 'scroll-to-top';
    // scrollToTop.setAttribute('aria-label', 'Scroll to top');
    
    // // Add styles
    // const style = document.createElement('style');
    // style.textContent = `
    //     .scroll-to-top {
    //         position: fixed;
    //         bottom: 100px;
    //         right: 30px;
    //         width: 50px;
    //         height: 50px;
    //         background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    //         color: white;
    //         border: none;
    //         border-radius: 50%;
    //         font-size: 1.25rem;
    //         cursor: pointer;
    //         box-shadow: var(--shadow-xl);
    //         opacity: 0;
    //         visibility: hidden;
    //         transition: all 0.3s ease;
    //         z-index: 999;
    //     }
        
    //     .scroll-to-top.visible {
    //         opacity: 1;
    //         visibility: visible;
    //     }
        
    //     .scroll-to-top:hover {
    //         transform: translateY(-5px);
    //         box-shadow: 0 15px 30px rgba(37, 99, 235, 0.4);
    //     }
        
    //     @media (max-width: 768px) {
    //         .scroll-to-top {
    //             width: 45px;
    //             height: 45px;
    //             bottom: 90px;
    //             right: 20px;
    //             font-size: 1.1rem;
    //         }
    //     }
    // `;
    
    // document.head.appendChild(style);
    // document.body.appendChild(scrollToTop);
    
    // // Show/hide scroll to top button
    // window.addEventListener('scroll', () => {
    //     if (window.scrollY > 500) {
    //         scrollToTop.classList.add('visible');
    //     } else {
    //         scrollToTop.classList.remove('visible');
    //     }
    // });
    
    // // Scroll to top functionality
    // scrollToTop.addEventListener('click', () => {
    //     window.scrollTo({
    //         top: 0,
    //         behavior: 'smooth'
    //     });
    // });
    
    // === Video behavior: do not autoplay/pause programmatically ===
    // Keep native controls and allow users to play/pause manually.
    // Previously we used an IntersectionObserver to autoplay/pause videos;
    // that produced non-interactive overlays and prevented manual control.
    // No JS-driven play/pause is applied now.
    
    // === Prevent Right Click on Images (Optional) ===
    // Uncomment if you want to protect images
    /*
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('contextmenu', (e) => {
            e.preventDefault();
            return false;
        });
    });
    */
    
    // === External Links - Open in New Tab ===
    document.querySelectorAll('a[href^="http"]').forEach(link => {
        if (!link.href.includes(window.location.hostname)) {
            link.setAttribute('target', '_blank');
            link.setAttribute('rel', 'noopener noreferrer');
        }
    });
    
    // === Form Validation Enhancement ===
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
    
    // === WhatsApp Float Button Animation ===
    const whatsappFloat = document.querySelector('.whatsapp-float');
    
    if (whatsappFloat) {
        // Add entrance animation
        setTimeout(() => {
            whatsappFloat.style.transform = 'scale(1)';
            whatsappFloat.style.opacity = '1';
        }, 1000);
        
        // Track click
        whatsappFloat.addEventListener('click', () => {
            console.log('WhatsApp button clicked');
        });
    }
    
    // === Performance: Reduce Motion for Users Who Prefer It ===
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    
    if (prefersReducedMotion.matches) {
        document.documentElement.style.setProperty('--transition-fast', '0s');
        document.documentElement.style.setProperty('--transition-base', '0s');
        document.documentElement.style.setProperty('--transition-slow', '0s');
    }
    
    // === Console Log - Development Info ===
    console.log('%c🚀 Boyong Milk Website', 'color: #2563eb; font-size: 20px; font-weight: bold;');
    console.log('%cDeveloped by KKN REGULER 090 UMY', 'color: #6b7280; font-size: 14px;');
    console.log('%c✨ All systems operational', 'color: #10b981; font-size: 12px;');
    
});

// === Utility Functions ===

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for performance
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

// Format date
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    });
}

// Export functions for use in other scripts
window.utils = {
    debounce,
    throttle,
    formatCurrency,
    formatDate
};
