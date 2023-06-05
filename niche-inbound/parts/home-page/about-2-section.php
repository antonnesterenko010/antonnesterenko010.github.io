<?php
$entries = get_post_meta( get_the_ID(), 'about_2_list', true );
$button_link = get_post_meta( get_the_ID(), 'about_2_link', true );
?>
<section class="about-2">
    <div class="container">
        <div class="about-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['about_2_item_image'])?$entry['about_2_item_image']:"";
            $title = isset($entry['about_2_item_title'])?$entry['about_2_item_title']:"";
            $subtitle = isset($entry['about_2_item_subtitle'])?$entry['about_2_item_subtitle']:"";
            ?>
            <div class="about-item">
                <div class="icon">
                    <img src="<?php echo $image?>" alt="<?php echo $title ?>">
                </div>
                <div class="title heading-3"><?php echo $title ?></div>
                <div class="subtitle heading-4">
                    <?php echo $subtitle?>
                </div>
            </div>
            <?php } ?>
        </div>
        <a href="<?php echo $button_link ?>" class="about-btn button"><span>start today</span></a>
    </div>
</section>