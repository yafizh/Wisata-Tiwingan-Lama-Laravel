@extends('galery/layouts/main')

@section('content')
    <main>
        @include('partials.loader')
        <section class="pt-5 pb-3 container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto text-center">
                    <h1 class="fw-light">Galeri Gambar</h1>
                </div>
            </div>
        </section>
        @if ($imageGalleries->count())
            <div class="album py-5 bg-light">
                <div class="container">
                    <div id="image-galleries" class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                        @foreach ($imageGalleries as $imageGallery)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/' . $imageGallery->images[0]->image) }}">
                                    <div class="card-body">
                                        <div class="card-text fs-5">
                                            {{ $imageGallery->title }}
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col">
                                            <button onclick="get_detail('image', '{{ $imageGallery->slug }}')"
                                                type="button"
                                                class="btn btn-sm btn-outline-secondary btn-show">Lihat</button>
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

    @include('partials.modal_image')
    <script>
        // modal.js need 'url' variable
        const url = '{{ URL::asset('storage') }}';
    </script>
    <script src="/scripts/templates.js"></script>
    <script src="/scripts/modal.js"></script>
    <script>
        const image_gallery_container = document.querySelector('#image-galleries');
        $(window).scroll(function() {
            if (
                Math.round($(window).scrollTop()) >
                ($(document).height() - $(window).height()) / 2 &&
                image_gallery_container.children.length !=
                parseInt('{{ $count }}')
            ) {
                fetch('/images/getMore?paginate=' + image_gallery_container.children.length * 2)
                    .then(response => response.json())
                    .then(data => {
                        for (let i = image_gallery_container.children.length; i < data
                            .imageGallery.length; i++) {
                            image_gallery_container.insertAdjacentHTML('beforeend', templates.image_gallery(data
                                .imageGallery[i],
                                url));
                        }
                    });
            }
        });
    </script>
@endsection
