/* ========================================
   NAVBAR JavaScript - Modern Navigation
   ======================================== */

document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Navbar scroll effect
    function handleNavbarScroll() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    
    // Toggle mobile menu
    function toggleMenu() {
        navToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
        document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
    }
    
    // Close menu when clicking outside
    function handleClickOutside(e) {
        if (navMenu.classList.contains('active') && 
            !navMenu.contains(e.target) && 
            !navToggle.contains(e.target)) {
            toggleMenu();
        }
    }
    
    // Smooth scroll to sections
    function smoothScroll(e) {
        const href = this.getAttribute('href');
        
        // Check if it's an internal link
        if (href && href.startsWith('#')) {
            e.preventDefault();
            const targetId = href.substring(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                const offsetTop = targetSection.offsetTop - 80;
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (navMenu.classList.contains('active')) {
                    toggleMenu();
                }
                
                // Update active link
                updateActiveLink(this);
            }
        }
    }
    
    // Update active link based on scroll position
    function updateActiveLink(clickedLink = null) {
        if (clickedLink) {
            navLinks.forEach(link => link.classList.remove('active'));
            clickedLink.classList.add('active');
            return;
        }
        
        let current = '';
        const sections = document.querySelectorAll('section[id]');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (window.scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href === `#${current}`) {
                link.classList.add('active');
            }
        });
    }
    
    // Event Listeners
    window.addEventListener('scroll', () => {
        handleNavbarScroll();
        updateActiveLink();
    });
    
    if (navToggle) {
        navToggle.addEventListener('click', toggleMenu);
    }
    
    document.addEventListener('click', handleClickOutside);
    
    navLinks.forEach(link => {
        link.addEventListener('click', smoothScroll);
    });
    
    // Initialize
    handleNavbarScroll();
    updateActiveLink();
});
