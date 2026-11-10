# 📚 Aplikasi Data Siswa

Aplikasi Data Siswa adalah aplikasi berbasis web yang dibuat menggunakan PHP Native dan MySQL untuk mengelola data siswa secara digital.

Project ini merupakan implementasi pembelajaran pemrograman web dengan menerapkan sistem CRUD (Create, Read, Update, Delete) serta autentikasi pengguna.

## ✨ Fitur Aplikasi

- 🔐 Login menggunakan username dan password
- 🚪 Logout untuk mengakhiri sesi pengguna
- 📋 Menampilkan seluruh data siswa
- ➕ Menambahkan data siswa
- ✏️ Mengedit data siswa
- 🗑️ Menghapus data siswa
- 🔍 Pencarian data siswa
- 📊 Menampilkan jumlah seluruh siswa
- 🔒 Proteksi halaman menggunakan session login
- 👁️ Fitur melihat dan menyembunyikan password
- 🎨 Tampilan modern dengan tema Soft Sage & Cream

## 🛠️ Teknologi yang Digunakan

- PHP Native
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

## 📁 Struktur Folder

```text
sekolah/
│
├── auth.php
├── koneksi.php
├── login.php
├── logout.php
├── index.php
├── tampil.php
├── tambah.php
├── edit.php
├── hapus.php
└── README.md
```

## 🗄️ Database

Nama database: `sekolah`

### Tabel siswa

| Kolom | Tipe Data |
|---|---|
| id | INT (Primary Key, Auto Increment) |
| nis | VARCHAR(20) |
| nama | VARCHAR(100) |
| kelas | VARCHAR(20) |

### Tabel users

| Kolom | Tipe Data |
|---|---|
| id | INT (Primary Key, Auto Increment) |
| nama | VARCHAR(100) |
| username | VARCHAR(50) |
| password | VARCHAR(255) |

## ⚙️ Cara Instalasi

1. Download atau clone repository ini.
2. Pindahkan folder `sekolah` ke `C:\xampp\htdocs`.
3. Jalankan Apache dan MySQL melalui XAMPP.
4. Buka phpMyAdmin.
5. Buat database dengan nama `sekolah`.
6. Buat tabel `siswa` dan `users` sesuai
