<?php
$section_title = get_post_meta( get_the_ID(), 'about_3_title', true );
$entries = get_post_meta( get_the_ID(), 'about_3_list', true );
?>
<section class="about-2 about-3" id="other-services">
    <div class="container">
        <div class="about-title heading-1 heading">
            <?php echo $section_title ?>
        </div>
        <div class="about-list">
            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['about_3_item_image'])?$entry['about_3_item_image']:"";
            $title = isset($entry['about_3_item_title'])?$entry['about_3_item_title']:"";
            $subtitle = isset($entry['about_3_item_subtitle'])?$entry['about_3_item_subtitle']:"";
            ?>
            <div class="about-item">
                <div class="icon">
                    <img src="<?php echo $image ?>" alt="<?php echo $title?>">
                </div>
                <div class="title heading-3"><?php echo $title?></div>
                <div class="subtitle heading-4">
                    <?php echo $subtitle?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>