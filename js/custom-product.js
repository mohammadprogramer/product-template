// اسکریپت‌های سفارشی برای صفحه محصول
jQuery(document).ready(function($) {
    // افزودن اسکریپت‌های مورد نیاز
    $('.product-images').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
});