<?php
$textColor = get_sub_field('text_color');
$title = get_sub_field('title');
$desc = get_sub_field('desc');
$blockAlign = '' . get_sub_field('block_align');
$blockWidth = get_sub_field('max_width');
$margin = get_sub_field('margin');

switch ($blockAlign) {
    case 'right' :
        $align = 'grid-column: 3 / span 2';
        break;
    case 'center' :
        $align = 'grid-column: 2 / span 2';
        break;
    default :
        $align = 'grid-column: 1 / span 2';
}

$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();

?>

<section class="text__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd ?>>
    <div class="container-fluid max-width">
        <div class="text__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="text__content" style="<?php echo $align ?>">
                <?php if ($title): ?>
                    <h6 class="text__title"><?php echo $title ? $title : '' ?></h6>
                <?php endif; ?>
                <div class="text__desc"><?php echo $desc ? $desc : '' ?></div>
            </div>
        </div>
    </div>
</section>
