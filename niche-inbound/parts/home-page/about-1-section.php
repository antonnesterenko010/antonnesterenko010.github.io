<?php

$section_title = get_post_meta( get_the_ID(), 'about_1_title', true );
$entries = get_post_meta( get_the_ID(), 'about_1_list', true );
?>
<section class="about" id="how-it-works">
    <div class="container">
        <div class="about-title heading-1 heading">
            <?php echo $section_title ?>
        </div>
        <div class="about-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['about_1_item_image'])?$entry['about_1_item_image']:"";
            $title = isset($entry['about_1_item_title'])?$entry['about_1_item_title']:"";
            $subtitle = isset($entry['about_1_item_subtitle'])?$entry['about_1_item_subtitle']:"";
            ?>
            <div class="about-item">
                <div class="number one">
                    <span><?php echo $key + 1 ?></span>
                </div>
                <div class="title heading-3">
                    <?php echo $title ?>
                </div>
                <div class="subtitle heading-4">
                    <?php echo $subtitle ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>