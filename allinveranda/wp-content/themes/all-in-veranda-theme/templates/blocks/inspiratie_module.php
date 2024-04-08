<?php
$fields = get_fields('options');
$global = $fields['global'];

$title = get_sub_field('title');

$inspiratie = $global['inspiratie'];

$backgroundColor = get_sub_field('section_background');
?>

<?php if ($inspiratie):  ?>
    <section class="inspiratie" <?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
        <div class="container">
            <?php if ($title) : ?>
            <h2 class="inspiratie__title">
                <?php echo $title ?>
            </h2>
            <?php endif;?>
            <div class="inspiratie__cat__list">
                <div class="inspiratie__cat__item active" data-attr="0">
                    Alle inspiratie items
                </div>
                <?php
                $counter = 1;
                foreach ($inspiratie as $category) : ?>
                    <div class="inspiratie__cat__item" data-attr="<?php echo $counter?>">
                        <?php echo $category['name']?>
                    </div>
                <?php
                $counter++;
                endforeach;?>
            </div>
            <div class="inspiratie__lists">
                <div class="inspiratie__list" data-attr="0">

                    <?php foreach ($inspiratie as $category) :
                        $list = $category['list'];
                        ?>
                        <?php foreach($list as $item) : ?>
                        <a data-fancybox="gallery" data-src="<?php echo $item['image']['url']?>" data-caption="<?php echo $item['image']['alt']?>" class="inspiratie__list__item">
                            <div class="inspiratie__item__image">
                                <img src="<?php echo $item['image']['url']?>" alt="<?php echo $item['image']['alt']?>">
                            </div>
                            <div class="inspiratie__content">
                                <div class="inspiratie__item__title">
                                    <?php echo $item['title']?>
                                </div>
                                <div class="inspiratie__item__subtitle">
                                    <?php echo $item['subtitle']?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach;?>
                    <?php endforeach;?>
                </div>
                <?php
                $counter = 1;
                foreach($inspiratie as $category) :
                    $list = $category['list'];
                    ?>
                    <div class="inspiratie__list hidden" data-attr="<?php echo $counter?>">

                        <?php foreach($list as $item) : ?>
                            <a data-fancybox="gallery" data-src="<?php echo $item['image']['url']?>" data-caption="<?php echo $item['image']['alt']?>" class="inspiratie__list__item">
                                <div class="inspiratie__item__image">
                                    <img src="<?php echo $item['image']['url']?>" alt="<?php echo $item['image']['alt']?>">
                                </div>
                                <div class="inspiratie__content">
                                    <div class="inspiratie__item__title">
                                        <?php echo $item['title']?>
                                    </div>
                                    <div class="inspiratie__item__subtitle">
                                        <?php echo $item['subtitle']?>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach;?>
                    </div>
                    <?php
                    $counter++;
                endforeach;?>
            </div>
        </div>
    </section>
<?php endif;?>