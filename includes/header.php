<?php
/**
 * Header Include
 * Contains HTML head section with meta tags and stylesheets
 */

// Get site settings
$settings = getAllSettings();
$siteName = $settings['site_name'] ?? 'NCS Laboratory';
$siteTagline = $settings['site_tagline'] ?? 'Network & Cyber Security Laboratory';
$siteDescription = $settings['site_description'] ?? '';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?= htmlspecialchars($siteDescription) ?>">
    <meta name="keywords" content="cyber security, network security, laboratorium, keamanan siber, NCS">
    <meta name="author" content="<?= htmlspecialchars($siteName) ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= htmlspecialchars($siteName) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($siteDescription) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= APP_URL ?>">
    
    <title><?= htmlspecialchars($pageTitle ?? $siteName . ' - ' . $siteTagline) ?></title>
    
    <!-- Favicon -->
    <?php if (!empty($settings['site_favicon'])): ?>
    <link rel="icon" href="<?= uploadUrl('images/' . $settings['site_favicon']) ?>" type="image/x-icon">
    <?php else: ?>
    <link rel="icon" href="<?= asset('images/favicon.ico') ?>" type="image/x-icon">
    <?php endif; ?>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Pastel Color Palette
                        primary: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#7dd3c4',
                            400: '#5eaaa8',
                            500: '#4a9d9a',
                            600: '#3d8583',
                            700: '#336d6b',
                            800: '#2a5856',
                            900: '#224544',
                        },
                        pastel: {
                            teal: '#88c9c9',
                            mint: '#a8e6cf',
                            lavender: '#c3b1e1',
                            rose: '#e8b4bc',
                            peach: '#f5c7a9',
                            sky: '#a7c5eb',
                            sage: '#b5c99a',
                        },
                        cyber: {
                            dark: '#1e2433',
                            darker: '#171c28',
                            card: '#242b3d',
                            border: '#3a4255',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        display: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'glow': 'glow 3s ease-in-out infinite alternate',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        /* Reset and base styles */
        *, *::before, *::after {
            box-sizing: border-box;
        }
        
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        /* Custom scrollbar - Pastel */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1e2433;
        }
        ::-webkit-scrollbar-thumb {
            background: #88c9c9;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a8e6cf;
        }
        
        /* Soft glow effects */
        @keyframes glow {
            from {
                text-shadow: 0 0 10px rgba(136, 201, 201, 0.4);
            }
            to {
                text-shadow: 0 0 20px rgba(168, 230, 207, 0.5);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        /* Subtle grid pattern */
        .grid-bg {
            background-image: 
                linear-gradient(rgba(136, 201, 201, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(136, 201, 201, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }
        
        /* Navbar glass effect - Softer */
        .glass-nav {
            background: rgba(30, 36, 51, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        
        /* Card hover effect - Pastel */
        .cyber-card {
            background: linear-gradient(145deg, #2a3142 0%, #1e2433 100%);
            border: 1px solid #3a4255;
            transition: all 0.3s ease;
        }
        
        .cyber-card:hover {
            border-color: #88c9c9;
            box-shadow: 0 8px 30px rgba(136, 201, 201, 0.15);
            transform: translateY(-3px);
        }
        
        /* Button styles - Softer */
        .cyber-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .cyber-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent);
            transition: left 0.5s ease;
        }
        
        .cyber-btn:hover::before {
            left: 100%;
        }
        
        /* Dropdown animation */
        .dropdown-content {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .dropdown:hover .dropdown-content {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        /* Pastel gradient text */
        .pastel-gradient {
            background: linear-gradient(135deg, #88c9c9, #c3b1e1, #a7c5eb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Hero section perfect fit - accounts for notification bar (40px) + navbar (80px) */
        .hero-fullscreen {
            height: calc(100vh - 120px);
            min-height: 500px; /* Minimum height for content */
        }
    </style>
</head>
<body class="bg-cyber-darker text-gray-200 font-sans antialiased grid-bg min-h-screen">

