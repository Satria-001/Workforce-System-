# 🤝 Collaboration Guide - Workforce System

Panduan untuk develop bersama-sama dengan aman dan terstruktur.

---

## 📌 Git Workflow

### Branch Strategy

Kami menggunakan **Git Flow** untuk branch management:

```
main (production-ready)
  ↓
develop (staging/integration)
  ↓
feature/* (feature development)
```

**Branch Naming Convention:**
- Feature: `feature/nama-fitur` (contoh: `feature/add-attendance-tracker`)
- Bugfix: `bugfix/deskripsi-bug` (contoh: `bugfix/fix-login-validation`)
- Hotfix: `hotfix/deskripsi-hotfix` (contoh: `hotfix/session-timeout-issue`)

---

## 🔄 Development Workflow

### Step 1: Pull Latest Changes

```bash
git checkout main
git pull origin main
git checkout develop
git pull origin develop
```

### Step 2: Create Feature Branch

```bash
git checkout -b feature/nama-fitur
```

### Step 3: Development Checklist

Sebelum push, pastikan:
- [ ] Code sudah tested locally
- [ ] No console errors atau warnings
- [ ] Follow code style conventions
- [ ] Database migrations sudah dibuat (jika ada)
- [ ] Tests written untuk fitur baru

### Step 4: Commit dengan Message Terstruktur

**Format Commit Message:**
```
<type>(<scope>): <subject>

<body>

<footer>
```

**Types:**
- `feat:` - New feature
- `fix:` - Bug fix
- `docs:` - Documentation
- `style:` - Code style (formatting, etc)
- `refactor:` - Code refactoring
- `perf:` - Performance improvement
- `test:` - Adding/updating tests
- `chore:` - Build, dependencies, etc

**Examples:**
```bash
git commit -m "feat(auth): add two-factor authentication"
git commit -m "fix(attendance): correct timestamp calculation"
git commit -m "docs: add setup guide for new team members"
git commit -m "refactor(routes): reorganize admin routes structure"
```

### Step 5: Push ke Repository

```bash
git push origin feature/nama-fitur
```

### Step 6: Create Pull Request

1. **Buka GitHub/GitLab**
2. **Click "New Pull Request"**
3. **Base:** `develop` → **Compare:** `feature/nama-fitur`
4. **Isi PR Description:**
   - [ ] What changes?
   - [ ] Why these changes?
   - [ ] How to test?
   - [ ] Screenshots/demo (if applicable)
   - [ ] Checklist keseluruhan

**PR Template:**
```markdown
## 📝 Description
Brief description of what this PR does

## 🎯 Related Issue
Fixes #123 (if applicable)

## 📸 Screenshots
(if applicable)

## ✅ Checklist
- [ ] Tests written/updated
- [ ] Documentation updated
- [ ] No console errors
- [ ] Follows code style
- [ ] Database migrations included (if any)
- [ ] Breaking changes documented

## 🧪 Testing Steps
1. Pull branch
2. Run `composer install` (if needed)
3. Run `php artisan migrate` (if needed)
4. Test feature manually
5. Run `php artisan test`
```

### Step 7: Code Review & Merge

- Team members review PR
- Request changes jika diperlukan
- Approve PR setelah review OK
- Merge ke `develop` branch

---

## 💾 Handling Database Changes

### Membuat Migration Baru

```bash
php artisan make:migration create_tickets_table
```

**Penting:** Setiap migration harus:
- ✅ Reversible (punya method `down()`)
- ✅ Tested di local machine
- ✅ Included dalam commit

### Migration Best Practices

```php
// ✅ GOOD - With down() method
Schema::create('tickets', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->timestamps();
});

// ❌ BAD - Without down() method
public function down(): void
{
    Schema::dropIfExists('tickets');
}
```

### Team Member Pulling Migration

```bash
git pull origin develop
php artisan migrate
php artisan db:seed  # if needed
```

---

## 🔐 Environment & Secrets

**⚠️ IMPORTANT:**
- **JANGAN** commit `.env` file
- **JANGAN** commit credentials atau tokens
- `.env` sudah di `.gitignore` ✅

### Setup .env Lokal

Setiap developer buat `.env` sendiri:

```bash
cp .env.example .env
php artisan key:generate
```

**Edit database credentials untuk lokal:**
```env
DB_HOST=127.0.0.1
DB_DATABASE=workforce_system
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🧪 Testing Before Push

### Run Tests

```bash
# Semua tests
php artisan test

# Specific test file
php artisan test tests/Feature/ExampleTest.php

