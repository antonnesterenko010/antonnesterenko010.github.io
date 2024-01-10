<?php
$textColor = get_sub_field('text_color');
$title = get_sub_field('title');
$businessItems = get_sub_field('business_items');
?>

<section class="business-principles__module <?php echo $textColor == 1 ? 'white' : '' ?>">
    <div class="container-fluid max-width">
        <div class="business-principles__wrapper">
            <h2 class="business-principles__title"><?php echo $title ? $title : ''; ?></h2>
            <div class="business-principles__content">
                <?php foreach ($businessItems as $item) : ?>
                    <div class="business-principles__item">
                        <h4 class="business-principles__item-title"><?php echo $item ? $item['item_title'] : ''; ?></h4>
                        <h6 class="business-principles__item-sub-title"><?php echo $item ? $item['item_sub_title'] : ''; ?></h6>
                        <p class="business-principles__item-desc"><?php echo $item ? $item['item_desc'] : ''; ?></p>
                        <div class="business-principle__arrow-bot-wrapper">
                            <span class="business-principles__arrow"></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
