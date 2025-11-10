# 📋 Changelog - Frontend Lab NCS

## [1.2.2] - 2025-11-07

### 🎨 Enhanced - UI Consistency & Dark Mode Improvements
- **Konsistensi penuh antara light & dark mode** untuk semua komponen
- Improved section background colors untuk readability
- Better text color contrast di kedua mode
- Enhanced card styling dengan proper shadow di dark mode
- Icon circles dan background opacity disesuaikan untuk dark mode
- Button outline styling untuk dark mode
- Comprehensive text utilities (lead, display, body) untuk dark mode

### 🔧 Fixed - Visual Improvements
- Section `bg-light` sekarang properly styled di dark mode
- Text `text-muted` lebih readable di kedua mode
- Shadow effects disesuaikan untuk dark mode (lebih gelap)
- Icon background circles di cards lebih subtle di dark mode
- Border colors konsisten di semua komponen
- Display titles dan paragraphs menggunakan warna yang tepat

### ✨ Added - New CSS Utilities
- `.bg-light`, `.bg-white` dark mode support
- `.text-dark`, `.text-body` dark mode variants
- Icon circle background variants untuk dark mode
- Better opacity classes untuk icon backgrounds
- Improved shadow utilities untuk dark mode

---

## [1.2.1] - 2025-11-07

### 🎨 Changed - UI Consistency Improvements
- **Navbar & Footer konsisten dengan warna kuning** (warning color)
- Update navbar background menjadi gradasi biru (#1E3A8A → #1E40AF)
- Tambah border kuning di navbar (bawah) dan footer (atas)
- Logo "Lab NCS" sekarang warna kuning dengan glow effect
- Hover effect pada menu navbar menggunakan warna kuning
- Active indicator navbar menggunakan warna kuning

### 🔧 Fixed - Footer Readability
- **Footer text sekarang mudah dibaca** di light & dark mode
- Update warna text footer untuk kontras yang lebih baik
- Ganti class `bg-dark` dan `text-muted` dengan custom classes
- Tambah classes: `.footer-custom`, `.footer-text`, `.footer-heading`, `.footer-link`
- Improved hover effects pada link footer
- Better color consistency antara navbar dan footer

### 📝 Documentation
- Tambah `navbar-footer-test.html` - test page untuk konsistensi UI
- Update styling dokumentasi untuk navbar & footer

---

## [1.2.0] - 2025-11-07

### 🌓 Added - Dark Mode Feature
- **Toggle Dark Mode** di navbar dengan icon yang responsif
- **Auto-detection** preferensi dark mode dari sistem operasi
- **Persistent storage** menggunakan localStorage browser
- **Smooth transitions** antar mode tanpa flash/kedipan
- **Comprehensive dark mode styling** untuk semua komponen UI:
  - Navbar, Cards, Tables, Forms
  - Buttons, Badges, Alerts, Modals
  - Dropdowns, Footer, Gallery, Breadcrumbs
- **CSS Variables** untuk manajemen warna yang lebih fleksibel

### 🔧 Changed
- Update `tailwind.config.js` dengan dark mode class strategy
- Modifikasi `frontend.blade.php` dengan dark mode script di head
- Update `navbar.blade.php` dengan toggle button
- Enhance `custom.js` dengan dark mode logic
- Refactor `custom.css` dengan CSS variables dan dark mode styles

### 📝 Documentation
- Tambah `DARK_MODE_GUIDE.md` - panduan lengkap fitur dark mode
- Dokumentasi implementasi teknis
- Best practices untuk developer
- Troubleshooting guide

---

## [1.1.0] - 2025-11-07

### 🎉 Fixed
- **Menghapus semua placeholder eksternal** untuk menghindari spam request
- Mengganti semua `via.placeholder.com` dengan fallback lokal

### ✨ Added
- Fallback menggunakan **Bootstrap Icons** untuk tampilan yang lebih profesional
- Fallback menggunakan **gradient background** dengan warna theme
- Error handling yang lebih baik dengan `onerror` handler

### 🔧 Changed
- **Beranda**: Hero image sekarang hidden jika tidak ada
- **Beranda**: Agenda cards menggunakan gradient + icon
- **Galeri**: Foto kegiatan menggunakan gradient colorful
- **Profil/Logo**: Menampilkan icon fallback jika logo belum diupload
- **Profil/Struktur**: Diagram menampilkan pesan informatif jika belum ada
- **Profil/Struktur**: Foto tim menggunakan avatar icon dengan warna berbeda
- **Layanan/Konsultatif**: Hero menggunakan icon headset

### 📝 Documentation
- Update `ASSETS_GUIDE.md` - info tentang fallback icons
- Update `FRONTEND_README.md` - troubleshooting gambar
- Update `public/images/README.md` - catatan fallback

---

## [1.0.0] - 2025-11-07

### 🎉 Initial Release
- Frontend lengkap untuk Lab Network & Cyber Security
- 10 halaman publik dengan responsive design
- Bootstrap 5 + custom CSS & JavaScript
- Dokumentasi lengkap (README, Quick Start, Assets Guide)

