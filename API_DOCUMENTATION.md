# 📡 API Documentation - Lab NCS Backend

Base URL: `http://localhost:8000/api`

## 📌 Response Format

Semua response menggunakan format JSON dengan struktur:

### Success Response
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data",
    "data": { }
}
```

### Error Response
```json
{
    "sukses": false,
    "pesan": "Pesan error",
    "errors": { }
}
```

---

## 🌍 PUBLIC ENDPOINTS

### 1. Profil Laboratorium

#### Get All Profiles
```http
GET /api/profiles
```

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data profil",
    "data": [
        {
            "id": 1,
            "section": "visi_misi",
            "title": "Visi Lab NCS",
            "content": "...",
            "image": "profiles/logos/...",
            "order": 1,
            "is_active": true
        }
    ]
}
```

#### Get Profile by Section
```http
GET /api/profiles/{section}
```

**Parameters:**
- `section`: `visi_misi` | `struktur_organisasi`

---

### 2. Galeri

#### Get Galleries
```http
GET /api/galleries
GET /api/galleries?type=kegiatan
GET /api/galleries?year=2024
```

**Query Parameters:**
- `type` (optional): `kegiatan` | `dokumentasi`
- `year` (optional): tahun (2024, 2025, dll)
- `page` (optional): nomor halaman

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data galeri",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "title": "Workshop Keamanan Jaringan",
                "description": "...",
                "image_path": "galleries/2024/11/...",
                "type": "kegiatan",
                "event_date": "2024-11-01",
                "is_published": true,
                "creator": {
                    "id": 1,
                    "name": "Admin Lab NCS"
                }
            }
        ],
        "per_page": 12,
        "total": 50
    }
}
```

#### Get Gallery Detail
```http
GET /api/galleries/{id}
```

---

### 3. Agenda

#### Get Agendas
```http
GET /api/agendas
GET /api/agendas?status=upcoming
GET /api/agendas?status=past
```

**Query Parameters:**
- `status` (optional): `upcoming` | `past`
- Default: `upcoming`

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data agenda",
    "data": {
        "data": [
            {
                "id": 1,
                "title": "Seminar Cyber Security",
                "description": "...",
                "event_date": "2024-12-15",
                "event_time": "09:00:00",
                "location": "Lab NCS",
                "image_path": "agendas/2024/11/...",
                "is_active": true
            }
        ]
    }
}
```

---

### 4. Arsip Dokumen

#### Get Archives
```http
GET /api/archives
GET /api/archives?type=penelitian
GET /api/archives?type=pengabdian
GET /api/archives?year=2024
GET /api/archives?author=John%20Doe
```

**Query Parameters:**
- `type` (optional): `penelitian` | `pengabdian`
- `year` (optional): tahun publikasi
- `author` (optional): nama penulis

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data arsip",
    "data": {
        "data": [
            {
                "id": 1,
                "title": "Analisis Keamanan Jaringan WiFi",
                "description": "...",
                "type": "penelitian",
                "pdf_path": "archives/penelitian/2024/...",
                "file_size": 2048,
                "author": "John Doe",
                "year": 2024,
                "download_count": 15,
                "is_published": true
            }
        ]
    }
}
```

#### Get Available Years
```http
GET /api/archives/years
```

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil daftar tahun",
    "data": [2024, 2023, 2022]
}
```

#### Download Archive PDF
```http
GET /api/archives/{id}/download
```

**Response:** File PDF (auto download)
- Increment download counter otomatis

---

### 5. Layanan

#### Get Services
```http
GET /api/services
GET /api/services?category=sarana_prasarana
GET /api/services?category=konsultatif
```

**Query Parameters:**
- `category` (optional): `sarana_prasarana` | `konsultatif`

---

### 6. Links

#### Get All Links
```http
GET /api/links
```

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil data link",
    "data": [
        {
            "id": 1,
            "title": "Polinema",
            "url": "https://www.polinema.ac.id",
            "icon": "fa-university",
            "order": 1,
            "is_active": true
        }
    ]
}
```

---

### 7. Komentar

#### Submit Comment (Guest)
```http
POST /api/comments
Content-Type: application/json
```

**Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "comment": "Komentar saya tentang lab ini...",
    "page": "beranda"
}
```

**Validation Rules:**
- `name`: required, max 100 karakter
- `email`: required, valid email, max 100 karakter
- `comment`: required, max 1000 karakter
- `page`: required

**Response:**
```json
{
    "sukses": true,
    "pesan": "Komentar berhasil dikirim. Menunggu persetujuan admin.",
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "comment": "...",
        "page": "beranda",
        "is_approved": false,
        "ip_address": "127.0.0.1"
    }
}
```

