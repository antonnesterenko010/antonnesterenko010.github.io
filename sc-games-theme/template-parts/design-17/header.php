<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
$reg_link = isset($options[$prefix . 'reg_link']) && !empty($options[$prefix . 'reg_link']) ? $options[$prefix . 'reg_link'] : '';
$reg_label = isset($options[$prefix . 'reg_label']) && !empty($options[$prefix . 'reg_label']) ? $options[$prefix . 'reg_label'] : '';

?>
<div class="main-wrapper">
    <header class="header">
        <div class="header-desktop">
            <div class="container">
                <div class="header-block">
                    <?php
                    echo '<div>';
                    if (!empty($logo)) {
                        echo '<a href="' . get_site_url() . '" class="header-logo"><img src="' . $logo . '" alt="Logo"></a>';
                    }
                    if (!empty($reg_link)) {
                        echo '<div class="header-sign"><a href="' . $reg_link . '" class="btn">' . (!empty($reg_label) ? $reg_label : 'Register') . '</a></div>';
                    }
                    echo '</div>';
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'header-menu'
                    ]);
                    ?>

                </div>
            </div>
        </div>
        <div class="header-mobile">
            <div class="header-block">
                <div class="header-top">
                    <?php
                    if (!empty($logo)) {
                        echo '<a href="' . get_site_url() . '" class="header-logo"><img src="' . $logo . '" alt="Logo"></a>';
                    }
                    ?>
                    <div class="burger">
                        <div class="burger-wrapper">
                            <div class="line-1"></div>
                            <div class="line-2"></div>
                            <div class="line-3"></div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'header-menu'
                    ]);
                    if (!empty($reg_link)) {
                        echo '<div class="header-sign"><a href="' . $reg_link . '" class="btn">' . (!empty($reg_label) ? $reg_label : 'Register') . '</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
