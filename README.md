# sistem informasi geografis (SIG) Pemetaan KKN

Aplikasi Pemetaan KKN dengan Laravel adalah sebuah sistem informasi geografis (SIG) yang dikembangkan menggunakan framework Laravel. Aplikasi ini menyediakan fitur-fitur seperti manajemen pengguna yang mencakup registrasi, login, dan manajemen hak akses berbasis peran (RBAC), serta tampilan peta interaktif menggunakan Leaflet. Selain itu, aplikasi ini juga memiliki fitur-fitur tambahan seperti manajemen lokasi. Tujuan dari aplikasi ini adalah untuk membantu institusi pendidikan dan lembaga terkait dalam mengelola dan memantau proyek KKN dengan lebih efisien dan efektif menggunakan teknologi SIG.



## Installation

### Clone Repository
```bash
https://github.com/razorzero0/SIG-Pemetaan-KKN.git
```

### Masuk ke Direktori
cd Absensi-Foto-QR-code-PHP

### Instal Dependensi
composer install

### Buat File Environment
cp .env.example .env

### Konfigurasi Environment
Sesuaikan pengaturan database (nama database, username, password) di file .env

### Generate App Key
php artisan key:generate

### Jalankan Migrasi Database
php artisan migrate

### Menjalankan Database Seeder
php artisan db:seed

### Link Storage
php artisan storage:link

### Menjalankan Server
php artisan serve

Aplikasi  sekarang berjalan dan Anda dapat mengaksesnya melalui browser di alamat http://localhost:8000.
