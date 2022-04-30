const templates = {
    show_image_gallery_modal: {
        carousel_gallery_image: `<div class="carousel-indicators"></div><div class="carousel-inner"></div>`,
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

            for (let i = 1; i < data.length; i++) {
                buffer += `
                    <div class="carousel-item">
                        <img src="${uri}/${data[i].image}" style="height: 255px; object-fit: cover;" class="d-block w-100">
                    </div>`;
            }

            return buffer;
        },
    },
};
