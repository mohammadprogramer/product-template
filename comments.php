<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 */

if (post_password_required()) {
    // اگر نوشته با رمز محافظت شده باشد، نظرات نمایش داده نمی‌شوند
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    // نمایش نظرات
    if (have_comments()) :
        ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(__('One thought on &ldquo;%s&rdquo;', 'text-domain'), get_the_title());
            } else {
                printf(
                    __('%1$s thoughts on &ldquo;%2$s&rdquo;', 'text-domain'),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 56,
            ));
            ?>
        </ol>

        <?php
        // نمایش صفحه‌بندی نظرات
        the_comments_pagination(array(
            'prev_text' => __('Previous', 'text-domain'),
            'next_text' => __('Next', 'text-domain'),
        ));
    endif;

    // اگر نظرات بسته باشند، پیام مناسب نمایش داده می‌شود
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'text-domain'); ?></p>
    <?php
    endif;

    // نمایش فرم ارسال نظر
    comment_form();
    ?>
</div>