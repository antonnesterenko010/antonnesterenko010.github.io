<?php
$section_bg  = get_post_meta( get_the_ID(), 'people_hero_bg', true );
$section_title  = get_post_meta( get_the_ID(), 'people_title', true );
$section_position  = get_post_meta( get_the_ID(), 'people_position', true );
$entries = get_post_meta( get_the_ID(), 'tags_list', true );

?>
<section class="hero">
    <div class="hero-image">
        <img src="<?php echo $section_bg ?>" alt="hero-image">
    </div>
    <div class="hero-content">
        <div class="hero-title-wrapper">
            <div class="hero-title"><?php echo $section_title ?></div>
            <div class="hero-subtitle"><?php echo $section_position ?></div>
            <div class="hero-tags">
                <?php
                if(!empty($entries)) {
                    echo '
                <div class="tags-title">Practice areas:</div>' ;
                }
                ?>
                <div class="tags-list">
                    <?php
                    foreach ( (array) $entries as $key => $entry) {
                        $title = isset($entry['tag_title'])?$entry['tag_title']:"";
                        $style_none = 'style="display: none;" ' ;
                        if( !empty ($title)) $style_none = '';
                        ?>
                        <div class="tags-item" <?php echo $style_none ?>>
                            <span><?php echo $title?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>