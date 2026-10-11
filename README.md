# 🎡 Sistem Manajemen Pasar Malam

Aplikasi berbasis web menggunakan **Laravel 11** untuk mengelola operasional pasar malam, memantau aktivitas wahana, mengatur penyewaan tenda, dan mencatat pemasukan setiap tenda secara terstruktur.

## ✨ Fitur Utama

- **Landing Page** — Halaman utama modern yang menampilkan informasi dan fitur aplikasi.
- **Autentikasi Pengguna** — Login, registrasi, dan logout untuk mengakses sistem.
- **Dashboard** — Ringkasan jumlah tenda, penyewa, wahana, aktivitas, dan pemasukan.
- **Manajemen Penyewa** — Mengelola data penyewa yang berpartisipasi dalam pasar malam.
- **Manajemen Tenda** — Mencatat nomor tenda, jenis tenda, biaya sewa, dan status penyewaan.
- **Manajemen Wahana** — Mengelola informasi wahana dan status operasionalnya.
- **Pemantauan Aktivitas** — Mencatat aktivitas wahana, waktu operasional, dan status kegiatan.
- **Pencatatan Pemasukan** — Mencatat pembayaran sewa dan pemasukan dari setiap tenda.
- **Laporan** — Menampilkan rekapitulasi pemasukan dan data operasional.
- **Responsive UI** — Tampilan menyesuaikan desktop, tablet, dan perangkat mobile.

## 🛠️ Teknologi

- PHP
- Laravel 11
- MySQL
- Blade Template Engine
- Bootstrap 5
- Bootstrap Icons
- JavaScript
- Composer
- Node.js dan NPM (jika diperlukan oleh aset frontend)

## 📋 Persyaratan Sistem

Pastikan perangkat kamu sudah memiliki:

- PHP yang memenuhi persyaratan Laravel 11.
- Composer.
- MySQL atau MariaDB.
- Node.js dan NPM jika menggunakan proses build frontend.
- Web browser modern.

## 🚀 Instalasi

### 1. Buat atau siapkan project Laravel 11

Jika memulai dari awal, jalankan:

```bash
composer create-project laravel/laravel pasar-malam "^11.0"
cd pasar-malam
```

Jika sudah memiliki project, langsung masuk ke folder project tersebut.

### 2. Pasang autentikasi Laravel Breeze

Jika project belum memiliki autentikasi:

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run build
```

> Jika Breeze sudah terpasang dan dikonfigurasi, langkah ini tidak perlu diulang.

### 3. Konfigurasi database

Buat database MySQL, misalnya:

```sql
CREATE DATABASE pasar_malam;
```

Sesuaikan konfigurasi pada file `.env`:

```env
APP_NAME="Sistem Manajemen Pasar Malam"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pasar_malam
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL di perangkat kamu.

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Pasang source code aplikasi

Salin file aplikasi ke direktori Laravel sesuai struktur foldernya, termasuk:

- `app/Models`
- `app/Http/Controllers`
- `database/migrations`
- `database/seeders`
- `resources/views`
- `routes/web.php`

Periksa kembali agar tidak menimpa konfigurasi penting atau menghapus route bawaan autentikasi yang masih diperlukan.

### 6. Jalankan migration

```bash
php artisan migrate
```

Jika project menyediakan seeder untuk data awal, jalankan sesuai konfigurasi seeder:

```bash
php artisan db:seed
```

**Perhatian:** gunakan `php artisan migrate:fresh --seed` hanya pada database pengembangan yang boleh dihapus karena perintah tersebut menghapus tabel yang ada sebelum membuatnya kembali.

### 7. Jalankan aplikasi

```bash
php artisan optimize:clear
php artisan serve
```

Buka alamat berikut pada browser:

http://127.0.0.1:8000

## 📁 Struktur Direktori

```text
pasar-malam/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── auth/
│       ├── dashboard/
│       ├── layouts/
│       ├── partials/
│       ├── tenants/
│       ├── tents/
│       ├── wahana/
│       ├── activities/
│       ├── payments/
│       └── reports/
├── routes/
│   └── web.php
├── .env
├── artisan
├── composer.json
└── README.md
```

Struktur folder di atas merupakan gambaran umum. Nama direktori dan file harus disesuaikan dengan source code yang digunakan.

## 💰 Alur Pengelolaan Pemasukan

1. Admin memasukkan data penyewa.
2. Admin mencatat tenda yang tersedia dan biaya sewanya.
3. Tenda dihubungkan dengan penyewa sesuai proses penyewaan.
4. Admin mencatat pembayaran sewa dan pemasukan lainnya.
5. Sistem menampilkan ringkasan pemasukan berdasarkan data transaksi.
6. Admin memeriksa laporan untuk memantau pendapatan dan operasional pasar malam.

**Catatan:** pemasukan sebaiknya dihitung dari transaksi pembayaran yang tercatat, bukan hanya dari biaya sewa yang direncanakan.

## 🔐 Keamanan

- Gunakan autentikasi untuk halaman pengelolaan.
- Validasi data pada setiap proses penyimpanan.
- Lindungi form menggunakan CSRF Laravel.
- Jangan membagikan file `.env` atau kredensial database.
- Untuk produksi, gunakan `APP_DEBUG=false` dan konfigurasi server yang aman.

## 🧪 Pemeriksaan Aplikasi

Untuk menjalankan pengujian Laravel:

```bash
php artisan test
```

Untuk melihat daftar route yang terdaftar:

```bash
php artisan route:list
```

## 📌 Pengembangan Selanjutnya

Aplikasi dapat dikembangkan lebih lanjut dengan:

- Grafik pemasukan harian, mingguan, dan bulanan.
- Filter laporan berdasarkan periode.
- Ekspor laporan ke Excel atau PDF.
- Pengingat masa sewa tenda.
- Hak akses admin dan petugas.
- Riwayat pembayaran dan status tunggakan.
- Pemantauan status wahana secara berkala.

## 📄 Lisensi

Project ini menggunakan Laravel sebagai framework utama. Periksa lisensi masing-masing dependensi dan tentukan lisensi project sesuai kebutuhan pengembangan.

---

**Sistem Manajemen Pasar Malam**  
Mengelola tenda, memantau wahana, dan mencatat pemasukan dalam satu aplikasi.
