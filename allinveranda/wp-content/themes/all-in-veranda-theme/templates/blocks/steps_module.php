<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$list = get_sub_field('list');
$backgroundColor = get_sub_field('section_background');
?>
<section class="steps"<?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
    <div class="container">
        <?php if ($title) : ?>
            <div class="steps__title">
                <?php echo $title?>
            </div>
        <?php endif;
        if ($subtitle) : ?>
            <div class="steps__subtitle">
                <?php echo $subtitle?>
            </div>
        <?php endif;
        if ($list) : ?>
        <div class="steps__list">
            <?php
            $counter = 1;
            foreach ($list as $item) :
                ?>
            <div class="steps__item<?php if ($item['highlighted'] == true) : ?> highlighted <?php endif;?>" >
                <div class="steps__item__counter">
                    O<?php echo $counter?>
                </div>
                <div class="steps__item__title">
                    <?php echo $item['title']?>
                </div>
                <div class="steps__item__subtitle">
                    <?php echo $item['subtitle']?>
                </div>
            </div>
            <?php
            $counter++;
            endforeach;
            ?>
        </div>
        <?php
        endif;?>
    </div>
</section>