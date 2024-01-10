<?php
$textColor = get_sub_field('text_color');
$title = get_sub_field('title');
$desc = get_sub_field('desc');
$posts = get_sub_field('posts');
$count = count($posts) === 1 ? 'one-item' : (count($posts) === 3 ? 'three-items' : '');
?>

<section class="direct-contact__module <?php echo $count ?>">
    <div class="container-fluid max-width">
        <div class="direct-contact__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <!--            <div class="direct-contact__items">-->
            <?php foreach ($posts as $post):
                get_template_part_var('templates/parts/single-employees',
                    [
                        'query' => false,
                        'post'  => $post['item'][0],
                        'admin' => true,
                    ]
                );
            endforeach; ?>
            <!--            </div>-->
            <div class="direct-contact__main-info">
                <h3 class="direct-contact__title"><?php echo $title ? $title : '' ?></h3>
                <p class="direct-contact__desc"><?php echo $desc ? $desc : '' ?></p>
            </div>
        </div>
    </div>
</section>

