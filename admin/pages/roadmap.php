<?php
/**
 * Admin Roadmap Management
 * Manage lab development milestones
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? '')) {
    $data = [
        'title' => sanitize($_POST['title'] ?? ''),
        'description' => sanitize($_POST['description'] ?? ''),
        'year' => (int)($_POST['year'] ?? date('Y')),
        'quarter' => sanitize($_POST['quarter'] ?? ''),
        'status' => sanitize($_POST['status'] ?? 'upcoming'),
        'icon' => sanitize($_POST['icon'] ?? ''),
        'order_index' => (int)($_POST['order_index'] ?? 0),
        'is_active' => isset($_POST['is_active'])
    ];
    
    if (!empty($data['title']) && !empty($data['year'])) {
        // Convert boolean for PostgreSQL
        $isActive = $data['is_active'] ? 'true' : 'false';
        
        if ($action === 'edit' && $id > 0) {
            db()->query("UPDATE roadmap SET title = ?, description = ?, year = ?, quarter = ?, status = ?, icon = ?, order_index = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?",
                [$data['title'], $data['description'], $data['year'], $data['quarter'], $data['status'], $data['icon'], $data['order_index'], $isActive, $id]);
        } else {
            db()->query("INSERT INTO roadmap (title, description, year, quarter, status, icon, order_index, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
                [$data['title'], $data['description'], $data['year'], $data['quarter'], $data['status'], $data['icon'], $data['order_index'], $isActive]);
        }
        $message = 'Data berhasil disimpan.';
        $action = 'list';
    }
}

// Handle delete
if ($action === 'delete' && $id > 0) {
    db()->query("DELETE FROM roadmap WHERE id = ?", [$id]);
    $message = 'Data berhasil dihapus.';
    $action = 'list';
}

$roadmapItem = ($action === 'edit' && $id > 0) ? db()->fetch("SELECT * FROM roadmap WHERE id = ?", [$id]) : null;

// Status colors and labels
$statusColors = [
    'completed' => 'bg-green-500/20 text-green-400',
    'in_progress' => 'bg-yellow-500/20 text-yellow-400',
    'upcoming' => 'bg-blue-500/20 text-blue-400'
];
$statusLabels = [
    'completed' => 'Selesai',
    'in_progress' => 'Berjalan',
    'upcoming' => 'Mendatang'
];
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">
        <i class="fas fa-road text-pastel-sky mr-2"></i>Roadmap
    </h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=roadmap&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base">
        <i class="fas fa-plus mr-2"></i>Tambah
    </a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=roadmap') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
    <?php endif; ?>
</div>

<?php if ($message): ?>
<div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i><?= $message ?>
</div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $items = db()->fetchAll("SELECT * FROM roadmap ORDER BY year ASC, order_index ASC"); ?>

<!-- Mobile Cards View -->
<div class="block sm:hidden space-y-4">
    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4">
        <div class="flex items-start space-x-3 mb-3">
            <div class="w-10 h-10 bg-pastel-sky/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-<?= htmlspecialchars($item['icon'] ?? 'flag') ?> text-pastel-sky"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-white font-medium"><?= htmlspecialchars($item['title']) ?></p>
                <p class="text-gray-500 text-sm"><?= $item['year'] ?> <?= $item['quarter'] ?></p>
            </div>
        </div>
        <div class="flex flex-wrap items-center gap-2 mb-3">
            <span class="px-2 py-1 text-xs rounded-full <?= $statusColors[$item['status']] ?>"><?= $statusLabels[$item['status']] ?></span>
            <span class="px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>"><?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?></span>
        </div>
        <div class="flex justify-end space-x-4 pt-3 border-t border-gray-700">
            <a href="<?= baseUrl('admin/?p=roadmap&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
            <a href="<?= baseUrl('admin/?p=roadmap&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300 text-sm"><i class="fas fa-trash mr-1"></i>Hapus</a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-8 text-center text-gray-500">
        <i class="fas fa-road text-4xl mb-4 opacity-50"></i>
        <p>Belum ada data roadmap.</p>
    </div>
    <?php endif; ?>
</div>

<!-- Desktop Table View -->
<div class="hidden sm:block bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Milestone</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Waktu</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Status</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Aktif</th>
                    <th class="px-4 lg:px-6 py-4 text-right text-xs text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php if (!empty($items)): ?>
                <?php foreach ($items as $item): ?>
                <tr class="hover:bg-gray-700/50">
                    <td class="px-4 lg:px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-pastel-sky/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-<?= htmlspecialchars($item['icon'] ?? 'flag') ?> text-pastel-sky text-sm"></i>
                            </div>
                            <span class="text-white font-medium"><?= htmlspecialchars($item['title']) ?></span>
                        </div>
                    </td>
                    <td class="px-4 lg:px-6 py-4 text-gray-400"><?= $item['year'] ?> <?= $item['quarter'] ?></td>
                    <td class="px-4 lg:px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full <?= $statusColors[$item['status']] ?>"><?= $statusLabels[$item['status']] ?></span>
                    </td>
                    <td class="px-4 lg:px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>"><?= $item['is_active'] ? 'Ya' : 'Tidak' ?></span>
                    </td>
                    <td class="px-4 lg:px-6 py-4 text-right whitespace-nowrap">
                        <a href="<?= baseUrl('admin/?p=roadmap&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 mr-3"><i class="fas fa-edit"></i></a>
                        <a href="<?= baseUrl('admin/?p=roadmap&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada data roadmap.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php else: ?>
<!-- Form -->
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Judul *</label>
                <input type="text" name="title" required value="<?= htmlspecialchars($roadmapItem['title'] ?? '') ?>" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Icon (FontAwesome)</label>
                <input type="text" name="icon" value="<?= htmlspecialchars($roadmapItem['icon'] ?? '') ?>" placeholder="flag, rocket, check, etc" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($roadmapItem['description'] ?? '') ?></textarea>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Tahun *</label>
                <input type="number" name="year" required value="<?= $roadmapItem['year'] ?? date('Y') ?>" min="2020" max="2030"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Quarter</label>
                <select name="quarter" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
                    <option value="">Pilih Quarter</option>
                    <option value="Q1" <?= ($roadmapItem['quarter'] ?? '') === 'Q1' ? 'selected' : '' ?>>Q1 (Jan-Mar)</option>
                    <option value="Q2" <?= ($roadmapItem['quarter'] ?? '') === 'Q2' ? 'selected' : '' ?>>Q2 (Apr-Jun)</option>
                    <option value="Q3" <?= ($roadmapItem['quarter'] ?? '') === 'Q3' ? 'selected' : '' ?>>Q3 (Jul-Sep)</option>
                    <option value="Q4" <?= ($roadmapItem['quarter'] ?? '') === 'Q4' ? 'selected' : '' ?>>Q4 (Okt-Des)</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
                    <option value="upcoming" <?= ($roadmapItem['status'] ?? '') === 'upcoming' ? 'selected' : '' ?>>Mendatang</option>
                    <option value="in_progress" <?= ($roadmapItem['status'] ?? '') === 'in_progress' ? 'selected' : '' ?>>Berjalan</option>
                    <option value="completed" <?= ($roadmapItem['status'] ?? '') === 'completed' ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm mb-2">Urutan</label>
            <input type="number" name="order_index" value="<?= $roadmapItem['order_index'] ?? 0 ?>" 
                   class="w-full sm:w-32 px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
        </div>
        
        <label class="flex items-center">
            <input type="checkbox" name="is_active" <?= ($roadmapItem['is_active'] ?? true) ? 'checked' : '' ?> 
                   class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
            <span class="ml-2 text-gray-300">Aktif</span>
        </label>
        
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500 transition-colors">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </form>
</div>
<?php endif; ?>

