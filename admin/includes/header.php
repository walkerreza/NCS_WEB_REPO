<?php
/**
 * Admin Header - Responsive
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pastel: {
                            teal: '#88c9c9',
                            mint: '#a8e6cf',
                            lavender: '#c3b1e1',
                            rose: '#e8b4bc',
                            sky: '#a7c5eb',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link.active { 
            background-color: rgba(136, 201, 201, 0.1); 
            border-left-color: #88c9c9; 
            color: #88c9c9; 
        }
        /* Overlay */
        #sidebar-overlay {
            transition: opacity 0.3s ease-in-out;
        }
        /* Scrollbar styling */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1f2937; }
        ::-webkit-scrollbar-thumb { background: #4b5563; border-radius: 3px; }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">

<!-- Mobile Overlay -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="closeSidebar()"></div>

<!-- Main Container -->
<div class="flex min-h-screen">
