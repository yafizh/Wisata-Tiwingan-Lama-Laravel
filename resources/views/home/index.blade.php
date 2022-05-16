@extends('home/layouts/main')

@section('content')
    <!-- Jumbotron -->
    <section class="jumbotron d-flex align-items-center justify-content-center text-white text-center">
        <div class="row">
            <h1 class="display-4 fw-bold">Desa Wisata Tiwingan Lama</h1>
            <p class="lead fw-light">
                @foreach ($destinations as $destination)
                    <span class="destination">{{ $destination->name }}</span>
                @endforeach
            </p>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Destination -->
    <section id="destination">
        <div class="container text-center">
            <div class="row mb-3">
                <div class="col">
                    <h2>Wisata Tiwingan Lama</h2>
                </div>
            </div>
            <div class="row fs-5 justify-content-center">
                @foreach ($destinations as $destination)
                    <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                        <div class="card">
                            <img src="{{ asset('storage/' . $destination->destination_images[0]->image) }}"
                                class="card-img card-img-top" />
                            <div class="card-body" style="height: 200px; overflow: hidden;">
                                <h5 class="card-title">{{ $destination->name }}</h5>
                                <p class="card-text">{{ strip_tags($destination->body) }}</p>
                            </div>
                            <div class="card-body">
                                <button data-slug="{{ $destination->slug }}" class="btn btn-primary btn-show">Lihat
                                    Selengkapnya...</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End Destination --}}

    <div class="container">
        <hr>
    </div>

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
                    <img src="/assets/images/village.jpg" class="img-thumbnail" alt="Profil Desa Tiwingan Lama" />
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

    <!-- Tour Package -->
    <section id="tour-package">
        <div class="container text-center">
            <div class="row mb-3">
                <div class="col">
                    <h2>Paket Wisata</h2>
                </div>
            </div>
            <div class="row fs-5 justify-content-center">
                @foreach ($tour_packages as $tour_package)
                    <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-center">
                        <div class="card">
                            <img src="{{ asset('storage/' . $tour_package->tour_package_images[0]->image) }}"
                                class="card-img card-img-top" />
                            <div class="card-body" style="height: 200px; overflow: hidden;">
                                <h5 class="card-title">{{ $tour_package->name }}</h5>
                                <p class="card-text">{{ strip_tags($tour_package->body) }}</p>
                            </div>
                            <div class="card-body">
                                <button data-slug="{{ $tour_package->slug }}" class="btn btn-primary btn-show">Lihat
                                    Selengkapnya...</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Tour Package -->

    @include('partials.modal_image')
    <script>
        // modal.js need 'url' variable
        const url = '{{ URL::asset('storage') }}';
    </script>
    <script src="/scripts/templates.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="/scripts/modal.js"></script>
    <script>
        // Navbar When Scrolling
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.fixed-top');
            const jumbotron = document.querySelector('.jumbotron');
            if (document.querySelector('html').scrollTop > (jumbotron.offsetHeight - 700)) {
                navbar.classList.add('scrolled');
                navbar.classList.add('navbar-light');
                navbar.classList.remove('navbar-dark');
            } else {
                navbar.classList.remove('scrolled');
                navbar.classList.remove('navbar-light');
                navbar.classList.add('navbar-dark');
            }
        });

        document
            .querySelectorAll('#tour-package .btn-show')
            .forEach(button => {
                button.addEventListener('click', _ => {
                    get_detail('tour_package', button.getAttribute('data-slug'))
                });
            });

        document
            .querySelectorAll('#destination .btn-show')
            .forEach(button => {
                button.addEventListener('click', _ => {
                    get_detail('destination', button.getAttribute('data-slug'))
                });
            });
    </script>
@endsection