#### Get Approved Comments
```http
GET /api/comments/approved
GET /api/comments/approved?page=beranda
```

---

### 8. Site Settings

#### Get All Settings
```http
GET /api/settings
```

**Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil pengaturan site",
    "data": {
        "lab_name": "Laboratorium Network & Cyber Security",
        "lab_email": "ncs@polinema.ac.id",
        "lab_phone": "(0341) 404424",
        "lab_address": "..."
    }
}
```

#### Get Setting by Key
```http
GET /api/settings/{key}
```

**Example:**
```http
GET /api/settings/lab_name
```

---

## 🔒 ADMIN ENDPOINTS

**Authentication Required:**
```
Authorization: Bearer {sanctum_token}
Accept: application/json
```

### Authentication

#### Login
```http
POST /login
Content-Type: application/json
```

**Body:**
```json
{
    "email": "admin@ncs.lab",
    "password": "password"
}
```

#### Get Current User
```http
GET /api/user
Authorization: Bearer {token}
```

---

### Admin Resources

Semua resource menggunakan pattern RESTful standar:

#### Profiles
```
GET    /api/admin/profiles           - List
POST   /api/admin/profiles           - Create
GET    /api/admin/profiles/{id}      - Show
PUT    /api/admin/profiles/{id}      - Update
DELETE /api/admin/profiles/{id}      - Delete
```

**Create/Update Body:**
```json
{
    "section": "visi_misi",
    "title": "Visi Lab NCS",
    "content": "Menjadi laboratorium...",
    "image": "(file upload)",
    "order": 1,
    "is_active": true
}
```

#### Galleries
```
GET    /api/admin/galleries
POST   /api/admin/galleries
PUT    /api/admin/galleries/{id}
DELETE /api/admin/galleries/{id}
```

**Create Body (multipart/form-data):**
```
title: Workshop Cyber Security
description: ...
image: (file)
type: kegiatan
event_date: 2024-11-15
is_published: true
```

#### Agendas
```
GET    /api/admin/agendas
POST   /api/admin/agendas
PUT    /api/admin/agendas/{id}
DELETE /api/admin/agendas/{id}
```

#### Archives
```
GET    /api/admin/archives
POST   /api/admin/archives
PUT    /api/admin/archives/{id}
DELETE /api/admin/archives/{id}
```

**Create Body (multipart/form-data):**
```
title: Analisis Keamanan Jaringan
description: ...
type: penelitian
pdf_file: (PDF file, max 5MB)
author: John Doe
year: 2024
is_published: true
```

#### Services
```
GET    /api/admin/services
POST   /api/admin/services
PUT    /api/admin/services/{id}
DELETE /api/admin/services/{id}
```

#### Links
```
GET    /api/admin/links
POST   /api/admin/links
PUT    /api/admin/links/{id}
DELETE /api/admin/links/{id}
```

#### Comments Management
```
GET    /api/admin/comments              - List all
GET    /api/admin/comments/stats        - Statistics
PUT    /api/admin/comments/{id}/approve - Approve
PUT    /api/admin/comments/{id}/reject  - Reject
DELETE /api/admin/comments/{id}         - Delete
```

**Stats Response:**
```json
{
    "sukses": true,
    "pesan": "Berhasil mengambil statistik komentar",
    "data": {
        "pending": 5,
        "approved": 25,
        "total": 30
    }
}
```

---

## ⚠️ Error Codes

- `200` - OK
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized (belum login)
- `403` - Forbidden (tidak punya akses)
- `404` - Not Found
- `422` - Unprocessable Entity (validasi gagal)
- `500` - Internal Server Error

---

## 📝 Notes

1. Semua endpoint menggunakan prefix `/api`
2. Semua response dalam format JSON
3. File upload menggunakan `multipart/form-data`
4. Pagination default: 10-20 items per page
5. Admin endpoints memerlukan Sanctum token
6. Semua pesan dalam Bahasa Indonesia

---

## 🧪 Testing dengan cURL

### Test Public Endpoint
```bash
curl http://localhost:8000/api/profiles
```

### Test Submit Comment
```bash
curl -X POST http://localhost:8000/api/comments \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "comment": "Test comment",
    "page": "beranda"
  }'
```

### Test Download Archive
```bash
curl http://localhost:8000/api/archives/1/download -O
```

---

**Documentation Version:** 1.0  
**Last Updated:** November 2025  
**Backend:** Laravel 12.x