# With coverage
php artisan test --coverage
```

### Local Testing Checklist

- [ ] `php artisan test` ✅
- [ ] No console errors saat development
- [ ] Feature works as expected
- [ ] Database seeds properly
- [ ] Migrations up & down work

---

## 📊 Keeping in Sync

### Sebelum mulai development

```bash
git fetch origin
git rebase origin/develop
```

### Jika branch outdated

```bash
git fetch origin
git rebase origin/develop
# Jika ada conflicts, resolve dan:
git add .
git rebase --continue
```

---

## 🐛 Conflict Resolution

### Jika ada merge conflict

```bash
# Pull latest
git pull origin develop

# Lihat conflicts
git status

# Edit conflicted files (VS Code akan highlight)

# Setelah fix
git add .
git commit -m "merge: resolve conflicts from develop"
git push origin feature/nama-fitur
```

**Conflict Markers:**
```
<<<<<<< HEAD
  your changes
=======
  incoming changes
>>>>>>> develop
```

---

## 📋 Code Style Conventions

### PHP Code Style

Ikuti PSR-12 standard:

```php
// ✅ GOOD
class UserController
{
    public function store(Request $request)
    {
        $user = User::create($request->validated());
        return response()->json($user, 201);
    }
}

// ❌ BAD
class UserController {
    public function store(Request $request) {
    $user=User::create($request->validated());
    return $user;
    }
}
```

### Blade Template Style

```blade
{{-- ✅ GOOD --}}
<div class="flex justify-center items-center">
    @forelse($users as $user)
        <p>{{ $user->name }}</p>
    @empty
        <p>No users found</p>
    @endforelse
</div>

{{-- ❌ BAD --}}
<div class="flex justify-center items-center">
@foreach($users as $user)
<p>{{$user->name}}</p>
@endforeach
</div>
```

### Naming Conventions

| Type | Convention | Example |
|------|-----------|---------|
| Class | PascalCase | `UserController`, `TicketModel` |
| Method | camelCase | `getActiveUsers()`, `createTicket()` |
| Variable | snake_case | `$user_name`, `$is_active` |
| Constant | UPPER_SNAKE_CASE | `MAX_RETRIES`, `DEFAULT_TIMEZONE` |
| View | kebab-case | `user-dashboard.blade.php` |
| Route | kebab-case | `/user-profile`, `/admin-settings` |

---

## 📚 Documentation Standards

### Setiap Feature harus didokumentasi:

```php
/**
 * Create a new ticket
 * 
 * @param CreateTicketRequest $request
 * @return TicketResource
 * 
 * @throws ValidationException
 * 
 * @example
 * POST /api/tickets
 * {
 *   "title": "System Issue",
 *   "description": "Server is down"
 * }
 */
public function store(CreateTicketRequest $request)
{
    // Implementation
}
```

---

## ⚠️ Critical Rules

**NEVER:**
- ❌ Push directly to `main` branch
- ❌ Force push (`git push --force`)
- ❌ Commit `.env` atau credentials
- ❌ Modify migrations yang sudah merged
- ❌ Delete branches sebelum merge confirmed

**ALWAYS:**
- ✅ Create feature branch dari `develop`
- ✅ Write tests untuk fitur baru
- ✅ Review PR sebelum merge
- ✅ Pull latest sebelum push
- ✅ Commit message yang clear & descriptive

---

## 🚀 Deployment Checklist

Sebelum push ke `main`:

- [ ] PR sudah approved minimal 1 reviewer
- [ ] All tests passing
- [ ] Database migrations tested
- [ ] No console errors
- [ ] Documentation updated
- [ ] Code review completed
- [ ] Feature tested in develop environment

---

## 📞 Communication

**Untuk koordinasi development:**
- 💬 **Chat:** Slack/Teams/Discord
- 📋 **Issue Tracking:** GitHub Issues/Jira
- 📅 **Planning:** GitHub Projects/Trello

**Sebelum mulai fitur baru:**
1. Discuss dengan team
2. Create issue di GitHub
3. Assign ke diri sendiri
4. Create branch dari issue

---

## 🎓 Learning Resources

- [Git Best Practices](https://git-scm.com/book/en/v2)
- [Conventional Commits](https://www.conventionalcommits.org/)
- [Laravel Coding Standards](https://laravel.com/docs/contributions#code-style)
- [GitHub Flow Guide](https://guides.github.com/introduction/flow/)

---

**Terima kasih sudah ikuti workflow ini! Happy collaborating! 🎉**

Last Updated: February 2, 2026
