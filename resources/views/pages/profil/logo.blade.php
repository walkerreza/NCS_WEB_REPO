@extends('layouts.frontend')

@section('title', 'Logo Laboratorium')
@section('meta_description', 'Logo dan Identitas Visual Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-600 dark:text-gray-400">Profil</li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Logo</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Logo Section -->
<section class="py-12 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">Logo Laboratorium</h1>
            <p class="text-gray-600 dark:text-gray-400">Identitas visual Lab Network & Cyber Security</p>
        </div>
        
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3">
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl" data-aos="zoom-in">
                    <div class="p-8 md:p-12 text-center">
                        <!-- Logo Display -->
                        <div class="mb-12 p-12 bg-white dark:bg-slate-600 rounded-xl">
                            <img src="{{ asset('images/logo-ncs.png') }}" 
                                 alt="Logo Lab NCS" 
                                 class="max-w-full h-auto mx-auto" 
                                 style="max-height: 300px;"
                                 onerror="this.parentElement.innerHTML='<div class=\'bg-blue-600 text-white rounded-xl p-8\'><i class=\'bi bi-image\' style=\'font-size: 4rem;\'></i><p class=\'mt-4 mb-0\'>Logo belum tersedia</p></div>'">
                        </div>
                        
                        <!-- Logo Description -->
                        <h4 class="text-2xl font-bold mb-4">Lab Network & Cyber Security</h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto">
                            Logo laboratorium mencerminkan komitmen kami dalam menjaga keamanan 
                            jaringan dan informasi. Desain yang modern dan profesional merepresentasikan 
                            inovasi dan dedikasi dalam bidang cyber security.
                        </p>
                        
                        <!-- Download Buttons -->
                        <div class="flex gap-4 justify-center flex-wrap">
                            <a href="{{ asset('images/logo-ncs.png') }}" 
                               download="logo-ncs.png" 
                               class="btn-primary inline-flex items-center px-6 py-3 rounded-lg">
                                <i class="bi bi-download mr-2"></i>Download PNG
                            </a>
                            <a href="{{ asset('images/logo-ncs.svg') }}" 
                               download="logo-ncs.svg" 
                               class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white inline-flex items-center px-6 py-3 rounded-lg transition-all duration-300">
                                <i class="bi bi-download mr-2"></i>Download SVG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Logo Usage Guidelines -->
        <div class="mt-12">
            <div data-aos="fade-up">
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8 md:p-12">
                        <h4 class="text-2xl font-bold mb-8 text-center">Panduan Penggunaan Logo</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-4 mt-1 text-2xl flex-shrink-0"></i>
                                <div>
                                    <h6 class="text-lg font-bold mb-2">Ukuran Minimum</h6>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Logo tidak boleh diperkecil kurang dari 50px tinggi untuk menjaga keterbacaan</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-4 mt-1 text-2xl flex-shrink-0"></i>
                                <div>
                                    <h6 class="text-lg font-bold mb-2">Ruang Kosong</h6>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Berikan ruang kosong minimal 20px di sekitar logo</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="bi bi-x-circle-fill text-red-600 dark:text-red-400 mr-4 mt-1 text-2xl flex-shrink-0"></i>
                                <div>
                                    <h6 class="text-lg font-bold mb-2">Jangan Ubah Warna</h6>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Gunakan warna original logo, jangan mengubah skema warna</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="bi bi-x-circle-fill text-red-600 dark:text-red-400 mr-4 mt-1 text-2xl flex-shrink-0"></i>
                                <div>
                                    <h6 class="text-lg font-bold mb-2">Jangan Distorsi</h6>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Jaga proporsi logo, jangan meregangkan atau menekan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
