@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $videoGallery->title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="/admin/gallery/videos" class="btn btn-sm btn-secondary ms-2">Kembali</a>
                <a href="/admin/gallery/videos/{{ $videoGallery->slug }}/edit" class="btn btn-sm btn-warning ms-2">Ubah</a>
                <form action="/admin/gallery/videos/{{ $videoGallery->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger ms-2" onclick="return confirm('Are you sure?')">Hapus</button>
                </form>
            </div>
        </div>

        <div class="row mb-3 col-lg-6">
            <div class="ratio ratio-16x9" style="margin-left: 13px;">
                <iframe src="https://www.youtube.com/embed/{{ $videoGallery->video }}" title="YouTube video"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="row mb-3 col-lg-6">
            {!! $videoGallery->body !!}
        </div>
    </main>
@endsection
