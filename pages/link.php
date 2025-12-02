<?php
/**
 * Link Page - Pastel Theme
 * Display external links
 */

$externalLinks = getExternalLinks();
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#a7c5eb] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#c3b1e1] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#88c9c9]">Link Terkait</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#a7c5eb]/10 border border-[#a7c5eb]/30 rounded-full text-[#a7c5eb] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-link mr-2"></i>Tautan
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Link Terkait
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Tautan ke situs web dan sumber daya terkait
            </p>
        </div>
    </div>
</section>

<!-- Links Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <?php if (!empty($externalLinks)): ?>
            <div class="grid md:grid-cols-2 gap-6">
                <?php 
                $colors = ['from-[#88c9c9] to-[#a7c5eb]', 'from-[#a8e6cf] to-[#b5c99a]', 'from-[#c3b1e1] to-[#a7c5eb]', 'from-[#f5c7a9] to-[#e8b4bc]', 'from-[#e8b4bc] to-[#c3b1e1]'];
                
                foreach ($externalLinks as $index => $link): 
                    $color = $colors[$index % count($colors)];
                    $icon = !empty($link['icon']) ? 'fas fa-' . $link['icon'] : 'fas fa-external-link-alt';
                ?>
                <a href="<?= htmlspecialchars($link['url']) ?>" target="_blank" 
                   class="cyber-card rounded-xl p-6 group hover:border-[#88c9c9]/50 transition-all block"
                   data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="flex items-center space-x-4">
                        <!-- Icon -->
                        <div class="w-14 h-14 bg-gradient-to-br <?= $color ?> rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="<?= $icon ?> text-gray-800 text-xl"></i>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1">
                            <h3 class="font-semibold text-white group-hover:text-[#88c9c9] transition-colors">
                                <?= htmlspecialchars($link['title']) ?>
                            </h3>
                            <?php if (!empty($link['description'])): ?>
                            <p class="text-gray-500 text-sm mt-1"><?= htmlspecialchars($link['description']) ?></p>
                            <?php endif; ?>
                            <span class="text-gray-600 text-xs mt-2 flex items-center">
                                <i class="fas fa-external-link-alt mr-1"></i>
                                <?= parse_url($link['url'], PHP_URL_HOST) ?>
                            </span>
                        </div>
                        
                        <!-- Arrow -->
                        <div class="text-gray-600 group-hover:text-[#88c9c9] group-hover:translate-x-2 transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            
            <?php else: ?>
            <!-- Default Links -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Polinema -->
                <a href="https://www.polinema.ac.id" target="_blank" 
                   class="cyber-card rounded-xl p-6 group hover:border-[#88c9c9]/50 transition-all block"
                   data-aos="fade-up">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-building text-gray-800 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-white group-hover:text-[#88c9c9] transition-colors">Polinema</h3>
                            <p class="text-gray-500 text-sm mt-1">Website resmi Politeknik Negeri Malang</p>
                            <span class="text-gray-600 text-xs mt-2 flex items-center">
                                <i class="fas fa-external-link-alt mr-1"></i>www.polinema.ac.id
                            </span>
                        </div>
                        <div class="text-gray-600 group-hover:text-[#88c9c9] group-hover:translate-x-2 transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
                
                <!-- SINTA -->
                <a href="https://sinta.kemdikbud.go.id" target="_blank" 
                   class="cyber-card rounded-xl p-6 group hover:border-[#88c9c9]/50 transition-all block"
                   data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#a8e6cf] to-[#b5c99a] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-book text-gray-800 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-white group-hover:text-[#88c9c9] transition-colors">SINTA</h3>
                            <p class="text-gray-500 text-sm mt-1">Science and Technology Index</p>
                            <span class="text-gray-600 text-xs mt-2 flex items-center">
                                <i class="fas fa-external-link-alt mr-1"></i>sinta.kemdikbud.go.id
                            </span>
                        </div>
                        <div class="text-gray-600 group-hover:text-[#88c9c9] group-hover:translate-x-2 transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
                
                <!-- SIM PKM -->
                <a href="https://simbelmawa.kemdikbud.go.id" target="_blank" 
                   class="cyber-card rounded-xl p-6 group hover:border-[#88c9c9]/50 transition-all block"
                   data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#c3b1e1] to-[#a7c5eb] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-graduation-cap text-gray-800 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-white group-hover:text-[#88c9c9] transition-colors">SIM PKM</h3>
                            <p class="text-gray-500 text-sm mt-1">Sistem Informasi Manajemen PKM</p>
                            <span class="text-gray-600 text-xs mt-2 flex items-center">
                                <i class="fas fa-external-link-alt mr-1"></i>simbelmawa.kemdikbud.go.id
                            </span>
                        </div>
                        <div class="text-gray-600 group-hover:text-[#88c9c9] group-hover:translate-x-2 transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
                
                <!-- JTI Polinema -->
                <a href="https://jti.polinema.ac.id" target="_blank" 
                   class="cyber-card rounded-xl p-6 group hover:border-[#88c9c9]/50 transition-all block"
                   data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#f5c7a9] to-[#e8b4bc] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-laptop-code text-gray-800 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-white group-hover:text-[#88c9c9] transition-colors">JTI Polinema</h3>
                            <p class="text-gray-500 text-sm mt-1">Jurusan Teknologi Informasi</p>
                            <span class="text-gray-600 text-xs mt-2 flex items-center">
                                <i class="fas fa-external-link-alt mr-1"></i>jti.polinema.ac.id
                            </span>
                        </div>
                        <div class="text-gray-600 group-hover:text-[#88c9c9] group-hover:translate-x-2 transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            
            <!-- Additional Resources -->
            <div class="mt-16" data-aos="fade-up">
                <h3 class="font-display text-xl font-bold text-white mb-6 text-center">
                    <i class="fas fa-book-reader text-[#88c9c9] mr-2"></i>
                    Sumber Belajar
                </h3>
                
                <div class="cyber-card rounded-2xl p-8">
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- OWASP -->
                        <a href="https://owasp.org" target="_blank" class="flex items-center space-x-3 text-gray-400 hover:text-[#88c9c9] transition-colors">
                            <i class="fas fa-shield-alt w-6"></i>
                            <span>OWASP Foundation</span>
                        </a>
                        
                        <!-- NIST -->
                        <a href="https://www.nist.gov/cybersecurity" target="_blank" class="flex items-center space-x-3 text-gray-400 hover:text-[#88c9c9] transition-colors">
                            <i class="fas fa-landmark w-6"></i>
                            <span>NIST Cybersecurity</span>
                        </a>
                        
                        <!-- CERT -->
                        <a href="https://www.cert.org" target="_blank" class="flex items-center space-x-3 text-gray-400 hover:text-[#88c9c9] transition-colors">
                            <i class="fas fa-certificate w-6"></i>
                            <span>CERT/CC</span>
                        </a>
                        
                        <!-- HackTheBox -->
                        <a href="https://www.hackthebox.com" target="_blank" class="flex items-center space-x-3 text-gray-400 hover:text-[#88c9c9] transition-colors">
                            <i class="fas fa-cube w-6"></i>
                            <span>HackTheBox</span>
                        </a>
                        
                        <!-- TryHackMe -->
                        <a href="https://tryhackme.com" target="_blank" class="flex items-center space-x-3 text-gray-400 hover:text-[#88c9c9] transition-colors">
                            <i class="fas fa-flag w-6"></i>
                            <span>TryHackMe</span>
                        </a>
                        
                        <!-- Cyber Threat Alliance -->
                        <a href="https://www.cyberthreatalliance.org" target="_blank" class="flex items-center space-x-3 text-gray-400 hover:text-[#88c9c9] transition-colors">
                            <i class="fas fa-users w-6"></i>
                            <span>Cyber Threat Alliance</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
