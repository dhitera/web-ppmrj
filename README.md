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

## Gambaran Umum Proyek

Website PPMRJ Bandung adalah sebuah aplikasi web berbasis CMS (Content Management System) yang dibangun menggunakan Laravel untuk mengelola informasi Pondok Pesantren Mahasiswa Roudhotul Jannah di Bandung Selatan. Website ini berfungsi sebagai portal informasi dan manajemen konten untuk aktivitas pesantren.

### Teknologi yang Digunakan

-   **Framework**: Laravel 11.x (PHP 8.2+)
-   **Frontend**: Blade Templates, Tailwind CSS 3.4, Flowbite 2.5
-   **Database**: SQLite
-   **Build Tools**: Vite 5.0
-   **Media Management**: Spatie Media Library 11.13
-   **Permissions**: Spatie Laravel Permission 6.20
-   **Editor**: Trix Editor 2.1 untuk rich text editing
-   **Development Tools**: Laravel Pint, PHPUnit 11.x

## Arsitektur Sistem

### Model-View-Controller (MVC)

Proyek ini mengikuti pola arsitektur MVC Laravel:

#### Models

-   `User` - Mengelola data pengguna dengan role-based permissions
-   `Activity` - Mengelola data aktivitas pesantren dengan media library
-   `Structure` - Mengelola struktur organisasi pesantren dengan foto profil
-   `Announcement` - Mengelola pengumuman penerimaan santri
-   `SelectedStudent` - Mengelola data calon santri yang diterima
-   `AdditionalInformation` - Informasi tambahan untuk pengumuman
-   `Registration` - Mengelola data halaman pendaftaran
-   `Home` - Mengelola konten halaman beranda
-   `About` - Mengelola konten halaman About
-   `Setting` - Mengelola pengaturan aplikasi

#### Controllers

-   `ActivityController` - Mengelola CRUD aktivitas dengan media upload
-   `StructureController` - Mengelola CRUD struktur organisasi
-   `AnnouncementController` - Mengelola pengumuman dan data santri
-   `RegistrationController` - Mengelola halaman pendaftaran
-   `HomeController` - Mengelola konten halaman beranda
-   `AboutController` - Mengelola konten halaman About
-   `AdminController` - Dashboard dan manajemen admin
-   `AuthController` - Mengelola autentikasi dan login
-   `SettingsController` - Mengelola pengaturan aplikasi

#### Views

-   **Public Views**: `home.blade.php`, `structure.blade.php`, `activity.blade.php`, `announcement.blade.php`, `registration.blade.php`, `about.blade.php`
-   **Admin Views**: Panel administrasi untuk mengelola semua konten
-   **Auth Views**: `login.blade.php` untuk autentikasi
-   **Layout Views**: `main.blade.php` (public), `adminMain.blade.php` (admin)

## Struktur Database

### Tabel Users

```sql
- id (Primary Key)
- name (String)
- email (String, Unique)
- password (String)
- email_verified_at (Timestamp, Nullable)
- remember_token (String, Nullable)
- timestamps
```

### Tabel Activities

```sql
- id (Primary Key)
- title (String)
- description (Text)
- author (Foreign Key ke users.id, Nullable)
- timestamps
```

### Tabel Structures

```sql
- id (Primary Key)
- name (String)
- jobdesk (String)
- timestamps
```

### Tabel Announcements

```sql
- id (Primary Key)
- title (String)
- publish_date (Date)
- timestamps
```

### Tabel Selected_Students

```sql
- id (Primary Key)
- announcement_id (Foreign Key ke announcements.id)
- student_name (String)
- student_city (String)
- gelombang (Enum: 'gelombang1', 'gelombang2')
- timestamps
```

### Tabel Additional_Information

```sql
- id (Primary Key)
- announcement_id (Foreign Key ke announcements.id)
- info (Text)
- timestamps
```

### Tabel Registrations

```sql
- id (Primary Key)
- title (String)
- description (String)
- registration_link (String)
- timestamps
```

### Tabel Homes

```sql
- id (Primary Key)
- header (String, default: 'PPMRJ')
- subheader (String, default: 'Bandung Selatan')
- description (String)
- notificationMsg (String, Nullable)
- guruCount (Integer, default: 0)
- studentCount (Integer, default: 0)
- alumniCount (Integer, default: 0)
- timestamps
```

### Tabel Abouts

```sql
- id (Primary Key)
- description (String)
- vision (String)
- mission (String)
- galleryTitle (String)
- galleryDescription (String)
- timestamps
```

### Tabel Settings

```sql
- id (Primary Key)
- key (String, Unique)
- value (Text, Nullable)
- display_name (String)
- description (Text, Nullable)
- timestamps
```

### Tabel Media (Spatie Media Library)

```sql
- id (Primary Key)
- model_type (String)
- model_id (Unsigned Big Integer)
- uuid (String, Nullable)
- collection_name (String)
- name (String)
- file_name (String)
- mime_type (String, Nullable)
- disk (String)
- conversions_disk (String, Nullable)
- size (Unsigned Big Integer)
- manipulations (JSON)
- custom_properties (JSON)
- generated_conversions (JSON)
- responsive_images (JSON)
- order_column (Unsigned Integer, Nullable)
- timestamps
```

