@extends('galery/layouts/main')

@section('content')
    <main>
        <section class="pt-5 pb-3 container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto text-center">
                    <h1 class="fw-light">Galeri Gambar</h1>
                </div>
            </div>
            {{-- <form action="">
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-6">
                        <label for="basic-url" class="form-label">Tanggal</label>
                        <div class="input-group">
                            <input type="date" class="form-control" value="{{ Date('Y-m-d') }}">
                            <span class="input-group-text"> - </span>
                            <input type="date" class="form-control" value="{{ Date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-lg-5">
                        <label for="basic-url" class="form-label">Judul</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari judul...">
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <label class="form-label" style="visibility: hidden;">-</label>
                        <button class="form-control btn btn-primary">Cari</button>
                    </div>
                </div>
            </form> --}}
        </section>
        @if ($imageGalleries->count())
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                        @foreach ($imageGalleries as $imageGallery)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/' . $imageGallery->images[0]->image) }}">
                                    <div class="card-body" style="height: 100px;">
                                        <div class="card-text fs-5">
                                            {{ $imageGallery->title }}
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-outline-secondary btn-show"
                                                data-slug="{{ $imageGallery->slug }}">Lihat</button>
                                        </div>
                                        <div class="col-auto pt-1">
                                            <small class="text-muted ms-auto">
                                                @if ($imageGallery->created_at->isToday())
                                                    {{ 'Hari ini' }}
                                                @elseif ($imageGallery->created_at->isYesterday())
                                                    {{ 'Kemarin' }}
                                                @else
                                                    {{ $imageGallery->created_at->locale('ID')->getTranslatedMonthName() . ' ' . $imageGallery->created_at->year }}
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
    <script>
        document.querySelectorAll(".btn-show").forEach((button) => {
            button.onclick = function() {
                fetch('/images/show?slug=' + this.getAttribute('data-slug'))
                    .then(response => response.json())
                    .then(data => {
                        $('#show .modal-title').text(data.imageGallery.title);
                        $('#show .modal-body .body').html(data.imageGallery.body);
                        if (data.imageGallery.images.length > 1) {
                            $('#show .modal-body #carouselGalleryImage .carousel-indicators').append(`
                                <button type="button" data-bs-target="#carouselGalleryImage" data-bs-slide-to="0" class="active" aria-current="true"
                                    aria-label="Slide 1"></button>
                            `);
                            for (let i = 1; i < data.imageGallery.images.length; i++) {
                                $('#show .modal-body #carouselGalleryImage .carousel-indicators').append(`
                                <button type="button" data-bs-target="#carouselGalleryImage" data-bs-slide-to="${i}"
                                        aria-current="true" aria-label="Slide ${i+1}"></button>
                            `);
                            }
                            $('#show .modal-body #carouselGalleryImage').append(`
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselGalleryImage"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselGalleryImage"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            `);
                        }

                        const url = '{{ URL::asset('storage') }}';
                        $('#show .modal-body .carousel-inner').append(`
                            <div class="carousel-item active">
                                <img src="${url}/${data.imageGallery.images[0].image}" style="height: 255px; object-fit: cover;" class="d-block w-100">
                            </div>
                            `);

                        for (let i = 1; i < data.imageGallery.images.length; i++) {
                            $('#show .modal-body .carousel-inner').append(`
                            <div class="carousel-item">
                                        <img src="${url}/${data.imageGallery.images[i].image}" style="height: 255px; object-fit: cover;" class="d-block w-100">
                                    </div>
                            `);
                        }

                        $('#show').modal('show');

                    });
            }
        });
        $('#show').on('hidden.bs.modal', _ => {
            $('#show .modal-title').text('');
            $('#show .modal-body .body').text('');
            $('#show .modal-body #carouselGalleryImage').html(`
                <div class="carousel-indicators">
                </div>
                <div class="carousel-inner">
                </div>
            `);
            $('#show .modal-body .carousel-inner').append('');
        })
    </script>
@endsection
