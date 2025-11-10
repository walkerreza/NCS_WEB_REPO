/**
 * ============================================
 * CUSTOM JAVASCRIPT - Lab Network & Cyber Security
 * ============================================
 */

// Strict mode untuk keamanan kode yang lebih baik
'use strict';

/**
 * DOMContentLoaded - Menjalankan kode setelah DOM selesai dimuat
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // DARK MODE TOGGLE
    // ============================================
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    
    // Fungsi untuk mengupdate icon berdasarkan tema
    function updateThemeIcon() {
        if (localStorage.getItem('theme') === 'dark' || 
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('d-none');
            themeToggleDarkIcon.classList.add('d-none');
        } else {
            themeToggleDarkIcon.classList.remove('d-none');
            themeToggleLightIcon.classList.add('d-none');
        }
    }
    
    // Inisialisasi icon theme
    if (themeToggleBtn) {
        updateThemeIcon();
        
        // Event listener untuk toggle theme
        themeToggleBtn.addEventListener('click', function() {
            // Toggle dark mode
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            
            // Update icon
            updateThemeIcon();
        });
    }
    
    // ============================================
    // NAVBAR SCROLL EFFECT
    // ============================================
    const navbar = document.querySelector('.navbar');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Tambahkan shadow ketika scroll
        if (scrollTop > 50) {
            navbar.classList.add('shadow-lg');
            navbar.style.padding = '0.5rem 0';
        } else {
            navbar.classList.remove('shadow-lg');
            navbar.style.padding = '0.75rem 0';
        }
        
        // Auto-hide navbar saat scroll ke bawah (opsional)
        // if (scrollTop > lastScrollTop && scrollTop > 200) {
        //     navbar.style.transform = 'translateY(-100%)';
        // } else {
        //     navbar.style.transform = 'translateY(0)';
        // }
        
        lastScrollTop = scrollTop;
    });
    
    // ============================================
    // SMOOTH SCROLL UNTUK ANCHOR LINKS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
    
    // ============================================
    // MOBILE MENU CLOSE ON CLICK
    // ============================================
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }
        });
    });
    
    // ============================================
    // LAZY LOADING IMAGES
    // ============================================
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');
                    
                    if (src) {
                        img.src = src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // ============================================
    // SEARCH FILTER UNTUK ARSIP
    // ============================================
    const searchInput = document.getElementById('searchArchive');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const archiveCards = document.querySelectorAll('.archive-card');
            
            archiveCards.forEach(card => {
                const title = card.getAttribute('data-title').toLowerCase();
                const author = card.getAttribute('data-author').toLowerCase();
                
                if (title.includes(searchTerm) || author.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
    
    // ============================================
    // TOOLTIP INITIALIZATION
    // ============================================
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // ============================================
    // POPOVER INITIALIZATION
    // ============================================
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    
    // ============================================
    // FORM VALIDATION
    // ============================================
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
    
    // ============================================
    // COPY TO CLIPBOARD
    // ============================================
    const copyButtons = document.querySelectorAll('[data-copy-target]');
    copyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetSelector = this.getAttribute('data-copy-target');
            const target = document.querySelector(targetSelector);
            
            if (target) {
                const textToCopy = target.textContent || target.value;
                
                navigator.clipboard.writeText(textToCopy).then(() => {
                    // Show success message
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="bi bi-check-lg"></i> Tersalin!';
                    
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 2000);
                }).catch(err => {
                    console.error('Gagal menyalin:', err);
                });
            }
        });
    });
    
    // ============================================
    // BACK TO TOP BUTTON
    // ============================================
    const backToTopButton = document.createElement('button');
    backToTopButton.innerHTML = '<i class="bi bi-arrow-up"></i>';
    backToTopButton.className = 'btn btn-primary btn-back-to-top';
    backToTopButton.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: none;
        z-index: 1000;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    `;
    
    document.body.appendChild(backToTopButton);
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });
    
    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Hover effect untuk back to top button
    backToTopButton.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.1)';
    });
    
    backToTopButton.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
    
    // ============================================
    // ANIMATE NUMBERS (untuk counter statistics)
    // ============================================
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.textContent = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    
    // Observe counter elements
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                const target = parseInt(entry.target.getAttribute('data-target'));
                animateValue(entry.target, 0, target, 2000);
                entry.target.classList.add('counted');
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.counter').forEach(counter => {
        counterObserver.observe(counter);
    });
    
    // ============================================
    // PRELOADER (opsional)
    // ============================================
    const preloader = document.querySelector('.preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        });
    }
    
    // ============================================
    // TAB PERSISTENCE (menyimpan active tab di localStorage)
    // ============================================
    const tabs = document.querySelectorAll('button[data-bs-toggle="pill"]');
    tabs.forEach(tab => {
        tab.addEventListener('shown.bs.tab', function(e) {
            const tabId = e.target.getAttribute('href');
            localStorage.setItem('activeTab', tabId);
        });
    });
    
    // Restore active tab dari localStorage
    const activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        const tab = document.querySelector(`button[href="${activeTab}"]`);
        if (tab) {
            const bsTab = new bootstrap.Tab(tab);
            bsTab.show();
        }
    }
});

/**
 * ============================================
 * UTILITY FUNCTIONS
 * ============================================
 */

/**
 * Debounce function untuk optimasi performance
 * @param {Function} func - Fungsi yang akan di-debounce
 * @param {number} wait - Waktu tunggu dalam ms
 * @returns {Function}
 */
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

/**
 * Format tanggal ke format Indonesia
 * @param {string|Date} date
 * @returns {string}
 */
function formatTanggalIndonesia(date) {
    const bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    const d = new Date(date);
    return `${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;
}

/**
 * Show toast notification
 * @param {string} message
 * @param {string} type - 'success', 'error', 'warning', 'info'
 */
function showToast(message, type = 'info') {
    // Implementasi menggunakan Bootstrap Toast atau library lain
    console.log(`[${type.toUpperCase()}] ${message}`);
}

// Export functions untuk digunakan di file lain (jika menggunakan module)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        debounce,
        formatTanggalIndonesia,
        showToast
    };
}
