<?php
/**
 * Roadmap Page
 * Display lab development milestones and future plans
 */

$roadmapItems = getRoadmap();

// Group by year
$roadmapByYear = [];
foreach ($roadmapItems as $item) {
    $year = $item['year'];
    if (!isset($roadmapByYear[$year])) {
        $roadmapByYear[$year] = [];
    }
    $roadmapByYear[$year][] = $item;
}
?>

<!-- Page Header -->
<section class="py-16 bg-gradient-to-b from-[#171c28] to-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <span class="inline-block px-4 py-2 bg-[#a7c5eb]/10 border border-[#a7c5eb]/30 rounded-full text-[#a7c5eb] text-sm font-semibold mb-4" data-aos="fade-down">
                <i class="fas fa-road mr-2"></i>Peta Jalan
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">
                Roadmap <span class="text-[#a7c5eb]">NCS Laboratory</span>
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="100">
                Perjalanan pengembangan dan milestone penting NCS Laboratory
            </p>
        </div>
    </div>
</section>

<!-- Roadmap Timeline -->
<section class="py-16 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <?php if (!empty($roadmapByYear)): ?>
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-[#88c9c9] via-[#a7c5eb] to-[#c3b1e1] transform md:-translate-x-1/2"></div>
                
                <?php $index = 0; foreach ($roadmapByYear as $year => $items): ?>
                <!-- Year Header -->
                <div class="relative flex items-center mb-12 mt-8" data-aos="fade-up">
                    <!-- Year Badge - Centered with background to cover line -->
                    <div class="absolute left-8 md:left-1/2 transform md:-translate-x-1/2 flex items-center justify-center">
                        <div class="px-8 py-3 bg-[#1e2433] rounded-2xl">
                            <div class="px-6 py-2 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-bold text-xl rounded-full shadow-lg shadow-[#88c9c9]/20">
                                <?= $year ?>
                            </div>
                        </div>
                    </div>
                    <!-- Spacer for mobile -->
                    <div class="ml-20 md:hidden h-12"></div>
                </div>
                
                <?php foreach ($items as $item): 
                    $isLeft = $index % 2 == 0;
                    $statusColors = [
                        'completed' => 'from-[#a8e6cf] to-[#88c9c9]',
                        'in_progress' => 'from-[#f5c7a9] to-[#e8b4bc]',
                        'upcoming' => 'from-[#a7c5eb] to-[#c3b1e1]'
                    ];
                    $statusLabels = [
                        'completed' => 'Selesai',
                        'in_progress' => 'Berjalan',
                        'upcoming' => 'Mendatang'
                    ];
                    $statusIcons = [
                        'completed' => 'check-circle',
                        'in_progress' => 'spinner fa-spin',
                        'upcoming' => 'clock'
                    ];
                ?>
                <!-- Timeline Item -->
                <div class="relative flex items-start mb-8 <?= $isLeft ? 'md:flex-row' : 'md:flex-row-reverse' ?>" data-aos="fade-<?= $isLeft ? 'right' : 'left' ?>">
                    <!-- Dot -->
                    <div class="absolute left-8 md:left-1/2 transform md:-translate-x-1/2 w-4 h-4 bg-gradient-to-br <?= $statusColors[$item['status']] ?> rounded-full border-4 border-[#1e2433] z-10"></div>
                    
                    <!-- Content -->
                    <div class="ml-20 md:ml-0 md:w-1/2 <?= $isLeft ? 'md:pr-12' : 'md:pl-12' ?>">
                        <div class="cyber-card rounded-2xl p-6 relative">
                            <!-- Arrow -->
                            <div class="hidden md:block absolute top-6 <?= $isLeft ? 'right-0 translate-x-2' : 'left-0 -translate-x-2' ?>">
                                <div class="w-4 h-4 bg-[#242b3d] border-t border-r border-[#3a4255] transform <?= $isLeft ? 'rotate-45' : '-rotate-[135deg]' ?>"></div>
                            </div>
                            
                            <!-- Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br <?= $statusColors[$item['status']] ?> rounded-xl flex items-center justify-center">
                                        <i class="fas fa-<?= htmlspecialchars($item['icon'] ?? 'flag') ?> text-gray-800 text-lg"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-display text-lg font-bold text-white"><?= htmlspecialchars($item['title']) ?></h3>
                                        <?php if (!empty($item['quarter'])): ?>
                                        <span class="text-gray-500 text-sm"><?= htmlspecialchars($item['quarter']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-gradient-to-r <?= $statusColors[$item['status']] ?> text-gray-800 text-xs font-semibold rounded-full">
                                    <i class="fas fa-<?= $statusIcons[$item['status']] ?> mr-1"></i>
                                    <?= $statusLabels[$item['status']] ?>
                                </span>
                            </div>
                            
                            <!-- Description -->
                            <p class="text-gray-400 text-sm leading-relaxed">
                                <?= htmlspecialchars($item['description']) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $index++; endforeach; ?>
                <?php endforeach; ?>
                
            </div>
            <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-[#2a3142] rounded-full flex items-center justify-center">
                    <i class="fas fa-road text-[#a7c5eb] text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Roadmap Belum Tersedia</h3>
                <p class="text-gray-400">Data roadmap sedang dalam proses pengembangan.</p>
            </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>

<!-- Future Vision -->
<section class="py-16 bg-gradient-to-b from-[#1e2433] to-[#171c28]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="cyber-card rounded-2xl p-8 text-center" data-aos="fade-up">
                <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-2xl flex items-center justify-center">
                    <i class="fas fa-rocket text-gray-800 text-3xl"></i>
                </div>
                <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-4">
                    Visi Masa Depan
                </h2>
                <p class="text-gray-400 leading-relaxed max-w-2xl mx-auto">
                    NCS Laboratory berkomitmen untuk terus berkembang menjadi pusat unggulan keamanan siber di Indonesia. 
                    Dengan fokus pada inovasi, kolaborasi, dan pengembangan SDM, kami bertekad menghadirkan solusi 
                    keamanan digital yang terdepan untuk mendukung transformasi digital nasional.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a href="<?= baseUrl('?page=fokus') ?>" class="cyber-btn px-6 py-3 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-semibold rounded-xl hover:opacity-90 transition-all">
                        <i class="fas fa-crosshairs mr-2"></i>Bidang Fokus
                    </a>
                    <a href="<?= baseUrl('?page=visi-misi') ?>" class="cyber-btn px-6 py-3 bg-transparent border-2 border-[#88c9c9]/50 text-[#88c9c9] font-semibold rounded-xl hover:bg-[#88c9c9]/10 transition-all">
                        <i class="fas fa-bullseye mr-2"></i>Visi & Misi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

