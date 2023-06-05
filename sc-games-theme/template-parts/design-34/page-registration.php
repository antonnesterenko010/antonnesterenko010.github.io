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
<main>
    <section class="content__form contact register">
        <div class="container">
            <div class="content-block">
                <h1 class="main-content-title">
                    <?php the_title(); ?>
                </h1>
                <div class="form-wrapper">
                    <a id="form_anchor"></a>
                    <form method="POST" action="#form_anchor">
                        <div class="form-block">
                            <div class="block-l">
                                <div class="form-group">
                                    <div class="label-wrapper required">
                                        <label for="r_name"><?php echo !empty($name_label) ? $name_label : 'Name'; ?></label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input class="input"
                                               placeholder="<?php echo !empty($name_label) ? $name_label : 'Enter Your Name'; ?>"
                                               type="text" id="r_name" name="r_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="label-wrapper required">
                                        <label for="r_email"><?php echo !empty($email_label) ? $email_label : 'Enter Your Email'; ?></label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input class="input"
                                               placeholder="<?php echo !empty($email_label) ? $email_label : 'Enter Your Email'; ?>"
                                               type="text" id="r_email" name="r_email">
                                    </div>
                                </div>
                            </div>

                            <div class="block-r">
                                <div class="form-group">
                                    <div class="label-wrapper required">
                                        <label for="r_pass"><?php echo !empty($password_label) ? $password_label : 'Password'; ?></label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input class="input" type="password" id="r_pass" name="r_pass">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="label-wrapper required">
                                        <label for="r_pass_confirm"><?php echo !empty($password_again_label) ? $password_again_label : 'Confirm Password'; ?></label>
                                    </div>
                                    <div class="input-wrapper">
                                        <input class="input" type="password" id="r_pass_confirm" name="r_pass_confirm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-block">
                            <input type="submit" class="submit-btn btn"
                                   value="<?php echo !empty($submit_label) ? $submit_label : 'Submit'; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-overlay" id="message">
            <div class="modal-window">
                <div class="modal-close"></div>
                <div class="modal-content">
                    <div class="modal-title"><?php echo !empty($answer_text) ? $answer_text : 'Thank you for your registration!'; ?></div>
                    <div class="modal-btn">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 3C12.4031 3 3 12.4031 3 24C3 35.5969 12.4031 45 24 45C35.5969 45 45 35.5969 45 24C45 12.4031 35.5969 3 24 3ZM31.7531 31.9781L28.6594 31.9641L24 26.4094L19.3453 31.9594L16.2469 31.9734C16.0406 31.9734 15.8719 31.8094 15.8719 31.5984C15.8719 31.5094 15.9047 31.425 15.9609 31.3547L22.0594 24.0891L15.9609 16.8281C15.9043 16.7594 15.8729 16.6734 15.8719 16.5844C15.8719 16.3781 16.0406 16.2094 16.2469 16.2094L19.3453 16.2234L24 21.7781L28.6547 16.2281L31.7484 16.2141C31.9547 16.2141 32.1234 16.3781 32.1234 16.5891C32.1234 16.6781 32.0906 16.7625 32.0344 16.8328L25.9453 24.0938L32.0391 31.3594C32.0953 31.4297 32.1281 31.5141 32.1281 31.6031C32.1281 31.8094 31.9594 31.9781 31.7531 31.9781Z"
                                  fill="white"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>