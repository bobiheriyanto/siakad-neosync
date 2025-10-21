# SIAKAD NeoSync
Versi: 2.0.0-NeoSync

Deskripsi: Skeleton aplikasi SIAKAD berbasis PHP Native (PHP 8.2) + MySQL, dengan Docker.

Fitur utama:
- Multi-role: admin, mahasiswa, dosen, baak, prodi, bauk, operator, calon_maba
- KRS Online, caching, validasi SKS, PA approval flow
- Input nilai oleh dosen, KHS & Transkrip
- PMB dengan formulir dan email notifikasi
- BAUK: import Excel pembayaran, VA manual handling, lock akses
- Export Neo Feeder (CSV/JSON) module
- Docker + docker-compose untuk PHP-FPM, Nginx, MySQL, phpMyAdmin

Instalasi singkat (Docker):
1. copy .env.example ke .env dan edit konfigurasi
2. docker-compose up -d --build
3. jalankan migrasi: docker-compose exec app php scripts/migrate.php
4. seed admin: docker-compose exec app php scripts/seed_admin.php
