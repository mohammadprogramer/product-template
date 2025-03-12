<?php

function my_theme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'my_theme_add_woocommerce_support');
function my_theme_enqueue_woocommerce_styles() {
    wp_enqueue_style('woocommerce-style', get_template_directory_uri() . '/woocommerce.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_woocommerce_styles');




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

// غیرفعال‌سازی ویرایشگر گوتنبرگ
function disable_gutenberg() {
    // غیرفعال‌سازی برای همه کاربران
    add_filter('use_block_editor_for_post', '__return_false', 10);
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
}
add_action('init', 'disable_gutenberg');

function my_theme_setup() {
    // پشتیبانی از تگ عنوان
    add_theme_support('title-tag');

    // پشتیبانی از تصویر شاخص
    add_theme_support('post-thumbnails');

    // پشتیبانی از فرمت‌های نوشته
    add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

    // پشتیبانی از HTML5 برای فرم‌ها و عناصر
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');


function my_theme_add_editor_styles() {
    add_editor_style('editor-style.css');
}
add_action('admin_init', 'my_theme_add_editor_styles');


function my_theme_custom_editor_buttons($buttons) {
    // اضافه کردن دکمه‌های سفارشی
    array_push($buttons, 'fontselect', 'fontsizeselect', 'backcolor');
    return $buttons;
}
add_filter('mce_buttons', 'my_theme_custom_editor_buttons');

function my_theme_custom_editor_buttons_2($buttons) {
    // اضافه کردن دکمه‌های بیشتر به ردیف دوم
    array_push($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'my_theme_custom_editor_buttons_2');