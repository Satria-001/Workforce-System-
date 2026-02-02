# 🏢 Workforce System

**Workforce System** is a modern, production-ready workforce management platform built with **Laravel 12**, **Tailwind CSS v4**, and **Alpine.js**. Designed for managing employees, attendance tracking, ticketing system, and real-time activity monitoring with a clean, intuitive interface.

Built on top of [TailAdmin](https://tailadmin.com/) dashboard template with custom authentication, security, and business logic.

![Workforce System Dashboard Preview](./tailadmin-laravel.png)

---

## 🚀 Quick Start

**New to this project?** Start here: [START_HERE.md](./START_HERE.md)

**Setup in 5 minutes:**
```bash
git clone https://github.com/Satria-001/Workforce-System-.git
cd Workforce-System-
composer install && npm install
cp .env.example .env
php artisan key:generate
php artisan migrate && php artisan db:seed
php artisan serve
```

Login: `admin` / `password` at http://localhost:8000/signin

---

## ✨ Features

### Core Features
* 🔐 **Secure Authentication** - Custom signin with rate limiting & CSRF protection
* 👥 **Multi-Role System** - Admin & Technician roles with RBAC
* 📊 **Employee Management** - Track employees, departments, and positions
* 📅 **Attendance Tracking** - Real-time attendance & GPS tracking
* 🎫 **Ticket System** - Support ticket management & resolution tracking
* 📈 **Reports & Analytics** - Dashboard with charts, statistics, and insights
* 📱 **Responsive Design** - Mobile-friendly interface for all devices
* 🌙 **Dark Mode Support** - Modern dark theme for better usability

### Technical Features
* 🚀 **Laravel 12** - Latest Laravel with improved performance
* 🎨 **Tailwind CSS v4** - Utility-first responsive design
* ⚡ **Alpine.js** - Lightweight interactivity
* 📦 **Vite** - Fast build system with HMR
* 🔒 **Security First** - Rate limiting, input validation, session management
* 2️⃣ **Two-Factor Auth** - Optional 2FA for enhanced security
* 📝 **Well Documented** - Setup guides, API docs, and collaboration guidelines

---

## 📋 Requirements

* **PHP 8.2+**
* **MySQL 8.0+**
* **Composer**
* **Node.js 16+** & **npm**
* **Git**

Or use [Laragon](https://laragon.org/) (all-in-one)

---

## 📚 Documentation

| Document | Purpose | For Whom |
|----------|---------|----------|
| [START_HERE.md](./START_HERE.md) | Quick setup & commands | New team members |
| [SETUP_GUIDE.md](./SETUP_GUIDE.md) | Detailed setup & troubleshooting | Developers |
| [COLLABORATION.md](./COLLABORATION.md) | Git workflow & best practices | All developers |
| [FOR_TEAM.md](./FOR_TEAM.md) | Team summary & checklist | Team leads |
| [SECURITY_AUDIT.md](./SECURITY_AUDIT.md) | Security implementation details | Security reviewers |

---

## 👥 Test Users

After seeding, login with these credentials:

| Role | Username | Password | Access |
|------|----------|----------|--------|
| Admin | `admin` | `password` | `/admin/dashboard` |
| Technician | `budi` | `password` | `/app/dashboard` |
| Technician | `siti` | `password` | `/app/dashboard` |
| Technician | `ahmad` | `password` | `/app/dashboard` |
| Technician | `rina` | `password` | `/app/dashboard` |
| Technician | `dedi` | `password` | `/app/dashboard` |

---

## 📁 Project Structure

```
Workforce-System/
├── app/
│   ├── Http/Controllers/Auth/    # Authentication
│   ├── Http/Middleware/           # Custom middlewares
│   ├── Models/                    # Eloquent models
│   └── Providers/                 # Service providers
├── config/
│   ├── fortify.php               # 2FA config
│   └── auth.php                  # Auth config
├── database/
│   ├── migrations/                # DB schema
│   └── seeders/                   # Test data
├── resources/
│   ├── views/
│   │   ├── admin/                # Admin pages
│   │   ├── mobile/               # Mobile pages
│   │   ├── auth/                 # Login/signup
│   │   └── layouts/              # Base layouts
│   ├── css/                       # Stylesheets
│   └── js/                        # JavaScript
├── routes/
│   ├── web.php                    # Main routes
│   ├── admin.php                  # Admin routes
│   └── app.php                    # Technician routes
├── storage/                       # Logs, uploads
├── tests/                         # Test cases
└── .env.example                   # Env template
```

---

## 🔐 Security

This project implements enterprise-grade security:

✅ **Rate Limiting** - Prevents brute force attacks (5 attempts/min per user)
✅ **CSRF Protection** - Token validation on all forms
✅ **Password Security** - Bcrypt hashing with 12 rounds
✅ **Session Security** - Regeneration & encryption
✅ **Role-Based Access** - RBAC middleware
✅ **Input Validation** - Server & client-side validation
✅ **Two-Factor Auth** - Optional 2FA support
✅ **SQL Injection Prevention** - Eloquent ORM

**See [SECURITY_AUDIT.md](./SECURITY_AUDIT.md) for details**

---

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test tests/Feature/ExampleTest.php

# With coverage
php artisan test --coverage
```

Current Status: **3/3 tests passing** ✅

---

## 🛠️ Development Commands

```bash
# Database
php artisan migrate           # Run migrations
php artisan migrate:fresh     # Reset & seed
php artisan db:seed          # Seed data
php artisan db:show          # Show DB info

# Cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Server
php artisan serve            # Run dev server
php artisan serve --port=8001  # Custom port

# Tests
php artisan test
npm run dev                  # Dev with HMR
npm run build              # Production build
```

---

## 🤝 Contributing

We use Git Flow for collaboration:

1. Create feature branch: `feature/nama-fitur`
2. Make changes & test locally
3. Commit with meaningful messages
4. Push & create PR
5. Get reviewed & merge

**See [COLLABORATION.md](./COLLABORATION.md) for detailed guidelines**

---

## 🚀 Deployment

Before production:

- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_ENV=production`
- [ ] Run `php artisan optimize:clear`
- [ ] Enable HTTPS
- [ ] Configure security headers
- [ ] Setup monitoring & logging
- [ ] Test 2FA functionality

---

## 📦 Tech Stack

| Technology | Version | Purpose |
|-----------|---------|---------|
| Laravel | 12.26.4 | Backend framework |
| PHP | 8.3.25 | Server language |
| MySQL | 8.0.30 | Database |
| Tailwind CSS | 4.1.12 | Styling |
| Alpine.js | 3.14.9 | Interactivity |
| Vite | 7.0.4 | Build tool |
| Pest | 4.0 | Testing framework |

---

## 🆘 Troubleshooting

**Port already in use?**
```bash
php artisan serve --port=8001
```

**Database connection error?**
```bash
# Check .env file
php artisan db:show
```

**npm issues?**
```bash
npm cache clean --force
npm install
```

**More help?** See [SETUP_GUIDE.md](./SETUP_GUIDE.md#troubleshooting)

---

## 📞 Support

- Check documentation files in repo
- Review [COLLABORATION.md](./COLLABORATION.md) for team guidelines
- Check logs: `storage/logs/laravel.log`
- Run: `php artisan about` for diagnostics

---

## 📄 License

This project is open source and available under the MIT License - see the LICENSE file for details.

---

**Built with ❤️ for workforce management**

Last Updated: February 2, 2026
Repository: https://github.com/Satria-001/Workforce-System-.git
