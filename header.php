<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
    // بررسی آیا المنتور از هدر استفاده می‌کند
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) {
        // اگر المنتور هدر نداشت، هدر سفارشی را فراخوانی کنید
        get_template_part('header-custom');
    }
    ?>