document.addEventListener('DOMContentLoaded', function () {
    setActiveClassBasedOnTitle();
    // Page loading animation
    document.getElementById('js-preloader').classList.add('loaded');
    
    // Taskbar change on scroll
    window.addEventListener('scroll', function () {
        var scroll = window.scrollY;
        var box = document.querySelector('.header-text').offsetHeight;
        var header = document.querySelector('header').offsetHeight;
        var headerElement = document.querySelector('header');

        if (scroll >= box - header) {
            headerElement.classList.add("background-header");
        } else {
            headerElement.classList.remove("background-header");
        }
    });
})
