<?php
$title = get_sub_field('title');
$button = get_sub_field('see_all');

$paddingTop = get_sub_field('padding_top');
$paddingBottom = get_sub_field('padding_bottom');
$paddingTopMobile = get_sub_field('padding_top_mobile');
$paddingBottomMobile = get_sub_field('padding_bottom_mobile');
$bgColor = get_sub_field('background');

$previousPost = get_previous_post();
$nextPost = get_next_post();
?>
<section class="previous-next-cases" style="--padding-top:<?php echo $paddingTop; ?>px;--padding-bottom:<?php echo $paddingBottom; ?>px;--padding-top-mobile:<?php echo $paddingTopMobile; ?>px;--padding-bottom-mobile:<?php echo $paddingBottomMobile; ?>px;background:<?php echo $bgColor; ?>;">
    <div class="container-fluid max-width">
        <div class="header">
            <h2><?php echo $title; ?></h2>
            <a href="<?php echo $button['url']; ?>">
                <?php echo $button['title']; ?>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6699 13L0.669922 13" stroke="#0C1210"/>
                    <path d="M12.6699 9L16.6699 13L12.6699 17" stroke="#0C1210"/>
                </svg>
            </a>
        </div>
        <div class="posts">
            <?php
            $query = new WP_Query([
                'post__in' => [$previousPost->ID, $nextPost->ID],
                'post_type'      => 'cases',
                'post_status'    => 'publish',
            ]);

            while ($query->have_posts()) {
                $query->the_post();
                $imgSize = false;
                get_template_part_var('templates/parts/redesign-single-case', ['query' => $query, 'imgSize' => $imgSize, 'addSize' => $imgSize]);
            }

            wp_reset_postdata();

            if ($query->found_posts === 1) {
                $first_post_query = new WP_Query([
                    'posts_per_page' => 1,
                    'order' => 'ASC',
                    'post_type'      => 'cases',
                    'post_status'    => 'publish',
                ]);

                if ($first_post_query->have_posts()) {
                    $first_post_query->the_post();
                    $imgSize = false;
                    get_template_part_var('templates/parts/redesign-single-case', ['query' => $first_post_query, 'imgSize' => $imgSize, 'addSize' => $imgSize]);

                }
            }
            ?>
        </div>
    </div>
</section>
