@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Galeri Video</h1>
        </div>

        <form action="/admin/gallery/videos/{{ $videoGallery->slug }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col-lg-6">
                <label class="form-label">Video</label>
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $videoGallery->video }}" title="YouTube video"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="mb-3 col-lg-6">
                <label class="form-label">Link YouTube</label>
                <input type="text" placeholder="Link Youtube" class="form-control @error('video') is-invalid @enderror"
                    name="video" id="video"
                    value="{{ old('video', 'https://www.youtube.com/watch?v=' . $videoGallery->video) }}" required>
                @error('video')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-lg-6">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ old('title', $videoGallery->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-lg-6">
                <label for="body" class="form-label">Keterangan</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $videoGallery->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </main>
    <script>
        const youtube_parser = function(url) {
            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
            var match = url.match(regExp);
            return (match && match[7].length == 11) ? match[7] : false;
        }
        const embed_video = function() {
            if (youtube_parser(video.value)) {
                document.querySelector('iframe').src = `https://www.youtube.com/embed/${youtube_parser(video.value)}`;
            }
        }

        const video = document.querySelector('#video');

        (video.value) ? embed_video(): '';
        video.oninput = () => {
            console.log('asd');
            embed_video();
        };
    </script>
@endsection
