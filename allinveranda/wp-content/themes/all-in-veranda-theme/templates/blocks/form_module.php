<?php
$fields = get_fields('options');
$list = get_sub_field('list');

$backgroundColor = get_sub_field('section_background');
?>

<?php if ($list):  ?>
    <section class="form" <?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
        <div class="container">
            <div class="form__title__block">
                <?php
                $counter = 0;
                foreach($list as $item) : ?>
                <div class="form__title active" data-attr="<?php echo $counter?>">
                    <?php
                    echo $item['title'];
                    ?>
                </div>
                    <?php
                    $counter++;
                    endforeach;
                    ?>
            </div>
            <div class="form__list">
                <?php
                $counter = 0;
                foreach($list as $item) : ?>
                <div class="form__item" data-attr="<?php echo $counter?>">
                    <?php
                    echo do_shortcode($item['form_shortcode']);
                    ?>
                </div>
                <?php
                $counter++;
                endforeach;?>
            </div>
        </div>
    </section>
<?php endif;?>