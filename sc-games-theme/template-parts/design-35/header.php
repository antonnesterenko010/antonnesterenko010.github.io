<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$reg_link = isset($options[$prefix . 'reg_link']) && !empty($options[$prefix . 'reg_link']) ? $options[$prefix . 'reg_link'] : '';
$reg_label = isset($options[$prefix . 'reg_label']) && !empty($options[$prefix . 'reg_label']) ? $options[$prefix . 'reg_label'] : 'Registration';
$announcement_text = isset($options[$prefix . 'announcement_text']) && !empty($options[$prefix . 'announcement_text']) ? $options[$prefix . 'announcement_text'] : '';
?>
<div class="page-wrap">
    <div class="page-content">
        <header class="header">
            <div class="header-desktop">
                <div class="header-block">
                    <div class="container">
                        <div class="header-row">
                            <?php
                            if (!empty($logo)) {
                                echo '<a href="' . get_site_url() . '" class="header-logo"><img src="' . $logo . '" alt="Logo"></a>';
                            }
                            wp_nav_menu([
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'header-menu'
                            ]);
                            ?>
                            <?php
                            if (!empty($reg_link) && !empty($reg_label)) {
                                echo '<div class="header-button"><a href="' . $reg_link . '" class="main-button">' . $reg_label . '';
                                echo '</a></div>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mobile">
                <div class="header-block">
                    <div class="container">
                        <div class="header-top">
                            <?php
                            if (!empty($logo)) {
                                echo '<a href="' . get_site_url() . '" class="header-logo"><img src="' . $logo . '" alt="Logo"></a>';
                            }
                            ?>
                            <div class="header-right">
                                <div class="burger">
                                    <div class="burger-wrapper">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($announcement_text)) { ?>
                            <div class="announcement-bar"><?= $announcement_text ?></div>
                        <?php } ?>
                        <div class="header-bottom">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'header-menu'
                            ]);

                            if (!empty($reg_link) && !empty($reg_label)) {
                                echo '<div class="header-button"><a href="' . $reg_link . '" class="main-button">' . $reg_label . '';
                                echo '</a></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>