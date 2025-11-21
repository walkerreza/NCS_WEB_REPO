@extends('layouts.frontend')

@section('title', 'Sarana & Prasarana')
@section('meta_description', 'Sarana dan prasarana Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-600 dark:text-gray-400">Layanan</li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Sarana & Prasarana</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Sarana Prasarana Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">Sarana & Prasarana</h1>
            <p class="text-gray-600 dark:text-gray-400">Fasilitas dan peralatan laboratorium</p>
        </div>
        
        <!-- Hardware & Infrastructure -->
        <div class="mb-12">
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-6"><i class="bi bi-hdd-rack mr-2 text-blue-600"></i>Perangkat Hardware</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-[60px] h-[60px] rounded-full bg-blue-100 dark:bg-blue-900/30 inline-flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="bi bi-pc-display text-blue-600 dark:text-blue-400" style="font-size: 1.8rem;"></i>
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold mb-2">Komputer Lab</h5>
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">40 Unit</span>
                                </div>
                            </div>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Intel Core i7 Gen 10</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>RAM 16GB DDR4</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>SSD 512GB NVMe</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>GPU Dedicated 4GB</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-[60px] h-[60px] rounded-full bg-green-100 dark:bg-green-900/30 inline-flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="bi bi-hdd-rack text-green-600 dark:text-green-400" style="font-size: 1.8rem;"></i>
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold mb-2">Server Rack</h5>
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">5 Unit</span>
                                </div>
                            </div>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Dell PowerEdge R740</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Xeon Gold Processor</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>RAM 128GB ECC</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Storage 4TB RAID 10</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-[60px] h-[60px] rounded-full bg-yellow-100 dark:bg-yellow-900/30 inline-flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="bi bi-router text-yellow-600 dark:text-yellow-400" style="font-size: 1.8rem;"></i>
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold mb-2">Network Device</h5>
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">15 Unit</span>
                                </div>
                            </div>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Cisco Catalyst Switch</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Mikrotik Router</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Firewall Appliance</li>
                                <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>Wireless Access Point</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Software & Tools -->
        <div class="mb-12">
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-6"><i class="bi bi-laptop mr-2 text-green-600"></i>Perangkat Software & Tools</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <h5 class="text-xl font-bold mb-4"><i class="bi bi-shield-lock mr-2 text-red-600"></i>Security Tools</h5>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Kali Linux</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Metasploit</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Burp Suite</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Wireshark</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Nmap</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">OWASP ZAP</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <h5 class="text-xl font-bold mb-4"><i class="bi bi-cloud mr-2 text-blue-600"></i>Development & VM</h5>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">VMware ESXi</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Docker</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">VirtualBox</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Git/GitHub</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">VS Code</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-sm">Ansible</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Fasilitas Pendukung -->
        <div>
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-6"><i class="bi bi-gear mr-2 text-yellow-600"></i>Fasilitas Pendukung</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center p-6 bg-gray-50 dark:bg-slate-800 rounded-xl">
                        <i class="bi bi-wifi text-blue-600 mb-3" style="font-size: 3rem;"></i>
                        <h6 class="text-lg font-bold">Internet Fiber 1 Gbps</h6>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center p-6 bg-gray-50 dark:bg-slate-800 rounded-xl">
                        <i class="bi bi-tv text-green-600 mb-3" style="font-size: 3rem;"></i>
                        <h6 class="text-lg font-bold">Proyektor HD</h6>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center p-6 bg-gray-50 dark:bg-slate-800 rounded-xl">
                        <i class="bi bi-snow text-cyan-600 mb-3" style="font-size: 3rem;"></i>
                        <h6 class="text-lg font-bold">AC Central</h6>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center p-6 bg-gray-50 dark:bg-slate-800 rounded-xl">
                        <i class="bi bi-lightning-charge text-yellow-600 mb-3" style="font-size: 3rem;"></i>
                        <h6 class="text-lg font-bold">UPS & Genset</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