### Tabel Roles & Permissions (Spatie Permission)

#### Roles

```sql
- id (Primary Key)
- name (String)
- guard_name (String)
- timestamps
```

#### Permissions

```sql
- id (Primary Key)
- name (String)
- guard_name (String)
- timestamps
```

## Fitur Utama

### 1. Halaman Publik

#### Beranda (`home.blade.php`)

-   Hero section dengan informasi PPMRJ
-   Section "About Us"
-   Statistik pesantren (jumlah guru, santri, alumni)
-   Grid card fitur unggulan
-   Aktivitas terbaru (4 item terbaru)
-   Banner notifikasi (dapat diatur via admin)

#### Struktur Organisasi (`structure.blade.php`)

-   Tampilan hierarki struktur organisasi
-   Kategori: Pembina PPM, Ketua PPM, Pinisepuh, Dewan Guru, Koordinator Mahasiswa
-   Profile card untuk setiap anggota dengan foto dan jabatan
-   Responsive grid layout

#### Aktivitas (`activity.blade.php`)

-   Grid layout aktivitas dengan modal detail
-   Gambar, judul, dan deskripsi aktivitas
-   Modal popup untuk detail lengkap
-   Media gallery integration

#### Pengumuman (`announcement.blade.php`)

-   Halaman pengumuman penerimaan santri
-   Daftar calon santri yang diterima per gelombang
-   Informasi tambahan untuk setiap gelombang
-   Sistem gelombang 1 dan gelombang 2

#### Registrasi (`registration.blade.php`)

-   Halaman informasi pendaftaran dengan banner hero
-   Link ke form pendaftaran eksternal
-   Informasi lengkap proses pendaftaran

#### Tentang Kami (`about.blade.php`)

-   Informasi tentang PPMRJ
-   Visi dan misi pesantren
-   Galeri kegiatan

### 2. Panel Admin

#### Dashboard (`admin/dashboard.blade.php`)

-   Halaman utama admin dengan statistik
-   Quick actions untuk setiap modul
-   Pengaturan sistem (toggle fitur)
-   Role-based menu access

#### Manajemen Aktivitas

-   **Index**: Daftar semua aktivitas dengan preview gambar
-   **Add**: Tambah aktivitas baru dengan Trix Editor
-   **Edit**: Edit aktivitas existing dengan media upload
-   **Delete**: Hapus aktivitas dengan konfirmasi

#### Manajemen Struktur

-   **Index**: Daftar anggota struktur dengan foto profil
-   **Edit**: Edit data anggota dengan upload foto
-   Manajemen jabatan dan posisi

#### Manajemen Pengumuman

-   **Kelola Santri**: CRUD data calon santri yang diterima
-   **Gelombang Pendaftaran**: Sistem gelombang 1 dan 2
-   **Informasi Tambahan**: Tambah info penting per gelombang
-   **Export/Import**: Kemampuan export data santri

#### Manajemen Registrasi

-   **Edit Halaman**: Update konten halaman pendaftaran
-   **Banner Management**: Upload dan edit banner hero
-   **Link Management**: Kelola link form pendaftaran

#### Manajemen Konten

-   **Halaman Beranda**: Edit hero section, statistik, notifikasi
-   **Halaman Tentang**: Edit visi, misi, deskripsi, galeri
-   **Pengaturan Sistem**: Toggle aktif/nonaktif fitur

#### Manajemen User

-   **User List**: Daftar pengguna sistem
-   **Role Management**: Admin, Divisi IT, Panitia
-   **Permission Control**: Granular permission system

### 3. Sistem Autentikasi & Authorization

-   Role-based access control menggunakan Spatie Permission
-   Login page dengan session management
-   Multiple roles: Admin, Divisi IT, Panitia
-   Granular permissions untuk setiap fitur
-   Middleware protection untuk admin routes

### 4. Fitur Media Management

-   Upload dan manajemen gambar menggunakan Spatie Media Library
-   Multiple collections untuk berbagai jenis media
-   Image optimization dan responsive images
-   File validation (size, format)
-   Media gallery untuk aktivitas dan struktur

### 5. Sistem Pengaturan

-   Dynamic settings system
-   Toggle fitur on/off dari admin panel
-   Pengaturan notifikasi banner
-   Konfigurasi halaman aktif/nonaktif

## Panduan Instalasi

### Persyaratan Sistem

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   SQLite (default) atau MySQL/PostgreSQL
-   Web server (Apache/Nginx) atau PHP built-in server

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
-   **Divisi IT**: divisiit@gmail.com / divisiit
-   **Panitia**: panitia@gmail.com / panitia

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
3. Kelola akses dan permissions berdasarkan role

#### Mengelola Pengumuman

1. Navigasi ke "Halaman" > "Pengumuman"
2. **Tambah Calon Santri**:
    - Klik "Tambahkan Data Santri"
    - Isi nama lengkap, asal kota, dan pilih gelombang
