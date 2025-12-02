<?php
/**
 * Admin Footer - Responsive
 */
?>
</main>
</div>

<script>
// Sidebar state management
let sidebarOpen = false;

// Toggle sidebar on mobile
function toggleSidebar() {
    const sidebar = document.getElementById('admin-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    if (!sidebar || !overlay) return;
    
    sidebarOpen = !sidebarOpen;
    
    if (sidebarOpen) {
        // Open sidebar
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        // Close sidebar
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// Close sidebar (for overlay click)
function closeSidebar() {
    if (sidebarOpen) {
        toggleSidebar();
    }
}

// Initialize sidebar state based on screen size
function initSidebar() {
    const sidebar = document.getElementById('admin-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    if (!sidebar || !overlay) return;
    
    if (window.innerWidth >= 1024) {
        // Desktop: ensure sidebar is visible
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('lg:translate-x-0');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
        sidebarOpen = false;
    } else {
        // Mobile: ensure sidebar is hidden initially
        if (!sidebarOpen) {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }
}

// Run on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize sidebar
    initSidebar();
    
    // Close sidebar when clicking a link (mobile only)
    const sidebarLinks = document.querySelectorAll('#admin-sidebar a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 1024 && sidebarOpen) {
                toggleSidebar();
            }
        });
    });
    
    // Flash message auto-hide
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });
});

// Handle window resize
window.addEventListener('resize', function() {
    initSidebar();
});

// Confirm delete
function confirmDelete(message) {
    return confirm(message || 'Apakah Anda yakin ingin menghapus item ini?');
}

// Preview image before upload
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).src = e.target.result;
            document.getElementById(previewId).classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>
