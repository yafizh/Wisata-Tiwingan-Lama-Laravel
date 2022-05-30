@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Galeri Gambar</h1>
        </div>

        <form action="/admin/gallery/images/{{ $imageGallery->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <div id="image-container" class="d-flex gap-3 overflow-auto">
                    @foreach ($imageGallery->images as $image)
                        <div class="rounded border border-1 overflow-hidden preview-image-container">
                            <img src="{{ asset('storage/' . $image->image) }}">
                            <div class="button-container d-flex flex-column gap-2 justify-content-center align-items-center d-none"
                                style="background-color: rgba(0, 0, 0, .8)">
                                <button type="button" class="btn btn-warning" onclick="updateImage(this)">Ganti
                                    Gambar...</button>
                                <button type="button" class="btn btn-danger" onclick="removeImage(this)">Hapus
                                    Gambar...</button>
                            </div>
                            <input type="file" name="images[]" hidden>
                            <input type="text" value="{{ $image->image }}" name="image_in_storage[]" hidden>
                        </div>
                    @endforeach
                </div>
                @error('images.*')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-lg-6">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ old('title', $imageGallery->title) }}" required autocomplete="off">
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
                <input id="body" type="hidden" name="body" value="{{ old('body', $imageGallery->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
        <script>
            document.querySelectorAll(".preview-image-container").forEach((container) => {
                container.onmouseover = () => {
                    container.children[1].classList.remove('d-none');
                }
                container.onmouseout = () => {
                    container.children[1].classList.add('d-none');
                }
            });
            const templateImgPreviewPlaceholder = `
                <div class="rounded border border-1 overflow-hidden preview-image-container">
                    <img class='d-none'>
                    <div class="button-container d-flex flex-column gap-2 justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary" onclick="addImage(this)">Pilih Gambar...</button>
                        <button type="button" class="btn btn-warning d-none" onclick="updateImage(this)">Ganti Gambar...</button>
                        <button type="button" class="btn btn-danger d-none" onclick="removeImage(this)">Hapus Gambar...</button>
                    </div>
                    <input type="file" name="images[]" hidden>
                </div>
            `;
            const imgPreviewContainer = document.querySelector("#image-container");
            const generateImgPreviewPlaceholder = () => imgPreviewContainer.insertAdjacentHTML('beforeend',
                templateImgPreviewPlaceholder);
            const previewImg = (input, placeholder, button) => {
                const oFReader = new FileReader();
                oFReader.readAsDataURL(input.files[0]);

                oFReader.onload = function(oFREvent) {
                    placeholder.src = oFREvent.target.result;
                    if (button['isAddImage']) {
                        placeholder.classList.remove('d-none');
                        button['addImageButton'].parentElement.classList.add('d-none');
                        button['addImageButton'].parentElement.style.backgroundColor = "rgba(0,0,0,.8)";
                        button['addImageButton'].classList.add('d-none');
                        button['upadateImageButton'].classList.remove('d-none');
                        button['removeImageButton'].classList.remove('d-none');
                        generateImgPreviewPlaceholder();

                        document.querySelectorAll(".preview-image-container").forEach((container) => {
                            container.onmouseover = () => {
                                if (container.children[0].src != "") container.children[1].classList.remove('d-none');
                            }
                            container.onmouseout = () => {
                                if (container.children[0].src != "") container.children[1].classList.add('d-none');
                            }
                        });
                    } else
                        button['upadateImageButton'].parentElement.nextElementSibling.nextElementSibling.remove();
                }
            }
            const addImage = (button) => {
                const addImageButton = button;
                const upadateImageButton = button.nextElementSibling;
                const removeImageButton = button.nextElementSibling.nextElementSibling;
                const inputImage = button.parentElement.nextElementSibling;
                const imgPreviewPlaceholder = button.parentElement.previousElementSibling;
                inputImage.onchange = _ => previewImg(
                    inputImage,
                    imgPreviewPlaceholder, {
                        "addImageButton": addImageButton,
                        "upadateImageButton": upadateImageButton,
                        "removeImageButton": removeImageButton,
                        "isAddImage": true
                    }
                );
                inputImage.click();
            }
            const updateImage = (button) => {
                const upadateImageButton = button;
                const inputImage = button.parentElement.nextElementSibling;
                const imgPreviewPlaceholder = button.parentElement.previousElementSibling;
                inputImage.onchange = _ => previewImg(
                    inputImage,
                    imgPreviewPlaceholder, {
                        "upadateImageButton": upadateImageButton,
                        "isAddImage": false
                    }
                );
                inputImage.click();
            }
            const removeImage = (button) => button.parentElement.parentElement.remove();
            generateImgPreviewPlaceholder();
        </script>
    </main>
@endsection
