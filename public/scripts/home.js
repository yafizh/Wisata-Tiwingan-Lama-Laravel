// Navbar When Scrolling
document.addEventListener("scroll", function () {
    const navbar = document.querySelector(".fixed-top");
    const jumbotron = document.querySelector(".jumbotron");
    if (
        document.querySelector("html").scrollTop >
        jumbotron.offsetHeight / 4
    ) {
        navbar.classList.add("scrolled");
        navbar.classList.add("navbar-light");
        navbar.classList.remove("navbar-dark");
    } else {
        navbar.classList.remove("scrolled");
        navbar.classList.remove("navbar-light");
        navbar.classList.add("navbar-dark");
    }
});

document.querySelectorAll("#tour-package .btn-show").forEach((button) => {
    button.addEventListener("click", (_) => {
        get_detail("tour_package", button.getAttribute("data-slug"));
    });
});

document.querySelectorAll("#destination .btn-show").forEach((button) => {
    button.addEventListener("click", (_) => {
        get_detail("destination", button.getAttribute("data-slug"));
    });
});

$("#join-us").mouseleave(function () {
    if ($("#footer-brand").text() !== "Dewi Tilam") {
        $("#footer-brand").fadeOut("fast", function () {
            $(this).addClass("footer-brand");
            $(this).removeClass("join-us-font-size");
            $(this).text("Dewi Tilam");
        });
        $("#footer-brand").fadeIn("fast");
    }
});
$("#instagram").mouseenter(function () {
    if ($("#footer-brand").text() !== "@dewitilam") {
        $("#footer-brand").fadeOut("fast", function () {
            $(this).removeClass("footer-brand");
            $(this).addClass("dewi-tilam-text");
            $(this).addClass("join-us-font-size");
            $(this).text("@dewitilam");
        });
        $("#footer-brand").fadeIn("fast");
    }
});

$("#email").mouseenter(function () {
    if ($("#footer-brand").text() !== "desatiwinganlama@gmail.com") {
        $("#footer-brand").fadeOut("fast", function () {
            $(this).removeClass("footer-brand");
            $(this).addClass("dewi-tilam-text");
            $(this).addClass("join-us-font-size");
            $(this).text("desatiwinganlama@gmail.com");
        });
        $("#footer-brand").fadeIn("fast");
    }
});

$("#whatsapp").mouseenter(function () {
    if ($("#footer-brand").text() !== "(0811) 1234 5678") {
        $("#footer-brand").fadeOut("fast", function () {
            $(this).removeClass("footer-brand");
            $(this).addClass("dewi-tilam-text");
            $(this).addClass("join-us-font-size");
            $(this).text("(0811) 1234 5678");
        });
        $("#footer-brand").fadeIn("fast");
    }
});

$("#location").mouseenter(function () {
    if ($("#footer-brand").text() !== "Desa Tiwingan Lama") {
        $("#footer-brand").fadeOut("fast", function () {
            $(this).removeClass("footer-brand");
            $(this).addClass("dewi-tilam-text");
            $(this).addClass("join-us-font-size");
            $(this).text("Desa Tiwingan Lama");
        });
        $("#footer-brand").fadeIn("fast");
    }
});
