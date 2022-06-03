const reset_modal = (modal_type) => {
    // Reset Modal
    $("#show").on("hidden.bs.modal", (_) => {
        $("#show .modal-title").text("");
        modal_type === "video"
            ? $("#show .modal-body").html(templates.modal.modal_video_body)
            : $("#show .modal-body").html(templates.modal.modal_image_body);
    });
};

// Insert data to modal if click button view
const get_detail = (data_type, title, images, body) => {
    document.querySelector(".overlay").classList.toggle("d-none");
    if (data_type === "destination" || data_type === "tour_package") {
        $("#show .modal-title").text(title);
        $("#show .modal-body .body").html(body);
        $("#show .modal-body .carousel-inner").append(
            templates.modal.carousel_inner(images, url)
        );
        if (images.length > 1) {
            $(
                "#show .modal-body #carouselGalleryImage .carousel-indicators"
            ).append(templates.modal.carousel_indicators(images.length));
            $("#show .modal-body #carouselGalleryImage").append(
                templates.modal.carousel_next_prev_button
            );
        }
        document.querySelector(".overlay").classList.toggle("d-none");
        $("#show").modal("show");
        reset_modal("image");
    } else if (data_type === "image") {
        fetch(`/images/show?slug=${slug}`)
            .then((response) => response.json())
            .then((data) => {
                $("#show .modal-title").text(data.imageGallery.title);
                $("#show .modal-body .body").html(data.imageGallery.body);
                $("#show .modal-body .carousel-inner").append(
                    templates.modal.carousel_inner(
                        data.imageGallery.images,
                        url
                    )
                );
                if (data.imageGallery.images.length > 1) {
                    $(
                        "#show .modal-body #carouselGalleryImage .carousel-indicators"
                    ).append(
                        templates.modal.carousel_indicators(
                            data.imageGallery.images.length
                        )
                    );
                    $("#show .modal-body #carouselGalleryImage").append(
                        templates.modal.carousel_next_prev_button
                    );
                }
                document.querySelector(".overlay").classList.toggle("d-none");
                $("#show").modal("show");
            });
        reset_modal("image");
    } else if (data_type === "video") {
        fetch(`/videos/show?slug=${slug}`)
            .then((response) => response.json())
            .then((data) => {
                $("#show .modal-title").text(data.videoGallery.title);
                $("#show .modal-body iframe").attr(
                    "src",
                    `https://www.youtube.com/embed/${data.videoGallery.video}`
                );
                $("#show .modal-body .body").html(data.videoGallery.body);
                document.querySelector(".overlay").classList.toggle("d-none");
                $("#show").modal("show");
            });
        reset_modal("video");
    }
};
