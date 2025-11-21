<nav class="sticky top-0 z-50 py-3 backdrop-blur-xl bg-white/70 dark:bg-slate-900/70 shadow-lg border-b border-white/20 dark:border-slate-700/50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a class="flex items-center font-bold text-xl transition-transform duration-300 hover:scale-105" href="{{ route('beranda') }}">
                <img src="{{ asset('images/logo-ncs.png') }}" alt="Lab NCS" class="h-10 mr-2" onerror="this.style.display='none'">
                <span class="text-[#1E3A8A] dark:text-yellow-400">Lab NCS</span>
            </a>
            
            <!-- Desktop Menu & Dark Mode Toggle -->
            <div class="hidden lg:flex items-center gap-2">
                <!-- Toggle Dark Mode (Before Menu) -->
                <button id="theme-toggle" class="p-2.5 text-gray-700 dark:text-gray-200 hover:text-[#1E3A8A] dark:hover:text-yellow-400 transition-colors duration-300 rounded-lg hover:bg-white/20 dark:hover:bg-white/10" type="button" title="Toggle Dark Mode">
                    <i id="theme-toggle-dark-icon" class="bi bi-moon-stars-fill text-lg hidden"></i>
                    <i id="theme-toggle-light-icon" class="bi bi-sun-fill text-lg hidden"></i>
                </button>
                
                <!-- Menu Items Desktop -->
                <ul class="flex items-center space-x-1" id="navbarNav">
                    <!-- Beranda -->
                    <li>
                        <a class="px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-white/20 dark:hover:bg-white/10 {{ request()->routeIs('beranda') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-white/30 dark:bg-white/20' : '' }}" href="{{ route('beranda') }}">
                            Beranda
                        </a>
                    </li>
                    
                    <!-- Profil Dropdown -->
                    <li class="relative">
                        <button class="px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 hover:text-[#1E3A8A] dark:hover:text-yellow-400 flex items-center rounded-lg hover:bg-white/20 dark:hover:bg-white/10 {{ request()->routeIs('profil.*') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-white/30 dark:bg-white/20' : '' }}" 
                           data-dropdown="profilDropdownDesktop">
                            Profil
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul class="absolute hidden left-0 mt-2 w-56 backdrop-blur-xl bg-white/90 dark:bg-slate-800/90 shadow-2xl rounded-lg py-2 z-50 border border-gray-200/50 dark:border-slate-700/50" id="profilDropdownDesktop">
                            <li>
                                <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('profil.visi-misi') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('profil.visi-misi') }}">
                                    <i class="bi bi-eye mr-2"></i>Visi & Misi
                                </a>
                            </li>
                            <li>
                                <!-- <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('profil.logo') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('profil.logo') }}">       
                                    <i class="bi bi-badge-vr mr-2"></i>Logo
                                </a> -->
                            </li>
                            <li>
                                <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('profil.struktur') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('profil.struktur') }}">
                                    <i class="bi bi-diagram-3 mr-2"></i>Struktur Organisasi
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Galeri -->
                    <li>
                        <a class="px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-white/20 dark:hover:bg-white/10 {{ request()->routeIs('galeri') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-white/30 dark:bg-white/20' : '' }}" href="{{ route('galeri') }}">
                            Galeri
                        </a>
                    </li>
                    
                    <!-- Arsip Dropdown -->
                    <li class="relative">
                        <button class="px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 hover:text-[#1E3A8A] dark:hover:text-yellow-400 flex items-center rounded-lg hover:bg-white/20 dark:hover:bg-white/10 {{ request()->routeIs('arsip.*') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-white/30 dark:bg-white/20' : '' }}" 
                           data-dropdown="arsipDropdownDesktop">
                            Arsip
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul class="absolute hidden left-0 mt-2 w-56 backdrop-blur-xl bg-white/90 dark:bg-slate-800/90 shadow-2xl rounded-lg py-2 z-50 border border-gray-200/50 dark:border-slate-700/50" id="arsipDropdownDesktop">
                            <li>
                                <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('arsip.penelitian') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('arsip.penelitian') }}">
                                    <i class="bi bi-journal-text mr-2"></i>Penelitian
                                </a>
                            </li>
                            <li>
                                <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('arsip.pengabdian') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('arsip.pengabdian') }}">
                                    <i class="bi bi-people mr-2"></i>Pengabdian
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Layanan Dropdown -->
                    <li class="relative">
                        <button class="px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 hover:text-[#1E3A8A] dark:hover:text-yellow-400 flex items-center rounded-lg hover:bg-white/20 dark:hover:bg-white/10 {{ request()->routeIs('layanan.*') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-white/30 dark:bg-white/20' : '' }}" 
                           data-dropdown="layananDropdownDesktop">
                            Layanan
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul class="absolute hidden left-0 mt-2 w-56 backdrop-blur-xl bg-white/90 dark:bg-slate-800/90 shadow-2xl rounded-lg py-2 z-50 border border-gray-200/50 dark:border-slate-700/50" id="layananDropdownDesktop">
                            <li>
                                <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('layanan.sarana') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('layanan.sarana') }}">
                                    <i class="bi bi-gear mr-2"></i>Sarana & Prasarana
                                </a>
                            </li>
                            <li>
                                <a class="block px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-gradient-to-br hover:from-blue-500 hover:to-[#1E40AF] dark:hover:from-blue-600 dark:hover:to-slate-700 hover:text-white transition-all duration-150 rounded-md mx-2 {{ request()->routeIs('layanan.konsultatif') ? 'bg-gradient-to-br from-blue-500 to-[#1E40AF] text-white' : '' }}" 
                                   href="{{ route('layanan.konsultatif') }}">
                                    <i class="bi bi-chat-dots mr-2"></i>Konsultatif
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Link -->
                    <li>
                        <!-- <a class="px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-white/20 dark:hover:bg-white/10 {{ request()->routeIs('link') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-white/30 dark:bg-white/20' : '' }}" href="{{ route('link') }}">
                            Link
                        </a> -->
                    </li>
                </ul>
            </div>
            
            <!-- Toggler untuk Mobile -->
            <button class="lg:hidden text-gray-700 dark:text-gray-200 focus:outline-none hover:text-[#1E3A8A] dark:hover:text-yellow-400 transition-colors" type="button" data-collapse-toggle="navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu (Hidden by default) -->
        <div class="hidden lg:hidden mt-4 pb-4 border-t border-gray-300/30 dark:border-white/20 pt-4" id="navbarNavMobile">
            <ul class="flex flex-col space-y-2">
                <!-- Dark Mode Toggle Mobile -->
                <li class="mb-2">
                    <button id="theme-toggle-mobile" class="flex items-center w-full py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all" type="button">
                        <i id="theme-toggle-dark-icon-mobile" class="bi bi-moon-stars-fill mr-2 hidden"></i>
                        <i id="theme-toggle-light-icon-mobile" class="bi bi-sun-fill mr-2 hidden"></i>
                        <span id="theme-toggle-text-mobile">Dark Mode</span>
                    </button>
                </li>
                
                <li>
                    <a class="block py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('beranda') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-gray-200/60 dark:bg-white/20' : '' }}" href="{{ route('beranda') }}">
                        <i class="bi bi-house-door mr-2"></i>Beranda
                    </a>
                </li>
                <li>
                    <button class="flex items-center justify-between w-full py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all" data-dropdown-toggle="profilDropdownMobile">
                        <span><i class="bi bi-person-circle mr-2"></i>Profil</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul class="hidden pl-4 mt-2 space-y-2" id="profilDropdownMobile">
                        <li>
                            <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('profil.visi-misi') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('profil.visi-misi') }}">
                                <i class="bi bi-eye mr-2"></i>Visi & Misi
                            </a>
                        </li>
                        <li>
                            <!-- <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('profil.logo') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('profil.logo') }}">
                                <i class="bi bi-badge-vr mr-2"></i>Logo
                            </a> -->
                        </li>
                        <li>
                            <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('profil.struktur') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('profil.struktur') }}">
                                <i class="bi bi-diagram-3 mr-2"></i>Struktur Organisasi
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="block py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('galeri') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-gray-200/60 dark:bg-white/20' : '' }}" href="{{ route('galeri') }}">
                        <i class="bi bi-images mr-2"></i>Galeri
                    </a>
                </li>
                <li>
                    <button class="flex items-center justify-between w-full py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all" data-dropdown-toggle="arsipDropdownMobile">
                        <span><i class="bi bi-archive mr-2"></i>Arsip</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul class="hidden pl-4 mt-2 space-y-2" id="arsipDropdownMobile">
                        <li>
                            <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('arsip.penelitian') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('arsip.penelitian') }}">
                                <i class="bi bi-journal-text mr-2"></i>Penelitian
                            </a>
                        </li>
                        <li>
                            <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('arsip.pengabdian') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('arsip.pengabdian') }}">
                                <i class="bi bi-people mr-2"></i>Pengabdian
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button class="flex items-center justify-between w-full py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all" data-dropdown-toggle="layananDropdownMobile">
                        <span><i class="bi bi-briefcase mr-2"></i>Layanan</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul class="hidden pl-4 mt-2 space-y-2" id="layananDropdownMobile">
                        <li>
                            <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('layanan.sarana') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('layanan.sarana') }}">
                                <i class="bi bi-gear mr-2"></i>Sarana & Prasarana
                            </a>
                        </li>
                        <li>
                            <a class="block py-2 px-3 text-gray-600 dark:text-gray-400 hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('layanan.konsultatif') ? 'text-[#1E3A8A] dark:text-yellow-400' : '' }}" href="{{ route('layanan.konsultatif') }}">
                                <i class="bi bi-chat-dots mr-2"></i>Konsultatif
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <!-- <a class="block py-2 px-3 text-gray-700 dark:text-gray-200 font-medium hover:text-[#1E3A8A] dark:hover:text-yellow-400 rounded-lg hover:bg-gray-200/50 dark:hover:bg-white/10 backdrop-blur-sm transition-all {{ request()->routeIs('link') ? 'text-[#1E3A8A] dark:text-yellow-400 bg-gray-200/60 dark:bg-white/20' : '' }}" href="{{ route('link') }}">
                        <i class="bi bi-link-45deg mr-2"></i>Link
                    </a> -->
                </li>
            </ul>
        </div>
    </div>
</nav>
