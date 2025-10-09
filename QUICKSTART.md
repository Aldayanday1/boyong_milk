# 🚀 Quick Start Guide - Boyong Milk

Panduan cepat untuk developer yang ingin menjalankan proyek ini.

## ⚡ TL;DR (Too Long, Didn't Read)

```bash
# Clone & Install
git clone https://github.com/Aldayanday1/boyong_milk.git
cd boyong_milk
composer install && npm install

# Setup Environment
cp .env.example .env
php artisan key:generate

# Edit .env dan tambahkan:
# - DB credentials (MySQL)
# - Admin credentials (ADMIN1_*, ADMIN2_*)

# Setup Database
mysql -u root -p -e "CREATE DATABASE boyong_milk;"
php artisan migrate --seed

# Build & Run
php artisan storage:link
npm run build
php artisan serve
```

## 🔐 Environment Variables yang Wajib Diisi

Edit file `.env` dan pastikan isi:

### Database
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=boyong_milk
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Admin Credentials
```env
ADMIN1_NAME="Your Name"
ADMIN1_USERNAME=your_username
ADMIN1_EMAIL=youremail@boyongmilk.com
ADMIN1_PASSWORD=your_secure_password

ADMIN2_NAME="Second Admin"
ADMIN2_USERNAME=admin2_username
ADMIN2_EMAIL=admin2@boyongmilk.com
ADMIN2_PASSWORD=another_secure_password
```

## 🎯 Default Access

- **Website:** http://localhost:8000
- **Login:** http://localhost:8000/login
- **Dashboard:** http://localhost:8000/dashboard (setelah login)

## ⚠️ Common Issues

### "SQLSTATE[HY000] [1045] Access denied"
❌ Password database salah
✅ Cek `DB_PASSWORD` di `.env`

### "Unknown database 'boyong_milk'"
❌ Database belum dibuat
✅ Jalankan: `mysql -u root -p -e "CREATE DATABASE boyong_milk;"`

### "Permission denied" saat upload
❌ Folder storage tidak writable
✅ Jalankan: `php artisan storage:link`

### Styling tidak muncul
❌ Assets belum di-build
✅ Jalankan: `npm run build`

## 📚 Dokumentasi Lengkap

Lihat [README.md](README.md) untuk dokumentasi lengkap.

---

**Happy Coding! 🚀**
