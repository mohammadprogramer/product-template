<?php
/**
 * Template Name: Homepage-2
 */
get_header('home'); // فراخوانی هدر اختصاصی
?>

<!-- محتوای هوم پیج -->
<main class="flex-shrink-0">
    <!-- Hero Section -->
    <section class="hero-section bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold">به شرکت ما خوش آمدید</h1>
                    <p class="lead">ما بهترین راه‌حل‌ها را برای کسب‌وکار شما ارائه می‌دهیم.</p>
                    <a class="btn btn-primary btn-lg" href="#services">خدمات ما</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">خدمات ما</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">طراحی وب</h5>
                            <p class="card-text">طراحی وب‌سایت‌های مدرن و واکنش‌گرا.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">توسعه نرم‌افزار</h5>
                            <p class="card-text">توسعه نرم‌افزارهای سفارشی برای کسب‌وکار شما.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">مشاوره فناوری</h5>
                            <p class="card-text">مشاوره در زمینه فناوری اطلاعات و دیجیتال مارکتینگ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">درباره ما</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p>ما یک شرکت فناوری اطلاعات هستیم که با تیمی متخصص در زمینه طراحی وب، توسعه نرم‌افزار و مشاوره فناوری فعالیت می‌کنیم.</p>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/about.jpg" alt="درباره ما" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">آخرین وبلاگ‌ها</h2>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3, // تعداد پست‌ها
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">ادامه مطلب</a>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>هیچ پستی یافت نشد.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer('home'); // فراخوانی فوتر اختصاصی
?>