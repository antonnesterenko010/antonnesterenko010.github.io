<?php
$fields = get_fields();
$section = $fields['solutions'];
?>
<section class="solutions__block bg-light-blue">
    <div class="container section__container">
        <div class="solutions__block-container">
            <?php if ($section['title']) : ?>
            <div class="title__block">
                <?php echo $section['title']?>
            </div>
            <?php endif;
            if ($section['list']):
            ?>
            <div class="solutions__list js-solutions-slider">
                <?php
                foreach($section['list'] as $item) :
                ?>
                <div class="solution__container">
                    <?php if ($item['image']) : ?>
                    <div class="solution__img-container">
                        <img src="<?php echo $item['image']['url']?>" alt="<?php echo $item['image']['alt']?>" />
                    </div>
                    <?php endif;
                    if ($item['text']) :
                    ?>
                    <div class="solution__text">
                        <?php echo $item['text']?>
                        <?php if ($item['link']) : ?>
                        <a href="<?php echo $item['link']['url']?>" class="read_more_link">
                            <?php echo $item['link']['title']?>
                        </a>
                        <?php endif;?>
                    </div>
                    <?php endif;?>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>