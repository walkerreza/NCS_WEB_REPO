<?php
/**
 * Admin External Links Management
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? '')) {
    $data = [
        'title' => sanitize($_POST['title'] ?? ''),
        'url' => filter_var($_POST['url'] ?? '', FILTER_VALIDATE_URL),
        'icon' => sanitize($_POST['icon'] ?? ''),
        'description' => sanitize($_POST['description'] ?? ''),
        'order_index' => (int)($_POST['order_index'] ?? 0),
        'is_active' => isset($_POST['is_active'])
    ];
    
    if (!empty($data['title']) && $data['url']) {
        // Convert boolean for PostgreSQL
        $isActive = $data['is_active'] ? 'true' : 'false';
        
        if ($action === 'edit' && $id > 0) {
            db()->query("UPDATE external_links SET title = ?, url = ?, icon = ?, description = ?, order_index = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?",
                [$data['title'], $data['url'], $data['icon'], $data['description'], $data['order_index'], $isActive, $id]);
        } else {
            db()->query("INSERT INTO external_links (title, url, icon, description, order_index, is_active) VALUES (?, ?, ?, ?, ?, ?)",
                [$data['title'], $data['url'], $data['icon'], $data['description'], $data['order_index'], $isActive]);
        }
        $message = 'Data berhasil disimpan.';
        $action = 'list';
    }
}

if ($action === 'delete' && $id > 0) {
    db()->query("DELETE FROM external_links WHERE id = ?", [$id]);
    $message = 'Data berhasil dihapus.';
    $action = 'list';
}

$link = ($action === 'edit' && $id > 0) ? db()->fetch("SELECT * FROM external_links WHERE id = ?", [$id]) : null;
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Link Eksternal</h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=links&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base"><i class="fas fa-plus mr-2"></i>Tambah</a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=links') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <?php endif; ?>
</div>

<?php if ($message): ?><div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6"><i class="fas fa-check-circle mr-2"></i><?= $message ?></div><?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $items = db()->fetchAll("SELECT * FROM external_links ORDER BY order_index"); ?>

<!-- Mobile Cards View -->
<div class="block sm:hidden space-y-4">
    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4">
        <div class="flex-1 min-w-0">
            <p class="text-white font-medium"><?= htmlspecialchars($item['title']) ?></p>
            <a href="<?= htmlspecialchars($item['url']) ?>" target="_blank" class="text-cyan-400 hover:text-cyan-300 text-sm truncate block"><?= parse_url($item['url'], PHP_URL_HOST) ?></a>
            <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>"><?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?></span>
        </div>
        <div class="flex justify-end space-x-4 mt-3 pt-3 border-t border-gray-700">
            <a href="<?= baseUrl('admin/?p=links&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
            <a href="<?= baseUrl('admin/?p=links&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300 text-sm"><i class="fas fa-trash mr-1"></i>Hapus</a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-8 text-center text-gray-500">Belum ada link.</div>
    <?php endif; ?>
</div>

<!-- Desktop Table View -->
<div class="hidden sm:block bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Link</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">URL</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Status</th>
                    <th class="px-4 lg:px-6 py-4 text-right text-xs text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($items as $item): ?>
                <tr class="hover:bg-gray-700/50">
                    <td class="px-4 lg:px-6 py-4"><p class="text-white font-medium"><?= htmlspecialchars($item['title']) ?></p></td>
                    <td class="px-4 lg:px-6 py-4"><a href="<?= htmlspecialchars($item['url']) ?>" target="_blank" class="text-cyan-400 hover:text-cyan-300"><?= parse_url($item['url'], PHP_URL_HOST) ?></a></td>
                    <td class="px-4 lg:px-6 py-4"><span class="px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>"><?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?></span></td>
                    <td class="px-4 lg:px-6 py-4 text-right whitespace-nowrap">
                        <a href="<?= baseUrl('admin/?p=links&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 mr-3"><i class="fas fa-edit"></i></a>
                        <a href="<?= baseUrl('admin/?p=links&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div><label class="block text-gray-300 text-sm mb-2">Judul *</label><input type="text" name="title" required value="<?= htmlspecialchars($link['title'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
            <div><label class="block text-gray-300 text-sm mb-2">URL *</label><input type="url" name="url" required value="<?= htmlspecialchars($link['url'] ?? '') ?>" placeholder="https://" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div><label class="block text-gray-300 text-sm mb-2">Icon (FontAwesome)</label><input type="text" name="icon" value="<?= htmlspecialchars($link['icon'] ?? '') ?>" placeholder="building, book, etc" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
            <div><label class="block text-gray-300 text-sm mb-2">Urutan</label><input type="number" name="order_index" value="<?= $link['order_index'] ?? 0 ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        </div>
        <div><label class="block text-gray-300 text-sm mb-2">Deskripsi</label><input type="text" name="description" value="<?= htmlspecialchars($link['description'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        <label class="flex items-center"><input type="checkbox" name="is_active" <?= ($link['is_active'] ?? true) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded"><span class="ml-2 text-gray-300">Aktif</span></label>
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500"><i class="fas fa-save mr-2"></i>Simpan</button>
    </form>
</div>
<?php endif; ?>

