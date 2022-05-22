<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Utama</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/destinations*') ? 'active' : '' }}"
                    href="/admin/destinations">
                    <span data-feather="map-pin"></span>
                    Wisata
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/tour-packages*') ? 'active' : '' }}"
                    href="/admin/tour-packages">
                    <span data-feather="package"></span>
                    Paket Wisata
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Galeri</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/gallery/images*') ? 'active' : '' }}"
                    href="/admin/gallery/images">
                    <span data-feather="image"></span>
                    Gambar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/gallery/videos*') ? 'active' : '' }}"
                    href="/admin/gallery/videos">
                    <span data-feather="film"></span>
                    Video
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Akun</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="/admin/gallery/images">
                    <span data-feather="shield"></span>
                    Ganti Password
                </a>
            </li>
        </ul>
    </div>
</nav>
