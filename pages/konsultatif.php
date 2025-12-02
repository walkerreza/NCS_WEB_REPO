<?php
/**
 * Layanan Konsultatif Page - Pastel Theme
 * Display consultation services
 */

$consultServices = getServices('konsultatif');
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#a8e6cf] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#88c9c9] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-gray-400">Layanan</span></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#a8e6cf]">Konsultatif</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#a8e6cf]/10 border border-[#a8e6cf]/30 rounded-full text-[#a8e6cf] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-headset mr-2"></i>Konsultasi
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Layanan Konsultatif
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Layanan konsultasi profesional di bidang keamanan jaringan dan siber
            </p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <?php if (!empty($consultServices)): ?>
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <?php 
            $icons = ['shield-alt' => 'fas fa-shield-alt', 'user-shield' => 'fas fa-user-shield', 'bug' => 'fas fa-bug', 'headset' => 'fas fa-headset', 'graduation-cap' => 'fas fa-graduation-cap', 'certificate' => 'fas fa-certificate'];
            $colors = ['from-[#a8e6cf] to-[#88c9c9]', 'from-[#88c9c9] to-[#a7c5eb]', 'from-[#f5c7a9] to-[#e8b4bc]', 'from-[#c3b1e1] to-[#a7c5eb]'];
            
            foreach ($consultServices as $index => $service): 
                $icon = $icons[$service['icon'] ?? 'headset'] ?? 'fas fa-cog';
                $color = $colors[$index % count($colors)];
            ?>
            <div class="cyber-card rounded-2xl p-8 group hover:border-[#a8e6cf]/50 transition-all" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="flex items-start space-x-6">
                    <!-- Icon -->
                    <div class="w-20 h-20 bg-gradient-to-br <?= $color ?> rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                        <i class="<?= $icon ?> text-gray-800 text-3xl"></i>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#a8e6cf] transition-colors">
                            <?= htmlspecialchars($service['title']) ?>
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            <?= nl2br(htmlspecialchars($service['description'])) ?>
                        </p>
                        
                        <a href="#contact" class="inline-flex items-center mt-4 text-[#a8e6cf] hover:text-[#88c9c9] transition-colors">
                            Konsultasi Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php else: ?>
        <!-- Default Services -->
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <!-- Network Security Audit -->
            <div class="cyber-card rounded-2xl p-8 group hover:border-[#a8e6cf]/50 transition-all" data-aos="fade-up">
                <div class="flex items-start space-x-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#a8e6cf] to-[#88c9c9] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                        <i class="fas fa-shield-alt text-gray-800 text-3xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#a8e6cf] transition-colors">
                            Audit Keamanan Jaringan
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Layanan audit menyeluruh untuk mengidentifikasi kerentanan dan risiko keamanan pada infrastruktur jaringan Anda.
                        </p>
                        <a href="#contact" class="inline-flex items-center mt-4 text-[#a8e6cf] hover:text-[#88c9c9] transition-colors">
                            Konsultasi Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Penetration Testing -->
            <div class="cyber-card rounded-2xl p-8 group hover:border-[#a8e6cf]/50 transition-all" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-start space-x-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#f5c7a9] to-[#e8b4bc] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                        <i class="fas fa-bug text-gray-800 text-3xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#a8e6cf] transition-colors">
                            Penetration Testing
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Pengujian keamanan sistem secara menyeluruh untuk mengidentifikasi dan mengeksploitasi kerentanan sebelum pihak tidak bertanggung jawab melakukannya.
                        </p>
                        <a href="#contact" class="inline-flex items-center mt-4 text-[#a8e6cf] hover:text-[#88c9c9] transition-colors">
                            Konsultasi Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Training -->
            <div class="cyber-card rounded-2xl p-8 group hover:border-[#a8e6cf]/50 transition-all" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-start space-x-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                        <i class="fas fa-graduation-cap text-gray-800 text-3xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#a8e6cf] transition-colors">
                            Pelatihan Cyber Security
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Program pelatihan komprehensif untuk meningkatkan kemampuan tim Anda dalam menangani ancaman keamanan siber.
                        </p>
                        <a href="#contact" class="inline-flex items-center mt-4 text-[#a8e6cf] hover:text-[#88c9c9] transition-colors">
                            Konsultasi Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Incident Response -->
            <div class="cyber-card rounded-2xl p-8 group hover:border-[#a8e6cf]/50 transition-all" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-start space-x-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#c3b1e1] to-[#a7c5eb] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                        <i class="fas fa-first-aid text-gray-800 text-3xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#a8e6cf] transition-colors">
                            Incident Response
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Bantuan cepat dalam menangani insiden keamanan siber, investigasi forensik digital, dan pemulihan sistem.
                        </p>
                        <a href="#contact" class="inline-flex items-center mt-4 text-[#a8e6cf] hover:text-[#88c9c9] transition-colors">
                            Konsultasi Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Process Section -->
        <div class="cyber-card rounded-2xl p-8 md:p-12" data-aos="fade-up">
            <div class="text-center mb-12">
                <h3 class="font-display text-2xl font-bold text-white mb-2">
                    <i class="fas fa-project-diagram text-[#a8e6cf] mr-2"></i>
                    Alur Konsultasi
                </h3>
                <p class="text-gray-400">Proses layanan konsultatif kami</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#88c9c9]/20">
                        <span class="font-display text-2xl font-bold text-gray-800">1</span>
                    </div>
                    <h4 class="font-semibold text-white mb-2">Konsultasi Awal</h4>
                    <p class="text-gray-500 text-sm">Diskusi kebutuhan dan analisis awal permasalahan</p>
                    
                    <!-- Connector -->
                    <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-[#88c9c9] to-[#a8e6cf] -translate-x-8"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#a8e6cf] to-[#b5c99a] rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#a8e6cf]/20">
                        <span class="font-display text-2xl font-bold text-gray-800">2</span>
                    </div>
                    <h4 class="font-semibold text-white mb-2">Assessment</h4>
                    <p class="text-gray-500 text-sm">Evaluasi mendalam terhadap sistem dan infrastruktur</p>
                    
                    <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-[#a8e6cf] to-[#c3b1e1] -translate-x-8"></div>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#c3b1e1] to-[#a7c5eb] rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#c3b1e1]/20">
                        <span class="font-display text-2xl font-bold text-gray-800">3</span>
                    </div>
                    <h4 class="font-semibold text-white mb-2">Implementasi</h4>
                    <p class="text-gray-500 text-sm">Penerapan solusi dan rekomendasi keamanan</p>
                    
                    <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-[#c3b1e1] to-[#f5c7a9] -translate-x-8"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#f5c7a9] to-[#e8b4bc] rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#f5c7a9]/20">
                        <span class="font-display text-2xl font-bold text-gray-800">4</span>
                    </div>
                    <h4 class="font-semibold text-white mb-2">Monitoring</h4>
                    <p class="text-gray-500 text-sm">Pemantauan berkelanjutan dan evaluasi hasil</p>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="mt-16 text-center" data-aos="fade-up">
            <h3 class="font-display text-2xl font-bold text-white mb-4">
                Butuh Bantuan Keamanan Siber?
            </h3>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                Tim ahli kami siap membantu mengamankan infrastruktur digital Anda. Hubungi kami untuk konsultasi gratis.
            </p>
            <a href="#contact" class="cyber-btn inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#a8e6cf] to-[#88c9c9] text-gray-800 font-semibold rounded-xl hover:opacity-90 transition-all shadow-lg shadow-[#a8e6cf]/20">
                <i class="fas fa-comments mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>
