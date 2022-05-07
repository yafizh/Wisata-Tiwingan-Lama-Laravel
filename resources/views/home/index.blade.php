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
                                <button class="btn btn-primary btn-show" data-card-type="destination"
                                    data-slug="{{ $destination->slug }}">Lihat
                                    Selengkapnya...</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Show Modal --}}
    <div class="modal fade" id="show" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="carouselGalleryImage" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                        </div>
                        <div class="carousel-inner">
                        </div>
                    </div>
                    <div class="p-3 text-start body">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <button class="btn btn-primary btn-show" data-card-type="tour-package"
                                    data-slug="{{ $tour_package->slug }}">Lihat
                                    Selengkapnya...</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Destination -->

    <script src="/scripts/templates.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
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


        const url = '{{ URL::asset('storage') }}';

        // Insert data to modal if click button view
        const get_detail = _ => {
            document.querySelectorAll(".btn-show").forEach((button) => {
                button.onclick = function() {
                    fetch(`/${this.getAttribute('data-card-type')}?slug=${this.getAttribute('data-slug')}`)
                        .then(response => response.json())
                        .then(data => {
                            let key = '';
                            if (this.getAttribute('data-card-type') == 'destination') key =
                                'destination';
                            else if (this.getAttribute('data-card-type') == 'tour-package') key =
                                'tour_package';

                            $('#show .modal-title').text(data[key].name);
                            $('#show .modal-body .body').html(data[key].body);
                            $('#show .modal-body .carousel-inner').append(templates
                                .show_image_gallery_modal.carousel_inner(data[key][`${key}_images`],
                                    url));
                            if (data[key][`${key}_images`].length > 1) {
                                $('#show .modal-body #carouselGalleryImage .carousel-indicators')
                                    .append(
                                        templates.show_image_gallery_modal.carousel_indicators(data[key]
                                            [`${key}_images`].length));
                                $('#show .modal-body #carouselGalleryImage').append(templates
                                    .show_image_gallery_modal.carousel_next_prev_button);
                            }
                            $('#show').modal('show');
                        })
                        .catch(error => console.log(error));
                }
            });
        }

        // Reset Modal
        $('#show').on('hidden.bs.modal', _ => {
            $('#show .modal-title').text('');
            $('#show .modal-body .body').text('');
            $('#show .modal-body #carouselGalleryImage').html(templates.show_image_gallery_modal
                .carousel_gallery_image);
        });

        get_detail();
    </script>
@endsection
