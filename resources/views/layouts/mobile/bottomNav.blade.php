<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{ route('app.dashboard') }}" class="item {{ request()->is('app/dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="speedometer-outline" style="font-size: 24px;"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="{{ route('app.tickets') }}" class="item {{ request()->is('app/tickets') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="ticket-outline" style="font-size: 24px;"></ion-icon>
            <strong>Tiket</strong>
        </div>
    </a>

    <a href="{{ route('app.attendance') }}" class="item {{ request()->is('app/attendance') ? 'active' : '' }}">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="finger-print-outline" style="font-size: 28px;"></ion-icon>
            </div>
        </div>
    </a>
    <a href="{{ route('app.history') }}" class="item {{ request()->is('app/history') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline" style="font-size: 24px;"></ion-icon>
            <strong>Riwayat</strong>
        </div>
    </a>
    <a href="{{ route('app.profile') }}"
        class="item {{ request()->is('app/profile') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="person-circle-outline" style="font-size: 24px;"></ion-icon>
            <strong>Profil</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->
