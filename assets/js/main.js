document.addEventListener('DOMContentLoaded', function () {

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

    // Hamburger Menu Dropdown Toggle
    var menuTrigger = document.querySelector('.menu-trigger');
    if (menuTrigger) {
        menuTrigger.addEventListener('click', function () {
            this.classList.toggle('active');
            var nav = document.querySelector('.header-area .nav');
            if (nav.style.display === 'block') {
                nav.style.display = 'none';
            } else {
                nav.style.display = 'block';
            }
        });
    }
});
