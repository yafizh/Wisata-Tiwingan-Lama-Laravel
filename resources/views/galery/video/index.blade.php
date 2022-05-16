@extends('galery/layouts/main')

@section('content')
    <main>
        <section class="pt-5 pb-3 container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto text-center">
                    <h1 class="fw-light">Galeri Video</h1>
                </div>
            </div>
        </section>
        @if ($count)
            <div class="album py-5 bg-light">
                <div class="container">
                    <div id="video-galleries" class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                        @foreach ($videoGalleries as $video)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <iframe src="https://www.youtube.com/embed/{{ $video->video }}" title="YouTube video"
                                        allowfullscreen>
                                    </iframe>
                                    <div class="card-body" style="height: 100px;">
                                        <div class="card-text fs-5">
                                            {{ $video->title }}
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col">
                                            <button onclick="get_detail('video', '{{ $video->slug }}')" type="button"
                                                class="btn btn-sm btn-outline-secondary btn-show">Lihat</button>
                                        </div>
                                        <div class="col-auto pt-1">
                                            <small class="text-muted ms-auto">
                                                @if ($video->created_at->isToday())
                                                    {{ 'Hari ini' }}
                                                @elseif ($video->created_at->isYesterday())
                                                    {{ 'Kemarin' }}
                                                @else
                                                    {{ $video->created_at->locale('ID')->getTranslatedMonthName() . ' ' . $imageGallery->created_at->year }}
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

    @include('partials.modal_video')
    <script>
        // modal.js need 'url' variable
        const url = '{{ URL::asset('storage') }}';
    </script>
    <script src="/scripts/templates.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="/scripts/modal.js"></script>
    <script>
        const video_gallery_container = document.querySelector('#video-galleries');
        $(window).scroll(function() {
            if (
                Math.round($(window).scrollTop()) >
                $(document).height() - $(window).height() - 200 &&
                video_gallery_container.children.length !=
                parseInt('{{ $count }}')
            ) {
                fetch('/videos/getMore?paginate=' + video_gallery_container.children.length * 2)
                    .then(response => response.json())
                    .then(data => {
                        for (let i = video_gallery_container.children.length; i < data
                            .videoGallery.length; i++) {
                            video_gallery_container.insertAdjacentHTML('beforeend', templates.video_gallery(data
                                .videoGallery[i]));
                        }
                    });
            }
        });
    </script>
@endsection
