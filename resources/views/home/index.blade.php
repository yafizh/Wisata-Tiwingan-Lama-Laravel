@extends('home/layouts/main')

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron d-flex align-items-center justify-content-center text-white text-center">
        <div class="row">
            <h1 class="display-4 fw-bold">Desa Wisata Tiwingan Lama</h1>
            <p class="lead fw-light">
                <span class="destination">Bukit Tiwingan</span>
                <span class="destination">Alimpung Park</span>
                <span class="destination">Matang Kaladan</span>
                <span class="destination">Pancing Jungur</span>
            </p>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Village Profile -->
    <section id="village">
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h2>Desa Tiwingan Lama</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <img src="/images/village.jpg" class="img-thumbnail" alt="Profil Desa Tiwingan Lama" />
                </div>
                <div class="col-lg-8 col-md-12 p-3 fs-5">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae velit nobis magni eius ipsum illum
                    dicta expedita suscipit ea veniam temporibus dolor, debitis ipsam. Veniam asperiores esse harum. Illum,
                    quisquam. Fugiat quod
                    blanditiis minus quos autem ab recusandae delectus doloremque molestiae consequuntur aut, obcaecati
                    libero ipsa magni at veritatis ratione voluptate illo quam possimus eius, nam ea. Obcaecati, eum vero!
                    Tenetur consequatur
                    deleniti quidem laboriosceat hic quaerat repellendus adipisci molestias soluta ullam vitae sint
                    excepturi delectus iure voluptatem sunt dolores? Aliquam, in fuga saepe id quis sapiente nesciunt? Vel,
                    quisquam.
                    Iusto id fugiat laudantium nostrum quae itaque doloribus, reprehenderit optio of.
                </div>
            </div>
        </div>
    </section>
    <!-- End Village Profile -->

    <div class="container">
        <hr>
    </div>

    <!-- Destination -->
    <section id="destination">
        <div class="container text-center">
            <div class="row mb-3">
                <div class="col">
                    <h2>Wisata Tiwingan Lama</h2>
                </div>
            </div>
            <div class="row fs-5 justify-content-center">
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/bukit_tiwingan.webp" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Bukit Tiwingan</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination1">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/alimpung_park.webp" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Alimpung Park</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination2">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/matang_kaladan.webp" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Matang Kaladan</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination3">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/pancing_jungur.webp" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Pancing Jungur</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination3">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Destination -->

    <div class="container">
        <hr>
    </div>

    <!-- Destination -->
    <section id="tour-package">
        <div class="container text-center">
            <div class="row mb-3">
                <div class="col">
                    <h2>Paket Wisata</h2>
                </div>
            </div>
            <div class="row fs-5 justify-content-center">
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/ojek.jpeg" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Ojek Sepeda Motor</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination1">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/kapal.jpeg" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Kapal</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination2">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="/images/home_stay.jpeg" class="card-img-destination card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Home Stay</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailDestination3">Lihat Selengkapnya...</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Destination -->
    <script>
        // Navbar When Scrolling
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.fixed-top');
            const jumbotron = document.querySelector('.jumbotron');
            if (document.querySelector('html').scrollTop > (jumbotron.offsetHeight - 1)) {
                navbar.classList.add('scrolled');
                navbar.classList.add('navbar-light');
                navbar.classList.remove('navbar-dark');
            } else {
                navbar.classList.remove('scrolled');
                navbar.classList.remove('navbar-light');
                navbar.classList.add('navbar-dark');
            }
        });
    </script>
@endsection
