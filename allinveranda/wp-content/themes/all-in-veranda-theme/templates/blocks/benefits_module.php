<?php

$list = get_sub_field('list');
$backgroundColor = get_sub_field('section_background');
?>

<?php if ($list):  ?>
<section class="benefits" <?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
    <div class="container">
        <div class="benefits__list">
            <?php foreach ($list as $item) : ?>
                <div class="benefits__item">
                    <?php if ($item['icon']) : ?>
                    <div class="benefits__item__icon">
                        <img src="<?php echo $item['icon']['url']?>" alt="<?php echo $item['alt']?>">
                    </div>
                    <?php endif;
                    if ($item['title']) :
                    ?>
                    <h4 class="benefits__item__title">
                       <?php echo $item['title']?>
                    </h4>
                    <?php endif;
                    if ($item['subtitle']) :
                    ?>
                    <p class="benefits__item__subtitle">
                        <?php echo $item['subtitle']?>
                    </p>
                    <?php endif;?>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<?php endif;?>