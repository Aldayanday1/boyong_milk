<!-- Sidebar Modern -->
<aside id="sidebar" class="sidebar collapsed">
    <!-- Logo & Brand -->
    <div class="sidebar-header">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo_boyong.png') }}" alt="Logo" class="sidebar-logo">
            <div class="brand-text">
                <h2 class="brand-name">Boyong Milk</h2>
                <p class="brand-subtitle">Admin Panel</p>
            </div>
        </div>
        <button id="toggle-sidebar" class="toggle-btn">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav class="sidebar-nav">
        <ul class="nav-list">
            <!-- Dashboard -->
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-home nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <!-- Produk -->
            <li class="nav-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-box nav-icon"></i>
                    <span class="nav-text">Produk</span>
                </a>
            </li>

            <!-- Analytics -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-line nav-icon"></i>
                    <span class="nav-text">Analytics</span>
                </a>
            </li>

            <!-- Kategori -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-tags nav-icon"></i>
                    <span class="nav-text">Kategori</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog nav-icon"></i>
                    <span class="nav-text">Pengaturan</span>
                </a>
            </li>
        </ul>

        <!-- Divider -->
        <div class="nav-divider"></div>

        <!-- User Section -->
        <div class="user-section">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-details">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <p class="user-role">Administrator</p>
                </div>
            </div>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>
