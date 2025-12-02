<?php
/**
 * Sarana & Prasarana Page - Pastel Theme
 * Display laboratory facilities and infrastructure
 */

$facilities = getServices('sarana');
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#88c9c9] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#a8e6cf] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-gray-400">Layanan</span></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#88c9c9]">Sarana & Prasarana</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#88c9c9]/10 border border-[#88c9c9]/30 rounded-full text-[#88c9c9] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-server mr-2"></i>Fasilitas
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Sarana & Prasarana
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Fasilitas dan infrastruktur laboratorium untuk mendukung kegiatan riset dan pembelajaran
            </p>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <?php if (!empty($facilities)): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $icons = ['server' => 'fas fa-server', 'desktop' => 'fas fa-desktop', 'network-wired' => 'fas fa-network-wired', 'hdd' => 'fas fa-hdd', 'microchip' => 'fas fa-microchip', 'wifi' => 'fas fa-wifi'];
            $colors = ['from-[#88c9c9] to-[#a7c5eb]', 'from-[#a8e6cf] to-[#b5c99a]', 'from-[#c3b1e1] to-[#a7c5eb]', 'from-[#f5c7a9] to-[#e8b4bc]', 'from-[#e8b4bc] to-[#c3b1e1]', 'from-[#a7c5eb] to-[#88c9c9]'];
            
            foreach ($facilities as $index => $facility): 
                $icon = $icons[$facility['icon'] ?? 'server'] ?? 'fas fa-cog';
                $color = $colors[$index % count($colors)];
            ?>
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <!-- Image/Icon Header -->
                <div class="relative h-48 bg-gradient-to-br <?= $color ?> overflow-hidden">
                    <?php if (!empty($facility['image'])): ?>
                    <img src="<?= uploadUrl('images/' . $facility['image']) ?>" alt="<?= htmlspecialchars($facility['title']) ?>" class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="<?= $icon ?> text-gray-800 text-6xl opacity-30"></i>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Icon Badge -->
                    <div class="absolute bottom-4 left-4 w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <i class="<?= $icon ?> text-gray-800 text-xl"></i>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#88c9c9] transition-colors">
                        <?= htmlspecialchars($facility['title']) ?>
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        <?= nl2br(htmlspecialchars($facility['description'])) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php else: ?>
        <!-- Default Facilities -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Server Room -->
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up">
                <div class="relative h-48 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-server text-gray-800 text-6xl opacity-30"></i>
                    </div>
                    <div class="absolute bottom-4 left-4 w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <i class="fas fa-server text-gray-800 text-xl"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#88c9c9] transition-colors">
                        Ruang Server
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Fasilitas ruang server dengan pendingin AC 24 jam dan sistem keamanan terpadu untuk menjaga performa optimal perangkat.
                    </p>
                </div>
            </div>
            
            <!-- Computer Lab -->
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
                <div class="relative h-48 bg-gradient-to-br from-[#a8e6cf] to-[#b5c99a] overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-desktop text-gray-800 text-6xl opacity-30"></i>
                    </div>
                    <div class="absolute bottom-4 left-4 w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <i class="fas fa-desktop text-gray-800 text-xl"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#88c9c9] transition-colors">
                        Lab Komputer
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Laboratorium dengan 30 unit komputer high-end dilengkapi software keamanan dan tools pentesting untuk praktikum dan penelitian.
                    </p>
                </div>
            </div>
            
            <!-- Network Equipment -->
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                <div class="relative h-48 bg-gradient-to-br from-[#c3b1e1] to-[#a7c5eb] overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-network-wired text-gray-800 text-6xl opacity-30"></i>
                    </div>
                    <div class="absolute bottom-4 left-4 w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <i class="fas fa-network-wired text-gray-800 text-xl"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#88c9c9] transition-colors">
                        Perangkat Jaringan
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Router, Switch, dan perangkat jaringan enterprise class untuk simulasi jaringan kompleks dan penelitian keamanan.
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Additional Info -->
        <div class="mt-16 cyber-card rounded-2xl p-8" data-aos="fade-up">
            <div class="text-center mb-8">
                <h3 class="font-display text-2xl font-bold text-white mb-2">
                    <i class="fas fa-tools text-[#88c9c9] mr-2"></i>
                    Perangkat & Software
                </h3>
                <p class="text-gray-400">Tools dan software yang tersedia di laboratorium</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <?php 
                $tools = [
                    ['name' => 'Kali Linux', 'icon' => 'fab fa-linux'],
                    ['name' => 'Wireshark', 'icon' => 'fas fa-network-wired'],
                    ['name' => 'Metasploit', 'icon' => 'fas fa-bug'],
                    ['name' => 'Nmap', 'icon' => 'fas fa-radar'],
                    ['name' => 'Burp Suite', 'icon' => 'fas fa-spider'],
                    ['name' => 'Nessus', 'icon' => 'fas fa-shield-alt'],
                    ['name' => 'OWASP ZAP', 'icon' => 'fas fa-bolt'],
                    ['name' => 'Snort', 'icon' => 'fas fa-eye'],
                    ['name' => 'GNS3', 'icon' => 'fas fa-project-diagram'],
                    ['name' => 'VMware', 'icon' => 'fas fa-cube'],
                    ['name' => 'Docker', 'icon' => 'fab fa-docker'],
                    ['name' => 'Git', 'icon' => 'fab fa-git-alt']
                ];
                foreach ($tools as $tool):
                ?>
                <div class="bg-[#2a3142] rounded-lg p-4 text-center hover:bg-[#3a4255] transition-colors">
                    <i class="<?= $tool['icon'] ?> text-[#88c9c9] text-2xl mb-2"></i>
                    <p class="text-white text-sm font-semibold"><?= $tool['name'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
