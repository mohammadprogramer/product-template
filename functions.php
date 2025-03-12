<?php
function custom_product_page() {
    if (is_product()) {
        // اضافه کردن استایل‌های سفارشی
        wp_enqueue_style('custom-product-style', get_template_directory_uri() . '/css/custom-product.css');

        // اضافه کردن اسکریپت‌های سفارشی
        wp_enqueue_script('custom-product-script', get_template_directory_uri() . '/js/custom-product.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'custom_product_page');

function custom_product_price($price, $product) {
    return '<span class="custom-price">' . $price . '</span>';
}
add_filter('woocommerce_get_price_html', 'custom_product_price', 10, 2);