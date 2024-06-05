*\* this repository is for educational purposes only* 

# Blog App

Aplikasi ini adalah aplikasi web blog/artikel yang dibuat menggunakan PHP dengan konsep MVC dan menggunakan autoload dari Composer dan dengan framework CSS Bootstrap. Aplikasi ini memiliki banyak sekali celah keamanan di dalamnya seperti celah *Injection Attack*, *Cross-Site Request Forgery (CSRF)*, dan *Cross-Site Scripting*. Temukan celah-celah tersebut dan perbaiki agar terhindar dari serangan siber yang berbahaya.

## Requirements

### Perangkat Keras

- **Prosesor**: Minimal Dual-Core 2 GHz
- **RAM**: Minimal 2 GB
- **Penyimpanan**: Minimal 500 MB ruang kosong

### Perangkat Lunak

- **Sistem Operasi**:
  - Windows 7 atau yang lebih baru
  - Linux (disarankan distribusi Ubuntu atau Debian)
- **PHP**: Versi 7.4 atau yang lebih baru
- **Composer**: Versi terbaru
- **Web Server**: Apache atau Nginx
- **Database**: MySQL atau MariaDB

## Langkah-langkah Menjalankan Aplikasi di Lokal

### 1. Clone Repository

Clone repository ini ke direktori lokal Anda:

```bash
git clone https://github.com/cikipawyeye/belajar-dasar-keamanan-aplikasi-web.git
cd belajar-dasar-keamanan-aplikasi-web
```

### 2. Instal Dependensi

Jalankan perintah berikut untuk menginstal semua dependensi menggunakan Composer:

```bash
composer install
```

### 3. Konfigurasi Database

- Buat database baru di MySQL.
- Import file SQL `blog_app.sql` untuk membuat tabel yang diperlukan.
- Sesuaikan konfigurasi database Anda pada file `src/Config/Database.php`.

### 4. Konfigurasi Web Server

Contoh blok server di file konfigurasi Apache:

```apache
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /path/to/your/project/public
    ServerName yourdomain.com

    <Directory /path/to/your/project/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Contoh blok server di file konfigurasi Nginx:

```nginx
server {
    listen 80;
    server_name yourdomain.com;

    root /path/to/your/project/public;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

Cara menjalankan aplikasi di lokal menggunakan PHP:
```bash
cd /path/to/your/project
cd public
php -S localhost:8000
```
*\* ganti /path/to/your/project menjadi direktori tempat Anda menyimpan folder proyek ini* 

## Struktur Proyek

- `src/`: Direktori utama untuk kode aplikasi.
  - `Config/`: Direktori untuk file konfigurasi.
  - `Controllers/`: Direktori untuk controller.
  - `Models/`: Direktori untuk model.
  - `Views/`: Direktori untuk view.
- `public/`: Direktori untuk file publik dan entry point aplikasi (index.php).
- `vendor/`: Direktori untuk dependensi Composer.

## Fitur

- Manajemen artikel (CRUD)
- Update profile
- Login dan Logout

## Fungsi Tambahan

- Fungsi global view untuk memuat view dengan data yang diberikan.
- Fungsi truncateString untuk memotong string menjadi maksimal 50 karakter.

## Troubleshooting

Jika Anda mengalami masalah, pastikan untuk memeriksa:

- Konfigurasi database di file `src/Config/Database.php`.
- Hak akses direktori proyek.
- Konfigurasi web server yang digunakan.
