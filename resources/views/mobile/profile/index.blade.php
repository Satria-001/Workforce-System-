@extends('layouts.mobile.app')

@section('content')
    <div class="section" style="margin-bottom: 100px;">
        <!-- Profile Header -->
        <div class="section mt-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @php
                            $karyawan = $karyawan ?? null;
                            $user = auth()->user();
                            $fotoPath = $karyawan ? asset('images/user/' . ($karyawan->foto ?? 'default.png')) : asset('images/user/owner.png');
                        @endphp
                        <img src="{{ $fotoPath }}" alt="Foto Profil" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 4px solid var(--color-nav);">
                    </div>
                    <h4 class="mb-1">{{ $user->name ?? 'User' }}</h4>
                    <p class="text-muted mb-2">{{ $karyawan ? $karyawan->posisi : 'Technician' }}</p>
                    <p class="text-muted" style="font-size: 12px;">ID: {{ $karyawan ? $karyawan->nip : $user->id }}</p>
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="section mt-3 mb-3">
            <h5 class="mb-3" style="font-weight: 600;">Informasi Profil</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5 text-muted" style="font-size: 14px;">Nama Lengkap</div>
                        <div class="col-7" style="font-weight: 500;">{{ $user->name ?? '-' }}</div>
                    </div>
                    <hr style="margin: 0.75rem 0; border: none; height: 1px; background-color: #e4e7ec;">
                    <div class="row mb-3">
                        <div class="col-5 text-muted" style="font-size: 14px;">Email</div>
                        <div class="col-7" style="font-weight: 500; word-break: break-all;">{{ $user->email ?? '-' }}</div>
                    </div>
                    <hr style="margin: 0.75rem 0; border: none; height: 1px; background-color: #e4e7ec;">
                    <div class="row mb-3">
                        <div class="col-5 text-muted" style="font-size: 14px;">Nomor Telepon</div>
                        <div class="col-7" style="font-weight: 500;">{{ $karyawan ? $karyawan->no_hp : '-' }}</div>
                    </div>
                    <hr style="margin: 0.75rem 0; border: none; height: 1px; background-color: #e4e7ec;">
                    <div class="row">
                        <div class="col-5 text-muted" style="font-size: 14px;">Departemen</div>
                        <div class="col-7" style="font-weight: 500;">{{ $karyawan ? $karyawan->department : '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="section mt-3 mb-3">
            <h5 class="mb-3" style="font-weight: 600;">Aksi</h5>
            <a href="{{ route('app.profile.edit') }}" class="btn btn-primary btn-block mb-2">
                <ion-icon name="create-outline" style="margin-right: 8px;"></ion-icon>
                Edit Profil
            </a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <ion-icon name="log-out-outline" style="margin-right: 8px;"></ion-icon>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endsection
