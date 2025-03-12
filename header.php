<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <!-- لوگو -->
            <div class="site-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <h1><?php bloginfo('name'); ?></h1>
                    </a>
                    <?php
                }
                ?>
            </div>

            <!-- منو -->
            <nav class="site-navigation">
                <!-- دکمه همبرگر برای موبایل -->
                <button class="hamburger-menu" aria-label="منو">
                    <span class="hamburger-icon"></span>
                </button>

                <!-- منوی اصلی -->
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'primary-menu',
                    'container'     => false,
                ));
                ?>
            </nav>
        </div>
    </header>