<?php
$btnFont = get_sub_field('btn_font_size');
$btnLink = get_sub_field('button_link');
$btnTitle = get_sub_field('btn_title');
$bgAdd = styleControl();
$blockAlign = '' . get_sub_field('block_align');
switch ($blockAlign) {
    case 'right' :
        $align = 'justify-content:flex-end"';
        break;
    case 'center' :
        $align = 'justify-content:center"';
        break;
    default :
        $align = 'justify-content:flex-start"';
}

?>

<section class="btn__module" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="btn__wrapper">
            <div class="btn__content d-flex" <?php echo 'style ="' . $align ?>>
                <a class="services__link link-arrow" style="font-size: <?php echo $btnFont ? $btnFont . 'px' : '' ?>" href="<?php echo $btnLink ? $btnLink : '' ?>">
                    <?php echo $btnTitle ?>
                    <?php get_template_part_var('templates/parts/arrow'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
