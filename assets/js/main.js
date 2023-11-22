document.addEventListener('DOMContentLoaded', function () {
    setActiveClassBasedOnTitle();

    // Page loading animation
    document.getElementById('js-preloader').classList.add('loaded');

    // Taskbar change on scroll
    var box = document.querySelector('.header-text').offsetHeight;

    window.addEventListener('scroll', function () {
        var scroll = window.scrollY;
        var headerElement = document.querySelector('header');

        if (scroll >= box) {
            headerElement.classList.add("background-header");
        } else {
            headerElement.classList.remove("background-header");
        }
    });
});
