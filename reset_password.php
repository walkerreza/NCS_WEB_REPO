<?php
/**
 * Reset Admin Password Script
 * Jalankan file ini sekali untuk reset password admin
 * HAPUS FILE INI SETELAH DIGUNAKAN!
 */

require_once __DIR__ . '/config/app.php';

$newPassword = 'admin123';
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

try {
    // Update password admin
    db()->query(
        "UPDATE users SET password = ? WHERE username = 'admin'",
        [$hashedPassword]
    );
    
    echo "<h1 style='color: green;'>✅ Password berhasil direset!</h1>";
    echo "<p><strong>Username:</strong> admin</p>";
    echo "<p><strong>Password:</strong> admin123</p>";
    echo "<p><a href='admin/'>Login ke Admin Panel</a></p>";
    echo "<hr>";
    echo "<p style='color: red;'><strong>⚠️ PENTING:</strong> Hapus file reset_password.php ini setelah login berhasil!</p>";
    
} catch (Exception $e) {
    echo "<h1 style='color: red;'>❌ Error</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}

