<?php
/**
 * The footer for our theme
 */
?>
    <?php
    // بررسی آیا المنتور از فوتر استفاده می‌کند
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) {
        // اگر المنتور فوتر نداشت، فوتر سفارشی را فراخوانی کنید
        get_template_part('footer-custom');
    }
    ?>

<?php wp_footer(); ?>
</body>
</html>