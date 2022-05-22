<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="text-center navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Dewi Tilam</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form action="/{{ Route::getCurrentRoute()->uri() }}" method="get" class="w-100">
        <input class="form-control form-control-dark" name="search"
            value="{{ request('search') }}" type="text" placeholder="Search"
            aria-label="Search">
    </form>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>
