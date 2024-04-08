<?php

$fields = get_fields('options');
$header = $fields['header'];
$global = $fields['global'];

$headerLogo = $header['logo'];
$headerMenu = $header['menu'];
$socialMenu = $header['social_menu'];
$additionalStyle = $header['additional_style'];
$additionalScripts = $header['additional_scripts'];

$enableGlobalLogo = $global['global_logo'];
$globalLogo = $global['logo'];
$enableGlobalMenu = $global['global_menu'];
$globalMenu = $global['menu'];
$enableGlobalSocialMenu = $global['global_social_menu'];
$globalSocialMenu = $global['social_menu'];

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head();
    if ($additionalStyle) :
        echo '<style>';
        echo $additionalStyle;
        echo '</style>';
    endif;
    if ($additionalScripts) :
        echo '<script>';
        echo $additionalScripts;
        echo '</script>';
    endif;
    ?>
</head>
<body <?php body_class(); ?>>
<header class="header grid-container" style="background-color: #FFFFFF;">
    <div class="header-content grid-content">
        <?php
        if ($headerLogo && $enableGlobalLogo === false) :
            ?>
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $headerLogo['url'] ?>" alt="<?php echo $headerLogo['alt'] ?>" height="80"
                     width="auto">
            </a>
        <?php endif;
        if ($globalLogo && $enableGlobalLogo === true) :
            ?>
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $globalLogo['url'] ?>" alt="<?php echo $globalLogo['alt'] ?>" height="80"
                     width="auto">
            </a>
        <?php endif;
        if ($headerMenu && $enableGlobalMenu === false) :
            ?>
            <nav class="navbar">
                <ul class="menu">
                    <?php foreach ($headerMenu as $headerItem) : ?>
                        <li>
                            <a href="<?php echo $headerItem['link']['url'] ?>"><?php echo $headerItem['link']['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button class="menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="menu-mobile">
                    <?php foreach ($headerMenu as $headerItem) : ?>
                        <li>
                            <a href="<?php echo $headerItem['link']['url'] ?>"><?php echo $headerItem['link']['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif;
        if ($globalMenu && $enableGlobalMenu === true) :
            ?>
            <nav class="navbar">
                <ul class="menu">
                    <?php foreach ($globalMenu as $globalMenuItem) : ?>
                        <li>
                            <a href="<?php echo $globalMenuItem['link']['url'] ?>"><?php echo $globalMenuItem['link']['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button class="menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="menu-mobile">
                    <?php foreach ($globalMenu as $globalMenuItem) : ?>
                        <li>
                            <a href="<?php echo $globalMenuItem['link']['url'] ?>"><?php echo $globalMenuItem['link']['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif;
        if ($socialMenu && $enableGlobalSocialMenu === false) :
            ?>
            <ul class="social header-social">
                <?php foreach ($socialMenu as $socialMenuItem) :
                    $socialMedia = $socialMenuItem['select_social_media'];
                    ?>
                    <li><a href="<?php echo $socialMenuItem['url'] ?>" target="_blank"><i
                                    class="fa-brands <?php echo $socialMedia ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
        if ($globalSocialMenu && $enableGlobalSocialMenu === true) :
            ?>
            <ul class="social header-social">
                <?php foreach ($globalSocialMenu as $globalSocialMenuItem) :
                    $globalSocialMedia = $globalSocialMenuItem['select_social_media'];
                    ?>
                    <li><a href="<?php echo $globalSocialMenuItem['url'] ?>" target="_blank"><i
                                    class="fa-brands <?php echo $globalSocialMedia ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
        ?>
    </div>
</header>