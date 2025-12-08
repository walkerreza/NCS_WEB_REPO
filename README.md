# NCS Laboratory Website

Website resmi **Network & Cyber Security Laboratory** - Pusat Riset Keamanan Siber Politeknik Negeri Malang.

## 🛡️ Tentang

Website ini dirancang untuk menampilkan informasi, kegiatan, dan layanan laboratorium Network & Cyber Security dengan tema pastel modern dan efek visual yang menarik.

## 🚀 Teknologi

- **Backend:** PHP 8.x Native
- **Database:** PostgreSQL
- **Frontend:** TailwindCSS (via CDN)
- **Icons:** Font Awesome 6
- **Fonts:** Inter, Poppins
- **Animation:** AOS (Animate On Scroll)

## 🎨 Tema

Website menggunakan tema **Pastel Cyber** dengan warna-warna lembut:
- Teal (`#88c9c9`)
- Mint (`#a8e6cf`)
- Lavender (`#c3b1e1`)
- Rose (`#e8b4bc`)
- Sky (`#a7c5eb`)

## 📁 Struktur Folder

```
NCS/
├── admin/                  # Panel administrasi
│   ├── includes/          
│   │   ├── header.php     # HTML head admin
│   │   ├── sidebar.php    # Sidebar navigasi
│   │   └── footer.php     # Footer admin
│   ├── pages/             
│   │   ├── dashboard.php  # Dashboard statistik
│   │   ├── agenda.php     # CRUD Agenda
│   │   ├── gallery.php    # CRUD Galeri (image & video)
│   │   ├── documents.php  # CRUD Dokumen PDF
│   │   ├── services.php   # CRUD Layanan
│   │   ├── focus-areas.php # CRUD Bidang Fokus
│   │   ├── roadmap.php    # CRUD Roadmap
│   │   ├── organization.php # CRUD Struktur Organisasi
│   │   ├── team.php       # CRUD Tim Pengembang
│   │   ├── links.php      # CRUD Link Eksternal
│   │   ├── comments.php   # Manajemen Pesan
│   │   ├── settings.php   # Pengaturan Website
│   │   ├── users.php      # Manajemen User
│   │   ├── login.php      # Halaman Login
│   │   └── 404.php        # Halaman Error 404
│   └── index.php          # Entry point admin
├── config/                
│   ├── app.php            # Konfigurasi aplikasi & helper
│   └── database.php       # Koneksi PostgreSQL
├── includes/              
│   ├── header.php         # HTML head dengan Tailwind config
│   ├── footer.php         # Footer dengan contact form
│   ├── navbar.php         # Navigasi utama responsive
│   └── functions.php      # Helper functions
├── pages/                 
│   ├── beranda.php        # Landing page dengan hero section
│   ├── visi-misi.php      # Visi & Misi
│   ├── struktur.php       # Struktur Organisasi
│   ├── fokus.php          # Bidang Fokus Lab
│   ├── roadmap.php        # Roadmap Lab
│   ├── agenda.php         # Agenda kegiatan
│   ├── galeri.php         # Galeri foto/video
│   ├── penelitian.php     # Arsip penelitian (PDF)
│   ├── pengabdian.php     # Arsip pengabdian (PDF)
│   ├── sarana.php         # Sarana & Prasarana
│   ├── konsultatif.php    # Layanan konsultatif
│   ├── link.php           # Link eksternal
│   └── 404.php            # Halaman Error 404
├── public/                
│   ├── index.php          # Entry point aplikasi
│   └── uploads/           
│       ├── images/        # Upload gambar & video
│       └── documents/     # Upload dokumen PDF
├── sql/                   
│   └── schema.sql         # Database schema & sample data
├── .env                   # Environment variables (buat manual)
├── .env.example           # Contoh environment variables
└── README.md              # Dokumentasi
```

## ⚙️ Instalasi

### 1. Clone atau Download Repository

```bash
cd /path/to/webserver
git clone <repository-url> NCS
```

### 2. Konfigurasi Environment

Copy file `.env.example` ke `.env`:

```bash
cp .env.example .env
```

Edit `.env` dengan kredensial Anda:

```env
# Database Configuration
DB_HOST=localhost
DB_PORT=5432
DB_NAME=ncs_lab
DB_USER=postgres
DB_PASSWORD=your_password

# Application Configuration
APP_NAME="NCS Laboratory"
APP_URL=http://your-domain.com
APP_DEBUG=false

# File Upload Limits
MAX_FILE_SIZE=5242880
MAX_VIDEO_SIZE=104857600
ALLOWED_EXTENSIONS=pdf,jpg,jpeg,png,gif
```

### 3. Buat Database PostgreSQL

