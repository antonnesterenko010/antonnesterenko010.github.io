<?php

$fields = get_fields('options');
$footer_version = $fields['footer']['footer_version'];
$footer_logo = $fields['footer']['footer_logo'];
?>
<?php
if ($footer_version === 'first') :
?>
<footer class="footer first">
    <div class="container">
        <?php if ($footer_logo) : ?>
            <a href="<?php echo home_url()?>" class="footer__logo">
                <img src="<?php echo $footer_logo['url']?>" alt="<?php echo $footer_logo['alt']?>">
            </a>
        <?php endif;?>
        <?php
        wp_nav_menu(array(
                'container' => 'ul',
                'menu_class'=> 'footer__menu',
                'theme_location'  => 'footer_menu')
        );
        ?>
    </div>
</footer>
<?php endif;
if ($footer_version === 'second') :
?>
    <footer class="footer second">
        <div class="container">
            <?php
            wp_nav_menu(array(
                    'container' => 'ul',
                    'menu_class'=> 'footer__menu',
                    'theme_location'  => 'footer_menu')
            );
            ?>
        </div>
    </footer>
<?php
endif;
?>
</div>

<?php wp_footer(); ?>
</body>

</html>