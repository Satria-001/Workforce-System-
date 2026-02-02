<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Main Admin Menu Routes
    Route::get('/dashboard', function () {
        return view('admin.dashboard.ecommerce', ['title' => 'Admin Dashboard']);
    })->name('admin.dashboard');

    Route::get('/karyawan', function () {
        return view('admin.karyawan.index', ['title' => 'Karyawan']);
    })->name('admin.karyawan');

    Route::get('/absensi', function () {
        return view('admin.absensi.index', ['title' => 'Absensi']);
    })->name('admin.absensi');

    Route::get('/tiket', function () {
        return view('admin.tiket.index', ['title' => 'Tiket']);
    })->name('admin.tiket');

    Route::get('/reports', function () {
        return view('admin.reports.index', ['title' => 'Reports']);
    })->name('admin.reports');

    Route::get('/incentives', function () {
        return view('admin.incentives.index', ['title' => 'Incentives']);
    })->name('admin.incentives');

    Route::get('/activity-logs', function () {
        return view('admin.activity-logs.index', ['title' => 'Activity Logs']);
    })->name('admin.activity-logs');

    Route::get('/settings', function () {
        return view('admin.settings.index', ['title' => 'Settings']);
    })->name('admin.settings');

    // Template Reference Routes (untuk dokumentasi/referensi saja)
    Route::prefix('templates')->group(function () {
        Route::get('/form-elements', function () {
            return view('templates.tailadmin-references.form.form-elements', ['title' => 'Form Elements']);
        })->name('admin.template.form-elements');

        Route::get('/basic-tables', function () {
            return view('templates.tailadmin-references.tables.basic-tables', ['title' => 'Basic Tables']);
        })->name('admin.template.basic-tables');

        Route::get('/line-chart', function () {
            return view('templates.tailadmin-references.chart.line-chart', ['title' => 'Line Chart']);
        })->name('admin.template.line-chart');

        Route::get('/bar-chart', function () {
            return view('templates.tailadmin-references.chart.bar-chart', ['title' => 'Bar Chart']);
        })->name('admin.template.bar-chart');

        Route::get('/alerts', function () {
            return view('templates.tailadmin-references.ui-elements.alerts', ['title' => 'Alerts']);
        })->name('admin.template.alerts');

        Route::get('/avatars', function () {
            return view('templates.tailadmin-references.ui-elements.avatars', ['title' => 'Avatars']);
        })->name('admin.template.avatars');

        Route::get('/badge', function () {
            return view('templates.tailadmin-references.ui-elements.badges', ['title' => 'Badges']);
        })->name('admin.template.badges');

        Route::get('/buttons', function () {
            return view('templates.tailadmin-references.ui-elements.buttons', ['title' => 'Buttons']);
        })->name('admin.template.buttons');

        Route::get('/image', function () {
            return view('templates.tailadmin-references.ui-elements.images', ['title' => 'Images']);
        })->name('admin.template.images');

        Route::get('/videos', function () {
            return view('templates.tailadmin-references.ui-elements.videos', ['title' => 'Videos']);
        })->name('admin.template.videos');
    });

    // Legacy/Extra Routes
    Route::get('/calendar', function () {
        return view('admin.calender', ['title' => 'Calendar']);
    })->name('admin.calendar');

    Route::get('/profile', function () {
        return view('admin.profile', ['title' => 'Profile']);
    })->name('admin.profile');

    Route::get('/blank', function () {
        return view('admin.blank', ['title' => 'Blank']);
    })->name('admin.blank');
});