```bash
# Buat database
createdb ncs_lab

# Import schema
psql -d ncs_lab -f sql/schema.sql
```

Atau melalui **pgAdmin**:
1. Buat database baru bernama `ncs_lab`
2. Jalankan query dari file `sql/schema.sql`

### 4. Set Permissions

```bash
chmod -R 755 public/uploads
chown -R www-data:www-data public/uploads
```

### 5. Konfigurasi Web Server

#### Nginx (aaPanel)

Buka **Website > Domain > URL Rewrite** dan paste:

```nginx
# NCS Laboratory URL Rewrite

# Main website routing
location / {
    try_files $uri $uri/ /public/index.php?$query_string;
}

# Admin panel routing
location /admin {
    try_files $uri $uri/ /admin/index.php?$query_string;
}

# Public folder
location /public {
    try_files $uri $uri/ /public/index.php?$query_string;
}

# Protect sensitive directories
location ~ ^/(config|includes|sql)/ {
    deny all;
    return 403;
}

# Protect .env file
location ~ /\.env {
    deny all;
    return 403;
}
```

Juga **comment** baris ini di konfigurasi nginx agar PHP handle 404:

```nginx
# error_page 404 /404.html;
```

#### Apache

Pastikan `mod_rewrite` aktif dan buat `.htaccess` di root:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ public/index.php?page=$1 [QSA,L]

# Protect sensitive directories
RewriteRule ^(config|includes|sql)/ - [F,L]
RewriteRule ^\.env$ - [F,L]
```

## 🔐 Login Admin

Akses panel admin di: `http://your-domain/admin/`

**Default credentials:**
- Username: `admin`
- Password: `admin123`

⚠️ **PENTING:** Segera ganti password default setelah login pertama!

## 📱 Fitur

### Frontend (Public)
- ✅ Landing page dengan Matrix Rain effect
- ✅ Profil: Visi Misi, Struktur Organisasi
- ✅ Bidang Fokus & Roadmap Lab
- ✅ Agenda Kegiatan
- ✅ Galeri Foto & Video
- ✅ Arsip Penelitian & Pengabdian (download PDF)
- ✅ Layanan: Sarana Prasarana & Konsultatif
- ✅ Link Eksternal
- ✅ Form Kontak
- ✅ Custom 404 Page
- ✅ Responsive design (mobile-first)
- ✅ Dark mode dengan tema pastel

### Backend (Admin)
- ✅ Dashboard dengan statistik
- ✅ CRUD Agenda
- ✅ CRUD Galeri (Image & Video support)
- ✅ CRUD Dokumen PDF
- ✅ CRUD Layanan
- ✅ CRUD Bidang Fokus
- ✅ CRUD Roadmap
- ✅ CRUD Struktur Organisasi
- ✅ CRUD Tim Pengembang
- ✅ CRUD Link Eksternal
- ✅ Manajemen Pesan (Tandai dibaca)
- ✅ Pengaturan Website
- ✅ Manajemen User
- ✅ Custom 404 Page
- ✅ Responsive admin panel

## 🔧 Pengembangan

### Menambahkan Halaman Baru

1. Buat file baru di folder `pages/`
2. Tambahkan ke array `$validPages` di `public/index.php`
3. Tambahkan title di array `$pageTitles`
4. Update navigasi di `includes/navbar.php`

### Kustomisasi Tema

Edit konfigurasi Tailwind di `includes/header.php`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                pastel: {
                    teal: '#88c9c9',
                    mint: '#a8e6cf',
                    lavender: '#c3b1e1',
                    rose: '#e8b4bc',
                    peach: '#f5c7a9',
                    sky: '#a7c5eb',
                }
            }
        }
    }
}
```

### Database

Semua tabel menggunakan PostgreSQL dengan fitur:
- Boolean fields (`is_active`, `is_featured`)
- Timestamps (`created_at`, `updated_at`)
- Foreign key references
- Indexes untuk performa

## 🐛 Troubleshooting

### Error "Invalid input syntax for type boolean"
Pastikan nilai boolean dikonversi ke string `'true'` atau `'false'` untuk PostgreSQL.

### Error "Headers already sent"
Jangan ada output HTML sebelum memanggil fungsi `redirect()` atau `header()`.

### 404 Page tidak muncul
Pastikan konfigurasi nginx sudah benar dan comment `error_page 404 /404.html;`.

## 👥 Tim Pengembang

Data tim pengembang dapat dikelola melalui **Admin Panel > Tim Pengembang**.

## 📄 Lisensi

© 2025 NCS Laboratory - Politeknik Negeri Malang

---

**Dibuat dengan ❤️ menggunakan PHP Native, PostgreSQL, dan TailwindCSS**
