# 👋 Untuk Teman - Mulai Development

## 🚀 Quick Start (Copy-Paste Commands)

**Teman Anda hanya perlu run commands ini:**

```bash
# 1. Clone project
git clone https://github.com/Satria-001/Workforce-System-.git
cd Workforce-System-

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Database setup
php artisan migrate
php artisan db:seed

# 5. Run server
php artisan serve
```

## 🔐 Login Credentials

Akses aplikasi di: **http://localhost:8000/signin**

| Role | Username | Password |
|------|----------|----------|
| **Admin** | `admin` | `password` |
| **Tech 1** | `budi` | `password` |
| **Tech 2** | `siti` | `password` |
| **Tech 3** | `ahmad` | `password` |
| **Tech 4** | `rina` | `password` |
| **Tech 5** | `dedi` | `password` |

## 📚 Dokumentasi

Setelah clone, baca dokumentasi ini:

1. **[SETUP_GUIDE.md](./SETUP_GUIDE.md)** - Setup lengkap & troubleshooting
2. **[COLLABORATION.md](./COLLABORATION.md)** - Git workflow & best practices
3. **[FOR_TEAM.md](./FOR_TEAM.md)** - Summary untuk tim

## ✅ Verification

Pastikan semuanya jalan:

```bash
# Test database connection
php artisan db:show

# Run tests
php artisan test

# Check app status
php artisan about
```

Semua harus ✅ OK

## 🤝 Development Workflow

```bash
# 1. Create feature branch
git checkout -b feature/nama-fitur

# 2. Development
# ... edit code ...

# 3. Commit changes
git add .
git commit -m "feat: deskripsi fitur"

# 4. Push & create PR
git push origin feature/nama-fitur
# Buka GitHub dan create PR ke main
```

**Detail lengkap:** Lihat [COLLABORATION.md](./COLLABORATION.md)

## 🆘 Ada Masalah?

- Port 8000 taken? → `php artisan serve --port=8001`
- Database error? → Check `.env` database config
- npm stuck? → `npm cache clean --force`
- Need help? → Baca [SETUP_GUIDE.md#Troubleshooting](./SETUP_GUIDE.md)

---

**Happy Coding! 🚀**
