<?php
/**
 * Penelitian (Research) Archive Page - Pastel Theme
 * Display research documents with PDF download
 */

// Search parameter
$search = sanitize($_GET['q'] ?? '');

// Pagination parameters
$currentPageNum = max(1, (int)($_GET['p'] ?? 1));
$perPage = 10;

// Build query
$conditions = "is_active = TRUE AND category = 'penelitian'";
$params = [];

if (!empty($search)) {
    $conditions .= " AND (title ILIKE ? OR description ILIKE ? OR author ILIKE ? OR keywords ILIKE ?)";
    $searchParam = "%$search%";
    $params = array_merge($params, [$searchParam, $searchParam, $searchParam, $searchParam]);
}

// Get total count
$totalSql = "SELECT COUNT(*) as total FROM documents WHERE $conditions";
$totalResult = db()->fetch($totalSql, $params);
$totalItems = $totalResult['total'] ?? 0;

// Get documents
$params[] = $perPage;
$params[] = ($currentPageNum - 1) * $perPage;

$documents = db()->fetchAll(
    "SELECT * FROM documents WHERE $conditions ORDER BY publication_date DESC, created_at DESC LIMIT ? OFFSET ?",
    $params
);

// Get stats
$totalDownloads = db()->fetch("SELECT COALESCE(SUM(download_count), 0) as total FROM documents WHERE is_active = TRUE AND category = 'penelitian'");
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#88c9c9] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#c3b1e1] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-gray-400">Arsip</span></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#88c9c9]">Penelitian</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#88c9c9]/10 border border-[#88c9c9]/30 rounded-full text-[#88c9c9] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-flask mr-2"></i>Penelitian
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Arsip Penelitian
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Koleksi dokumen penelitian di bidang keamanan siber
            </p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-8" data-aos="fade-up" data-aos-delay="300">
            <div class="bg-[#2a3142] rounded-xl p-4 border border-[#3a4255]">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-[#88c9c9]/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-pdf text-[#88c9c9]"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white"><?= $totalItems ?></p>
                        <p class="text-gray-500 text-xs">Dokumen</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#2a3142] rounded-xl p-4 border border-[#3a4255]">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-[#a8e6cf]/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-download text-[#a8e6cf]"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white"><?= $totalDownloads['total'] ?? 0 ?></p>
                        <p class="text-gray-500 text-xs">Download</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#2a3142] rounded-xl p-4 border border-[#3a4255] hidden md:block">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-[#c3b1e1]/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-flask text-[#c3b1e1]"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">Research</p>
                        <p class="text-gray-500 text-xs">Kategori</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Search Box -->
        <div class="mt-8 max-w-xl" data-aos="fade-up" data-aos-delay="400">
            <form action="<?= baseUrl() ?>" method="GET" class="relative">
                <input type="hidden" name="page" value="penelitian">
                <input type="text" name="q" value="<?= htmlspecialchars($search) ?>" 
                       placeholder="Cari dokumen penelitian..."
                       class="w-full px-5 py-4 pl-12 bg-[#2a3142] border border-[#3a4255] rounded-xl text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-[#88c9c9] text-gray-800 rounded-lg hover:bg-[#a8e6cf] transition-colors">
                    Cari
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Documents Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <?php if (!empty($search)): ?>
        <div class="mb-8 flex items-center justify-between">
            <p class="text-gray-400">
                Menampilkan hasil untuk: <span class="text-[#88c9c9] font-semibold">"<?= htmlspecialchars($search) ?>"</span>
                <span class="text-gray-500">(<?= $totalItems ?> hasil)</span>
            </p>
            <a href="<?= baseUrl('?page=penelitian') ?>" class="text-[#88c9c9] hover:text-[#a8e6cf] text-sm">
                <i class="fas fa-times mr-1"></i>Reset
            </a>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($documents)): ?>
        <div class="space-y-4">
            <?php foreach ($documents as $index => $doc): ?>
            <div class="cyber-card rounded-xl p-6 hover:border-[#88c9c9]/50 transition-all" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                <div class="flex flex-col md:flex-row md:items-center gap-6">
                    <!-- Document Icon -->
                    <div class="flex-shrink-0">
                        <div class="w-16 h-20 bg-gradient-to-br from-[#e8b4bc] to-[#c3b1e1] rounded-lg flex items-center justify-center shadow-lg shadow-[#e8b4bc]/20">
                            <i class="fas fa-file-pdf text-gray-800 text-2xl"></i>
                        </div>
                    </div>
                    
                    <!-- Document Info -->
                    <div class="flex-1">
                        <h3 class="font-display text-lg font-bold text-white mb-2 hover:text-[#88c9c9] transition-colors">
                            <?= htmlspecialchars($doc['title']) ?>
                        </h3>
                        
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-3">
                            <?php if (!empty($doc['author'])): ?>
                            <span><i class="fas fa-user mr-1"></i><?= htmlspecialchars($doc['author']) ?></span>
                            <?php endif; ?>
                            <?php if (!empty($doc['publication_date'])): ?>
                            <span><i class="fas fa-calendar mr-1"></i><?= formatDate($doc['publication_date'], 'd M Y') ?></span>
                            <?php endif; ?>
                            <?php if (!empty($doc['file_size'])): ?>
                            <span><i class="fas fa-file mr-1"></i><?= formatFileSize($doc['file_size']) ?></span>
                            <?php endif; ?>
                            <span><i class="fas fa-download mr-1"></i><?= $doc['download_count'] ?> download</span>
                        </div>
                        
                        <?php if (!empty($doc['description'])): ?>
                        <p class="text-gray-400 text-sm mb-3"><?= htmlspecialchars(truncateText($doc['description'], 200)) ?></p>
                        <?php endif; ?>
                        
                        <?php if (!empty($doc['keywords'])): ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach (explode(',', $doc['keywords']) as $keyword): ?>
                            <span class="px-2 py-1 bg-[#2a3142] text-gray-400 text-xs rounded">
                                <?= htmlspecialchars(trim($keyword)) ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Download Button -->
                    <div class="flex-shrink-0">
                        <a href="<?= baseUrl('?page=download&id=' . $doc['id']) ?>" 
                           class="cyber-btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-semibold rounded-xl hover:opacity-90 transition-all shadow-lg shadow-[#88c9c9]/20">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php
        $baseUrlPagination = baseUrl('?page=penelitian' . (!empty($search) ? '&q=' . urlencode($search) : ''));
        $pagination = paginate($totalItems, $currentPageNum, $perPage);
        echo renderPagination($pagination, $baseUrlPagination);
        ?>
        
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-20">
            <div class="w-24 h-24 bg-[#2a3142] rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-file-alt text-gray-600 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-400 mb-2">
                <?= !empty($search) ? 'Tidak ada hasil ditemukan' : 'Belum ada dokumen penelitian' ?>
            </h3>
            <p class="text-gray-500">
                <?= !empty($search) ? 'Coba gunakan kata kunci yang berbeda' : 'Dokumen penelitian akan segera ditampilkan' ?>
            </p>
        </div>
        <?php endif; ?>
    </div>
</section>
