# 📖 Dokumentasi Frontend - Lab Network & Cyber Security Website

## ✅ Status Implementasi

### ✔️ Sudah Dibuat:

#### 1. **Layout & Components**
- ✅ `layouts/frontend.blade.php` - Main layout dengan Bootstrap 5
- ✅ `partials/navbar.blade.php` - Navbar responsif dengan dropdown
- ✅ `partials/footer.blade.php` - Footer dengan info lab & kredit tim
- ✅ `public/css/custom.css` - Custom styling (10KB+)
- ✅ `public/js/custom.js` - Custom JavaScript untuk interaktivitas

#### 2. **Halaman Frontend**
- ✅ `pages/beranda.blade.php` - Landing page dengan hero, services, counter
- ✅ `pages/galeri.blade.php` - Galeri & agenda dengan tabs
- ✅ `pages/profil/visi-misi.blade.php` - Visi misi laboratorium
- ✅ `pages/profil/logo.blade.php` - Logo & panduan penggunaan
- ✅ `pages/profil/struktur.blade.php` - Struktur organisasi & tim
- ✅ `pages/arsip/penelitian.blade.php` - Arsip penelitian dengan search
- ✅ `pages/arsip/pengabdian.blade.php` - Arsip pengabdian dengan search
- ✅ `pages/layanan/sarana.blade.php` - Sarana & prasarana lab
- ✅ `pages/layanan/konsultatif.blade.php` - Layanan konsultasi + form kontak
- ✅ `pages/link.blade.php` - Link eksternal terkait

#### 3. **Routes**
- ✅ Semua routes frontend sudah ditambahkan di `routes/web.php`

---

## 🎨 Fitur yang Sudah Diimplementasikan

