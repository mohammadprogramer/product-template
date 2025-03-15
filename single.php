<?php
get_header(); // فراخوانی هدر
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- نمایش تصویر شاخص به عنوان یک عنصر مستقل -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image-container">
                    <?php the_post_thumbnail('full', array('class' => 'featured-image')); ?>
                </div>
            <?php endif; ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>

                <?php
// بررسی آیا نظرات باز هستند و آیا نظری وجود دارد
             if (comments_open() || get_comments_number()) :
                comments_template();
                endif;
                    ?>
            </div>
        </article>
    <?php
    endwhile;
    ?>
</main>


<?php
get_footer(); // فراخوانی فوتر
?>