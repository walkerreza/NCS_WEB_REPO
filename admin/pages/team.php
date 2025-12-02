<?php
/**
 * Admin Team Members (Development Credits)
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? '')) {
    $data = ['name' => sanitize($_POST['name'] ?? ''), 'nim' => sanitize($_POST['nim'] ?? ''), 'role' => sanitize($_POST['role'] ?? ''), 'group_name' => sanitize($_POST['group_name'] ?? ''), 'is_active' => isset($_POST['is_active'])];
    
    if (!empty($data['name'])) {
        // Convert boolean for PostgreSQL
        $isActive = $data['is_active'] ? 'true' : 'false';
        
        if ($action === 'edit' && $id > 0) {
            db()->query("UPDATE team_members SET name = ?, nim = ?, role = ?, group_name = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?", 
                [$data['name'], $data['nim'], $data['role'], $data['group_name'], $isActive, $id]);
        } else {
            db()->query("INSERT INTO team_members (name, nim, role, group_name, is_active) VALUES (?, ?, ?, ?, ?)",
                [$data['name'], $data['nim'], $data['role'], $data['group_name'], $isActive]);
        }
        $message = 'Data berhasil disimpan.';
        $action = 'list';
    }
}

if ($action === 'delete' && $id > 0) {
    db()->query("DELETE FROM team_members WHERE id = ?", [$id]);
    $message = 'Data berhasil dihapus.';
    $action = 'list';
}

$member = ($action === 'edit' && $id > 0) ? db()->fetch("SELECT * FROM team_members WHERE id = ?", [$id]) : null;
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Tim Pengembang</h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=team&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base"><i class="fas fa-plus mr-2"></i>Tambah</a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=team') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <?php endif; ?>
</div>

<?php if ($message): ?>
<div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6"><i class="fas fa-check-circle mr-2"></i><?= $message ?></div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $items = db()->fetchAll("SELECT * FROM team_members ORDER BY id"); ?>

<!-- Mobile Cards View -->
<div class="block sm:hidden space-y-4">
    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4">
        <div class="flex-1 min-w-0">
            <p class="text-white font-medium"><?= htmlspecialchars($item['name']) ?></p>
            <p class="text-cyan-400 text-sm"><?= htmlspecialchars($item['role'] ?: '-') ?></p>
            <div class="flex flex-wrap items-center gap-2 mt-2 text-xs text-gray-400">
                <span><i class="fas fa-id-card mr-1"></i><?= htmlspecialchars($item['nim'] ?: '-') ?></span>
                <span><i class="fas fa-users mr-1"></i><?= htmlspecialchars($item['group_name'] ?: '-') ?></span>
            </div>
        </div>
        <div class="flex justify-end space-x-4 mt-3 pt-3 border-t border-gray-700">
            <a href="<?= baseUrl('admin/?p=team&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
            <a href="<?= baseUrl('admin/?p=team&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300 text-sm"><i class="fas fa-trash mr-1"></i>Hapus</a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-8 text-center text-gray-500">Belum ada anggota tim.</div>
    <?php endif; ?>
</div>

<!-- Desktop Table View -->
<div class="hidden sm:block bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Nama</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">NIM</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Role</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase hidden lg:table-cell">Kelompok</th>
                    <th class="px-4 lg:px-6 py-4 text-right text-xs text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($items as $item): ?>
                <tr class="hover:bg-gray-700/50">
                    <td class="px-4 lg:px-6 py-4 text-white"><?= htmlspecialchars($item['name']) ?></td>
                    <td class="px-4 lg:px-6 py-4 text-gray-400"><?= htmlspecialchars($item['nim'] ?: '-') ?></td>
                    <td class="px-4 lg:px-6 py-4 text-cyan-400"><?= htmlspecialchars($item['role'] ?: '-') ?></td>
                    <td class="px-4 lg:px-6 py-4 text-gray-400 hidden lg:table-cell"><?= htmlspecialchars($item['group_name'] ?: '-') ?></td>
                    <td class="px-4 lg:px-6 py-4 text-right whitespace-nowrap">
                        <a href="<?= baseUrl('admin/?p=team&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 mr-3"><i class="fas fa-edit"></i></a>
                        <a href="<?= baseUrl('admin/?p=team&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></a>
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
            <div><label class="block text-gray-300 text-sm mb-2">Nama *</label><input type="text" name="name" required value="<?= htmlspecialchars($member['name'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
            <div><label class="block text-gray-300 text-sm mb-2">NIM</label><input type="text" name="nim" value="<?= htmlspecialchars($member['nim'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div><label class="block text-gray-300 text-sm mb-2">Role</label><input type="text" name="role" value="<?= htmlspecialchars($member['role'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
            <div><label class="block text-gray-300 text-sm mb-2">Nama Kelompok</label><input type="text" name="group_name" value="<?= htmlspecialchars($member['group_name'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        </div>
        <label class="flex items-center"><input type="checkbox" name="is_active" <?= ($member['is_active'] ?? true) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded"><span class="ml-2 text-gray-300">Aktif</span></label>
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500"><i class="fas fa-save mr-2"></i>Simpan</button>
    </form>
</div>
<?php endif; ?>

