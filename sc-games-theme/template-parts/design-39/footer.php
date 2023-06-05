<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$footer_col1 = isset($options[$prefix . 'footer_col_1']) && !empty($options[$prefix . 'footer_col_1']) ? $options[$prefix . 'footer_col_1'] : '';
$footer_col2 = isset($options[$prefix . 'footer_col_2']) && !empty($options[$prefix . 'footer_col_2']) ? $options[$prefix . 'footer_col_2'] : '';
$footer_col3 = isset($options[$prefix . 'footer_col_3']) && !empty($options[$prefix . 'footer_col_3']) ? $options[$prefix . 'footer_col_3'] : '';
$footer_copyright = isset($options[$prefix . 'footer_copyright']) && !empty($options[$prefix . 'footer_copyright']) ? $options[$prefix . 'footer_copyright'] : '';
$index_data = get_index_page_data();

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
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-block">
                <div class="subscribe footer-form-wrapper">
                        <div class="wrapper">
                            <?php if (!empty($index_data['newsletter_title'])) {
                                echo '<div class="subscribe-title">' . $index_data['newsletter_title'] . '</div>';
                            } ?>
                            <form action="">
                                <input class="input" type="text" name="email" placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                                <button class="main-button" type="submit"><?php echo !empty($index_data['newsletter_button_label']) ? $index_data['newsletter_button_label'] : 'SUBMIT'; ?></button>
                            </form>
                        </div>
                    </div>
                <div class="footer-block-text">
                        <?php
                        if (!empty($footer_col1) || !empty($footer_col2) || !empty($footer_col3)) {
                            echo '<div class="footer-info footer-info-1">';
                            echo !empty($footer_col1) ? '<div class="disclaimer">' . wpautop(do_shortcode($footer_col1)) . '</div>' : '';
                            //echo !empty($footer_col2) ? '<div class="description">' . wpautop(do_shortcode($footer_col2)) . '</div>' : '';
                            echo '</div>';
                            //echo '<div class="footer-info footer-info-2">';
                            //echo !empty($footer_col3) ? '<div class="description">' . wpautop(do_shortcode($footer_col3)) . '</div>' : '';
                            //echo '</div>';
                        }
                        ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright"><?= $footer_copyright ?></div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</div>
</div>