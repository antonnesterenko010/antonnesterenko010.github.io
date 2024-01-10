<?php
$textColor = get_sub_field('text_color');
$columnsCount = get_sub_field('how_much_columns');
$firstColumn = get_sub_field('first_column');
$secondColumn = get_sub_field('second_column');
$thirdColumn = get_sub_field('third_column');
$position = get_sub_field('position');
switch ($position) {
    case 'left' :
        $pos = 'justify-content:flex-start';
        break;
    case 'center' :
        $pos = 'justify-content:center';
        break;
    case 'right' :
        $pos = 'justify-content:flex-end';
}
$array[] = $firstColumn;
$array[] = $secondColumn;
$array[] = $thirdColumn;

$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="text-columns__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd ?>>
    <div class="container-fluid max-width">
        <div class="text-columns__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="text-columns__item-wrapper <?php echo 'count-' . $columnsCount ?>" <?php echo 'style="' . $pos . '"'; ?>>
                <?php for ($i = 0; $i < $columnsCount; $i++) { ?>
                    <div class="text-columns__item">
                        <?php if ($array[$i]['title']): ?>
                            <h2 class="text-columns__title"><?php echo $array[$i]['title'] ?></h2>
                        <?php endif; ?>
                        <p class="text-columns__desc"><?php echo $array[$i]['desc'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
