<?php
	$prefix = 'sc_games_';
	$options = get_option($prefix . 'options');
	$logo = isset($options[$prefix . 'logo']) && !empty($options[$prefix . 'logo']) ? $options[$prefix . 'logo'] : '';
	$reg_link = isset($options[$prefix . 'reg_link']) && !empty($options[$prefix . 'reg_link']) ? $options[$prefix . 'reg_link'] : '';
	$reg_label = isset($options[$prefix . 'reg_label']) && !empty($options[$prefix . 'reg_label']) ? $options[$prefix . 'reg_label'] : 'Registration';
?>
<div class="page-wrap">
    <div class="page-content">
        <div class="fake-header"></div>
        <header class="header">
            <div class="container">
                <div class="header-block">
                    <div class="header-top">
                        <div class="burger">
                            <span class="icon"></span>
                            <span class="icon"></span>
                            <span class="icon"></span>
                        </div>
						<?php
							if (!empty($logo)) {
								echo '<a href="' . get_site_url() . '" class="header-logo"><img src="' . $logo . '" alt="Logo"></a>';
							}
							
							if (!empty($reg_link) && !empty($reg_label)) {
								echo '<div class="header-sign desktop"><a href="' . $reg_link . '" class="button">';
								echo '<span class="name">' . $reg_label . '</span></a></div>';
							}
						?>

                    </div>
                    <div class="header-bottom">
						<?php
							wp_nav_menu([
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'header-menu'
							]);
						?>
						<?php
							if (!empty($reg_link) && !empty($reg_label)) {
								echo '<div class="header-sign mobile"><a href="' . $reg_link . '" class="button">';
								echo '<span class="name">' . $reg_label . '</span></a></div>';
							}
						?>
                    </div>
                </div>
            </div>
        </header>