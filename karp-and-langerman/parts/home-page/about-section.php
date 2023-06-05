<?php
$entries = get_post_meta( get_the_ID(), 'about_list', true );
?>
<section class="about">
    <div class="about-list">
        <?php
        foreach ( (array) $entries as $key => $entry) {
        $image = isset($entry['about_image'])?$entry['about_image']:"";
        $title = isset($entry['about_title'])?$entry['about_title']:"";
        $subtitle = isset($entry['about_subtitle'])?$entry['about_subtitle']:"";
        ?>
            <a href="/services/#<?php echo $title ?>" class="about-item" style="
                    background-image: url('<?php echo $image ?>');
                    ">
                <div class="title-wrapper">
                    <div class="about-title"><?php echo $title ?></div>
                    <div class="about-subtitle"><?php echo $subtitle ?></div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>