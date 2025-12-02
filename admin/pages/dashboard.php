<?php
/**
 * Admin Dashboard - Responsive
 */

// Get statistics
$stats = [
    'documents' => countItems('documents', 'is_active = TRUE'),
    'gallery' => countItems('gallery', 'is_active = TRUE'),
    'agenda' => countItems('agenda', 'is_active = TRUE'),
    'comments' => countItems('comments', 'is_read = FALSE')
];

// Get recent items
$recentComments = db()->fetchAll("SELECT * FROM comments ORDER BY created_at DESC LIMIT 5");
$recentDocuments = db()->fetchAll("SELECT * FROM documents WHERE is_active = TRUE ORDER BY created_at DESC LIMIT 5");
?>

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 sm:mb-8 gap-4">
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-white">Dashboard</h1>
        <p class="text-gray-400 text-sm mt-1">Selamat datang di panel administrasi NCS Laboratory</p>
    </div>
    <div class="text-gray-400 text-sm">
        <i class="fas fa-calendar-alt mr-1"></i><?= formatDate(date('Y-m-d'), 'd F Y') ?>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-6 sm:mb-8">
    <!-- Documents -->
    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs sm:text-sm">Total Dokumen</p>
                <p class="text-2xl sm:text-3xl font-bold text-white mt-1"><?= $stats['documents'] ?></p>
            </div>
            <div class="w-10 h-10 sm:w-14 sm:h-14 bg-pastel-teal/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-file-pdf text-pastel-teal text-lg sm:text-2xl"></i>
            </div>
        </div>
        <a href="<?= baseUrl('admin/?p=documents') ?>" class="text-pastel-teal text-xs sm:text-sm mt-3 sm:mt-4 inline-flex items-center hover:opacity-80">
            Kelola <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Gallery -->
    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs sm:text-sm">Total Galeri</p>
                <p class="text-2xl sm:text-3xl font-bold text-white mt-1"><?= $stats['gallery'] ?></p>
            </div>
            <div class="w-10 h-10 sm:w-14 sm:h-14 bg-pastel-mint/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-images text-pastel-mint text-lg sm:text-2xl"></i>
            </div>
        </div>
        <a href="<?= baseUrl('admin/?p=gallery') ?>" class="text-pastel-mint text-xs sm:text-sm mt-3 sm:mt-4 inline-flex items-center hover:opacity-80">
            Kelola <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Agenda -->
    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs sm:text-sm">Total Agenda</p>
                <p class="text-2xl sm:text-3xl font-bold text-white mt-1"><?= $stats['agenda'] ?></p>
            </div>
            <div class="w-10 h-10 sm:w-14 sm:h-14 bg-pastel-lavender/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-calendar-alt text-pastel-lavender text-lg sm:text-2xl"></i>
            </div>
        </div>
        <a href="<?= baseUrl('admin/?p=agenda') ?>" class="text-pastel-lavender text-xs sm:text-sm mt-3 sm:mt-4 inline-flex items-center hover:opacity-80">
            Kelola <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Unread Messages -->
    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs sm:text-sm">Pesan Baru</p>
                <p class="text-2xl sm:text-3xl font-bold text-white mt-1"><?= $stats['comments'] ?></p>
            </div>
            <div class="w-10 h-10 sm:w-14 sm:h-14 bg-pastel-rose/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-envelope text-pastel-rose text-lg sm:text-2xl"></i>
            </div>
        </div>
        <a href="<?= baseUrl('admin/?p=comments') ?>" class="text-pastel-rose text-xs sm:text-sm mt-3 sm:mt-4 inline-flex items-center hover:opacity-80">
            Lihat <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
    <!-- Recent Messages -->
    <div class="bg-gray-800 rounded-xl border border-gray-700">
        <div class="p-4 sm:p-6 border-b border-gray-700">
            <h2 class="text-base sm:text-lg font-semibold text-white flex items-center">
                <i class="fas fa-envelope text-pastel-teal mr-2"></i>Pesan Terbaru
            </h2>
        </div>
        <div class="p-4 sm:p-6">
            <?php if (!empty($recentComments)): ?>
            <div class="space-y-3 sm:space-y-4">
                <?php foreach ($recentComments as $comment): ?>
                <div class="flex items-start space-x-3 sm:space-x-4 p-2 sm:p-3 bg-gray-700/30 rounded-lg">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-pastel-teal rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-gray-800 font-semibold text-sm"><?= strtoupper(substr($comment['name'], 0, 1)) ?></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <p class="text-white font-medium text-xs sm:text-sm truncate"><?= htmlspecialchars($comment['name']) ?></p>
                            <?php if (!$comment['is_read']): ?>
                            <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded flex-shrink-0">Baru</span>
                            <?php endif; ?>
                        </div>
                        <p class="text-gray-400 text-xs sm:text-sm truncate"><?= htmlspecialchars(truncateText($comment['message'], 40)) ?></p>
                        <p class="text-gray-500 text-xs mt-1"><?= formatDate($comment['created_at'], 'd M Y H:i') ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="text-gray-500 text-center py-8">Belum ada pesan.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Recent Documents -->
    <div class="bg-gray-800 rounded-xl border border-gray-700">
        <div class="p-4 sm:p-6 border-b border-gray-700">
            <h2 class="text-base sm:text-lg font-semibold text-white flex items-center">
                <i class="fas fa-file-pdf text-pastel-mint mr-2"></i>Dokumen Terbaru
            </h2>
        </div>
        <div class="p-4 sm:p-6">
            <?php if (!empty($recentDocuments)): ?>
            <div class="space-y-3 sm:space-y-4">
                <?php foreach ($recentDocuments as $doc): ?>
                <div class="flex items-center space-x-3 sm:space-x-4 p-2 sm:p-3 bg-gray-700/30 rounded-lg">
                    <div class="w-8 h-10 sm:w-10 sm:h-12 bg-pastel-rose/20 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-pdf text-pastel-rose text-sm sm:text-base"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-medium text-xs sm:text-sm truncate"><?= htmlspecialchars($doc['title']) ?></p>
                        <p class="text-gray-500 text-xs mt-1">
                            <span class="capitalize"><?= $doc['category'] ?></span> • 
                            <?= formatDate($doc['created_at'], 'd M Y') ?>
                        </p>
                    </div>
                    <span class="text-gray-500 text-xs hidden sm:block">
                        <i class="fas fa-download mr-1"></i><?= $doc['download_count'] ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="text-gray-500 text-center py-8">Belum ada dokumen.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-6 sm:mt-8 bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <h2 class="text-base sm:text-lg font-semibold text-white mb-4">
        <i class="fas fa-bolt text-yellow-400 mr-2"></i>Aksi Cepat
    </h2>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">
        <a href="<?= baseUrl('admin/?p=documents&action=add') ?>" class="flex flex-col sm:flex-row items-center justify-center p-3 sm:p-4 bg-gray-700/50 rounded-lg hover:bg-gray-700 transition-colors text-gray-300 hover:text-white text-center">
            <i class="fas fa-plus sm:mr-2 mb-1 sm:mb-0"></i>
            <span class="text-xs sm:text-sm">Dokumen</span>
        </a>
        <a href="<?= baseUrl('admin/?p=gallery&action=add') ?>" class="flex flex-col sm:flex-row items-center justify-center p-3 sm:p-4 bg-gray-700/50 rounded-lg hover:bg-gray-700 transition-colors text-gray-300 hover:text-white text-center">
            <i class="fas fa-plus sm:mr-2 mb-1 sm:mb-0"></i>
            <span class="text-xs sm:text-sm">Galeri</span>
        </a>
        <a href="<?= baseUrl('admin/?p=agenda&action=add') ?>" class="flex flex-col sm:flex-row items-center justify-center p-3 sm:p-4 bg-gray-700/50 rounded-lg hover:bg-gray-700 transition-colors text-gray-300 hover:text-white text-center">
            <i class="fas fa-plus sm:mr-2 mb-1 sm:mb-0"></i>
            <span class="text-xs sm:text-sm">Agenda</span>
        </a>
        <a href="<?= baseUrl('admin/?p=settings') ?>" class="flex flex-col sm:flex-row items-center justify-center p-3 sm:p-4 bg-gray-700/50 rounded-lg hover:bg-gray-700 transition-colors text-gray-300 hover:text-white text-center">
            <i class="fas fa-cog sm:mr-2 mb-1 sm:mb-0"></i>
            <span class="text-xs sm:text-sm">Settings</span>
        </a>
    </div>
</div>
