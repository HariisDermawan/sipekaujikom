# Sistem Informasi Penggajian Karyawan

<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320">
</p>

<p align="center">
    <img src="https://github.com/HariisDermawan/sipekaujikom/blob/main/public/img/dashboard.png" width="800">
</p>

<p align="center">
    Aplikasi Penggajian Karyawan berbasis Laravel
</p>

---

## 📌 Tentang Project

Sistem Informasi Penggajian Karyawan adalah aplikasi berbasis web yang digunakan untuk membantu proses pengelolaan data karyawan, pengajuan pinjaman, transaksi penggajian, hingga laporan slip gaji dan rekapitulasi penggajian.

Project ini dibuat menggunakan:

- Laravel 12
- PHP 8+
- MySQL
- Tailwind CSS

---

# ⚙️ Fitur Aplikasi

## Dashboard
- Statistik Data
- Informasi Penggajian

## Master Data
- Data Karyawan
- Data Jabatan

## Transaksi
- Pengajuan Pinjaman
- Penggajian Karyawan

## Laporan
- Slip Gaji
- Rekapitulasi Penggajian Bulanan

---

# 💰 Logika Penggajian

```math id="w7m2pk"
Gaji Bersih = (Gaji Pokok + Tunjangan) - Potongan Pinjaman
```

Sistem akan:
- Mengambil data jabatan karyawan
- Menghitung tunjangan
- Mengecek pinjaman aktif
- Mengurangi cicilan pinjaman dari gaji

---

# 🛠️ Instalasi

## Clone Repository

```bash id="q5n2rm"
git clone https://github.com/HariisDermawan/sipekaujikom.git

```

## Masuk Folder Project

```bash id="z8v1xp"
cd sipekaujikom
```

## Install Dependency

```bash id="b2m7kt"
composer install
```

## Copy ENV

```bash id="l9q3wd"
cp .env.example .env
```

## Generate App Key

```bash id="k4n8zr"
php artisan key:generate
```

## Migration Database

```bash id="d6x1pm"
php artisan migrate
```

## Jalankan Server

```bash id="t3w9qa"
php artisan serve
```

