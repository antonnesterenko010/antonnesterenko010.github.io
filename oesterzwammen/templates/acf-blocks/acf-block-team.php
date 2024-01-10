<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$marginTopDesktop = Helpers::get($fields,'team_margin_top_desktop') ? ' margin-desktop-top="'.Helpers::get($fields,'team_margin_top_desktop').'px" ' : '';
$marginBottomDesktop = Helpers::get($fields,'team_margin_bottom_desktop') ? ' margin-desktop-bottom="'.Helpers::get($fields,'team_margin_bottom_desktop').'px" ' : '';

$marginTopTablet = Helpers::get($fields,'team_margin_top_tablet') ? ' margin-tablet-top="'.Helpers::get($fields,'team_margin_top_tablet').'px" ' : '';
$marginBottomTablet = Helpers::get($fields,'team_margin_bottom_tablet') ? ' margin-tablet-bottom="'.Helpers::get($fields,'team_margin_bottom_tablet').'px" ' : '';

$marginTopMobile = Helpers::get($fields,'team_margin_top_mobile') ? ' margin-mobile-top="'.Helpers::get($fields,'team_margin_top_mobile').'px" ' : '';
$marginBottomMobile = Helpers::get($fields,'team_margin_bottom_mobile') ? ' margin-mobile-bottom="'.Helpers::get($fields,'team_margin_bottom_mobile').'px" ' : '';

?>
<section class="team-section resize-block block-container" <?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>>
    <img class="opacity-bg-image"
         src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">

    <?php if (Helpers::get($fields, 'subtitle')) { ?>
        <span class="block-subtitle"><?php echo Helpers::get($fields, 'subtitle') ?></span>
    <?php } ?>

    <?php if (Helpers::get($fields, 'title')) { ?>
        <h2 class="block-title"><?php echo Helpers::get($fields, 'title') ?></h2>
    <?php } ?>
    <div class="swiper">

        <div class="team-block swiper-wrapper">
            <?php foreach (Helpers::get($fields, 'team_repeater') as $team) { ?>
                <div class="single-team swiper-slide">
                    <?php if ($team['link']){ ?>
                        <a href="<?php echo $team['link'] ?>">
                    <?php }?>
                        <?php echo wp_get_attachment_image($team['image'], ['343','321']) ?>
                    <?php if ($team['link']){ ?>
                        </a>

                    <?php }?>

                </div>
            <?php } ?>
        </div>
    </div>
    <?php if (Helpers::get($fields, 'team_link')) { ?>
        <a class="main-link" href="<?php echo Helpers::get($fields, 'team_link')['url'] ?>"
           target="<?php echo Helpers::get($fields, 'team_link')['target'] ?>"><?php echo Helpers::get($fields, 'team_link')['title'] ?></a>
    <?php } ?>

</section>
