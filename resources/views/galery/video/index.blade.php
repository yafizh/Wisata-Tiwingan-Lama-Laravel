@extends('galery/layouts/main')

@section('content')
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Galeri Video</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                        creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                        entirely.</p>
                </div>
            </div>
        </section>
        @if ($videos->count())
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                        @foreach ($videos as $video)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <iframe loading="lazy" width="100%" height="255"
                                        src="https://www.youtube.com/embed/<?= $video->video ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                    <div class="card-body" style="height: 100px;">
                                        <div class="card-text fs-5">
                                            {{ $video->excerpt }}
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#show-{{ $video->unique_identifier }}">Lihat</button>
                                        </div>
                                        <div class="col-auto">
                                            <small class="text-muted ms-auto">Kemarin</small>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="show-{{ $video->unique_identifier }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div style="height: 355px;">
                                                        <iframe loading="lazy" width="100%" height="100%"
                                                            src="https://www.youtube.com/embed/{{ $video->video }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                    <div class="p-3 text-start">
                                                        {{ $video->body }}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
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
@endsection
