# Dokumentasi Website PPMRJ Bandung

## Daftar Isi

1. [Gambaran Umum Proyek](#gambaran-umum-proyek)
2. [Arsitektur Sistem](#arsitektur-sistem)
3. [Struktur Database](#struktur-database)
4. [Fitur Utama](#fitur-utama)
5. [Panduan Instalasi](#panduan-instalasi)
6. [Panduan Penggunaan](#panduan-penggunaan)
7. [Struktur File](#struktur-file)
8. [API Endpoints](#api-endpoints)
9. [Informasi Kontak PPMRJ](#informasi-kontak-ppmrj)

## Gambaran Umum Proyek

Website PPMRJ Bandung adalah sebuah aplikasi web yang dibangun menggunakan Laravel untuk mengelola informasi Pondok Pesantren Mahasiswa Roudhotul Jannah di Bandung Selatan. Website ini berfungsi sebagai portal informasi dan manajemen konten untuk aktivitas pesantren.

### Teknologi yang Digunakan

-   **Framework**: Laravel (PHP)
-   **Frontend**: Blade Templates, Tailwind CSS, Flowbite
-   **Database**: SQLite
-   **Build Tools**: Vite
-   **Editor**: Trix Editor untuk rich text editing

## Arsitektur Sistem

### Model-View-Controller (MVC)

Proyek ini mengikuti pola arsitektur MVC Laravel:

#### Models

-   `User` - Mengelola data pengguna dan autentikasi
-   `Activity` - Mengelola data aktivitas pesantren
-   `Structure` - Mengelola struktur organisasi pesantren

#### Controllers

-   `StructureController` - Mengelola CRUD struktur organisasi
-   `ActivityController` - Mengelola CRUD aktivitas
-   `AdminController` - Mengelola panel admin

#### Views

-   **Public Views**: `home.blade.php`, `structure.blade.php`, `activity.blade.php`
-   **Admin Views**: Panel administrasi untuk mengelola konten
-   **Auth Views**: `login.blade.php` untuk autentikasi

## Struktur Database

### Tabel Users

```sql
- id (Primary Key)
- name (String)
- email (String, Unique)
- role (Enum: 'admin', 'kreatif')
- password (String)
- timestamps
```

### Tabel Activities

```sql
- id (Primary Key)
- image_url (String)
- title (String)
- description (Text)
- author (Foreign Key ke users.id)
- timestamps
```

### Tabel Structures

```sql
- id (Primary Key)
- profile_url (String, Nullable)
- name (String)
- jobdesk (String)
- timestamps
```

## Fitur Utama

### 1. Halaman Publik

#### Beranda (`home.blade.php`)

-   Hero section dengan informasi PPMRJ
-   Section "About Us"
-   Grid card fitur unggulan
-   Aktivitas terbaru (4 item terbaru)

#### Struktur Organisasi (`structure.blade.php`)

-   Tampilan hierarki struktur organisasi
-   Kategori: Pengurus PPM, Dewan Guru, Koordinator Mahasiswa
-   Profile card untuk setiap anggota dengan foto dan jabatan

#### Aktivitas (`activity.blade.php`)

-   Grid layout aktivitas dengan modal detail
-   Gambar, judul, dan deskripsi aktivitas
-   Modal popup untuk detail lengkap

#### Registrasi (`registration.blade.php`)

-   Halaman informasi pendaftaran

#### Pengumuman (`announcement.blade.php`)

-   Halaman pengumuman terkini

### 2. Panel Admin

#### Dashboard (`admin/dashboard.blade.php`)

-   Halaman utama admin

#### Manajemen Aktivitas

-   **Index**: Daftar semua aktivitas
-   **Add**: Tambah aktivitas baru
-   **Edit**: Edit aktivitas existing

#### Manajemen Struktur

-   **Index**: Daftar anggota struktur
-   **Edit**: Edit data anggota

#### Manajemen User

-   **User List**: Daftar pengguna sistem

### 3. Sistem Autentikasi

-   Login page
-   Role-based access (admin, kreatif)
-   Session management

## Panduan Instalasi

### Persyaratan Sistem

-   PHP >= 8.1
-   Composer
-   Node.js & NPM
-   SQLite

### Langkah Instalasi

1. **Clone Repository**

```bash
git clone [repository-url]
cd web-ppmrj
```

2. **Install Dependencies**

```bash
composer install
npm install
```

3. **Environment Setup**

```bash
copy .env.example .env
php artisan key:generate
```

4. **Database Setup**

```bash
# Buat file database SQLite (jika belum ada)
# Untuk Windows PowerShell:
New-Item -Path "database\database.sqlite" -ItemType File -Force

php artisan migrate
php artisan db:seed
```

5. **Build Assets**

```bash
npm run build
# atau untuk development
npm run dev
```

6. **Run Server**

```bash
php artisan serve
```

### Default Login Credentials

-   **Admin**: admin@gmail.com / admin
-   **Kreatif**: kreatif@gmail.com / kreatif

## Panduan Penggunaan

### Untuk Administrator

#### Mengelola Aktivitas

1. Login ke panel admin
2. Navigasi ke "Halaman" > "Aktivitas"
3. Klik "Tambahkan Aktivitas" untuk menambah konten baru
4. Isi form dengan:
    - Judul aktivitas
    - Deskripsi (menggunakan Trix Editor)
    - Upload foto aktivitas
5. Simpan untuk mempublikasikan

#### Mengelola Struktur Organisasi

1. Navigasi ke "Halaman" > "Struktur"
2. Klik "Edit" pada anggota yang ingin diubah
3. Update informasi:
    - Nama lengkap
    - Foto profil (max 1MB, format JPG/JPEG)
    - Jabatan (readonly, sudah ditetapkan)

#### Mengelola User

1. Navigasi ke "Daftar User"
2. Lihat daftar user dengan role masing-masing
3. Kelola akses dan permissions

### Untuk Pengunjung

#### Melihat Aktivitas

1. Kunjungi halaman "Activity"
2. Klik pada gambar aktivitas untuk membuka modal detail
3. Baca deskripsi lengkap dalam popup

#### Melihat Struktur

1. Kunjungi halaman "Structure"
2. Lihat hierarki organisasi yang tersusun rapi
3. Informasi lengkap setiap anggota dengan foto dan jabatan

## Struktur File

### Views Layout

-   `resources/views/layouts/main.blade.php` - Layout utama untuk halaman publik
-   `resources/views/admin/layouts/adminMain.blade.php` - Layout untuk panel admin

### Partials

-   `resources/views/partials/navbar.blade.php` - Navigation bar
-   `resources/views/partials/footer.blade.php` - Footer dengan informasi kontak
-   `resources/views/admin/partials/navbar.blade.php` - Admin sidebar navigation

### Configuration

-   `tailwind.config.js` - Konfigurasi Tailwind CSS
-   `vite.config.js` - Build configuration
-   `config/` - Laravel configuration files

### Assets

-   `public/css/style.css` - Custom CSS styles
-   `public/js/script.js` - Custom JavaScript
-   `public/img/` - Images dan assets media

## API Endpoints

### Public Routes

-   `GET /` - Homepage
-   `GET /structure` - Halaman struktur organisasi
-   `GET /activities` - Halaman aktivitas
-   `GET /registration` - Halaman registrasi
-   `GET /announcement` - Halaman pengumuman
-   `GET /login` - Halaman login

### Admin Routes

-   `GET /admin/dashboard` - Dashboard admin
-   `GET /admin/structure` - Manajemen struktur
-   `POST /admin/structure/{id}` - Update struktur
-   `GET /admin/activity` - Manajemen aktivitas
-   `POST /admin/activity` - Tambah aktivitas
-   `PUT /admin/activity/{id}` - Update aktivitas
-   `DELETE /admin/activity/{id}` - Hapus aktivitas

### Authentication Routes

-   `POST /login` - Process login
-   `POST /logout` - Logout

## Informasi Kontak PPMRJ

**Alamat**: Jl. Sukabirus No.A1a, Citeureup, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257

**Kontak**:

-   Telepon: 082312201910
-   Email: ppmhs.roudhotuljannah@gmail.com

**Media Sosial**:

-   Instagram: [@ppmrj](https://www.instagram.com/ppmrj/?hl=id)
-   YouTube: [PPMRJ Bandung](https://www.youtube.com/@ppmrjbandung)

---

## Development Notes

### Known Issues

-   File upload menggunakan sistem manual (belum menggunakan Laravel Storage)
-   Authentication sistem custom (belum menggunakan Laravel Breeze/Sanctum)
-   Tidak ada sistem permission yang granular

### Future Improvements

-   Implementasi Laravel Breeze untuk authentication
-   Integrasi Spatie Permission untuk role management
-   Implementasi Service Layer untuk business logic
-   Penambahan Form Request untuk validation
-   Upgrade ke storage system yang lebih robust

### Contributing

Untuk berkontribusi pada proyek ini:

1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

---

_Dokumentasi ini dibuat untuk membantu pemahaman dan maintenance website PPMRJ Bandung. Untuk pertanyaan teknis lebih lanjut, silakan merujuk ke kode sumber atau hubungi tim pengembang._
