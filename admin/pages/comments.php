<?php
/**
 * Admin Comments/Messages Management
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';

// Mark as read
if ($action === 'read' && $id > 0) {
    db()->query("UPDATE comments SET is_read = TRUE WHERE id = ?", [$id]);
    $message = 'Pesan ditandai sudah dibaca.';
    $action = 'list';
}

// Delete message
if ($action === 'delete' && $id > 0) {
    db()->query("DELETE FROM comments WHERE id = ?", [$id]);
    $message = 'Pesan berhasil dihapus.';
    $action = 'list';
}

// Get all messages
$filter = sanitize($_GET['filter'] ?? '');
$conditions = "1=1";
if ($filter === 'unread') {
    $conditions = "is_read = FALSE";
} elseif ($filter === 'read') {
    $conditions = "is_read = TRUE";
}

$comments = db()->fetchAll("SELECT * FROM comments WHERE $conditions ORDER BY created_at DESC");
$unreadCount = countItems('comments', 'is_read = FALSE');
?>

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-white">Pesan</h1>
        <p class="text-gray-400 text-sm mt-1">Kelola pesan dari pengunjung website</p>
    </div>
    <div class="flex items-center">
        <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm">
            <?= $unreadCount ?> Belum Dibaca
        </span>
    </div>
</div>

<!-- Messages -->
<?php if ($message): ?>
<div class="alert-dismissible bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i><?= htmlspecialchars($message) ?>
</div>
<?php endif; ?>

<!-- Filter -->
<div class="flex flex-wrap gap-2 mb-6">
    <a href="<?= baseUrl('admin/?p=comments') ?>" class="px-3 sm:px-4 py-2 rounded-lg text-sm <?= empty($filter) ? 'bg-cyan-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' ?>">
        Semua
    </a>
    <a href="<?= baseUrl('admin/?p=comments&filter=unread') ?>" class="px-3 sm:px-4 py-2 rounded-lg text-sm <?= $filter === 'unread' ? 'bg-cyan-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' ?>">
        Belum Dibaca
    </a>
    <a href="<?= baseUrl('admin/?p=comments&filter=read') ?>" class="px-3 sm:px-4 py-2 rounded-lg text-sm <?= $filter === 'read' ? 'bg-cyan-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' ?>">
        Sudah Dibaca
    </a>
</div>

<!-- Messages List -->
<div class="space-y-4">
    <?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
    <div class="bg-gray-800 rounded-xl border <?= $comment['is_read'] ? 'border-gray-700' : 'border-cyan-500/50' ?> p-4 sm:p-6">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
            <div class="flex items-start space-x-3 sm:space-x-4">
                <div class="w-10 sm:w-12 h-10 sm:h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-semibold text-sm sm:text-base"><?= strtoupper(substr($comment['name'], 0, 1)) ?></span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="font-semibold text-white"><?= htmlspecialchars($comment['name']) ?></h3>
                        <?php if (!$comment['is_read']): ?>
                        <span class="bg-cyan-500 text-white text-xs px-2 py-0.5 rounded">Baru</span>
                        <?php endif; ?>
                    </div>
                    <p class="text-gray-500 text-sm truncate">
                        <a href="mailto:<?= htmlspecialchars($comment['email']) ?>" class="hover:text-cyan-400">
                            <?= htmlspecialchars($comment['email']) ?>
                        </a>
                    </p>
                    <?php if ($comment['subject']): ?>
                    <p class="text-cyan-400 text-sm mt-1">Subjek: <?= htmlspecialchars($comment['subject']) ?></p>
                    <?php endif; ?>
                    <p class="text-gray-500 text-xs mt-1 sm:hidden"><?= formatDate($comment['created_at'], 'd M Y H:i') ?></p>
                </div>
            </div>
            <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-start gap-2">
                <p class="hidden sm:block text-gray-500 text-sm"><?= formatDate($comment['created_at'], 'd M Y H:i') ?></p>
                <div class="flex items-center space-x-3 sm:space-x-2">
                    <?php if (!$comment['is_read']): ?>
                    <a href="<?= baseUrl('admin/?p=comments&action=read&id=' . $comment['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm">
                        <i class="fas fa-check"></i><span class="hidden sm:inline ml-1">Tandai Dibaca</span>
                    </a>
                    <?php endif; ?>
                    <a href="<?= baseUrl('admin/?p=comments&action=delete&id=' . $comment['id']) ?>" onclick="return confirmDelete('Apakah yakin ingin menghapus pesan ini?')" class="text-red-400 hover:text-red-300 text-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="mt-4 sm:pl-14 lg:pl-16">
            <p class="text-gray-300 whitespace-pre-wrap text-sm sm:text-base"><?= htmlspecialchars($comment['message']) ?></p>
        </div>
        
        <?php if ($comment['ip_address']): ?>
        <div class="mt-3 sm:mt-4 sm:pl-14 lg:pl-16 text-gray-600 text-xs">
            IP: <?= htmlspecialchars($comment['ip_address']) ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-8 sm:p-12 text-center">
        <div class="w-14 sm:w-16 h-14 sm:h-16 bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-envelope-open text-gray-500 text-xl sm:text-2xl"></i>
        </div>
        <p class="text-gray-500">Belum ada pesan.</p>
    </div>
    <?php endif; ?>
</div>

