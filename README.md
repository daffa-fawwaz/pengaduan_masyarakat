# Pengaduan Masyarakat

## Deskripsi Proyek

Pengaduan Masyarakat adalah sebuah platform berbasis web yang memungkinkan masyarakat untuk mengajukan pengaduan terkait permasalahan di lingkungan mereka. Admin dapat meninjau, menanggapi, dan menyelesaikan pengaduan dengan lebih efisien melalui sistem ini.

## Fitur Utama

-   **Pengaduan Masyarakat**: Pengguna dapat mengajukan pengaduan dengan deskripsi dan bukti pendukung.
-   **Dashboard User**: Pengguna dapat melihat status pengaduan mereka.
-   **Dashboard Admin**: Admin dapat mengelola dan merespons pengaduan masyarakat.
-   **Notifikasi**: Pengguna mendapatkan notifikasi ketika pengaduan mereka diperbarui.
-   **Manajemen User**: Sistem autentikasi untuk user dan admin.

## Teknologi yang Digunakan

-   **Backend**: Laravel
-   **Frontend**: HTML, CSS, JavaScript (Tanpa Framework)
-   **Database**: MySQL
-   **Deployment**: MAMP (untuk pengembangan lokal)

## Cara Instalasi

1. Clone repository ini:
    ```sh
    git clone https://github.com/username/repo-pengaduan-masyarakat.git
    ```
2. Masuk ke direktori proyek:
    ```sh
    cd repo-pengaduan-masyarakat
    ```
3. Install dependencies menggunakan Composer:
    ```sh
    composer install
    ```
4. Buat file `.env` dan atur konfigurasi database.
5. Jalankan migrasi database:
    ```sh
    php artisan migrate --seed
    ```
6. Jalankan server lokal:
    ```sh
    php artisan serve
    ```
7. Akses aplikasi di browser melalui `http://127.0.0.1:8000`.

## Kontribusi

Jika ingin berkontribusi dalam proyek ini, silakan fork repository ini dan buat pull request dengan perubahan yang diusulkan.

## Lisensi

Proyek ini menggunakan lisensi MIT. Silakan lihat file `LICENSE` untuk informasi lebih lanjut.
