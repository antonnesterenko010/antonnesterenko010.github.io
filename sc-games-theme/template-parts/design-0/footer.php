<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$footer_col1 = isset($options[$prefix . 'footer_col_1']) && !empty($options[$prefix . 'footer_col_1']) ? $options[$prefix . 'footer_col_1'] : '';
$footer_col2 = isset($options[$prefix . 'footer_col_2']) && !empty($options[$prefix . 'footer_col_2']) ? $options[$prefix . 'footer_col_2'] : '';
$footer_copyright = isset($options[$prefix . 'footer_copyright']) && !empty($options[$prefix . 'footer_copyright']) ? $options[$prefix . 'footer_copyright'] : '';
?>
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="decor">
                <div class="star-1">
                    <?php echo get_d_asset_img('footer-star-1.svg'); ?>
                </div>
                <div class="star-2">
                    <?php echo get_d_asset_img('footer-star-2.svg'); ?>
                </div>
            </div>
            <div class="footer-block">
                <?php
                if (!empty($logo)) {
                    echo '<a href="' . get_site_url() . '" class="footer-logo"><img src="' . $logo . '" alt="Logo"></a>';
                }

                if (!empty($footer_col1) || !empty($footer_col2)) {
                    echo '<div class="footer-info">';
                    echo !empty($footer_col1) ? '<div class="disclaimer">' . wpautop(do_shortcode($footer_col1)) . '</div>' : '';
                    echo !empty($footer_col2) ? '<div class="description">' . wpautop(do_shortcode($footer_col2)) . '</div>' : '';
                    echo '</div>';
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