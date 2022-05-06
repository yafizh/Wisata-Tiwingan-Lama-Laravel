@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $destination->name }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="/admin/destinations" class="btn btn-sm btn-secondary ms-2">Kembali</a>
                <a href="/admin/destinations/{{ $destination->slug }}/edit" class="btn btn-sm btn-warning ms-2">Ubah</a>
                <form action="/admin/destinations/{{ $destination->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger ms-2" onclick="return confirm('Are you sure?')">Hapus</button>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6">
                <div id="carouselGalleryImage" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @if ($destination->destination_images->count() > 1)
                            <button type="button" data-bs-target="#carouselGalleryImage" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            @foreach ($destination->destination_images->skip(1) as $image)
                                <button type="button" data-bs-target="#carouselGalleryImage"
                                    data-bs-slide-to="{{ $loop->index + 1 }}" aria-current="true"
                                    aria-label="Slide {{ $loop->iteration + 1 }}"></button>
                            @endforeach
                        @endif
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 300px;">
                            <img src="{{ asset('storage/' . $destination->destination_images[0]->image) }}"
                                class="d-block w-100" style="height: 100%; object-fit: cover;">
                        </div>
                        @if ($destination->destination_images->count() > 1)
                            @foreach ($destination->destination_images->skip(1) as $image)
                                <div class="carousel-item" style="height: 300px;">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100" style="object-fit: cover; height: 100%;">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @if ($destination->destination_images->count() > 1)
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
                    @endif
                </div>
            </div>
        </div>
        <div class="row mb-3 col-lg-6">
            {!! $destination->body !!}
        </div>
    </main>
@endsection
