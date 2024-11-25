<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        @php
            $setting = \App\Models\Setting::first();
        @endphp
        @if($setting && $setting->logo)
            <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        @else
            <img src="{{ asset('assets/images/logo/logo-smkn4.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        @endif
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.galleries.index') }}" class="nav-link {{ request()->routeIs('dashboard.galleries.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Galeri</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.infos.index') }}" class="nav-link {{ request()->routeIs('dashboard.infos.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Informasi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.agendas.index') }}" class="nav-link {{ request()->routeIs('dashboard.agendas.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Agenda</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.users.index') }}" class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.settings.edit') }}" class="nav-link {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside> 