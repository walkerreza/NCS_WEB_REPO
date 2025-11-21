<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Laboratorium Network & Cyber Security - Polinema')">
    <meta name="keywords" content="cyber security, network, laboratorium, polinema, penelitian, keamanan jaringan">
    <meta name="author" content="Lab Network & Cyber Security - Polinema">
    <title>@yield('title', 'Lab NCS') - Polinema</title>
    
    <!-- Dark Mode Script (harus di head untuk mencegah flash) -->
    <script>
        // Cek preferensi dark mode dari localStorage atau sistem
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <!-- Preconnect untuk CDN (speed optimization) -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://unpkg.com">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!-- GLightbox untuk Gallery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    
    <!-- Google Fonts with display=swap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Compiled via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="bg-white dark:bg-slate-900 text-gray-900 dark:text-gray-100 flex flex-col min-h-screen">
    <!-- Navbar -->
    @include('partials.navbar')
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer (Sticky) -->
    @include('partials.footer')
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    
    <script>
        // Inisialisasi AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
        
        // Inisialisasi GLightbox untuk gallery
        if (document.querySelector('.gallery-item')) {
            const lightbox = GLightbox({
                selector: '.gallery-item',
                touchNavigation: true,
                loop: true,
                autoplayVideos: true
            });
        }
    </script>
    
    <!-- UserWay Accessibility Widget (Floating Draggable Button) -->
    <script>
        (function(d){
            var s = d.createElement("script");
            s.setAttribute("data-account", "LwZgjOWKhY");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            s.setAttribute("async", "");
            (d.body || d.head).appendChild(s);
        })(document)
    </script>
    <noscript>
        Please ensure Javascript is enabled for purposes of 
        <a href="https://userway.org">website accessibility</a>
    </noscript>
    
    <!-- Custom CSS & JS untuk UserWay Widget - Draggable Floating Button -->
    <style>
        /* Styling untuk button accessibility sebagai floating draggable */
        button[aria-label*="Menu Aksesibilitas"],
        button[aria-label*="Accessibility Menu"],
        #userway_container > button,
        [data-uw-rm-brl] button {
            position: fixed !important;
            bottom: 20px !important;
            right: 20px !important;
            z-index: 999999 !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
            transition: all 0.3s ease !important;
            cursor: move !important;
            border-radius: 50% !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            padding: 15px !important;
        }
        
        /* Hover effect */
        button[aria-label*="Menu Aksesibilitas"]:hover,
        button[aria-label*="Accessibility Menu"]:hover,
        #userway_container > button:hover,
        [data-uw-rm-brl] button:hover {
            transform: scale(1.1) !important;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.5) !important;
        }
        
        /* Active/Dragging state */
        button[aria-label*="Menu Aksesibilitas"]:active,
        button[aria-label*="Accessibility Menu"]:active,
        #userway_container > button:active,
        [data-uw-rm-brl] button:active {
            cursor: grabbing !important;
            transform: scale(1.05) !important;
        }
        
        /* Container positioning */
        #userway_container,
        [data-uw-rm-brl] {
            position: fixed !important;
            z-index: 999999 !important;
        }
        
        /* Prevent button from overlapping navbar */
        @media (max-width: 768px) {
            button[aria-label*="Menu Aksesibilitas"],
            button[aria-label*="Accessibility Menu"],
            #userway_container > button,
            [data-uw-rm-brl] button {
                bottom: 80px !important;
                right: 15px !important;
            }
        }
    </style>
    
    <script>
        // Make UserWay widget draggable - Enhanced version
        function makeUserWayDraggable() {
            // Try multiple selectors to find the button
            const selectors = [
                'button[aria-label*="Menu Aksesibilitas"]',
                'button[aria-label*="Accessibility Menu"]',
                'button[aria-label*="Accessibility"]',
                '#userway_container button',
                '[data-uw-rm-brl] button',
                'button[data-uw-btn]',
                '.userway_buttons_wrapper button'
            ];
            
            let uwButton = null;
            for (let selector of selectors) {
                uwButton = document.querySelector(selector);
                if (uwButton) {
                    console.log('UserWay button found with selector:', selector);
                    break;
                }
            }
            
            if (!uwButton) {
                console.log('UserWay button not found, retrying...');
                return false;
            }
            
            // Prevent double initialization
            if (uwButton.dataset.draggableInitialized) {
                return true;
            }
            uwButton.dataset.draggableInitialized = 'true';
            
            let isDragging = false;
            let startX, startY;
            let currentX = 0, currentY = 0;
            
            // Get initial position from localStorage or use default
            const savedX = localStorage.getItem('uwButtonX');
            const savedY = localStorage.getItem('uwButtonY');
            
            if (savedX && savedY) {
                currentX = parseFloat(savedX);
                currentY = parseFloat(savedY);
                setPosition(currentX, currentY);
            } else {
                // Get current position
                const rect = uwButton.getBoundingClientRect();
                currentX = rect.left;
                currentY = rect.top;
            }
            
            function dragStart(e) {
                isDragging = true;
                
                if (e.type === 'touchstart') {
                    startX = e.touches[0].clientX - currentX;
                    startY = e.touches[0].clientY - currentY;
                } else {
                    startX = e.clientX - currentX;
                    startY = e.clientY - currentY;
                    e.preventDefault(); // Prevent text selection
                }
                
                uwButton.style.cursor = 'grabbing';
            }
            
            function drag(e) {
                if (!isDragging) return;
                
                e.preventDefault();
                
                let clientX, clientY;
                if (e.type === 'touchmove') {
                    clientX = e.touches[0].clientX;
                    clientY = e.touches[0].clientY;
                } else {
                    clientX = e.clientX;
                    clientY = e.clientY;
                }
                
                currentX = clientX - startX;
                currentY = clientY - startY;
                
                // Constrain to viewport
                const maxX = window.innerWidth - uwButton.offsetWidth;
                const maxY = window.innerHeight - uwButton.offsetHeight;
                
                currentX = Math.max(0, Math.min(currentX, maxX));
                currentY = Math.max(0, Math.min(currentY, maxY));
                
                setPosition(currentX, currentY);
            }
            
            function dragEnd() {
                if (!isDragging) return;
                
                isDragging = false;
                uwButton.style.cursor = 'move';
                
                // Save position
                localStorage.setItem('uwButtonX', currentX);
                localStorage.setItem('uwButtonY', currentY);
            }
            
            function setPosition(x, y) {
                uwButton.style.left = x + 'px';
                uwButton.style.top = y + 'px';
                uwButton.style.right = 'auto';
                uwButton.style.bottom = 'auto';
                uwButton.style.transform = 'none';
            }
            
            // Add event listeners
            uwButton.addEventListener('mousedown', dragStart);
            uwButton.addEventListener('touchstart', dragStart, { passive: false });
            
            document.addEventListener('mousemove', drag);
            document.addEventListener('touchmove', drag, { passive: false });
            
            document.addEventListener('mouseup', dragEnd);
            document.addEventListener('touchend', dragEnd);
            
            console.log('UserWay button is now draggable!');
            return true;
        }
        
        // Try to initialize draggable functionality
        let attempts = 0;
        const maxAttempts = 20;
        const checkInterval = setInterval(function() {
            attempts++;
            if (makeUserWayDraggable() || attempts >= maxAttempts) {
                clearInterval(checkInterval);
                if (attempts >= maxAttempts) {
                    console.log('Failed to make UserWay draggable after', maxAttempts, 'attempts');
                }
            }
        }, 500);
        
        // Also try after page load
        window.addEventListener('load', function() {
            setTimeout(makeUserWayDraggable, 1000);
        });
    </script>
    
    @stack('scripts')
</body>
</html>
