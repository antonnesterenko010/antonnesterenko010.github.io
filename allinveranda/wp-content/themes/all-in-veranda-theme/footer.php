<?php
$fields = get_fields('options');
$footer = $fields['footer'];
$global = $fields['global'];

$footerLogo = $footer['logo'];
$footerSocialList = $footer['social_list'];
$additionalStyle = $footer['additional_style'];
$additionalScripts = $footer['additional_scripts'];
$copyright = $footer['copyright'];

$enableGlobalLogo = $global['global_logo'];
$globalLogo = $global['logo'];
?>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer-top">

            <?php
            if ($footerLogo && $enableGlobalLogo === false) :
                ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo $footerLogo['url'] ?>" alt="<?php echo $footerLogo['alt'] ?>" width="183"
                         height="53">
                </a>
            <?php endif;
            if ($footerSocialList) :
                ?>
                <div class="social__list">
                    <?php foreach ($footerSocialList as $item) : ?>
                        <a href="<?php $item['url']?>" class="social__item">
                            <img src="<?php echo $item['icon']['url']?>" alt="<?php echo $item['icon']['alt']?>">
                        </a>
                    <?php endforeach;?>
                </div>
            <?php
            endif;
            ?>
            <?php
            wp_nav_menu( [
                'theme_location'  => 'primary',
                'container'       => '',
                'echo'            => true,
                'items_wrap'      => '<ul class="site__menu footer__menu">%3$s</ul>'
            ] );
            ?>
        </div>
        <div class="footer-bottom">
            <?php if ($copyright) : ?>
            <div class="copyright">
                <?php echo $copyright?>
            </div>
            <?php
            endif;
            wp_nav_menu( [
                'theme_location'  => 'bottom',
                'container'       => '',
                'echo'            => true,
                'items_wrap'      => '<ul class="site__menu bottom__menu">%3$s</ul>'
            ] );
            ?>
        </div>
    </div>
</footer>
</div>
<?php wp_footer();?>
</body>
</html>