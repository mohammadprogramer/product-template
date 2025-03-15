<?php
/*
Template Name: صفحه ورود
*/

get_header(); ?>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form class="login-form">
    <h3>ورود به سایت</h3>

    <label for="username">نام کاربری</label>
    <input type="text" placeholder="ایمیل یا شماره تلفن" id="username">

    <label for="password">رمز عبور</label>
    <input type="password" placeholder="رمز عبور" id="password">

    <button>ورود</button>
    <div class="social">
        <div class="go"><i class="fab fa-google"></i> گوگل</div>
        <div class="fb"><i class="fab fa-facebook"></i> فیسبوک</div>
    </div>
</form>

<?php
get_footer();
?>