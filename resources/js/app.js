import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Dark Mode Toggle & Dropdown Management
document.addEventListener('DOMContentLoaded', function() {
    // ===== DARK MODE FUNCTIONALITY =====
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    
    // Mobile dark mode elements
    const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');
    const themeToggleDarkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
    const themeToggleLightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');
    const themeToggleTextMobile = document.getElementById('theme-toggle-text-mobile');
    
    function updateThemeIcon() {
        const isDark = document.documentElement.classList.contains('dark');
        
        // Desktop icons
        if (isDark) {
            themeToggleLightIcon?.classList.remove('hidden');
            themeToggleDarkIcon?.classList.add('hidden');
        } else {
            themeToggleDarkIcon?.classList.remove('hidden');
            themeToggleLightIcon?.classList.add('hidden');
        }
        
        // Mobile icons
        if (isDark) {
            themeToggleLightIconMobile?.classList.remove('hidden');
            themeToggleDarkIconMobile?.classList.add('hidden');
            if (themeToggleTextMobile) themeToggleTextMobile.textContent = 'Light Mode';
        } else {
            themeToggleDarkIconMobile?.classList.remove('hidden');
            themeToggleLightIconMobile?.classList.add('hidden');
            if (themeToggleTextMobile) themeToggleTextMobile.textContent = 'Dark Mode';
        }
    }
    
    function toggleTheme() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
        updateThemeIcon();
    }
    
    // Desktop theme toggle
    if (themeToggleBtn) {
        updateThemeIcon();
        themeToggleBtn.addEventListener('click', toggleTheme);
    }
    
    // Mobile theme toggle
    if (themeToggleMobileBtn) {
        themeToggleMobileBtn.addEventListener('click', toggleTheme);
    }
    
    // ===== DESKTOP DROPDOWN FUNCTIONALITY (Click-based) =====
    const desktopDropdowns = document.querySelectorAll('[data-dropdown]');
    let currentOpenDropdown = null;
    let currentOpenButton = null;
    
    desktopDropdowns.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdownId = this.getAttribute('data-dropdown');
            const dropdownMenu = document.getElementById(dropdownId);
            const arrow = this.querySelector('svg');
            
            if (!dropdownMenu) {
                console.warn(`Dropdown menu with ID "${dropdownId}" not found!`);
                return;
            }
            
            // Close currently open dropdown if different
            if (currentOpenDropdown && currentOpenDropdown !== dropdownMenu) {
                currentOpenDropdown.classList.add('hidden');
                if (currentOpenButton) {
                    const prevArrow = currentOpenButton.querySelector('svg');
                    if (prevArrow) prevArrow.classList.remove('rotate-180');
                }
            }
            
            // Toggle current dropdown
            const isHidden = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden');
            
            // Rotate arrow
            if (arrow) {
                if (isHidden) {
                    arrow.classList.add('rotate-180');
                } else {
                    arrow.classList.remove('rotate-180');
                }
            }
            
            // Update current open dropdown and button
            if (isHidden) {
                currentOpenDropdown = dropdownMenu;
                currentOpenButton = this;
            } else {
                currentOpenDropdown = null;
                currentOpenButton = null;
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (currentOpenDropdown && !e.target.closest('[data-dropdown]') && !e.target.closest('.absolute')) {
            currentOpenDropdown.classList.add('hidden');
            if (currentOpenButton) {
                const arrow = currentOpenButton.querySelector('svg');
                if (arrow) arrow.classList.remove('rotate-180');
            }
            currentOpenDropdown = null;
            currentOpenButton = null;
        }
    });
    
    // ===== MOBILE DROPDOWN FUNCTIONALITY =====
    const mobileDropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');
    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-dropdown-toggle');
            const dropdownMenu = document.getElementById(targetId);
            const arrow = this.querySelector('svg');
            
            if (dropdownMenu) {
                dropdownMenu.classList.toggle('hidden');
                if (arrow) {
                    arrow.classList.toggle('rotate-180');
                }
            }
        });
    });
    
    // ===== MOBILE MENU TOGGLE =====
    const mobileMenuButton = document.querySelector('[data-collapse-toggle]');
    const mobileMenu = document.getElementById('navbarNavMobile');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // ===== SMOOTH SCROLL FOR ANCHOR LINKS =====
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
});
