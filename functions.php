<?php

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

function my_theme_enqueue_custom_script() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_custom_script');

function my_theme_enqueue_styles() {
    // فراخوانی فایل CSS اصلی تم
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());

    // فراخوانی فایل‌های CSS اضافی (اگر دارید)
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/custom.css', array(), null, 'all');

    // افزودن فونت Poppins
    wp_enqueue_style(
        'google-fonts-poppins',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;800&display=swap',
        array(),
        null
    );

    // افزودن فونت Open Sans
    wp_enqueue_style(
        'google-fonts-open-sans',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap',
        array(),
        null
    );

    // افزودن فونت آیکون‌های Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        array(),
        '5.15.4'
    );

    // استایل‌های اختصاصی برای هوم پیج‌ها
    if (is_page_template('homepage-1.php')) {
        wp_enqueue_style('homepage-1-style', get_template_directory_uri() . '/css/homepage-1.css');
    } elseif (is_page_template('homepage-2.php')) {
        wp_enqueue_style('homepage-2-style', get_template_directory_uri() . '/css/homepage-2.css');
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 20);

function my_theme_support_elementor() {
    // پشتیبانی از المنتور
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'my_theme_support_elementor');

add_action('wp_enqueue_scripts', function() {
    if (!is_admin()) { // فقط در بخش frontend
        wp_dequeue_style('elementor-frontend'); // غیرفعال کردن استایل‌های پیش‌فرض المنتور
    }
}, 20);

function my_theme_body_classes($classes) {
    if (is_page('homepage-1')) {
        $classes[] = 'homepage-1';
    } elseif (is_page('homepage-2')) {
        $classes[] = 'homepage-2';
    }
    return $classes;
}
add_filter('body_class', 'my_theme_body_classes');

function create_custom_post_type() {
    register_post_type('homepage',
        array(
            'labels' => array(
                'name' => __('Homepages'),
                'singular_name' => __('Homepage')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_custom_post_type');

function my_theme_custom_styles() {
    $custom_css = "
        .page-login .login-form {
            background-color: rgba(255, 255, 255, 0.13) !important;
        }
    ";
    wp_add_inline_style('my-theme-style', $custom_css); // اضافه کردن به فایل استایل اصلی
}
add_action('wp_enqueue_scripts', 'my_theme_custom_styles', 30);

function my_theme_enqueue_scripts() {
    // فراخوانی jQuery (از نسخه پیش‌فرض وردپرس استفاده کنید)
    wp_enqueue_script('jquery');

    // فراخوانی فایل JavaScript بوت‌استرپ
    wp_enqueue_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), null, true);

    // فراخوانی فایل CSS بوت‌استرپ
    wp_enqueue_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    // فراخوانی فایل CSS Font Awesome
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function my_theme_register_menus() {
    register_nav_menus(array(
        'primary' => __('منوی اصلی', 'my-theme'),
    ));
}
add_action('init', 'my_theme_register_menus');


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

function custom_comment_template($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <div class="be-comment">
        <div class="be-img-comment">	
            <?php echo get_avatar($comment, 60, '', '', array('class' => 'be-ava-comment')); ?>
        </div>
        <div class="be-comment-content">
            <span class="be-comment-name">
                <?php echo get_comment_author_link(); ?>
            </span>
            <span class="be-comment-time">
                <i class="fa fa-clock-o"></i>
                <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?>
            </span>
            <p class="be-comment-text">
                <?php comment_text(); ?>
            </p>
        </div>
    </div>
    <?php
}

/*فرم ثبت نام*/
function custom_user_registration() {
    if (isset($_POST['register_submit'])) {
        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // بررسی پر بودن فیلدها
        if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
            wp_redirect(home_url('/register/?register=empty'));
            exit;
        }

        // بررسی تطابق رمز عبور
        if ($password !== $confirm_password) {
            wp_redirect(home_url('/register/?register=password_mismatch'));
            exit;
        }

        // بررسی وجود نام کاربری
        if (username_exists($username)) {
            wp_redirect(home_url('/register/?register=username_exists'));
            exit;
        }

        // بررسی وجود ایمیل
        if (email_exists($email)) {
            wp_redirect(home_url('/register/?register=email_exists'));
            exit;
        }

        // ایجاد کاربر جدید
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            wp_redirect(home_url('/register/?register=error'));
            exit;
        } else {
            // ورود خودکار کاربر پس از ثبت نام
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url('/register/?register=success'));
            exit;
        }
    }
}
add_action('init', 'custom_user_registration');

function custom_user_login() {
    if (isset($_POST['login_submit'])) {
        $username = sanitize_user($_POST['username']);
        $password = $_POST['password'];

        // بررسی پر بودن فیلدها
        if (empty($username) || empty($password)) {
            wp_redirect(home_url('/login/?login=empty'));
            exit;
        }

        // احراز هویت کاربر
        $user = wp_signon(array(
            'user_login' => $username,
            'user_password' => $password,
            'remember' => true,
        ));

        if (is_wp_error($user)) {
            wp_redirect(home_url('/login/?login=failed'));
            exit;
        } else {
            // هدایت کاربر به صفحه مشخص پس از ورود
            wp_redirect(home_url('/'));
            exit;
        }
    }
}
add_action('init', 'custom_user_login');



function my_theme_disable_jquery_migrate($scripts) {
    if (!is_admin() && !empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            array('jquery-migrate')
        );
    }
}
add_action('wp_default_scripts', 'my_theme_disable_jquery_migrate');