# 📦 Panduan Upload Assets

## 🖼️ Gambar yang Dibutuhkan

Upload file-file berikut ke folder `public/images/`:

### 1. Logo Lab (Required)
**File**: `logo-ncs.png`
- **Ukuran**: 200x80px (landscape)
- **Format**: PNG dengan background transparan
- **Usage**: Navbar, Footer, Logo page

### 2. Hero Illustration (Optional)
**File**: `hero-cyber-security.svg` atau `hero-cyber-security.png`
- **Ukuran**: 600x500px
- **Format**: SVG (preferred) atau PNG
- **Usage**: Hero section di halaman beranda

### 3. Struktur Organisasi (Required)
**File**: `struktur-organisasi.png`
- **Ukuran**: 1200x800px (landscape)
- **Format**: PNG atau JPG
- **Usage**: Halaman struktur organisasi

### 4. Favicon (Optional)
**File**: `favicon.ico`
- **Ukuran**: 32x32px atau 64x64px
- **Format**: ICO
- **Usage**: Browser tab icon

---

## 📁 Struktur Folder Images

```
public/
└── images/
    ├── logo-ncs.png ⚠️ REQUIRED
    ├── hero-cyber-security.svg (optional)
    ├── struktur-organisasi.png ⚠️ REQUIRED
    ├── favicon.ico (optional)
    │
    ├── galeri/ (untuk upload galeri kegiatan)
    │   ├── kegiatan-1.jpg
    │   ├── kegiatan-2.jpg
    │   └── ...
    │
    └── team/ (untuk foto tim - optional)
        ├── kepala-lab.jpg
        ├── koordinator-1.jpg
        └── ...
```

---

## 🎨 Cara Membuat Logo

### Tools Online (Free):
1. **Canva**: https://www.canva.com
2. **Figma**: https://www.figma.com
3. **LogoMakr**: https://logomakr.com

### Tips Design Logo:
- Gunakan warna biru (#1E40AF) sebagai warna utama
- Sertakan elemen network/cyber security (shield, network nodes, lock)
- Keep it simple dan professional
- Background transparan (PNG)
- Pastikan readable di ukuran kecil

---

## 🖼️ Cara Optimasi Gambar

### Online Tools:
1. **TinyPNG**: https://tinypng.com (PNG compression)
2. **Squoosh**: https://squoosh.app (multiple formats)
3. **SVGOMG**: https://jakearchibald.github.io/svgomg (SVG optimization)

### Recommended Settings:
- **JPG Quality**: 80-85%
- **PNG**: Use TinyPNG compression
- **SVG**: Minify dengan SVGOMG

---

## 📥 Cara Upload

### Via FTP/SFTP:
```
Host: your-server.com
Path: /public/images/
Upload: logo-ncs.png, struktur-organisasi.png
```

### Via Command Line:
```bash
# Pindah ke folder images
cd public/images/

# Upload via scp (jika ada server)
scp logo-ncs.png user@server:/path/to/public/images/
```

### Via Laravel Storage (Advanced):
Untuk galeri dinamis, gunakan Laravel Storage:
```bash
php artisan storage:link
```
Upload ke: `storage/app/public/galleries/`

---

## ✅ Checklist Upload

- [ ] logo-ncs.png uploaded
- [ ] struktur-organisasi.png uploaded
- [ ] favicon.ico uploaded (optional)
- [ ] hero-cyber-security.svg uploaded (optional)
- [ ] Test semua halaman di browser
- [ ] Check responsive (mobile view)
- [ ] Verify logo terlihat jelas
- [ ] Struktur organisasi dapat dibaca

---

## 🐛 Troubleshooting

### Logo tidak muncul?
1. Check file name (case-sensitive): `logo-ncs.png`
2. Check folder: `public/images/`
3. Check permission: `chmod 755 public/images/`
4. Clear cache: `php artisan cache:clear`

### Gambar blur/pecah?
- Upload gambar dengan resolusi lebih tinggi
- Check ukuran file (tidak terlalu kecil)
- Gunakan format PNG untuk logo

### Favicon tidak muncul?
- Clear browser cache (Ctrl+Shift+Delete)
- Force reload (Ctrl+F5)
- Check file size < 100KB

---

## 📝 Notes

- Saat ini website menggunakan **fallback icons dan gradient** dari Bootstrap
- Fallback akan otomatis diganti ketika file asli sudah diupload
- Jika gambar tidak ada, akan tampil icon atau gradient berwarna
- **Tidak ada request ke layanan eksternal** (anti-spam)

---

## 💡 Tips

1. **Backup**: Selalu backup gambar original sebelum compress
2. **Naming**: Gunakan kebab-case: `foto-tim.jpg` bukan `Foto Tim.jpg`
3. **Size**: Keep file size < 500KB per gambar
4. **Aspect Ratio**: Maintain aspect ratio saat resize
5. **Alt Text**: Sudah disediakan di code untuk SEO

---

## 📞 Need Help?

Jika kesulitan membuat/upload assets:
1. Contact team designer (jika ada)
2. Gunakan tools online yang disebutkan di atas
3. Temporary: Gunakan placeholder yang sudah ada

---

**Happy uploading! 🎨**
