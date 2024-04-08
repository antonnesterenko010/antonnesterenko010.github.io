<?php


$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$cta = get_sub_field('cta');
$list = get_sub_field('list');
$backgroundColor = get_sub_field('section_background');
?>
<section class="hero" <?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
    <div class="container">
        <div class="hero__content">
            <?php if ($title) : ?>
                <div class="hero__title">
                    <?php echo $title ?>
                </div>
            <?php endif;
            if ($subtitle) :
                ?>
                <div class="hero__subtitle">
                    <?php echo $subtitle ?>
                </div>
            <?php endif;
            if ($cta) :
                ?>
                <a href="<?php echo $cta['url'] ?>" class="cta hero__cta">
                    <span><?php echo $cta['title'] ?></span>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($list) : ?>
            <div class="hero__list">
                <?php foreach ($list as $item) : ?>
                    <a href="<?php echo $item['url'] ?>" class="hero__item">
                    <span class="hero__item__image">
                        <img src="<?php echo $item['image']['link'] ?>" alt="<?php echo $item['image']['alt'] ?>">
                    </span>
                        <h3 class="hero__item__title">
                            <?php echo $item['title'] ?>
                        </h3>
                        <span class="hero__item__subtitle">
                        <?php echo $item['subtitle'] ?>
                    </span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>