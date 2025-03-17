<?php
/**
 * Template Name: Login Page
 */
get_header(); // فراخوانی هدر
?>

<!-- محتوای صفحه لاگین -->
<main class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form">
                    <h2 class="text-center mb-4">ورود به حساب کاربری</h2>

                    <?php
                    // نمایش پیام‌های خطا یا موفقیت
                    if (isset($_GET['login'])) {
                        $login = $_GET['login'];
                        if ($login === 'empty') {
                            echo '<div class="alert alert-danger">لطفا نام کاربری و رمز عبور را وارد کنید.</div>';
                        } elseif ($login === 'failed') {
                            echo '<div class="alert alert-danger">نام کاربری یا رمز عبور اشتباه است.</div>';
                        }
                    }
                    ?>

                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
                        <div class="form-group">
                            <label for="username">نام کاربری یا ایمیل:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">رمز عبور:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="login_submit" class="btn btn-primary">ورود</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="<?php echo wp_lostpassword_url(); ?>">رمز عبور خود را فراموش کرده‌اید؟</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer(); // فراخوانی فوتر
?>