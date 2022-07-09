<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline me-auto">
        <ul class="navbar-nav me-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ Auth::user()->url_foto_profile }}"
                    class="rounded-circle me-1">
                <div class="d-sm-none d-lg-inline-block">Halo, {{ Auth::user()->firstname }}</div>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="features-profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                    </hr>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="#" onclick="document.getElementById('logout-form').submit()"
                            class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </form>
                </li>
                </div>
        </li>
    </ul>
</nav>
