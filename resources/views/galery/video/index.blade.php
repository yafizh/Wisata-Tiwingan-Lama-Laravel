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
                                    <iframe loading="lazy" width="100%" height="255"
                                        src="https://www.youtube.com/embed/{{ $video->video }}" title="YouTube video"
                                        allowfullscreen>
                                    </iframe>
                                    <div class="card-body" style="height: 100px;">
                                        <div class="card-text fs-5">
                                            {{ $video->title }}
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-outline-secondary btn-show"
                                                data-slug="{{ $video->slug }}">Lihat</button>
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
    {{-- Show Modal --}}
    <div class="modal fade" id="show" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe width="100%" height="255" title="YouTube video" allowfullscreen>
                    </iframe>
                    <div class="p-3 text-start body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/scripts/templates.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        // Insert data to modal if click button view
        const get_detail = _ => {
            document.querySelectorAll(".btn-show").forEach((button) => {
                button.onclick = function() {
                    fetch('/videos/show?slug=' + this.getAttribute('data-slug'))
                        .then(response => response.json())
                        .then(data => {
                            $('#show .modal-title').text(data.videoGallery.title);
                            $('#show .modal-body iframe').attr('src',
                                `https://www.youtube.com/embed/${data.videoGallery.video}`);
                            $('#show .modal-body .body').html(data.videoGallery.body);
                            $('#show').modal('show');
                        });
                }
            });
        }

        // Reset Modal
        $('#show').on('hidden.bs.modal', _ => {
            $('#show .modal-title').text('');
            $('#show .modal-body .body').text('');
        });


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
                        get_detail();
                    });
            }
        });

        get_detail();
    </script>
@endsection
