/* ========================================
   ANIMATIONS - GSAP & ScrollTrigger
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    // Check if GSAP is loaded
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.warn('GSAP or ScrollTrigger not loaded. Animations will be disabled.');
        return;
    }
    
    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);
    
    // === Page Loader ===
    const pageLoader = document.querySelector('.page-loader');
    if (pageLoader) {
        window.addEventListener('load', () => {
            // Lock body rendering during animation
            document.body.style.overflow = 'hidden';
            
            // Master timeline for ultra-smooth synchronized animations
            const masterTL = gsap.timeline({ paused: false });
            
            // Get all elements
            const navbar = document.querySelector('.navbar');
            const heroContent = document.querySelector('.hero-content');
            const heroVisual = document.querySelector('.hero-visual');
            
            // AGGRESSIVE GPU acceleration + rendering lock
            gsap.set([heroContent, heroVisual, navbar], { 
                force3D: true,
                transformOrigin: '50% 50%',
                will: 'transform, opacity'
            });
            
            // Lock initial states HARD (prevent any paint/layout operations)
            gsap.set(heroContent, { 
                autoAlpha: 0, 
                x: -30,
                position: 'relative',
                zIndex: 1
            });
            
            gsap.set(heroVisual, { 
                autoAlpha: 0, 
                x: 30,
                position: 'relative',
                zIndex: 1
            });
            
            if (navbar) {
                gsap.set(navbar, { 
                    autoAlpha: 0,
                    position: 'fixed',
                    zIndex: 9999
                });
            }
            
            // PHASE 1: Loader fade-out (0s - 0.7s)
            masterTL.to(pageLoader, {
                opacity: 0,
                pointerEvents: 'none',
                duration: 0.7,
                ease: 'power1.inOut'
            }, 0);
            
            // PHASE 2: Navbar fade-in parallel (0s - 0.9s)
            if (navbar) {
                masterTL.to(navbar, {
                    autoAlpha: 1,
                    duration: 0.9,
                    ease: 'power2.out'
                }, 0);
                
                masterTL.call(() => {
                    navbar.classList.add('visible');
                }, null, 0);
            }
            
            // PHASE 3: Hero content entrance (0.3s - 1.7s, total 1.4s duration)
            masterTL.to(heroContent, {
                autoAlpha: 1,
                x: 0,
                duration: 1.4,
                ease: 'cubic-bezier(0.34, 1.56, 0.64, 1)'
            }, 0.3);
            
            // PHASE 4: Hero visual entrance (0.3s - 1.7s, same timing as content for perfect sync)
            masterTL.to(heroVisual, {
                autoAlpha: 1,
                x: 0,
                duration: 1.4,
                ease: 'cubic-bezier(0.34, 1.56, 0.64, 1)'
            }, 0.3);
            
            // On completion: cleanup and unlock
            masterTL.call(() => {
                pageLoader.classList.add('hidden');
                pageLoader.style.display = 'none';
                document.body.style.overflow = 'auto';
                try {
                    ScrollTrigger.refresh();
                } catch (e) {
                    // ignore
                }
            });
        });
    }
    
    // === Fade Up Animation ===
    const fadeUpElements = document.querySelectorAll('.fade-up');
    
    fadeUpElements.forEach((element, index) => {
        gsap.fromTo(element,
            {
                opacity: 0,
                y: 50
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                }
            }
        );
    });
    
    // === Hero Section Parallax ===
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        gsap.to('.hero-section', {
            backgroundPosition: '50% 100px',
            ease: 'none',
            scrollTrigger: {
                trigger: '.hero-section',
                start: 'top top',
                end: 'bottom top',
                scrub: true
            }
        });
        
        // Floating loop will be started after the hero entrance timeline finishes
    }
    
    // === About Section Stats Counter ===
    const stats = document.querySelectorAll('.about-stat-number');
    
    stats.forEach(stat => {
        const target = stat.textContent.replace(/\D/g, '');
        const suffix = stat.textContent.replace(/[0-9]/g, '');
        
        ScrollTrigger.create({
            trigger: stat,
            start: 'top 80%',
            onEnter: () => {
                gsap.from(stat, {
                    textContent: 0,
                    duration: 2,
                    ease: 'power1.out',
                    snap: { textContent: 1 },
                    onUpdate: function() {
                        stat.textContent = Math.ceil(this.targets()[0].textContent) + suffix;
                    }
                });
            },
            once: true
        });
    });
    
    // === Gallery Items Stagger Animation ===
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (galleryItems.length > 0) {
        gsap.fromTo(galleryItems,
            {
                opacity: 0,
                scale: 0.9,
                y: 30
            },
            {
                opacity: 1,
                scale: 1,
                y: 0,
                duration: 0.6,
                ease: 'back.out(1.2)',
                stagger: 0.1,
                scrollTrigger: {
                    trigger: '.gallery-grid',
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }
    
    // === Product Cards Stagger Animation ===
    const productCards = document.querySelectorAll('.produk-card');
    
    if (productCards.length > 0) {
        gsap.fromTo(productCards,
            {
                opacity: 0,
                y: 40,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.6,
                ease: 'power2.out',
                stagger: 0.1,
                scrollTrigger: {
                    trigger: '.produk-section',
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }
    
    // === CTA Section Animation ===
    const ctaSection = document.querySelector('.cta-section');
    if (ctaSection) {
        gsap.fromTo('.cta-title',
            { opacity: 0, y: 30 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                scrollTrigger: {
                    trigger: '.cta-section',
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            }
        );
        
        gsap.fromTo('.cta-text',
            { opacity: 0, y: 30 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                delay: 0.2,
                scrollTrigger: {
                    trigger: '.cta-section',
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            }
        );
        
        gsap.fromTo('.cta-button',
            { opacity: 0, scale: 0.8 },
            {
                opacity: 1,
                scale: 1,
                duration: 0.6,
                delay: 0.4,
                ease: 'back.out(1.5)',
                scrollTrigger: {
                    trigger: '.cta-section',
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }
    
    // === Video Section Parallax ===
    const videoItems = document.querySelectorAll('.video-item');
    videoItems.forEach((item, index) => {
        gsap.fromTo(item,
            { opacity: 0, y: 50 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                delay: index * 0.2,
                scrollTrigger: {
                    trigger: '.video-section',
                    start: 'top 70%',
                    toggleActions: 'play none none none'
                }
            }
        );
    });
    
    // === Footer Animation ===
    const footerSections = document.querySelectorAll('.footer-info, .footer-links, .footer-contact, .footer-support');
    
    if (footerSections.length > 0) {
        gsap.fromTo(footerSections,
            { opacity: 0, y: 30 },
            {
                opacity: 1,
                y: 0,
                duration: 0.6,
                stagger: 0.1,
                scrollTrigger: {
                    trigger: '.footer',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }
    
    // === Smooth Scroll is handled by navbar.js ===
    // No need for additional smooth scroll here
    
    // === Refresh ScrollTrigger on resize ===
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            ScrollTrigger.refresh();
        }, 250);
    });
    
    console.log('✨ GSAP Animations initialized successfully');
});
