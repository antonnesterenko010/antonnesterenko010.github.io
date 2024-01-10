<?php
    $is_singular_product = is_singular('products');
    $singular_product = $is_singular_product ? 'products-single' : '';
?>
<header class="site-header">
    <div class="site-header__fixed <?php echo $singular_product; ?>">
        <div class="max-width-header container-fluid">
            <div class="site-header__wrapper">
                <div class="site-header__wrapper__logo">
                    <?php if (function_exists('the_custom_logo') && has_custom_logo()) the_custom_logo(); ?>
                    <?php
                        if ($is_singular_product): ?>
                            <a href="<?php echo home_url(); ?>" class="custom-logo-single-product" rel="home">
                                <img src="<?php echo get_template_directory_uri(); ?>/dest/images/logo-single-product.png" class="custom-logo" alt="Oesterzwammen" decoding="async">
                            </a>
                    <?php endif; ?>
                </div>
                <div class="site-header__wrapper__menu">
                    <?php $args['menu']->insertMenu(); ?>
                </div>
                <div class="site-header__wrapper__mobile"></div>
            </div>
        </div>
    </div>
    <div class="mob-menu">
        <?php get_template_part('template-parts/header/mob', 'menu', ['menu' => $args['menu']]) ?>
    </div>
</header>