3. **Tambah Informasi Tambahan**:
    - Klik "Tambahkan Informasi"
    - Isi informasi penting terkait gelombang

#### Mengelola Pengaturan

1. Navigasi ke Dashboard admin
2. Gunakan toggle switches untuk:
    - Aktifkan/nonaktifkan notifikasi banner
    - Aktifkan/nonaktifkan halaman registrasi
    - Aktifkan/nonaktifkan halaman pengumuman

### Untuk Pengunjung

#### Melihat Aktivitas

1. Kunjungi halaman "Activity"
2. Klik pada gambar aktivitas untuk membuka modal detail
3. Baca deskripsi lengkap dalam popup

#### Melihat Struktur

1. Kunjungi halaman "Structure"
2. Lihat hierarki organisasi yang tersusun rapi
3. Informasi lengkap setiap anggota dengan foto dan jabatan

#### Melihat Pengumuman

1. Kunjungi halaman "Announcement"
2. Lihat daftar calon santri yang diterima per gelombang
3. Baca informasi tambahan untuk setiap gelombang pendaftaran

#### Mendaftar Sebagai Santri

1. Kunjungi halaman "Registration"
2. Baca informasi lengkap pendaftaran
3. Klik tombol "Daftar Sekarang" untuk mengakses form pendaftaran
4. Isi form pendaftaran di platform eksternal yang tersedia

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
-   `postcss.config.js` - PostCSS configuration
-   `config/` - Laravel configuration files
-   `permission.php` - Spatie Permission configuration
-   `media-library.php` - Spatie Media Library configuration
-   `database.php` - Database connections
-   `app.php` - Application configuration

### Assets

-   `public/css/style.css` - Custom CSS styles
-   `public/js/script.js` - Custom JavaScript

## API Endpoints

### Public Routes

-   `GET /` - Homepage
-   `GET /structure` - Halaman struktur organisasi
-   `GET /activities` - Halaman aktivitas
-   `GET /registration` - Halaman registrasi
-   `GET /announcement` - Halaman pengumuman
-   `GET /about` - Halaman tentang kami
-   `GET /login` - Halaman login

### Authentication Routes

-   `POST /login` - Process login
-   `POST /logout` - Logout

### Admin Routes (Protected)

#### Dashboard & Settings

-   `GET /admin/dashboard` - Dashboard admin
-   `POST /admin/settings/toggle` - Toggle system settings

#### Structure Management

-   `GET /admin/structure` - Manajemen struktur
-   `GET /admin/structure/{id}/edit` - Edit struktur form
-   `POST /admin/structure/{id}` - Update struktur

#### Activity Management

-   `GET /admin/activity` - Manajemen aktivitas
-   `GET /admin/activity/add` - Add activity form
-   `POST /admin/activity` - Store new activity
-   `GET /admin/activity/{id}/edit` - Edit activity form
-   `POST /admin/activity/{id}/update` - Update activity
-   `DELETE /admin/activity/delete/{id}` - Delete activity

#### Announcement Management

-   `GET /admin/announcement` - Manajemen pengumuman
-   `GET /admin/announcement/add-santri` - Add student form
-   `GET /admin/announcement/add-info` - Add information form
-   `POST /admin/announcement/storeSantri` - Store new student
-   `POST /admin/announcement/storeInfo` - Store new information
-   `GET /admin/announcement/{id}/editSantri` - Edit student form
-   `GET /admin/announcement/{id}/editInfo` - Edit information form
-   `POST /admin/announcement/{id}/updateSantri` - Update student
-   `POST /admin/announcement/{id}/updateInfo` - Update information
-   `DELETE /admin/announcement/delete-santri/{id}` - Delete student
-   `DELETE /admin/announcement/delete-info/{id}` - Delete information

#### Registration Management

-   `GET /admin/registration` - Manajemen registrasi
-   `GET /admin/registration/edit` - Edit registration form
-   `POST /admin/registration/update` - Update registration

#### Content Management

-   `GET /admin/home` - Manajemen halaman beranda
-   `GET /admin/about` - Manajemen halaman tentang
-   `GET /admin/users` - Manajemen pengguna

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

## Development Notes

### Development Notes

### Sistem Permission & Role

Aplikasi menggunakan Spatie Laravel Permission dengan 3 role utama:

#### Roles dan Permissions:

**Admin**

-   Akses penuh ke semua fitur
-   Manage users, activities, structure, announcements, registration
-   Manage home page, about page
-   View admin dashboard

**Divisi IT**

-   Manage activities, structure, announcements, registration
-   Manage home page, about page
-   View admin dashboard
-   Tidak dapat manage users

**Panitia**

-   Manage announcements, registration
-   View admin dashboard
-   Akses terbatas hanya untuk pengumuman dan pendaftaran

### Media Management

-   Menggunakan Spatie Media Library untuk upload dan management file
-   Collections yang digunakan:
    -   `images` - untuk foto profil struktur organisasi
    -   `activities` - untuk gambar aktivitas
    -   `registration` - untuk banner halaman registrasi
-   Validasi file: max 5MB, format JPEG/JPG/PNG/WebP
-   Automatic image optimization dan responsive images
