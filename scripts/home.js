const navbar = document.querySelector(".fixed-top");
const jumbotron = document.querySelector(".jumbotron");

const tourPackage = document.querySelector("#tour-package");
const destination = document.querySelector("#destination");
const village = document.querySelector("#village");
const aboutUs = document.querySelector("#about-us");

const navbarList = document.querySelector("#navbarNav ul");
const navbarNavLink = navbarList.querySelectorAll("li a");
// Navbar When Scrolling
document.addEventListener("scroll", function () {
    // aboyt us <= 230 because it is bottow of the page, no space anymore, so i set the exactly number
    if (aboutUs.getBoundingClientRect().y <= 230) {
        navbarNavLink.forEach((a) => a.classList.remove("marker"));
        navbarList.querySelector("li:nth-child(5) a").classList.add("marker");
    } else if (tourPackage.getBoundingClientRect().y <= 1) {
        navbarNavLink.forEach((a) => a.classList.remove("marker"));
        navbarList.querySelector("li:nth-child(4) a").classList.add("marker");
    } else if (village.getBoundingClientRect().y <= 1) {
        navbarNavLink.forEach((a) => a.classList.remove("marker"));
        navbarList.querySelector("li:nth-child(3) a").classList.add("marker");
    } else if (destination.getBoundingClientRect().y <= 1) {
        navbarNavLink.forEach((a) => a.classList.remove("marker"));
        navbarList.querySelector("li:nth-child(2) a").classList.add("marker");
    } else {
        navbarNavLink.forEach((a) => a.classList.remove("marker"));
        navbarList.querySelector("li:nth-child(1) a").classList.add("marker");
    }

    if (document.querySelector("html").scrollTop > jumbotron.offsetHeight / 4) {
        navbar.classList.add("scrolled");
        navbar.classList.add("navbar-light");
        navbar.classList.remove("navbar-dark");
        navbarList.style.borderBottomColor = "#000";
    } else {
        navbar.classList.remove("scrolled");
        navbar.classList.remove("navbar-light");
        navbar.classList.add("navbar-dark");
        navbarList.style.borderBottomColor = "#191919";
    }
});

document.querySelectorAll("#tour-package .btn-show").forEach((button, index) => {
    button.addEventListener("click", (_) => {
        if (index === 0) {
            get_detail(
                "tour_package",
                "Ojek Sepeda Motor",
                [
                    { image: "tour_package_images/ojek.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        } else if (index === 1) {
            get_detail(
                "tour_package",
                "Kapal",
                [
                    { image: "tour_package_images/kapal.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        } else if (index === 2) {
            get_detail(
                "tour_package",
                "Home Stay",
                [
                    { image: "tour_package_images/home_stay.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        }
    });
});

document.querySelectorAll("#destination .btn-show").forEach((button, index) => {
    button.addEventListener("click", (_) => {
        if (index === 0) {
            get_detail(
                "destination",
                "Bukit Tiwingan",
                [
                    { image: "destination_images/bukit_tiwingan.webp" },
                    { image: "destination_images/bukit_tiwingan_2.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        } else if (index === 1) {
            get_detail(
                "destination",
                "Alimpung Park",
                [
                    { image: "destination_images/alimpung_park.webp" },
                    { image: "destination_images/alimpung_park_2.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        } else if (index === 2) {
            get_detail(
                "destination",
                "Matang Kaladan",
                [
                    { image: "destination_images/matang_kaladan.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        } else if (index === 3) {
            get_detail(
                "destination",
                "Pancing Jungur",
                [
                    { image: "destination_images/pancing_jungur.webp" },
                ],
                "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!"
            );
        }
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
