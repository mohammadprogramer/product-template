<?php
/**
 * The template for displaying all single products
 *
 * @package WordPress
 * @subpackage YourTheme
 * @since 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            wc_get_template_part('content', 'single-product');
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();