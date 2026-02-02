@extends('layouts.mobile.app')

@section('content')
    <div class="section" style="margin-bottom: 100px;">
        <!-- Header -->
        <div class="section mt-3 mb-3">
            <div class="d-flex align-items-center mb-3">
                <a href="{{ route('app.profile') }}" class="icon-btn">
                    <ion-icon name="chevron-back-outline" style="font-size: 24px;"></ion-icon>
                </a>
                <h4 class="mb-0 ml-2" style="font-weight: 600;">Edit Profil</h4>
            </div>
        </div>

        <!-- Edit Form -->
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section mt-3 mb-3">
                <!-- Foto Profil -->
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <div class="text-center mb-3">
                        @php
                            $user = auth()->user();
                            $fotoPath = asset('images/user/owner.png');
                        @endphp
                        <img src="{{ $fotoPath }}" alt="Foto Profil" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 4px solid var(--color-nav);">
                    </div>
                    <div class="custom-file-upload">
                        <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
                        <small class="text-muted">Format: JPG, PNG. Ukuran maksimal 2MB</small>
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" required>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="tel" name="phone" class="form-control" value="{{ $user->phone ?? '' }}" placeholder="+62...">
                </div>

                <!-- Password Lama (untuk verifikasi) -->
                <div class="mb-3">
                    <label class="form-label">Password Lama (untuk konfirmasi)</label>
                    <input type="password" name="current_password" class="form-control" placeholder="Masukkan password saat ini">
                </div>

                <!-- Password Baru -->
                <div class="mb-3">
                    <label class="form-label">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>
            </div>

            <!-- Button Actions -->
            <div class="section mt-3 mb-3 sticky-bottom" style="background: white; padding: 1rem 0; border-top: 1px solid #e4e7ec;">
                <a href="{{ route('app.profile') }}" class="btn btn-secondary btn-block mb-2">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="checkmark-outline" style="margin-right: 8px;"></ion-icon>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <style>
        .custom-file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .custom-file-upload input[type="file"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: 2px dashed var(--color-nav);
            border-radius: 6px;
            cursor: pointer;
            background-color: #f9fafb;
        }

        .custom-file-upload input[type="file"]:hover {
            background-color: #f2f4f7;
        }

        .sticky-bottom {
            position: sticky;
            bottom: 60px;
            z-index: 10;
        }
    </style>
@endsection
