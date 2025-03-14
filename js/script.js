

function debounce(func, wait) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}



document.addEventListener('DOMContentLoaded', function () {
    // تابع برای مدیریت منوی همبرگر
    function handleHamburgerMenu(menuButton, menu) {
        if (menuButton && menu) {
            menuButton.addEventListener('click', function () {
                menu.classList.toggle('show');
            });
        }
    }

    // تابع برای مدیریت افکت پارالاکس
    function handleParallaxEffect(image) {
        if (image) {
            window.addEventListener('scroll', function () {
                const scrollPosition = window.scrollY;
                image.style.transform = `translateY(${scrollPosition * 0.5}px)`; // افکت پارالاکس
            });
        }
    }

    // فراخوانی توابع
    handleHamburgerMenu(document.querySelector('.hamburger-menu'), document.querySelector('.primary-menu'));
    handleHamburgerMenu(document.querySelector('.navbar-toggler'), document.querySelector('#navbarResponsive'));
    handleParallaxEffect(document.querySelector('.featured-image-fixed .fixed-image'));
    handleParallaxEffect(document.querySelector('.featured-image-container .featured-image')); // اضافه کردن این خط برای تصویر شاخص جدید
});