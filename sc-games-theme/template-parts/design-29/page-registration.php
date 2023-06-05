<?php
$prefix = 'register_page_';
$name_label = get_post_meta(get_the_ID(), $prefix . '_name_label', true);
$email_label = get_post_meta(get_the_ID(), $prefix . '_email_label', true);
$password_label = get_post_meta(get_the_ID(), $prefix . '_password_label', true);
$password_again_label = get_post_meta(get_the_ID(), $prefix . '_password_again_label', true);
$submit_label = get_post_meta(get_the_ID(), $prefix . '_submit_label', true);
$answer_text = get_post_meta(get_the_ID(), $prefix . '_answer_text', true);
$answer_button_label = get_post_meta(get_the_ID(), $prefix . '_answer_button_label', true);
?>
<section class="content__form register">
    <div class="container">
        <div class="content-block">
            <a id="form_anchor"></a>
            <form class="form-with-answer" method="POST" action="#form_anchor">
                <div class="content-title main-title-big">
                    <?php the_title(); ?>
                </div>
                <div class="form-block">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input type="text" placeholder="<?php echo !empty($name_label) ? $name_label : 'Name'; ?>" id="r_name" name="r_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input type="password" placeholder="<?php echo !empty($password_label) ? $password_label : 'Password'; ?>" id="r_pass" name="r_pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input type="text" placeholder="<?php echo !empty($email_label) ? $email_label : 'Email'; ?>" id="r_email" name="r_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input type="password" placeholder="<?php echo !empty($password_again_label) ? $password_again_label : 'Password Confirm'; ?>" id="r_pass_confirm" name="r_pass_confirm">
                        </div>
                    </div>
                </div>
                <div class="submit-block">
                    <input type="submit" class="form-submit-btn main-button"
                           value="<?php echo !empty($submit_label) ? $submit_label : 'Register'; ?>">
                </div>
            </form>
        </div>
    </div>
</section>

<div class="modal-overlay">
    <div class="modal-window">
        <div class="modal-close">
            <img src="<?php echo get_template_directory_uri() ?>/assets/design-8/img/close.svg" alt="star">
        </div>
        <div class="modal-content">
            <div class="modal-title"><?php echo !empty($answer_text) ? $answer_text : 'Thank you for your message!'; ?></div>
            <div class="modal-btn main-button"><?php echo !empty($answer_button_label) ? $answer_button_label : 'Ok'; ?></div>
        </div>
    </div>
</div>