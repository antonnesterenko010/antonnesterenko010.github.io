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
    <div class="footer-subscribe">
        <div class="container">
            <div class="newsletter-block">
                <div class="newsletter-inner">
                    <?php
                    echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>' : '';
                    echo !empty($index_data['newsletter_subtitle']) ? '<div class="newsletter-subtitle">' . $index_data['newsletter_subtitle'] . '</div>' : '';
                    ?>
                    <form action="#" class="newsletter-form">
                        <div class="newsletter-input">
                            <input type="text"
                                   placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                        </div>
                        <?php echo '<button type="submit" class="newsletter-button button">' . $index_data['newsletter_button_label'] . '</button>'; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="footer-block">
                <?php
                if (!empty($footer_col1) || !empty($footer_col2) || !empty($footer_col3)) {
                    echo '<div class="footer-info">';
                    echo !empty($footer_col1) ? '<div class="disclaimer">' . wpautop(do_shortcode($footer_col1)) . '</div>' : '';
                    echo !empty($footer_col2) ? '<div class="description">' . wpautop(do_shortcode($footer_col2)) . '</div>' : '';
                    echo '</div>';
                    echo '<div class="footer-info-2">';
                    echo !empty($footer_col3) ? '<div class="description">' . wpautop(do_shortcode($footer_col3)) . '</div>' : '';
                    echo '</div>';
                }
                ?>
                <div class="decor">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/design-20/img/footer-decor.png" alt="footer-decor">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="copyright"><?= $footer_copyright ?></div>
    </div>
    <?php wp_footer(); ?>
</footer>
</div>
</div>