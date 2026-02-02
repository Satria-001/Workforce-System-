# 📚 Workforce System - Setup Guide untuk Kolaborasi

Panduan ini untuk membantu teman Anda setup project Workforce System di mesin mereka.

## 📋 Prasyarat

Sebelum memulai, pastikan teman Anda sudah install:

- **PHP 8.2+** - [Download](https://www.php.net/downloads)
- **MySQL 8.0+** - [Download](https://www.mysql.com/downloads/)
- **Composer** - [Download](https://getcomposer.org/)
- **Node.js 16+** - [Download](https://nodejs.org/)
- **Git** - [Download](https://git-scm.com/)

Atau gunakan **Laragon** (all-in-one): [Download Laragon](https://laragon.org/)

---

## 🚀 Quick Setup (5 menit)

### 1. Clone Repository

```bash
git clone <URL_REPOSITORY>
cd Workforce-System
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy .env.example ke .env (jika belum ada)
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Run migrations
php artisan migrate

# Seed database dengan test users
php artisan db:seed
```

### 5. Build Assets

```bash
# Production build
npm run build

# Atau development dengan watch
npm run dev
```

### 6. Run Application

```bash
php artisan serve
```

**URL:** http://localhost:8000/signin

---

## 👥 Test Credentials

Setelah seed berhasil, gunakan credentials ini untuk login:

### Admin Account
- **Username:** `admin`
- **Password:** `password`
- **Role:** Admin
- **Access:** `/admin/dashboard`

### Technician Accounts
| Username | Password | Access |
|----------|----------|---------|
| budi | password | `/app/dashboard` |
| siti | password | `/app/dashboard` |
| ahmad | password | `/app/dashboard` |
| rina | password | `/app/dashboard` |
| dedi | password | `/app/dashboard` |

---

## ⚙️ Environment Configuration

Edit file `.env` untuk konfigurasi lokal:

```env
APP_NAME="Workforce System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=workforce_system
DB_USERNAME=root
DB_PASSWORD=

# Timezone & Locale
APP_TIMEZONE=Asia/Jakarta
APP_LOCALE=id
```

**Jika menggunakan Laragon:**
```env
DB_DATABASE=workforce_system
DB_USERNAME=root
DB_PASSWORD=  # Kosong untuk Laragon default
```

---

## 📁 Project Structure

```
Workforce-System/
├── app/
│   ├── Http/Controllers/Auth/      # Authentication controllers
│   ├── Http/Middleware/             # Custom middlewares
│   ├── Models/                      # Eloquent models
│   └── Providers/                   # Service providers
├── config/                          # Configuration files
├── database/
│   ├── migrations/                  # Database migrations
│   └── seeders/                     # Database seeders
├── resources/
│   ├── css/                         # Stylesheets
│   ├── js/                          # JavaScript files
│   └── views/                       # Blade templates
├── routes/
│   ├── web.php                      # Main routes
│   ├── admin.php                    # Admin routes
│   └── app.php                      # Technician routes
├── storage/                         # Logs, cache, uploads
├── tests/                           # Test cases
└── .env.example                     # Environment template
```

---

## 🔐 Security Information

Proyek ini sudah dilengkapi dengan:

✅ **Rate Limiting** - Proteksi brute force attack (5 attempts/menit)
✅ **CSRF Protection** - Token validation pada semua POST requests
✅ **Password Hashing** - Bcrypt dengan 12 rounds
✅ **Session Security** - Session regeneration & encryption
✅ **Role-Based Access** - Custom middleware untuk RBAC
✅ **Two-Factor Auth** - Support 2FA dengan Fortify

**Dokumentasi lengkap:** Lihat [SECURITY_AUDIT.md](./SECURITY_AUDIT.md)

---

## 🧪 Running Tests

```bash
# Run semua tests
php artisan test

# Run specific test file
php artisan test tests/Feature/ExampleTest.php

# Run dengan verbose output
php artisan test --verbose
```

---

## 📊 Database Management

### Jalankan Migrations

```bash
# Migrate all tables
php artisan migrate

# Rollback last batch
php artisan migrate:rollback

# Check migration status
php artisan migrate:status
```

### Seed Database

```bash
# Run all seeders
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=UserSeeder
```

### Refresh Database (⚠️ WARNING: Akan menghapus data!)

```bash
# Migrate fresh dengan seeding
php artisan migrate:fresh --seed
```

---

## 🛠️ Development Commands

### Useful Artisan Commands

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Cache untuk production
php artisan config:cache
php artisan route:cache

# Check app status
php artisan about

# Tinker REPL (interactive shell)
php artisan tinker
```

### NPM Commands

```bash
# Development build dengan HMR
npm run dev

# Production build
npm run build

# Watch mode
npm run watch
```

---

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000]: General error: 2006 MySQL server has gone away"
**Solution:**
```bash
# Restart MySQL service (Laragon)
# Atau gunakan command:
php artisan migrate --force
```

### Error: "No application encryption key has been generated"
**Solution:**
```bash
php artisan key:generate
```

### Error: "permission denied" pada storage/logs
**Solution:**
```bash
# Windows (PowerShell)
icacls "storage" /grant:r "%USERNAME%:F" /t

# Linux/Mac
chmod -R 775 storage
```

### Port 8000 sudah digunakan
**Solution:**
```bash
# Gunakan port berbeda
php artisan serve --port=8001
```

### npm install stuck/slow
**Solution:**
```bash
# Clear npm cache
npm cache clean --force

# Install dengan specific registry
npm install --registry https://registry.npmjs.org/
```

---

## 📝 Git Workflow untuk Kolaborasi

### 1. Pull latest changes
```bash
git pull origin main
```

### 2. Create feature branch
```bash
git checkout -b feature/nama-fitur
```

### 3. Make changes dan commit
```bash
git add .
git commit -m "feat: deskripsi fitur"
```

### 4. Push ke repository
```bash
git push origin feature/nama-fitur
```

### 5. Create Pull Request (PR)
- Open PR di GitHub/GitLab
- Tunggu review dari team
- Merge jika sudah approved

---

## 📚 Resources

- **Laravel Documentation:** https://laravel.com/docs
- **Tailwind CSS:** https://tailwindcss.com
- **Alpine.js:** https://alpinejs.dev
- **Git Guide:** https://github.com/git-tips/tips

---

## 🆘 Need Help?

Jika ada masalah:
1. Cek dokumentasi di [SECURITY_AUDIT.md](./SECURITY_AUDIT.md)
2. Check logs: `storage/logs/laravel.log`
3. Run: `php artisan about` untuk diagnostic info
4. Tanyakan di team dengan error message lengkap

---

## 📋 Checklist Setelah Setup

- [ ] Clone repository berhasil
- [ ] `composer install` selesai
- [ ] `npm install` selesai
- [ ] `.env` sudah dikonfigurasi
- [ ] Database `workforce_system` dibuat
- [ ] `php artisan migrate` berhasil
- [ ] `php artisan db:seed` berhasil
- [ ] `php artisan serve` berjalan
- [ ] Bisa login dengan test credentials
- [ ] Tests passing (`php artisan test`)

---

**Happy Coding! 🚀**

Last Updated: February 2, 2026
