<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Sarana & Prasarana - Lab NCS') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                <i class="bi bi-clock"></i> {{ now()->format('d M Y, H:i') }}
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 space-y-4">
            
            <!-- Page Header Card -->
            <div class="bg-gradient-to-r from-green-600 to-green-800 dark:from-green-800 dark:to-green-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-1">Kelola Sarana & Prasarana</h3>
                            <p class="text-sm text-green-100">Kelola konten Sarana & Prasarana Lab NCS</p>
                        </div>
                        <div class="hidden md:block">
                            <i class="bi bi-eye text-5xl text-green-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="text-gray-600 dark:text-gray-400">Konten halaman Sarana & Prasarana akan ditampilkan di sini.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

