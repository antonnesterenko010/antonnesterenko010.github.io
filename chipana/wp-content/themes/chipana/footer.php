<?php
$fields = get_fields('options');
$footer = $fields['footer'];
$global = $fields['global'];

$footerLogo = $footer['logo'];
$footerMenu = $footer['menu'];
$socialMenu = $footer['social_menu'];
$additionalStyle = $footer['additional_style'];
$additionalScripts = $footer['additional_scripts'];


$enableGlobalLogo = $global['global_logo'];
$globalLogo = $global['logo'];
$enableGlobalMenu = $global['global_menu'];
$globalMenu = $global['menu'];
$enableGlobalSocialMenu = $global['global_social_menu'];
$globalSocialMenu = $global['social_menu'];
?>

<footer class="footer grid-container grid-content-full" style="background-color: #2C1E33;">
    <div class="grid-content">
        <div class="footer-inner">
            <?php
            if ($footerLogo && $enableGlobalLogo === false) :
                ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo $footerLogo['url'] ?>" alt="<?php echo $footerLogo['alt'] ?>" width="100"
                         height="100">
                </a>
            <?php endif;
            if ($globalLogo && $enableGlobalLogo === true) :
                ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo $globalLogo['url'] ?>" alt="<?php echo $globalLogo['alt'] ?>" width="100"
                         height="100">
                </a>
            <?php endif;
            if ($footerMenu && $enableGlobalMenu === false) :
                ?>
                <ul class="menu footer-menu">
                    <?php foreach ($footerMenu as $footerItem) : ?>
                        <li>
                            <a href="<?php echo $footerItem['link']['url'] ?>"><?php echo $footerItem['link']['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;
            if ($globalMenu && $enableGlobalMenu === true) :
                ?>
                <ul class="menu footer-menu">
                    <?php foreach ($globalMenu as $globalMenuItem) : ?>
                        <li>
                            <a href="<?php echo $globalMenuItem['link']['url'] ?>"><?php echo $globalMenuItem['link']['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;
            if ($socialMenu && $enableGlobalSocialMenu === false) :
                ?>
                <ul class="social footer-social">

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
                <ul class="social footer-social">
                    <?php foreach ($globalSocialMenu as $globalSocialMenuItem) :
                        $globalSocialMedia = $globalSocialMenuItem['select_social_media'];
                        ?>
                        <li><a href="<?php echo $globalSocialMenuItem['url'] ?>" target="_blank"><i
                                        class="fa-brands <?php echo $globalSocialMedia ?>"></i></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <button class="go-top-btn">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</footer>
<?php
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
wp_footer(); ?>
</body>

</html>