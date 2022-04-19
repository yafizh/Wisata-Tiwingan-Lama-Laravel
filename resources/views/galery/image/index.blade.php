@extends('galery/layouts/main')

@section('content')
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Galeri Gambar</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                        creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                        entirely.</p>
                </div>
            </div>
        </section>
        @if ($images->count())
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
                        @foreach ($images as $image)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="assets/images/{{ $image->image }}" loading="lazy">
                                    <div class="card-body" style="height: 100px;">
                                        <div class="card-text fs-5">
                                            {{ $image->excerpt }}
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#show-{{ $image->unique_identifier }}">Lihat</button>
                                        </div>
                                        <div class="col-auto">
                                            <small class="text-muted ms-auto">Kemarin</small>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="show-{{ $image->unique_identifier }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <img src="assets/images/{{ $image->image }}" loading="lazy">
                                                    <div class="p-3 text-start">
                                                        {{ $image->body }}
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
