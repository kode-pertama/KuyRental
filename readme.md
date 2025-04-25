# 📦 My PHP Project with Docker

Proyek ini adalah aplikasi Rental Mobil sederhana menggunakan session yang sudah dikemas dengan Docker.

# Struktur Folder

📁 src → Kode PHP utama

📁 assets → File CSS, JavaScript, gambar, dll.

📄 Dockerfile → Instruksi build image PHP

📄 docker-compose.yml → Jalankan semua service (PHP, Nginx, dll)

📁 nginx → Konfigurasi Nginx

# 🚀 Cara Instalasi & Menjalankan Proyek

```bash
git clone git@github.com:kode-pertama/KuyRental.git
```

```bash
docker-compose up -d --build
```

## Jika tanpa docker, temen-temen bisa clone reponya kemudian simpan pada folder htdocs
