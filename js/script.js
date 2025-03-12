document.addEventListener('DOMContentLoaded', function () {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const primaryMenu = document.querySelector('.primary-menu');

    hamburgerMenu.addEventListener('click', function () {
        primaryMenu.classList.toggle('active');
    });
});