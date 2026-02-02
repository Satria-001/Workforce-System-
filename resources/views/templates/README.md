# TailAdmin Template

Folder ini berisi template reference dari TailAdmin yang bisa digunakan sebagai referensi untuk pengembangan module di masa depan.

## Struktur Folder

- **chart/** - Template untuk chart/grafik
- **form/** - Template untuk form elements
- **tables/** - Template untuk data tables
- **ui-elements/** - Template untuk UI components

## Penggunaan

Saat membuat module baru, bisa mereferensikan template ini untuk:
1. Layout dan styling yang konsisten dengan TailAdmin
2. Component pattern yang sudah proven
3. Dark mode support

## Akses Template

Template ini tidak di-render langsung, hanya untuk referensi. Jika perlu menampilkan, gunakan route di `routes/admin.php`:

```php
Route::get('/templates/chart', ...);
Route::get('/templates/form', ...);
// dll
```

## Module yang Sudah Dibuat

- Dashboard
- Karyawan (placeholder - siap dikembangkan)
- Absensi (placeholder - siap dikembangkan)
- Tiket (placeholder - siap dikembangkan)
- Reports (placeholder - siap dikembangkan)
- Incentives (placeholder - siap dikembangkan)
- Activity Logs (placeholder - siap dikembangkan)
- Settings (placeholder - siap dikembangkan)

Semua module menggunakan template blank page yang konsisten dengan TailAdmin design system.
