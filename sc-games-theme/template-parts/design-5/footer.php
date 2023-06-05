<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$footer_col1 = isset($options[$prefix . 'footer_col_1']) && !empty($options[$prefix . 'footer_col_1']) ? $options[$prefix . 'footer_col_1'] : '';
$footer_col2 = isset($options[$prefix . 'footer_col_2']) && !empty($options[$prefix . 'footer_col_2']) ? $options[$prefix . 'footer_col_2'] : '';
$footer_col3 = isset($options[$prefix . 'footer_col_3']) && !empty($options[$prefix . 'footer_col_3']) ? $options[$prefix . 'footer_col_3'] : '';
$footer_copyright = isset($options[$prefix . 'footer_copyright']) && !empty($options[$prefix . 'footer_copyright']) ? $options[$prefix . 'footer_copyright'] : '';
$index_data = get_index_page_data();

?>
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-block">
                <?php
                if (!empty($logo)) {
                    echo '<div style="display: flex;"><a href="' . get_site_url() . '" class="logo"><img src="' . $logo . '" alt="Logo"></a></div>';
                } ?>
                <?php
                if (!empty($footer_col1) || !empty($footer_col2)) {
                    echo '<div class="footer-info">';
                    echo !empty($footer_col1) ? '<div class="disclaimer">' . wpautop(do_shortcode($footer_col1)) . '</div>' : '';
                    echo '<div class="info-wrapper"><div>';
                    echo !empty($footer_col2) ? '<div class="description">' . wpautop(do_shortcode($footer_col2)) . '</div>' : '';
                    echo !empty($footer_col3) ? '<div class="description contact">' . wpautop(do_shortcode($footer_col3)) . '</div>' : '';
                    echo '</div>';
                    ?>
                    <div class="subscribe">
                        <div class="wrapper">
                            <?php if (!empty($index_data['newsletter_title'])) {
                                echo '<h3>' . $index_data['newsletter_title'] . '</h3>';
                            } ?>
                            <form action="">
                                <input type="text" name="email"
                                       placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                                <button type="submit"><?php echo !empty($index_data['newsletter_button_label']) ? $index_data['newsletter_button_label'] : 'SUBMIT'; ?></button>
                            </form>
                        </div>
                    </div>
                    <?php
                    echo '</div></div>';
                }
                ?>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="copyright"><?= $footer_copyright ?></div>
    </div>
    <?php wp_footer(); ?>
</footer>