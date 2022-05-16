// Navbar When Scrolling
document.addEventListener("scroll", function () {
    const navbar = document.querySelector(".fixed-top");
    const jumbotron = document.querySelector(".jumbotron");
    if (
        document.querySelector("html").scrollTop >
        jumbotron.offsetHeight - 700
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
