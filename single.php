<?php
get_header(); // فراخوانی هدر
?>

<section class="custom-section">
    <div class="container">
        <h2>این یک بخش سفارشی است</h2>
        <p>این محتوا بین هدر و فوتر نمایش داده می‌شود.</p>
    </div>
</section>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php
    endwhile;
    ?>
</main>

<?php
get_footer(); // فراخوانی فوتر
?>