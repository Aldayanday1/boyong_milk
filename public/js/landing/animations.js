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
            gsap.to(pageLoader, {
                opacity: 0,
                duration: 0.5,
                ease: 'power2.inOut',
                onComplete: () => {
                    pageLoader.classList.add('hidden');
                    // Ensure ScrollTrigger and hero animations initialize after loader is hidden
                    // small timeout to allow DOM/reflow to settle
                    // Wait a little longer and use rAF to ensure layout/compositing layers settle
                    const startHeroSequence = () => {
                        // two rAFs help ensure style/layout has settled
                        requestAnimationFrame(() => requestAnimationFrame(() => {
                            try {
                                ScrollTrigger.refresh();
                            } catch (e) {
                                // ignore if ScrollTrigger not available
                            }

                            const heroContent = document.querySelector('.hero-content');
                            const heroVisual = document.querySelector('.hero-visual');
                            const heroCowBg = document.querySelector('.hero-cow-bg');
                            const heroImage = document.querySelector('.hero-image');
                            const floatingCards = document.querySelectorAll('.hero-floating-card');

                            // ensure initial states are set on composite layer
                            if (heroContent) {
                                gsap.set(heroContent, { autoAlpha: 0, x: -30, force3D: true });
                            }

                            if (heroVisual) {
                                gsap.set(heroVisual, { autoAlpha: 0, x: 30, force3D: true });
                            }

                            if (heroCowBg) {
                                gsap.set(heroCowBg, { autoAlpha: 0, scale: 0.95, force3D: true });
                            }

                            if (heroImage) {
                                gsap.set(heroImage, { autoAlpha: 0, scale: 0.95, force3D: true });
                            }

                            if (floatingCards && floatingCards.length > 0) {
                                gsap.set(floatingCards, { autoAlpha: 0, y: 10, force3D: true });
                            }

                            const heroTL = gsap.timeline({ defaults: { duration: 0.85, ease: 'power3.out' } });

                            // Semua elemen muncul bersamaan (left content + right visual + semua child nya)
                            if (heroContent) {
                                heroTL.to(heroContent, { autoAlpha: 1, x: 0 });
                            }

                            if (heroVisual) {
                                heroTL.to(heroVisual, { autoAlpha: 1, x: 0 }, '<');
                            }

                            // bg cow, main image, dan floating cards muncul bersamaan dengan heroVisual
                            if (heroCowBg) {
                                heroTL.to(heroCowBg, { autoAlpha: 0.04, scale: 1, duration: 0.85, ease: 'power3.out' }, '<');
                            }

                            if (heroImage) {
                                heroTL.to(heroImage, { autoAlpha: 1, scale: 1, duration: 0.85, ease: 'power3.out' }, '<');
                            }

                            if (floatingCards && floatingCards.length > 0) {
                                heroTL.to(floatingCards, { autoAlpha: 1, y: 0, stagger: 0, duration: 0.85, ease: 'power3.out' }, '<');
                            }

                            // after entrance finishes, kick off the continuous floating loops
                            heroTL.call(() => {
                                if (floatingCards && floatingCards.length > 0) {
                                    floatingCards.forEach((card, index) => {
                                        gsap.to(card, {
                                            y: -18,
                                            duration: 2 + (index * 0.45),
                                            ease: 'sine.inOut',
                                            repeat: -1,
                                            yoyo: true,
                                            force3D: true
                                        });
                                    });
                                }
                            });
                        }));
                    };

                    // small delay to ensure images/fonts/layout finish; 100ms is typically enough
                    setTimeout(startHeroSequence, 100);
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
