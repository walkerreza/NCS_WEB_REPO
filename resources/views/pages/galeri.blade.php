@extends('layouts.frontend')

@section('title', 'Galeri & Agenda')
@section('meta_description', 'Galeri kegiatan dan agenda Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Galeri & Agenda Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri & Agenda</h1>
            <p class="text-gray-600 dark:text-gray-400">Dokumentasi kegiatan dan agenda laboratorium</p>
        </div>
        
        <!-- Tabs Navigation -->
        <div class="flex justify-center mb-12" data-aos="fade-up">
            <ul class="flex flex-wrap gap-2" id="galleryTabs" role="tablist">
                <li role="presentation">
                    <button class="px-6 py-3 rounded-lg font-medium transition-all duration-300 bg-blue-600 text-white" 
                            id="agenda-tab" 
                            data-tab="agenda"
                            onclick="switchTab('agenda')"
                            type="button" 
                            role="tab" 
                            aria-controls="agenda" 
                            aria-selected="true">
                        <i class="bi bi-calendar-event mr-2"></i>Agenda Mendatang
                    </button>
                </li>
                <li role="presentation">
                    <button class="px-6 py-3 rounded-lg font-medium transition-all duration-300 bg-gray-200 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white" 
                            id="kegiatan-tab" 
                            data-tab="kegiatan"
                            onclick="switchTab('kegiatan')"
                            type="button" 
                            role="tab" 
                            aria-controls="kegiatan" 
                            aria-selected="false">
                        <i class="bi bi-images mr-2"></i>Dokumentasi Kegiatan
                    </button>
                </li>
            </ul>
        </div>
        
        <div id="galleryTabContent">
            <!-- Agenda Tab -->
            <div class="tab-pane block" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
                    @for($i = 1; $i <= 6; $i++)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl overflow-hidden">
                            <div class="bg-gradient-to-br {{ ['from-blue-600 to-blue-400', 'from-cyan-600 to-cyan-400', 'from-orange-600 to-orange-400', 'from-green-600 to-green-400', 'from-red-600 to-red-400', 'from-yellow-600 to-yellow-400'][$i-1] }} flex items-center justify-center text-white" style="height: 200px;">
                                <i class="bi bi-calendar-event" style="font-size: 3rem; opacity: 0.3;"></i>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <i class="bi bi-calendar-event text-blue-600 mr-2"></i>
                                    <small class="text-gray-600 dark:text-gray-400">{{ date('d M Y', strtotime('+' . $i . ' days')) }}</small>
                                    <span class="ml-auto bg-blue-600 text-white px-3 py-1 rounded-full text-sm">Upcoming</span>
                                </div>
                                <h5 class="text-xl font-bold mb-3">Workshop Cyber Security #{{ $i }}</h5>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                                    Pelatihan dan workshop tentang teknik-teknik keamanan siber modern 
                                    untuk mahasiswa dan praktisi IT.
                                </p>
                                <hr class="my-4 border-gray-200 dark:border-gray-600">
                                <div class="flex items-center text-gray-600 dark:text-gray-400 text-sm">
                                    <i class="bi bi-geo-alt mr-2"></i>
                                    <span>Lab NCS - Polinema</span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-400 text-sm mt-2">
                                    <i class="bi bi-clock mr-2"></i>
                                    <span>09:00 - 15:00 WIB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav aria-label="Page navigation">
                        <ul class="flex items-center gap-2">
                            <li>
                                <a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-400 cursor-not-allowed" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li><a class="px-4 py-2 rounded-lg bg-blue-600 text-white" href="#">1</a></li>
                            <li><a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">2</a></li>
                            <li><a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">3</a></li>
                            <li>
                                <a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <!-- Kegiatan Tab -->
            <div class="tab-pane hidden" id="kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Contoh Static Data - nanti akan diganti dengan data dari database --}}
                    @for($i = 1; $i <= 9; $i++)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <a href="#" class="gallery-item block">
                            <div class="card border-0 shadow-sm overflow-hidden hover-lift bg-white dark:bg-slate-700 rounded-xl">
                                <div class="relative bg-gradient-to-br {{ ['from-blue-600 to-blue-400', 'from-cyan-600 to-cyan-400', 'from-orange-600 to-orange-400', 'from-green-600 to-green-400', 'from-red-600 to-red-400', 'from-yellow-600 to-yellow-400', 'from-blue-600 to-blue-400', 'from-cyan-600 to-cyan-400', 'from-red-600 to-red-400'][$i-1] }} flex items-center justify-center text-white" style="height: 250px;">
                                    <div class="text-center">
                                        <i class="bi bi-image" style="font-size: 3rem; opacity: 0.5;"></i>
                                        <p class="mt-2 mb-0">Foto Kegiatan {{ $i }}</p>
                                    </div>
                                    <div class="absolute top-0 right-0 m-4">
                                        <span class="bg-black/75 text-white px-3 py-1 rounded-full text-sm">
                                            <i class="bi bi-zoom-in"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h6 class="font-bold mb-2 text-gray-900 dark:text-white">Kegiatan Laboratorium #{{ $i }}</h6>
                                    <small class="text-gray-600 dark:text-gray-400">
                                        <i class="bi bi-calendar3 mr-1"></i>
                                        {{ date('d M Y', strtotime('-' . $i*7 . ' days')) }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav aria-label="Page navigation">
                        <ul class="flex items-center gap-2">
                            <li>
                                <a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-400 cursor-not-allowed" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li><a class="px-4 py-2 rounded-lg bg-blue-600 text-white" href="#">1</a></li>
                            <li><a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">2</a></li>
                            <li><a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">3</a></li>
                            <li>
                                <a class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white transition-all" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
// Tab Switching Function
function switchTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.add('hidden');
        pane.classList.remove('block');
    });
    
    // Reset all buttons
    document.querySelectorAll('[data-tab]').forEach(btn => {
        btn.classList.remove('bg-blue-600', 'text-white');
        btn.classList.add('bg-gray-200', 'dark:bg-slate-700', 'text-gray-700', 'dark:text-gray-300');
        btn.setAttribute('aria-selected', 'false');
    });
    
    // Show selected tab
    const selectedPane = document.getElementById(tabName);
    if (selectedPane) {
        selectedPane.classList.remove('hidden');
        selectedPane.classList.add('block');
    }
    
    // Highlight selected button
    const selectedBtn = document.querySelector(`[data-tab="${tabName}"]`);
    if (selectedBtn) {
        selectedBtn.classList.add('bg-blue-600', 'text-white');
        selectedBtn.classList.remove('bg-gray-200', 'dark:bg-slate-700', 'text-gray-700', 'dark:text-gray-300');
        selectedBtn.setAttribute('aria-selected', 'true');
    }
}
</script>
@endpush
@endsection
