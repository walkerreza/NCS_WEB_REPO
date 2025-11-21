<!-- Admin Sidebar -->
<aside id="adminSidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-3 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <!-- Sidebar Header -->
        <div class="mb-3 px-3 py-3 bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-blue-900 rounded-lg">
            <h3 class="text-white font-bold text-base flex items-center">
                <i class="bi bi-speedometer2 mr-2"></i>
                Admin Panel
            </h3>
            <p class="text-blue-100 text-xs mt-1">Kelola Website Lab NCS</p>
        </div>

        <!-- Navigation Menu -->
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <i class="bi bi-grid-1x2 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                <span class="text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">Halaman Website</span>
            </li>

            <!-- Beranda -->
            <!-- <li>
                <a target="_blank" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="bi bi-house-door w-5 h-5 text-blue-500 transition duration-75 group-hover:text-blue-600"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                    <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                </a>
            </li> -->

            <!-- Profil Section -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" onclick="toggleSubmenu('profilMenu')">
                    <i class="bi bi-person-circle w-5 h-5 text-green-500 transition duration-75"></i>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap">Profil</span>
                    <i class="bi bi-chevron-down text-sm transition-transform" id="profilMenuIcon"></i>
                </button>
                <ul id="profilMenu" class="hidden py-2 space-y-2 pl-8">
                    <li>
                        <a target="_blank" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-eye text-xs mr-2"></i>
                            <span class="flex-1">Visi & Misi</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-badge-vr text-xs mr-2"></i>
                            <span class="flex-1">Logo</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-diagram-3 text-xs mr-2"></i>
                            <span class="flex-1">Struktur Organisasi</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Galeri -->
            <li>
                <a target="_blank" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="bi bi-images w-5 h-5 text-yellow-500 transition duration-75 group-hover:text-yellow-600"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Galeri</span>
                    <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                </a>
            </li>

            <!-- Arsip Section -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" onclick="toggleSubmenu('arsipMenu')">
                    <i class="bi bi-archive w-5 h-5 text-purple-500 transition duration-75"></i>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap">Arsip</span>
                    <i class="bi bi-chevron-down text-sm transition-transform" id="arsipMenuIcon"></i>
                </button>
                <ul id="arsipMenu" class="hidden py-2 space-y-2 pl-8">
                    <li>
                        <a target="_blank" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-journal-text text-xs mr-2"></i>
                            <span class="flex-1">Penelitian</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-people text-xs mr-2"></i>
                            <span class="flex-1">Pengabdian</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Layanan Section -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" onclick="toggleSubmenu('layananMenu')">
                    <i class="bi bi-briefcase w-5 h-5 text-orange-500 transition duration-75"></i>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap">Layanan</span>
                    <i class="bi bi-chevron-down text-sm transition-transform" id="layananMenuIcon"></i>
                </button>
                <ul id="layananMenu" class="hidden py-2 space-y-2 pl-8">
                    <li>
                        <a target="_blank" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-gear text-xs mr-2"></i>
                            <span class="flex-1">Sarana & Prasarana</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="bi bi-chat-dots text-xs mr-2"></i>
                            <span class="flex-1">Konsultatif</span>
                            <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Link -->
            <li>
                <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="bi bi-link-45deg w-5 h-5 text-pink-500 transition duration-75 group-hover:text-pink-600"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Link</span>
                    <i class="bi bi-box-arrow-up-right text-xs text-gray-400"></i>
                </a>
            </li>

            <!-- Divider -->
            <li class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                <span class="text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">Pengaturan</span>
            </li>

            <!-- Profile -->
            <li>
                <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="bi bi-person-gear w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>

            <!-- Logout -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-red-900/30 group">
                        <i class="bi bi-box-arrow-right w-5 h-5 text-red-500 transition duration-75"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap text-left">Logout</span>
                    </button>
                </form>
            </li>
        </ul>

        <!-- User Info at Bottom -->
        <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center px-3 py-2">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
                <div class="flex-1 min-w-0 ms-3">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile Sidebar Toggle Button -->
<button onclick="toggleSidebar()" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 fixed top-4 left-4 z-50 bg-white dark:bg-gray-800 shadow-lg">
    <span class="sr-only">Open sidebar</span>
    <i class="bi bi-list text-2xl"></i>
</button>

