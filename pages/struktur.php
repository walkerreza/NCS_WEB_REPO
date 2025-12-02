<?php
/**
 * Struktur Organisasi Page - Pastel Theme
 * Display organization structure
 */

$structure = getOrganizationStructure();
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#88c9c9] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#a7c5eb] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-gray-400">Profil</span></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#88c9c9]">Struktur Organisasi</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#88c9c9]/10 border border-[#88c9c9]/30 rounded-full text-[#88c9c9] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-sitemap mr-2"></i>Tim Kami
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Struktur Organisasi
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Tim yang berdedikasi dalam pengembangan keamanan siber
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <?php if (!empty($structure)): ?>
            <!-- Organization Chart Style -->
            <div class="space-y-8">
                <?php 
                $isFirst = true;
                foreach ($structure as $index => $member): 
                ?>
                <div class="<?= $isFirst ? 'max-w-md mx-auto' : '' ?>" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="cyber-card rounded-2xl p-6 text-center group hover:border-[#88c9c9]/50 transition-all">
                        <!-- Photo -->
                        <div class="relative w-32 h-32 mx-auto mb-4">
                            <?php if (!empty($member['photo'])): ?>
                            <img src="<?= uploadUrl('images/' . $member['photo']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="w-full h-full object-cover rounded-full border-4 border-[#3a4255] group-hover:border-[#88c9c9] transition-colors">
                            <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-full flex items-center justify-center border-4 border-[#3a4255] group-hover:border-[#88c9c9] transition-colors">
                                <i class="fas fa-user text-gray-800 text-4xl"></i>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Status Indicator -->
                            <span class="absolute bottom-2 right-2 w-4 h-4 bg-[#a8e6cf] rounded-full border-2 border-[#1e2433]"></span>
                        </div>
                        
                        <!-- Info -->
                        <h3 class="font-display text-xl font-bold text-white mb-1 group-hover:text-[#88c9c9] transition-colors">
                            <?= htmlspecialchars($member['name']) ?>
                        </h3>
                        <p class="text-[#88c9c9] font-semibold mb-3"><?= htmlspecialchars($member['position']) ?></p>
                        
                        <!-- Contact -->
                        <div class="flex items-center justify-center space-x-4 text-gray-500 text-sm">
                            <?php if (!empty($member['email'])): ?>
                            <a href="mailto:<?= htmlspecialchars($member['email']) ?>" class="hover:text-[#88c9c9] transition-colors">
                                <i class="fas fa-envelope mr-1"></i><?= htmlspecialchars($member['email']) ?>
                            </a>
                            <?php endif; ?>
                            <?php if (!empty($member['phone'])): ?>
                            <span class="hidden md:inline">|</span>
                            <span class="hidden md:inline"><i class="fas fa-phone mr-1"></i><?= htmlspecialchars($member['phone']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($isFirst && count($structure) > 1): ?>
                    <!-- Connector Line -->
                    <div class="w-0.5 h-8 bg-[#3a4255] mx-auto"></div>
                    <div class="w-3/4 h-0.5 bg-[#3a4255] mx-auto"></div>
                    <div class="flex justify-around w-3/4 mx-auto">
                        <?php for ($i = 1; $i < min(count($structure), 4); $i++): ?>
                        <div class="w-0.5 h-8 bg-[#3a4255]"></div>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php 
                    if ($isFirst && count($structure) > 1) {
                        echo '</div><div class="grid md:grid-cols-' . min(count($structure) - 1, 3) . ' gap-6 mt-0">';
                    }
                    $isFirst = false;
                ?>
                
                <?php endforeach; ?>
            </div>
            
            <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-24 h-24 bg-[#2a3142] rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-gray-600 text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-400 mb-2">Belum ada data</h3>
                <p class="text-gray-500">Struktur organisasi akan segera ditampilkan</p>
            </div>
            <?php endif; ?>
            
            <!-- Additional Info -->
            <div class="mt-16 cyber-card rounded-2xl p-8" data-aos="fade-up">
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="w-16 h-16 bg-[#88c9c9]/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-flask text-[#88c9c9] text-2xl"></i>
                        </div>
                        <h4 class="font-display font-bold text-white mb-2">Riset & Inovasi</h4>
                        <p class="text-gray-400 text-sm">Fokus pada penelitian dan pengembangan teknologi keamanan</p>
                    </div>
                    <div>
                        <div class="w-16 h-16 bg-[#c3b1e1]/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-[#c3b1e1] text-2xl"></i>
                        </div>
                        <h4 class="font-display font-bold text-white mb-2">Pengajaran</h4>
                        <p class="text-gray-400 text-sm">Membimbing mahasiswa dalam bidang keamanan siber</p>
                    </div>
                    <div>
                        <div class="w-16 h-16 bg-[#a8e6cf]/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-[#a8e6cf] text-2xl"></i>
                        </div>
                        <h4 class="font-display font-bold text-white mb-2">Kerjasama</h4>
                        <p class="text-gray-400 text-sm">Membangun kemitraan dengan industri dan akademisi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
