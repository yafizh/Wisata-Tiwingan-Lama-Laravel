const templates = {
    modal: {
        modal_image_body: `
            <div id="carouselGalleryImage" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators"></div>
                <div class="carousel-inner"></div>
            </div>
            <div class="p-3 text-start body"></div>`,
        modal_video_body: `
            <iframe width="100%" height="255" title="YouTube video" allowfullscreen>
            </iframe>
            <div class="p-3 text-start body"></div>`,
        carousel_indicators: function (n) {
            let buffer = `<button type="button" data-bs-target="#carouselGalleryImage" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>`;

            for (let i = 1; i < n; i++) {
                buffer += `<button type="button" data-bs-target="#carouselGalleryImage" data-bs-slide-to="${i}" aria-current="true" aria-label="Slide ${
                    i + 1
                }"></button>`;
            }

            return buffer;
        },
        carousel_next_prev_button: `
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselGalleryImage" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselGalleryImage" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>`,
        carousel_inner: function (data, uri) {
            let buffer = `
                <div class="carousel-item active">
                    <img src="${uri}/${data[0].image}" style="height: 255px; object-fit: cover;" class="d-block w-100">
                </div>`;

            for (let i = 0; i < data.length - 1; i++) {
                buffer += `
                    <div class="carousel-item">
                        <img src="${uri}/${data[i].image}" style="height: 255px; object-fit: cover;" class="d-block w-100">
                    </div>`;
            }

            return buffer;
        },
    },
    image_gallery: function (imageGallery, uri) {
        return `
            <div class="col">
                <div class="card shadow-sm">
                    <img src="${uri}/${imageGallery.images[0].image}">
                    <div class="card-body" style="height: 100px;">
                        <div class="card-text fs-5">${imageGallery.title}</div>
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-show" onclick="get_detail('image', '${imageGallery.slug}')">Lihat</button>
                        </div>
                        <div class="col-auto pt-1">
                            <small class="text-muted ms-auto">
                                ${imageGallery.created_at}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `;
    },
    video_gallery: function (videoGallery) {
        return `
            <div class="col">
                <div class="card shadow-sm">
                    <iframe loading="lazy" width="100%" height="255"
                        src="https://www.youtube.com/embed/${videoGallery.video}" title="YouTube video"
                        allowfullscreen>
                    </iframe>
                    <div class="card-body" style="height: 100px;">
                        <div class="card-text fs-5">${videoGallery.title}</div>
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-show" onclick="get_detail('video', '${videoGallery.slug}')">Lihat</button>
                        </div>
                        <div class="col-auto pt-1">
                            <small class="text-muted ms-auto">
                                ${videoGallery.created_at}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `;
    },
};
