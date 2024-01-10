<header id="masthead" class="site-header container">
    <div class="site-header__fixed">
        <div class="max-width-full container-fluid">
            <div class="logo-header">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } ?>
            </div>
            <div class="nav-header">
            <span id="menu-btn">
                <img src="<?php echo get_template_directory_uri() . '/dest/images/menu.svg' ?>" alt="menu">
            </span>

            </div>
        </div>
    </div>
</header>
<nav class="menu-header">
    <span id="menu-close-btn">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/dest/images/close_menu_hidden.svg">
    </span>
    <div class="logo-header">
        <?php if (has_custom_logo()) {
            the_custom_logo();
        } ?>
    </div>
    <?php $args['menu']->insertMenu(); ?>
</nav>