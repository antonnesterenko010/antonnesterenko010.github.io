<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$footer_copyright = isset($options[$prefix . 'footer_copyright']) && !empty($options[$prefix . 'footer_copyright']) ? $options[$prefix . 'footer_copyright'] : '';
$index_data = get_index_page_data();

?>
    <footer class="footer">
    <div class="footer-top newsletter">
        <div class="container">
            <div class="footer-block subscribe">
                <div class="wrapper">
                    <div class="subscribe-left">
                        <?php echo !empty($index_data['newsletter_title']) ? '<h3 class="title">' . $index_data['newsletter_title'] . '</h3>' : ''; ?>
                        <?php echo !empty($index_data['newsletter_subtitle']) ? '<div class="subtitle">' . $index_data['newsletter_subtitle'] . '</div>' : ''; ?>
                    </div>
                    <form class="subscribe-right" action="#">
                        <input class="input" type="text" name="email"
                               placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                        <button type="submit"><?= $index_data['newsletter_button_label']; ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper">
                <div class="logo">
                    <?php if (!empty($logo)) {
                        echo '<a href="' . get_site_url() . '" class="footer-logo"><img src="' . $logo . '" alt="Logo"></a>';
                    } ?>
                </div>
                <div class="copyright"><?= $footer_copyright ?></div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</div>