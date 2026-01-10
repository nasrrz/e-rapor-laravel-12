# 🎓 Sistem e-Rapor Digital (Laravel 12)

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20Logo%20Mono%20Dark.svg" width="400" alt="Laravel Logo">
</p>

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg?style=for-the-badge&logo=laravel)](https://laravel.com)
[![TailwindCSS Version](https://img.shields.io/badge/TailwindCSS-3.x-blue.svg?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)
  
**e-Rapor Digital** adalah platform manajemen akademik modern yang dirancang khusus untuk mempermudah ekosistem sekolah. Dibangun di atas **Laravel 12**, aplikasi ini mengutamakan kecepatan, keamanan data, dan kemudahan penggunaan.

---

## 🌟 Fitur Unggulan

* 📊 **Dashboard Interaktif:** Pantau statistik ketuntasan siswa secara real-time.
* 👥 **Multi-User Role:** Akses terpisah untuk Admin,dan Guru Mapel.
* ⚡ **Smart Grading:** Input nilai harian, UTS, dan UAS dengan kalkulasi nilai akhir otomatis.
* 📝 **Auto-Description:** Generator deskripsi otomatis berdasarkan capaian kompetensi siswa.
* 📄 **PDF Engine:** Cetak rapor resmi standar sekolah dalam format PDF yang rapi.
* 🔒 **Secure Data:** Keamanan data nilai dengan sistem proteksi middleware Laravel.

## 🛠️ Stack Teknologi

| Komponen | Teknologi |
| :--- | :--- |
| **Backend** | Laravel 12 (PHP 8.2+) |
| **Frontend** | Tailwind CSS & Blade Templating |
| **Database** | MySQL / MariaDB |
| **Assets Manager** | Vite |

---

## ⚙️ Panduan Instalasi (Linux)

Pastikan sistem Anda sudah terinstall **PHP 8.2+**, **Composer**, dan **Node.js**.

1. **Clone & Masuk ke Direktori**
   ```bash
   git clone [https://github.com/nasrrz/e-rapor-laravel-12.git](https://github.com/nasrrz/e-rapor-laravel-12.git)
   cd e-rapor-laravel-12
 
    Instalasi Dependency
    Bash

2. **Clone & Masuk ke Direktori**
   ```bash
    composer install
    npm install && npm run dev

3. **Clone & Masuk ke Direktori**
   ```bash
    Konfigurasi Environment
    Bash

4. **Clone & Masuk ke Direktori**
   ```bash
    cp .env.example .env
    php artisan key:generate
    Jangan lupa sesuaikan DB_DATABASE, DB_USERNAME, dan DB_PASSWORD di file .env Anda.


5. **Migrasi Database**
   ```bash
    php artisan migrate --seed
    

🖥️ Preview Tampilan

![Dashboard e-Rapor](public/dashboard.png)

📄 Lisensi

Didistribusikan di bawah Lisensi MIT. Lihat LICENSE untuk informasi lebih lanjut.

<p align="center"> Dibuat  oleh <a href="https://www.google.com/search?q=https://github.com/nasrrz">nasrrz</a> </p>
