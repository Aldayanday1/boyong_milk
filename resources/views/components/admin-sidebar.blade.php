<!-- Sidebar Modern Redesign -->
<aside id="sidebar" class="sidebar collapsed">
    <!-- Header: Logo & Brand -->
    <div class="sidebar-header">
        <div class="brand-wrapper">
            <img src="{{ asset('images/logo_boyong.png') }}" alt="Logo" class="brand-logo">
            <div class="brand-info">
                <h1 class="brand-title">Boyong Milk</h1>
                <span class="brand-subtitle">Admin Panel</span>
            </div>
        </div>
        <button id="toggle-sidebar" class="btn-toggle">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

    <!-- Navigation Menu -->
    <div class="sidebar-content">
        <nav class="nav-menu">
            <div class="nav-section">
                <p class="nav-label">Main Menu</p>
                <ul class="nav-list">
                    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link" title="Dashboard">
                            <span class="icon-wrapper"><i class="fas fa-th-large"></i></span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link" title="Produk">
                            <span class="icon-wrapper"><i class="fas fa-box-open"></i></span>
                            <span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="Kategori">
                            <span class="icon-wrapper"><i class="fas fa-tags"></i></span>
                            <span class="nav-text">Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="Transaksi">
                            <span class="icon-wrapper"><i class="fas fa-shopping-cart"></i></span>
                            <span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="Analytics">
                            <span class="icon-wrapper"><i class="fas fa-chart-pie"></i></span>
                            <span class="nav-text">Analytics</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <p class="nav-label">General</p>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="Pengaturan">
                            <span class="icon-wrapper"><i class="fas fa-cog"></i></span>
                            <span class="nav-text">Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Footer: User Profile -->
    <div class="sidebar-footer">
        <div class="user-card">
            <div class="user-avatar-wrapper">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="status-indicator"></div>
            </div>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-role">Administrator</span>
            </div>
            <div class="user-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>
