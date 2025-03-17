<?php
/**
 * Template Name: Register Page
 */
get_header(); // فراخوانی هدر
?>

<!-- محتوای صفحه ثبت نام -->
<main class="register-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-form">
                    <h2 class="text-center mb-4">ثبت نام</h2>

                    <?php
                    // نمایش پیام‌های خطا یا موفقیت
                    if (isset($_GET['register'])) {
                        $register = $_GET['register'];
                        if ($register === 'empty') {
                            echo '<div class="alert alert-danger">لطفا تمام فیلدها را پر کنید.</div>';
                        } elseif ($register === 'username_exists') {
                            echo '<div class="alert alert-danger">نام کاربری قبلاً استفاده شده است.</div>';
                        } elseif ($register === 'email_exists') {
                            echo '<div class="alert alert-danger">ایمیل قبلاً استفاده شده است.</div>';
                        } elseif ($register === 'success') {
                            echo '<div class="alert alert-success">ثبت نام با موفقیت انجام شد. لطفاً وارد شوید.</div>';
                        }
                    }
                    ?>

                    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
                        <div class="form-group">
                            <label for="username">نام کاربری:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">رمز عبور:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">تکرار رمز عبور:</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="register_submit" class="btn btn-primary">ثبت نام</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer(); // فراخوانی فوتر
?>