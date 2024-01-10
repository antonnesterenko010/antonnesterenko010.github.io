<?php
$textColor = get_sub_field('text_color');
$title = get_sub_field('module_title');
$posts = get_sub_field('posts');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="employees_in_one_row__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd ?>>
    <div class="container-fluid max-width">
        <?php if ($title) : ?>
            <h3 class="msq-body employees_in_one_row__title"><?php echo $title ?></h3>
        <?php endif;?>
        <div class="employees_in_one_row__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="archive-employees__administration__content">
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post):
                        get_template_part_var('templates/parts/single-employees',
                            [
                                'query' => false,
                                'post'  => $post['item'][0],
                                'admin' => true,
                            ]
                        );
                    endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

