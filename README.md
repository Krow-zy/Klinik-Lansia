# KLINIK LANSIA

Sistem informasi klinik untuk manajemen data lansia berbasis web menggunakan Laravel.

### Backend
- **Admin Dashboard** - Panel administrasi untuk monitoring dan manajemen data
- **Data Input Lansia** - Interface user untuk input data lansia
- **Database Integration** - Penyimpanan data menggunakan MySQL

### Keamanan
- Admin dashboard tersembunyi dengan autentikasi
- Proteksi dari akses yang tidak sah

## Tech Stack

- **Framework**: Laravel 12
- **Database**: MySQL (Laragon)
- **Authentication**: Laravel Auth

## Sistem

- PHP >= 8.0
- Composer
- MySQL
- Laragon (Rekomen) atau XAMPP/WAMP

## Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/Krow-zy/Klinik-Lansia.git
   cd Klinik-Lansia
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   ```
   # Edit .env file
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=klinik_lansia
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Migrasi database**
   ```bash
   php artisan migrate
   php artisan db:seed # (opsional)
   ```

6. **Jalankan server**
   ```bash
   php artisan serve
   ```

---

