# 🌓 Panduan Fitur Dark Mode

## 📋 Deskripsi

Fitur dark mode memungkinkan pengguna untuk beralih antara tema terang dan gelap pada aplikasi Lab NCS. Fitur ini dibuat dengan mempertimbangkan:
- **Kenyamanan mata** pengguna saat browsing di malam hari
- **Preferensi sistem** yang otomatis terdeteksi
- **Penyimpanan preferensi** menggunakan localStorage
- **Transisi smooth** tanpa flash/kedipan

---

## ✨ Fitur Utama

### 1. **Auto-Detection Mode**
- Sistem otomatis mendeteksi preferensi dark mode dari sistem operasi pengguna
- Jika belum ada preferensi tersimpan, akan mengikuti setting sistem

### 2. **Toggle Button di Navbar**
- Tombol toggle yang mudah diakses di navbar
- Icon yang berubah sesuai mode aktif:
  - 🌙 Icon bulan untuk mode terang (klik untuk aktifkan dark mode)
  - ☀️ Icon matahari untuk mode gelap (klik untuk aktifkan light mode)

### 3. **Persistent Storage**
- Preferensi mode disimpan di localStorage browser
- Mode yang dipilih akan tetap aktif saat refresh atau kunjungan berikutnya

### 4. **Smooth Transition**
- Transisi warna yang halus antar mode
- Tidak ada flash/kedipan saat page load
- Semua elemen UI ter-styling dengan konsisten

---

## 🔧 Implementasi Teknis

### File yang Dimodifikasi/Dibuat:

#### 1. **tailwind.config.js**
```javascript
export default {
    darkMode: 'class', // Aktifkan dark mode dengan class strategy
    // ... konfigurasi lainnya
}
```

#### 2. **resources/views/layouts/frontend.blade.php**
Script di `<head>` untuk mencegah flash:
```html
<script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>
```

#### 3. **resources/views/partials/navbar.blade.php**
Toggle button ditambahkan di navbar:
```html
<li class="nav-item">
    <button id="theme-toggle" class="nav-link btn btn-link" type="button">
        <i id="theme-toggle-dark-icon" class="bi bi-moon-stars-fill d-none"></i>
        <i id="theme-toggle-light-icon" class="bi bi-sun-fill d-none"></i>
    </button>
</li>
```

#### 4. **public/js/custom.js**
Logic untuk handle toggle dark mode:
```javascript
// Fungsi untuk mengupdate icon berdasarkan tema
function updateThemeIcon() { ... }

// Event listener untuk toggle theme
themeToggleBtn.addEventListener('click', function() {
    // Toggle antara dark dan light mode
    // Simpan preferensi ke localStorage
    // Update icon
});
```

#### 5. **public/css/custom.css**
CSS Variables dan styling untuk dark mode:
```css
:root {
    --bg-primary: #FFFFFF;
    --bg-secondary: #F9FAFB;
    --text-primary: #111827;
    --text-secondary: #4B5563;
    --border-color: #E5E7EB;
}

.dark {
    --bg-primary: #1F2937;
    --bg-secondary: #111827;
    --text-primary: #F9FAFB;
    --text-secondary: #D1D5DB;
    --border-color: #374151;
}
```

---

## 🎨 Komponen yang Mendukung Dark Mode

Semua komponen UI telah disesuaikan untuk dark mode:

✅ **Navbar** - Background dan text colors
✅ **Cards** - Background dan borders
✅ **Tables** - Row striping dan borders
✅ **Forms** - Input fields dan select boxes
✅ **Buttons** - Semua variant button
✅ **Badges** - Background dan text
✅ **Alerts** - Semua jenis alert
✅ **Modals** - Background dan content
✅ **Dropdowns** - Menu items dan backgrounds
✅ **Footer** - Background dan links
✅ **Gallery** - Item backgrounds
✅ **Breadcrumbs** - Background dan separators

---

## 🚀 Cara Penggunaan

### Untuk Pengguna:
1. Buka website Lab NCS
2. Lihat icon di navbar (ujung kanan)
3. Klik icon untuk toggle mode:
   - Klik icon 🌙 untuk aktifkan dark mode
   - Klik icon ☀️ untuk kembali ke light mode
4. Preferensi Anda akan tersimpan otomatis

### Untuk Developer:
1. Gunakan CSS variables untuk styling:
   ```css
   .my-element {
       background-color: var(--bg-primary);
       color: var(--text-primary);
       border-color: var(--border-color);
   }
   ```

2. Untuk styling spesifik dark mode:
   ```css
   .dark .my-element {
       /* styling khusus untuk dark mode */
   }
   ```

3. Di JavaScript, cek mode aktif:
   ```javascript
   const isDarkMode = localStorage.getItem('theme') === 'dark';
   ```

---

## 🔍 Troubleshooting

### Flash/Kedipan saat Page Load
**Solusi**: Script di `<head>` layout sudah mencegah ini. Pastikan script tersebut berada sebelum body content.

### Icon Tidak Muncul
**Solusi**: Pastikan Bootstrap Icons sudah ter-load dengan benar:
```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
```

### Mode Tidak Tersimpan
**Solusi**: Periksa localStorage browser. Bersihkan cache jika perlu.

### Komponen Tertentu Tidak Ter-style
**Solusi**: Tambahkan CSS untuk komponen tersebut:
```css
.dark .your-component {
    background-color: var(--bg-secondary);
    color: var(--text-primary);
}
```

---

## 📝 Best Practices

1. **Selalu gunakan CSS variables** untuk warna background dan text
2. **Test di kedua mode** sebelum deploy
3. **Pertimbangkan kontras warna** untuk accessibility
4. **Gunakan transisi smooth** untuk perubahan warna
5. **Konsisten dengan design system** yang ada

---

## 🎯 Future Enhancements

Beberapa peningkatan yang bisa ditambahkan di masa depan:

- [ ] Auto-switch berdasarkan waktu (pagi/malam)
- [ ] Multiple theme options (blue, green, purple, dll)
- [ ] Smooth transition animation yang lebih advanced
- [ ] Keyboard shortcut untuk toggle (Ctrl/Cmd + Shift + D)
- [ ] Theme customizer untuk admin

---

## 📞 Kontak

Jika ada pertanyaan atau saran terkait fitur dark mode, silakan hubungi tim developer Lab NCS.

**Dibuat dengan ❤️ untuk Lab Network & Cyber Security - Polinema**
