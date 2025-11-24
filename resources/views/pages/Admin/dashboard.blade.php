<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard Admin - Lab NCS') }}
        </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                <i class="bi bi-clock"></i> {{ now()->format('d M Y, H:i') }}
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 space-y-4">
            
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-blue-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h3>
                            <p class="text-sm text-blue-100">Kelola konten website Lab Network & Cyber Security</p>
                        </div>
                        <div class="hidden md:block">
                            <i class="bi bi-shield-check text-5xl text-blue-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                <!-- Total Pages -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300">
                    <div class="p-4">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100 dark:bg-blue-900 mr-3">
                                <i class="bi bi-file-earmark-text text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Total Pages</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">10</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profil Section -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300">
                    <div class="p-4">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-green-100 dark:bg-green-900 mr-3">
                                <i class="bi bi-person-circle text-xl text-green-600 dark:text-green-400"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Profil Pages</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Arsip Section -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300">
                    <div class="p-4">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-purple-100 dark:bg-purple-900 mr-3">
                                <i class="bi bi-archive text-xl text-purple-600 dark:text-purple-400"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Arsip Pages</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layanan Section -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300">
                    <div class="p-4">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-orange-100 dark:bg-orange-900 mr-3">
                                <i class="bi bi-briefcase text-xl text-orange-600 dark:text-orange-400"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Layanan Pages</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Access to Pages -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-3 flex items-center">
                        <i class="bi bi-grid-3x3-gap mr-2"></i>
                        Quick Access - Kelola Halaman Website
                    </h3>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                        <!-- Beranda -->
                        <a href="{{ route('beranda') }}" target="_blank" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-blue-500 dark:hover:border-blue-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg mb-2">
                                        <i class="bi bi-house-door text-2xl text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Beranda</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Homepage</p>
                                </div>
                            </div>
                        </a>

                        <!-- Visi Misi -->
                        <a href="{{ route('admin.visi-misi') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-green-500 dark:hover:border-green-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg mb-2">
                                        <i class="bi bi-eye text-2xl text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Visi & Misi</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Profil</p>
                                </div>
                            </div>
                        </a>

                        <!-- Logo -->
                        <a href="{{ route('admin.logo') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-green-500 dark:hover:border-green-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg mb-2">
                                        <i class="bi bi-badge-vr text-2xl text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Logo</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Profil</p>
                                </div>
                            </div>
                        </a>

                        <!-- Struktur Organisasi -->
                        <a href="{{ route('admin.struktur-organisasi') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-green-500 dark:hover:border-green-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg mb-2">
                                        <i class="bi bi-diagram-3 text-2xl text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Struktur Organisasi</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Profil</p>
                                </div>
                            </div>
                        </a>

                        <!-- Galeri -->
                        <a href="{{ route('admin.galeri') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-yellow-500 dark:hover:border-yellow-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-yellow-100 dark:bg-yellow-900 rounded-lg mb-2">
                                        <i class="bi bi-images text-2xl text-yellow-600 dark:text-yellow-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Galeri</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Dokumentasi</p>
                                </div>
                            </div>
                        </a>

                        <!-- Penelitian -->
                        <a href="{{ route('admin.penelitian') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-purple-500 dark:hover:border-purple-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg mb-2">
                                        <i class="bi bi-journal-text text-2xl text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Penelitian</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Arsip</p>
                                </div>
                            </div>
                        </a>

                        <!-- Pengabdian -->
                        <a href="{{ route('admin.pengabdian') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-purple-500 dark:hover:border-purple-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg mb-2">
                                        <i class="bi bi-people text-2xl text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Pengabdian</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Arsip</p>
                                </div>
                            </div>
                        </a>

                        <!-- Sarana & Prasarana -->
                        <a href="{{ route('admin.sarana-prasarana') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-orange-500 dark:hover:border-orange-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-orange-100 dark:bg-orange-900 rounded-lg mb-2">
                                        <i class="bi bi-gear text-2xl text-orange-600 dark:text-orange-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Sarana & Prasarana</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Layanan</p>
                                </div>
                            </div>
                        </a>

                        <!-- Konsultatif -->
                        <a href="{{ route('admin.konsul') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-orange-500 dark:hover:border-orange-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-orange-100 dark:bg-orange-900 rounded-lg mb-2">
                                        <i class="bi bi-chat-dots text-2xl text-orange-600 dark:text-orange-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Konsultatif</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Layanan</p>
                                </div>
                            </div>
                        </a>

                        <!-- Link -->
                        <a href="{{ route('admin.link') }}" class="group">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3 hover:border-pink-500 dark:hover:border-pink-400 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="p-2 bg-pink-100 dark:bg-pink-900 rounded-lg mb-2">
                                        <i class="bi bi-link-45deg text-2xl text-pink-600 dark:text-pink-400"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Link</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">External Links</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity / Info -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
                <!-- System Info -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-3 flex items-center">
                            <i class="bi bi-info-circle mr-2"></i>
                            Informasi Sistem
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Laravel</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ app()->version() }}</p>
                            </div>
                            <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">PHP</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ PHP_VERSION }}</p>
                            </div>
                            <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Environment</p>
                                <p class="text-xs font-semibold px-2 py-1 rounded-full {{ app()->environment('production') ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ strtoupper(app()->environment()) }}
                                </p>
                            </div>
                            <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Last Login</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ now()->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <!-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                            <i class="bi bi-lightning mr-2"></i>
                            Quick Actions
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ route('beranda') }}" target="_blank" class="flex items-center justify-between p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/40 transition-colors">
                                <span class="text-blue-700 dark:text-blue-400 font-medium">
                                    <i class="bi bi-eye mr-2"></i>View Frontend
                                </span>
                                <i class="bi bi-arrow-right text-blue-700 dark:text-blue-400"></i>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/40 transition-colors">
                                <span class="text-green-700 dark:text-green-400 font-medium">
                                    <i class="bi bi-person-gear mr-2"></i>Edit Profile
                                </span>
                                <i class="bi bi-arrow-right text-green-700 dark:text-green-400"></i>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center justify-between p-3 bg-red-50 dark:bg-red-900/20 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/40 transition-colors">
                                    <span class="text-red-700 dark:text-red-400 font-medium">
                                        <i class="bi bi-box-arrow-right mr-2"></i>Logout
                                    </span>
                                    <i class="bi bi-arrow-right text-red-700 dark:text-red-400"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>  -->
            </div>

        </div>
    </div>
</x-app-layout>
