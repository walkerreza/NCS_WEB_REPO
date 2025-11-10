# 🖥️ Backend Laravel - Lab Network & Cyber Security Website<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



Backend API untuk website Laboratorium Network & Cyber Security Politeknik Negeri Malang.<p align="center">

<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>

## 📋 Deskripsi Project<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>

Website dinamis dengan sistem manajemen konten (CMS) yang memungkinkan admin mengelola berbagai informasi dan dokumen laboratorium secara online.<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>

<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>

## ✨ Fitur Utama</p>

- ✅ Sistem autentikasi dengan role (Admin & Guest)

- ✅ REST API untuk semua data## About Laravel

- ✅ Manajemen profil laboratorium (Visi Misi, Struktur Organisasi)

- ✅ Manajemen galeri kegiatan dan dokumentasiLaravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- ✅ Manajemen agenda laboratorium

- ✅ Arsip dokumen penelitian dan pengabdian (PDF, max 5MB)- [Simple, fast routing engine](https://laravel.com/docs/routing).

- ✅ Manajemen layanan (Sarana Prasarana & Konsultatif)- [Powerful dependency injection container](https://laravel.com/docs/container).

- ✅ Sistem komentar dengan moderasi admin- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.

- ✅ Pengaturan site global- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).

- ✅ File upload untuk gambar dan PDF- Database agnostic [schema migrations](https://laravel.com/docs/migrations).

- [Robust background job processing](https://laravel.com/docs/queues).

## 🛠️ Tech Stack- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

- **Framework**: Laravel 12.x

- **PHP**: 8.2+Laravel is accessible, powerful, and provides tools required for large, robust applications.

- **Database**: MySQL

- **Authentication**: Laravel Breeze + Sanctum## Learning Laravel

- **File Storage**: Local Storage (Symlink)

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

## 📁 Struktur Database

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

### 9 Tabel Utama:

1. **users** - User dengan role (admin/guest)## Laravel Sponsors

2. **profiles** - Profil laboratorium

3. **galleries** - Galeri kegiatanWe would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

4. **agendas** - Agenda kegiatan

5. **archives** - Arsip dokumen PDF### Premium Partners

6. **services** - Layanan laboratorium

7. **links** - Link eksternal- **[Vehikl](https://vehikl.com)**

8. **comments** - Komentar dengan approval- **[Tighten Co.](https://tighten.co)**

9. **site_settings** - Pengaturan global- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**

- **[64 Robots](https://64robots.com)**

## 🚀 Instalasi- **[Curotec](https://www.curotec.com/services/technologies/laravel)**

- **[DevSquad](https://devsquad.com/hire-laravel-developers)**

### 1. Clone Project- **[Redberry](https://redberry.international/laravel-development)**

```bash- **[Active Logic](https://activelogic.com)**

git clone <repository-url>

cd Backend-NCS-Laravel## Contributing

```

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

### 2. Install Dependencies

```bash## Code of Conduct

composer install

npm installIn order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

```

## Security Vulnerabilities

### 3. Konfigurasi Environment

```bashIf you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

cp .env.example .env

php artisan key:generate## License

```

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### 4. Setup Database (.env)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_ncs
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Jalankan Migration & Seeder
```bash
php artisan migrate:fresh --seed
```

### 6. Buat Storage Link
```bash
php artisan storage:link
```

### 7. Build Assets (Opsional)
```bash
npm run build
```

### 8. Jalankan Server
```bash
php artisan serve
```

Server akan berjalan di: **http://localhost:8000**

## 🔐 Default Login

### Admin
- **Email**: `admin@ncs.lab`
- **Password**: `password`

### Guest (Testing)
- **Email**: `guest@ncs.lab`
- **Password**: `password`

## 📡 API Endpoints

### 🌍 Public Endpoints (Tanpa Auth)

#### Profil Laboratorium
```
GET /api/profiles                    - Semua profil
GET /api/profiles/visi_misi          - Visi & Misi
GET /api/profiles/struktur_organisasi - Struktur Organisasi
```

#### Galeri
```
GET /api/galleries                   - List galeri (paginated)
GET /api/galleries?type=kegiatan     - Filter kegiatan
GET /api/galleries?year=2024         - Filter tahun
GET /api/galleries/{id}              - Detail galeri
```

#### Agenda
```
GET /api/agendas                     - List agenda
GET /api/agendas?status=upcoming     - Agenda mendatang
GET /api/agendas?status=past         - Agenda lampau
GET /api/agendas/{id}                - Detail agenda
```

#### Arsip Dokumen
```
GET /api/archives                    - List arsip
GET /api/archives?type=penelitian    - Filter penelitian
GET /api/archives?type=pengabdian    - Filter pengabdian
GET /api/archives?year=2024          - Filter tahun
GET /api/archives/years              - Daftar tahun tersedia
GET /api/archives/{id}               - Detail arsip
GET /api/archives/{id}/download      - Download PDF (increment counter)
```

#### Layanan
```
GET /api/services                              - Semua layanan
GET /api/services?category=sarana_prasarana    - Sarana Prasarana
GET /api/services?category=konsultatif         - Konsultatif
GET /api/services/{id}                         - Detail layanan
```

#### Links & Settings
```
GET /api/links                       - Link eksternal
GET /api/settings                    - Semua pengaturan site
GET /api/settings/{key}              - Pengaturan berdasarkan key
```

#### Komentar
```
POST /api/comments                   - Submit komentar (guest)
GET  /api/comments/approved          - Komentar yang disetujui
GET  /api/comments/approved?page=beranda - Filter per halaman
```

### 🔒 Admin Endpoints (Requires Auth)

**Header Required:**
```
Authorization: Bearer {sanctum_token}
Accept: application/json
Content-Type: application/json (or multipart/form-data for file upload)
```

#### Resource Management
Semua resource menggunakan pattern RESTful:
```
GET    /api/admin/{resource}           - List
POST   /api/admin/{resource}           - Create
GET    /api/admin/{resource}/{id}      - Show
PUT    /api/admin/{resource}/{id}      - Update
DELETE /api/admin/{resource}/{id}      - Delete
```

**Resources:**
- `profiles`
- `galleries`
- `agendas`
- `archives`
- `services`
- `links`

#### Comment Moderation
```
GET    /api/admin/comments              - List semua komentar
GET    /api/admin/comments/stats        - Statistik komentar
PUT    /api/admin/comments/{id}/approve - Setujui komentar
PUT    /api/admin/comments/{id}/reject  - Tolak komentar
DELETE /api/admin/comments/{id}         - Hapus komentar
```

## 📤 File Upload Specs

### Gambar (Galleries, Profiles, Agendas, Services)
- **Format**: JPEG, PNG, JPG, GIF
- **Max Size**: 2MB
- **Path**: `storage/app/public/{directory}/{year}/{month}/`

### PDF (Archives)
- **Format**: PDF only
- **Max Size**: 5MB
- **Path**: `storage/app/public/archives/{type}/{year}/`

## 📊 API Response Format

### ✅ Success
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data",
    "data": { }
}
```

### ❌ Error
```json
{
    "sukses": false,
    "pesan": "Pesan error",
    "errors": { }
}
```

### 📄 Pagination
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data",
    "data": {
        "current_page": 1,
        "data": [ ],
        "last_page": 5,
        "per_page": 15,
        "total": 75
    }
}
```

## 🔒 Security Features

1. ✅ CSRF Protection (Laravel default)
2. ✅ SQL Injection Protection (Eloquent ORM)
3. ✅ File Upload Validation (MIME type & size)
4. ✅ Role-based Access Control (Middleware)
5. ✅ Password Hashing (bcrypt)
6. ✅ API Rate Limiting
7. ✅ Input Validation & Sanitization

## 📝 Coding Standards

### Bahasa & Style
- ✅ Semua komentar dan response API dalam **Bahasa Indonesia**
- ✅ Follow **PSR-12** coding standards
- ✅ Gunakan **Type Hints** pada method parameters
- ✅ Dokumentasi PHPDoc untuk setiap method
- ✅ Struktur kode bersih dan rapi (clean code)

### Helper & Helper Functions
```php
// FileUploadHelper
FileUploadHelper::uploadImage($file, 'galleries');
FileUploadHelper::uploadPDF($file, 'penelitian');
FileUploadHelper::deleteFile($path);
FileUploadHelper::getFileUrl($path);

// SiteSetting
SiteSetting::getValue('lab_name', 'Default Value');
SiteSetting::setValue('key', 'value', 'description');
```

## 🧪 Testing

### Run All Tests
```bash
php artisan test
```

### Run Specific Test
```bash
php artisan test --filter TestClassName
```

## 📦 Struktur Project

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       ├── ApiController.php (Base)
│   │       ├── ProfileController.php
│   │       ├── GalleryController.php
│   │       ├── AgendaController.php
│   │       ├── ArchiveController.php
│   │       ├── ServiceController.php
│   │       ├── LinkController.php
│   │       ├── CommentController.php
│   │       ├── SiteSettingController.php
│   │       └── Admin/
│   │           ├── AdminProfileController.php
│   │           ├── AdminGalleryController.php
│   │           ├── AdminArchiveController.php
│   │           ├── AdminCommentController.php
│   │           └── ... (other admin controllers)
│   └── Middleware/
│       └── CheckRole.php
├── Models/
│   ├── User.php
│   ├── Profile.php
│   ├── Gallery.php
│   ├── Agenda.php
│   ├── Archive.php
│   ├── Service.php
│   ├── Link.php
│   ├── Comment.php
│   └── SiteSetting.php
└── Helpers/
    └── FileUploadHelper.php
```

## 🎨 Frontend Integration

### Contoh Fetch Data (JavaScript)
```javascript
// GET data galeri
fetch('http://localhost:8000/api/galleries')
  .then(res => res.json())
  .then(data => console.log(data));

// POST komentar
fetch('http://localhost:8000/api/comments', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  body: JSON.stringify({
    name: 'John Doe',
    email: 'john@example.com',
    comment: 'Komentar saya...',
    page: 'beranda'
  })
})
.then(res => res.json())
.then(data => console.log(data));
```

### URL File
```javascript
// Gambar
const imageUrl = `http://localhost:8000/storage/${gallery.image_path}`;

// PDF
const pdfUrl = `http://localhost:8000/api/archives/${id}/download`;
```

## 🚀 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production` di `.env`
- [ ] Set `APP_DEBUG=false` di `.env`
- [ ] Generate APP_KEY baru
- [ ] Optimize autoloader: `composer install --optimize-autoloader --no-dev`
- [ ] Cache config: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache views: `php artisan view:cache`
- [ ] Setup backup database reguler
- [ ] Setup SSL certificate (HTTPS)

## 🤝 Tim Developer

**Project**: Lab Network & Cyber Security Website Backend  
**Institution**: Politeknik Negeri Malang  
**Jurusan**: Teknologi Informasi  
**Tahun**: 2025

### Anggota Tim
- Backend Developer
- Database Designer
- API Developer
- Frontend Integrator

## 📞 Kontak

**Lab Email**: ncs@polinema.ac.id  
**Lab Phone**: (0341) 404424  
**Address**: Jl. Soekarno Hatta No.9, Malang, Jawa Timur 65141

## 📄 License

Project ini adalah milik Politeknik Negeri Malang dan bersifat private/proprietary.

---

<div align="center">

**Made with ❤️ by Lab NCS Team - Politeknik Negeri Malang**

🔐 **Network & Cyber Security Laboratory**

</div>
