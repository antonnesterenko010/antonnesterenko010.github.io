<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$footer_copyright = isset($options[$prefix . 'footer_copyright']) && !empty($options[$prefix . 'footer_copyright']) ? $options[$prefix . 'footer_copyright'] : '';
$footer_col1 = isset($options[$prefix . 'footer_col_1']) && !empty($options[$prefix . 'footer_col_1']) ? $options[$prefix . 'footer_col_1'] : '';
$footer_col2 = isset($options[$prefix . 'footer_col_2']) && !empty($options[$prefix . 'footer_col_2']) ? $options[$prefix . 'footer_col_2'] : '';
$footer_col3 = isset($options[$prefix . 'footer_col_3']) && !empty($options[$prefix . 'footer_col_3']) ? $options[$prefix . 'footer_col_3'] : '';
$index_data = get_index_page_data();

?>
<footer class="footer">
    <div class="bg"></div>
    <div class="footer-top">
        <div class="container">
            <div class="footer-block">
                <div class="footer-block-wrapper">
                    <div class="footer-info-block">
						<?php
						if (!empty($footer_col1) || !empty($footer_col2) || !empty($footer_col3)) {
							echo '<div class="footer-info footer-info-1">';
							echo !empty($footer_col1) ? '<div class="disclaimer">' . wpautop(do_shortcode($footer_col1)) . '</div>' : '';
							echo !empty($footer_col2) ? '<div class="description">' . wpautop(do_shortcode($footer_col2)) . '</div>' : '';
							echo '</div>';
							if (!empty($footer_col3)) {
								echo '<div class="footer-info footer-info-2">';
								echo !empty($footer_col3) ? '<div class="description">' . wpautop(do_shortcode($footer_col3)) . '</div>' : '';
								echo '</div>';
							}
						}
						?>
                    </div>
                    <div class="footer-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/design-40/img/footer-image.svg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper">
<!--                <div class="logo">-->
<!--                    --><?php //if (!empty($logo)) {
//                        echo '<a href="' . get_site_url() . '" class="footer-logo"><img src="' . $logo . '" alt="Logo"></a>';
//                    } ?>
<!--                </div>-->
                <div class="copyright"><?= $footer_copyright ?></div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</div>