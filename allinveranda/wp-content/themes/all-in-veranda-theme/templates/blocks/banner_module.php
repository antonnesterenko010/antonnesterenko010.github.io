<?php

$title = get_sub_field('title');
$image = get_sub_field('image');
?>
<section class="banner">
    <div class="container">
        <?php if ($image) : ?>
        <div class="banner__image">
            <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
        </div>
        <?php endif;?>
        <div class="banner__title">
            <?php if ($title) :
                echo $title;
            else :?>
                <h1 class="banner__title"><?php the_title(); ?> </h1>
            <?php endif;?>
        </div>
    </div>
</section>