### 🌟 Design Features
- **Modern & Responsif**: Mobile-first dengan Bootstrap 5
- **Animasi Smooth**: AOS (Animate On Scroll) library
- **Color Scheme**: Blue (#1E40AF, #3B82F6) + Yellow accent (#FCD34D)
- **Typography**: Inter + Poppins dari Google Fonts
- **Icons**: Bootstrap Icons
- **Gallery Lightbox**: GLightbox untuk zoom gambar

### 🚀 Interactive Features
- ✅ Navbar sticky dengan scroll effect
- ✅ Dropdown menu untuk Profil, Arsip, Layanan
- ✅ Counter animation untuk statistik
- ✅ Hover effects pada cards
- ✅ Smooth scroll untuk anchor links
- ✅ Mobile hamburger menu
- ✅ Back to top button (auto-generated di custom.js)
- ✅ Search functionality untuk arsip
- ✅ Tab persistence dengan localStorage
- ✅ Form validation untuk kontak

---

## 📂 Struktur File

```
resources/views/
├── layouts/
│   ├── app.blade.php (untuk dashboard/admin)
│   └── frontend.blade.php (untuk public pages) ✅
├── partials/
│   ├── navbar.blade.php ✅
│   └── footer.blade.php ✅
├── pages/
│   ├── beranda.blade.php ✅
│   ├── galeri.blade.php ✅
│   ├── link.blade.php ✅
│   ├── profil/
│   │   ├── visi-misi.blade.php ✅
│   │   ├── logo.blade.php ✅
│   │   └── struktur.blade.php ✅
│   ├── arsip/
│   │   ├── penelitian.blade.php ✅
│   │   └── pengabdian.blade.php ✅
│   └── layanan/
│       ├── sarana.blade.php ✅
│       └── konsultatif.blade.php ✅
│
public/
├── css/
│   └── custom.css ✅ (Custom styles)
└── js/
    └── custom.js ✅ (Custom JavaScript)
```

---

## 🔧 Cara Menggunakan

### 1. Akses Halaman
Setelah setup selesai, akses melalui browser:

```
http://localhost:8000/                    → Beranda
http://localhost:8000/profil/visi-misi    → Visi Misi
http://localhost:8000/profil/logo         → Logo
http://localhost:8000/profil/struktur     → Struktur Organisasi
http://localhost:8000/galeri              → Galeri & Agenda
http://localhost:8000/arsip/penelitian    → Arsip Penelitian
http://localhost:8000/arsip/pengabdian    → Arsip Pengabdian
http://localhost:8000/layanan/sarana-prasarana → Sarana Prasarana
http://localhost:8000/layanan/konsultatif → Layanan Konsultatif
http://localhost:8000/link                → Link Terkait
```

### 2. Menjalankan Development Server

```bash
# Pastikan di direktori project
cd Backend-NCS-Laravel

# Jalankan Laravel development server
php artisan serve

# Atau jika menggunakan Vite untuk asset compilation
npm run dev
```

---

## 🎯 TODO: Integrasi dengan Backend

### Langkah Selanjutnya:
1. **Buat Controllers** untuk setiap halaman
2. **Hubungkan dengan Database** (models sudah ada)
3. **Replace Static Data** dengan dynamic data dari database
4. **Implementasi CRUD** untuk admin dashboard
5. **Upload Images** untuk logo, galeri, struktur organisasi
6. **Form Handling** untuk layanan konsultatif

### Contoh Integrasi Controller:

```php
// app/Http/Controllers/BerandaController.php
<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\Archive;
use App\Models\Service;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $latestAgendas = Agenda::latest()
            ->where('event_date', '>=', now())
            ->take(3)
            ->get();
        
        $totalResearch = Archive::where('type', 'penelitian')->count();
        $totalService = Archive::where('type', 'pengabdian')->count();
        $totalGallery = Gallery::count();
        $totalDownloads = Archive::sum('download_count');
        
        return view('pages.beranda', compact(
            'latestAgendas',
            'totalResearch',
            'totalService',
            'totalGallery',
            'totalDownloads'
        ));
    }
}
```

Kemudian update route:
```php
// routes/web.php
use App\Http\Controllers\BerandaController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
```

---

## 📝 Customization Guide

### 1. Mengubah Warna Theme

Edit `public/css/custom.css`:

```css
:root {
    --primary-color: #1E40AF;      /* Ganti dengan warna pilihan */
    --secondary-color: #0891B2;
    --accent-color: #F97316;
    --warning-color: #FCD34D;
}
```

### 2. Menambahkan Logo Lab

Upload logo ke `public/images/logo-ncs.png` (ukuran rekomendasi: 200x80px)

### 3. Update Informasi Tim

Edit `resources/views/partials/footer.blade.php` bagian "Team Credits":

```blade
<p class="text-white-50 mb-2 small"><strong>Kelompok: [Nama Kelompok Anda]</strong></p>
<ul class="list-unstyled text-muted small">
    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Nama Anggota 1</li>
    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Nama Anggota 2</li>
    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Nama Anggota 3</li>
    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Nama Anggota 4</li>
</ul>
```

### 4. Menambahkan Meta Tags untuk SEO

Setiap halaman sudah memiliki:
```blade
@section('title', 'Judul Halaman')
@section('meta_description', 'Deskripsi halaman untuk SEO')
```

---

## 🎨 Libraries & Dependencies

### Frontend Libraries (via CDN):
- **Bootstrap 5.3.0** - Framework CSS
- **Bootstrap Icons 1.11.0** - Icon library
- **AOS** - Animate On Scroll
- **GLightbox** - Image lightbox
- **Google Fonts** - Inter & Poppins

### Sudah Include di Layout:
```html
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
```

---

## 🐛 Troubleshooting

### 1. CSS/JS tidak ter-load?
```bash
# Clear cache Laravel
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### 2. Gambar tidak muncul?
- Pastikan folder `public/images/` ada
- Upload gambar sesuai panduan di `ASSETS_GUIDE.md`
- Jika belum ada gambar, akan tampil fallback icon Bootstrap
- Cek permission folder: `chmod 755 public/images/`

### 3. Route tidak ditemukan (404)?
```bash
# Clear route cache
php artisan route:clear
php artisan route:cache
```

---

## 📱 Responsive Breakpoints

Website sudah responsif dengan breakpoints:
- **Mobile**: < 576px
- **Tablet**: 576px - 768px
- **Desktop**: 768px - 992px
- **Large Desktop**: > 992px

---

## 🚀 Performance Tips

1. **Image Optimization**: Gunakan format WebP untuk gambar
2. **Lazy Loading**: Sudah ada di `custom.js`
3. **Minify CSS/JS**: Untuk production
4. **CDN**: Gunakan CDN untuk library eksternal
5. **Caching**: Enable Laravel caching untuk production

---

## 📞 Kontak

Jika ada pertanyaan tentang implementasi frontend:
- Email: ncs@polinema.ac.id
- GitHub Issues: (jika ada repository)

---

## 📜 License

Project ini dibuat untuk keperluan PBL Lab Network & Cyber Security - Polinema.

---

**Dibuat dengan ❤️ oleh Kelompok PBL SI 2A**

*Last Updated: {{ date('d M Y') }}*
