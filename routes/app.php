<?php

use Illuminate\Support\Facades\Route;

// Technician Routes (App)
Route::prefix('app')->middleware(['auth', 'role:technician'])->group(function () {
    Route::get('/dashboard', function () {
        return view('mobile.dashboard.index', ['title' => 'Dashboard']);
    })->name('app.dashboard');

    Route::get('/attendance', function () {
        return view('mobile.attendance.index', ['title' => 'Absensi']);
    })->name('app.attendance');

    Route::get('/tickets', function () {
        return view('mobile.tickets.index', ['title' => 'Tiket']);
    })->name('app.tickets');

    Route::get('/reports', function () {
        return view('mobile.reports.index', ['title' => 'Report']);
    })->name('app.reports');

    Route::get('/history', function () {
        return view('mobile.history.index', ['title' => 'Riwayat']);
    })->name('app.history');

    Route::get('/profile', function () {
        return view('mobile.profile.index', ['title' => 'Profil']);
    })->name('app.profile');

    Route::get('/profile/edit', function () {
        return view('mobile.profile.edit', ['title' => 'Edit Profil']);
    })->name('app.profile.edit');
});
