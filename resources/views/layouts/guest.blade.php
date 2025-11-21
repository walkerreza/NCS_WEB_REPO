<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background-image: url('{{ asset('images/Lab Koputer.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            
            /* Overlay for better readability */
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3);
                z-index: 0;
            }
        </style>
    </head>
    <body class="font-sans antialiased min-h-screen">
        <!-- Logo Section - Responsive positioning -->
        <div class="absolute top-4 left-4 sm:top-6 sm:left-6 lg:top-8 lg:left-8 z-10">
            <div class="inline-block bg-transparent p-2 sm:p-4 rounded-2xl shadow-xl">
                <a href="/">
                    <x-application-logo class="h-16 sm:h-20 lg:h-24 w-auto mx-auto" />
                </a>
            </div>
        </div>

        <!-- Main Container -->
        <div class="flex items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8 relative z-10">
            <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg">
                <!-- Card - Responsive spacing and sizing -->
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-8 lg:p-10 mt-16 sm:mt-0 lg:-mt-30">
                    {{ $slot }}
                </div>

                <!-- Footer -->
                <p class="mt-4 sm:mt-6 text-center text-xs sm:text-sm text-white drop-shadow-lg">
                    © {{ date('Y') }} Lab NCS. All rights reserved.
                </p>
            </div>
        </div>
    </body>
</html>
