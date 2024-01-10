<?php
$options = get_fields('options');

$logo = $options['header']['logo'];
$menu = $options['header']['menu_item'];
$button = $options['header']['button'];

$socialItem = $options['global']['social_item'];
$socialFacebookLink = $options['global']['social_item']['facebook'];
$socialLinkedinLink = $options['global']['social_item']['linkedin'];
$socialTwitterLink = $options['global']['social_item']['twitter'];
$phone = $options['global']['phone'];
$email = $options['global']['email'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head() ?>
</head>


<body <?php body_class(); ?>>
<header class="header">
    <div class="container">
        <div class="header__block">
            <?php
            if ($logo) :
                ?>
                <a href="<?php echo home_url() ?>" class="logo">
                    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>"/>
                </a>
            <?php endif;
            if ($menu) :
                ?>
                <nav class="nav header__nav">
                    <ul class="nav-menu">
                        <?php foreach ($menu as $menuItem) :
                            $menuLink = $menuItem['menu_link'];
                            $subMenuEnable = $menuItem['sub_menu_enable'];
                            $subMenu = $menuItem['sub_menu_item'];
                            ?>
                            <li <?php if ($subMenuEnable === true) : ?> class="menu-item-has-children" <?php endif; ?>>
                                <a href="<?php echo $menuLink['url'] ?>">
                                    <?php echo $menuLink['title'] ?>
                                </a>
                                <?php if ($subMenuEnable === true) : ?>
                                    <ul class="sub-menu">
                                        <?php foreach ($subMenu as $subMenuItem) :
                                            $subItemLink = $subMenuItem['sub_menu_link'];
                                            ?>
                                            <li>
                                                <a href="<?php echo $subItemLink['url'] ?>">
                                                    <?php echo $subItemLink['title'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endif;
            if ($button) :
                ?>
                <div class="header__buttons header__buttons--desktop">
                    <a class="btn btn--pink btn--sm"
                       href="<?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>
                </div>
            <?php endif; ?>
            <div class="header__buttons header__buttons--mobile">
                <div class="burger-button">
                    <img src="<?php echo get_template_directory_uri() . '/assets/' ?>img/burger-button.png" alt="logo"/>
                </div>

            </div>
            <div class="header__menu" id="header__menu">
                <div class="header__menu-wrap">
                    <div class="header__menu-close">
                        <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    d="M21 3L3 21"
                                    stroke="#001140"
                                    stroke-width="2"
                                    stroke-linecap="square"
                                    stroke-linejoin="round"
                            />
                            <path
                                    d="M3 3L21 21"
                                    stroke="#001140"
                                    stroke-width="2"
                                    stroke-linecap="square"
                                    stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                        <nav class="header__menu-list nav">

                            <?php if ($menu) : ?>
                            <ul class="nav-menu js-accordion-menu-list">

                                <?php foreach ($menu as $menuItem) :
                                $menuLink = $menuItem['menu_link'];
                                $subMenuEnable = $menuItem['sub_menu_enable'];
                                $subMenu = $menuItem['sub_menu_item'];
                                ?>
                                <li class="accordionBlock <?php if ($subMenuEnable === true) : ?> menu-item-has-children <?php endif;?>">
                                    <a class="accordionTitle" href="<?php echo $menuLink['url'] ?>">
                                        <?php echo $menuLink['title'] ?>
                                    </a>

                                <?php if ($subMenuEnable === true) : ?>

                                    <ul class="sub-menu accordionContent">

                                            <?php foreach ($subMenu as $subMenuItem) :
                                                $subItemLink = $subMenuItem['sub_menu_link'];
                                                ?>
                                                <li class="nav__subitem">
                                                    <a class="nav__sublink" href="<?php echo $subItemLink['url'] ?>">
                                                        <?php echo $subItemLink['title'] ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                    </ul>
                                <?php endif;?>
                                </li>
                            <?php endforeach; ?>
                            </ul>

                            <?php endif; ?>
                            <div class="header__menu-bottom">
                                <div class="header__menu-social-media">
                                    <?php if ($socialFacebookLink) : ?>
                                    <a href="<?php echo $socialFacebookLink['url']?>" class="btn btn--icon btn--icon--fb"></a>
                                    <?php endif;
                                    if ($socialLinkedinLink) :
                                    ?>
                                    <a href="<?php echo $socialLinkedinLink['url']?>" class="btn btn--icon btn--icon--in"></a>
                                    <?php endif;
                                    if ($socialTwitterLink) :
                                    ?>
                                    <a href="<?php echo $socialTwitterLink['url']?>" class="btn btn--icon btn--icon--twi"></a>
                                    <?php endif;?>
                                </div>
                                <div class="header__menu-contacts">
                                    <?php if ($phone) : ?>
                                    <a href="<?php echo $phone['url']?>" class="header__menu-contact">
                                       <?php echo $phone['title']?>
                                    </a>
                                    <?php endif;
                                    if ($email) :
                                    ?>
                                    <a href="<?php echo $email['url']?>"  class="header__menu-contact">
                                        <?php echo $email['title']?>
                                    </a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="shadow"></div>

<div class="main">