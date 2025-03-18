<?php
/**
 * The header for our theme
 */
?>

    <?php
    // بررسی آیا المنتور از هدر استفاده می‌کند
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) {
        // اگر المنتور هدر نداشت، هدر سفارشی را فراخوانی کنید
        get_template_part('header-custom');
    }
    ?>


