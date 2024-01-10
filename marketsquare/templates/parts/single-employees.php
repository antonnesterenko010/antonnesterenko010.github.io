<?php
$id = $query ? $query->post->ID : $post;
$employeesImgWebp = get_field('thumbnail_webp', $id);
$image = get_the_post_thumbnail($id, 'full');
$imageWeb = $employeesImgWebp ? $employeesImgWebp['sizes']['employees'] : '';
$imageHover = get_field('hover_img', $id);
$position = get_field('position', $id);
$email = get_field('email', $id);
$phone = get_field('phone', $id);
$hoverPosition = get_field('hover_position', $id);
$addHoverPos = get_field('add_hover_position', $id);
$addPopUp = get_field('add_pop_up_admin', $id);

?>
<div class="employees__item">
    <div class="employees__img-wrapper">
        <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image, 'thumbnail' => true]); ?>
        <div class="img-absolute" <?php echo $imageHover ? 'style="background-image:url(' . $imageHover['sizes']['employees'] . ')"' : ''; ?>></div>
    </div>

    <div class="employees__pos-wrapper">
        <div class="employees__title-wrapper">
            <h3 class="employees__title msq-body__large">
                <?php echo get_the_title($id); ?>
            </h3>
            <p class="employees__position msq-body <?php echo $addHoverPos ? 'addhover' : '' ?>">
                <?php echo $position ?>
            </p>
        </div>
        <?php if ($addPopUp): ?>
            <a class="admin-popup-link msq-body__small" href="#">
                <?php _e('Hent info', 'marketsquare') ?>
            </a>
        <?php endif; ?>
    </div>

    <?php
    if ($addPopUp) :?>
        <div class="admin-popup-wrapper">
            <div class="admin-popup">
                <div class="employees__img-wrapper">
                    <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image, 'thumbnail' => true]); ?>
                    <div class="employees__img-wrapper__info">
                        <div class="employees__pos-wrapper">
                            <p class="employees__position msq-body__small">
                                <?php echo $position ?>
                            </p>
                        </div>
                        <h3 class="employees__title msq-body__large">
                            <?php echo get_the_title($id); ?>
                        </h3>
                        <div class="employees__contacts">
                            <?php if ($email): ?>
                                <a class="msq-body" href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                            <?php endif; ?>
                            <?php if ($phone): ?>
                                <a class="msq-body" href="tel:<?php echo $phone ?>"><?php echo $phone ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="admin-popup-content">
                    <div class="employees__editor msq-body">
                        <?php echo get_field('additional_info_in_pop_up', $id) ?>
                    </div>
                </div>
                <div class="popup-close"></div>
            </div>
        </div>
    <?php endif; ?>
</div>