<?php
$textColor = get_sub_field('text_color');
$blockTitle = get_sub_field('block_title');
$blockDesc = get_sub_field('block_desc');
$itemList = get_sub_field('item_list');
$backgroundColor = get_sub_field('background_color');
?>

<section class="vores-proces__module" <?php echo 'style="background-color:' . $backgroundColor . '"'; ?>>
    <div class="container-fluid max-width">
        <div class="vores-proces__wrapper <?php echo $textColor == 1 ? 'white' : 'black' ?>">
            <h2 class="vores-proces__title"><?php echo $blockTitle ? $blockTitle : '' ?></h2>
            <p class="vores-proces__desc"><?php echo $blockDesc ? $blockDesc : '' ?></p>
            <div class="vores-proces__item-list">
                <?php foreach ($itemList as $item) : ?>
                    <div class="vores-proces__item">
                        <h3 class="vores-proces__item-title"><?php echo $item ? $item['item_title'] : '' ?></h3>
                        <p class="vores-proces__item-desc"><?php echo $item ? $item['item_desc'] : '' ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
