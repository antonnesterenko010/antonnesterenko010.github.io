<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$marginTopDesktop = Helpers::get($fields,'steps_margin_top_desktop') ? ' margin-desktop-top="'.Helpers::get($fields,'steps_margin_top_desktop').'px" ' : '';
$marginBottomDesktop = Helpers::get($fields,'steps_margin_bottom_desktop') ? ' margin-desktop-bottom="'.Helpers::get($fields,'steps_margin_bottom_desktop').'px" ' : '';

$marginTopTablet = Helpers::get($fields,'steps_margin_top_tablet') ? ' margin-tablet-top="'.Helpers::get($fields,'steps_margin_top_tablet').'px" ' : '';
$marginBottomTablet = Helpers::get($fields,'steps_margin_bottom_tablet') ? ' margin-tablet-bottom="'.Helpers::get($fields,'steps_margin_bottom_tablet').'px" ' : '';

$marginTopMobile = Helpers::get($fields,'steps_margin_top_mobile') ? ' margin-mobile-top="'.Helpers::get($fields,'steps_margin_top_mobile').'px" ' : '';
$marginBottomMobile = Helpers::get($fields,'steps_margin_bottom_mobile') ? ' margin-mobile-bottom="'.Helpers::get($fields,'steps_margin_bottom_mobile').'px" ' : '';

?>

<section class="steps-block resize-block block-container" <?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?> >
    <img class="opacity-bg-image"
         src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">

    <?php foreach (Helpers::get($fields, 'steps') as $key => $step) {
        $stepPosition = '';
        if ($key % 2 === 0) {
            $stepPosition = 'left-step';
        } else {
            $stepPosition = 'right-step';
        }
        $lastStep = $step['end_step'] ? 'last-step' : '';
        ?>
        <div class="single-step-block <?php echo $lastStep;?> <?php echo $stepPosition?>">
            <div class="step-image-block"><?php echo wp_get_attachment_image($step['image'], ['161', '161'])?></div>
            <h2 class="step-title"><?php echo $step['title']?></h2>
            <p class="step-description"><?php echo $step['description']?></p>
        </div>
    <?php } ?>

</section>
