<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$index_data = get_index_page_data();
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$footer_col1 = isset($options[$prefix . 'footer_col_1']) && !empty($options[$prefix . 'footer_col_1']) ? $options[$prefix . 'footer_col_1'] : '';
$footer_col2 = isset($options[$prefix . 'footer_col_2']) && !empty($options[$prefix . 'footer_col_2']) ? $options[$prefix . 'footer_col_2'] : '';
$footer_col3 = isset($options[$prefix . 'footer_col_3']) && !empty($options[$prefix . 'footer_col_3']) ? $options[$prefix . 'footer_col_3'] : '';
$footer_copyright = isset($options[$prefix . 'footer_copyright']) && !empty($options[$prefix . 'footer_copyright']) ? $options[$prefix . 'footer_copyright'] : '';

$cont_title_label = isset($options[$prefix . 'fp_cont_form_main_title_label']) && !empty($options[$prefix . 'fp_cont_form_main_title_label']) ? $options[$prefix . 'fp_cont_form_main_title_label'] : '';
$cont_name_label = isset($options[$prefix . 'fp_cont_form_name_label']) && !empty($options[$prefix . 'fp_cont_form_name_label']) ? $options[$prefix . 'fp_cont_form_name_label'] : '';
$cont_email_label = isset($options[$prefix . 'fp_cont_form_email_label']) && !empty($options[$prefix . 'fp_cont_form_email_label']) ? $options[$prefix . 'fp_cont_form_email_label'] : '';
$cont_textarea_label = isset($options[$prefix . 'fp_cont_form_textarea_label']) && !empty($options[$prefix . 'fp_cont_form_textarea_label']) ? $options[$prefix . 'fp_cont_form_textarea_label'] : '';
$cont_submit_label = isset($options[$prefix . 'fp_cont_form_submit_label']) && !empty($options[$prefix . 'fp_cont_form_submit_label']) ? $options[$prefix . 'fp_cont_form_submit_label'] : '';

$reg_title_label = isset($options[$prefix . 'fp_reg_form_main_title_label']) && !empty($options[$prefix . 'fp_reg_form_main_title_label']) ? $options[$prefix . 'fp_reg_form_main_title_label'] : '';
$reg_name_label = isset($options[$prefix . 'fp_reg_form_name_label']) && !empty($options[$prefix . 'fp_reg_form_name_label']) ? $options[$prefix . 'fp_reg_form_name_label'] : '';
$reg_email_label = isset($options[$prefix . 'fp_reg_form_email_label']) && !empty($options[$prefix . 'fp_reg_form_email_label']) ? $options[$prefix . 'fp_reg_form_email_label'] : '';
$reg_password_label = isset($options[$prefix . 'fp_reg_form_password_label']) && !empty($options[$prefix . 'fp_reg_form_password_label']) ? $options[$prefix . 'fp_reg_form_password_label'] : '';
$reg_password_again_label = isset($options[$prefix . 'fp_reg_form_password_again_label']) && !empty($options[$prefix . 'fp_reg_form_password_again_label']) ? $options[$prefix . 'fp_reg_form_password_again_label'] : '';
$reg_submit_label = isset($options[$prefix . 'fp_reg_form_submit_label']) && !empty($options[$prefix . 'fp_reg_form_submit_label']) ? $options[$prefix . 'fp_reg_form_submit_label'] : '';
?>
<section class="modal">
    <div class="modal-wrapper">
        <div class="modal-form content__form register">
            <div class="modal-container">
                <div class="content-block">
                    <div class="content-title">
                        <?php echo !empty($reg_title_label) ? $reg_title_label : 'Sign up with'; ?>
                    </div>
                    <a id="form_anchor"></a>
                    <form class="form-with-answer" method="POST" action="#form_anchor">
                        <div class="form-block">
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <input type="text" id="r_name" name="r_name" placeholder="<?php echo !empty($reg_name_label) ? $reg_name_label : 'Name'; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <input type="password" id="r_pass" name="r_pass" placeholder="<?php echo !empty($reg_password_label) ? $reg_password_label : 'Password'; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <input type="text" id="r_email" name="r_email" placeholder="<?php echo !empty($reg_email_label) ? $reg_email_label : 'Email'; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <input type="password" id="r_pass_confirm" name="r_pass_confirm" placeholder="<?php echo !empty($reg_password_again_label) ? $reg_password_again_label : 'Password again'; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="submit-block">
                            <input type="submit" class="form-submit-btn main-button"
                                   value="<?php echo !empty($reg_submit_label) ? $reg_submit_label : 'Register'; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="modal-2">
    <div class="modal-wrapper">
        <div class="modal-form content__form contact">
            <div class="modal-container">
                <div class="content-block">
                    <div class="content-title">
                        <?php echo !empty($cont_title_label) ? $cont_title_label : 'Contact us'; ?>
                    </div>
                    <a id="form_anchor"></a>
                    <form class="form-with-answer" method="POST" action="#form_anchor">
                        <div class="form-block">
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_name"><?php echo !empty($cont_name_label) ? $cont_name_label : 'Name'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="r_name" name="r_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_email"><?php echo !empty($cont_email_label) ? $cont_email_label : 'Email'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="r_email" name="r_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_textarea"><?php echo !empty($cont_textarea_label) ? $cont_textarea_label : 'Message'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <textarea name="r_textarea" id="r_textarea" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit-block">
                            <input type="submit" class="form-submit-btn main-button"
                                   value="<?php echo !empty($cont_submit_label) ? $cont_submit_label : 'Sign up'; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal-overlay">
    <div class="modal-window">
        <div class="modal-close">
            <img src="<?php echo get_template_directory_uri() ?>/assets/design-30/img/close.svg" alt="close">
        </div>
        <div class="modal-content">
            <div class="modal-title main-title-medium"><?php echo !empty($answer_text) ? $answer_text : 'Thank you for your message!'; ?></div>
            <div class="modal-btn button"><?php echo !empty($answer_button_label) ? $answer_button_label : 'Ok'; ?></div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-block">
                <div class="footer-block-wrapper">
                    <div class="footer-block-text">
                        <?php
                        if (!empty($footer_col1) || !empty($footer_col2) || !empty($footer_col3)) {
                            echo '<div class="footer-info footer-info-1">';
                            echo !empty($footer_col1) ? '<div class="disclaimer">' . wpautop(do_shortcode($footer_col1)) . '</div>' : '';
                            if (!empty($footer_col2 || $footer_col3)) {
                                echo '<div class="description">';
                                echo !empty($footer_col2) ?  wpautop(do_shortcode($footer_col2)) : '';
                                echo !empty($footer_col3) ? '<div class="footer-info-2">' . wpautop(do_shortcode($footer_col3)) : '';
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-block">
                <div class="newsletter-block-wrapper">
                    <div class="newsletter-content">
                        <div class="newsletter-title-wrapper">
                            <?php
                            echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>' : '';
                            echo !empty($index_data['newsletter_subtitle']) ? '<div class="newsletter-subtitle">' . $index_data['newsletter_subtitle'] . '</div>' : '';
                            ?>
                        </div>
                        <form action="#" class="newsletter-form">
                            <div class="newsletter-input">
                                <input type="text"
                                       placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                            </div>
                            <?php echo '<button type="submit" class="newsletter-button main-button">' . $index_data['newsletter_button_label'] . '</button>'; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="footer-bottom">
        <div class="container">
            <div class="copyright"><?= $footer_copyright ?></div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</div>
</div>