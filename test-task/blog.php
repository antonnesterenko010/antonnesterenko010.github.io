<?php
/*
Template Name: Blog
*/
?>
<?php
get_header();
?>
    <div class="sections__container">
        <section class="intro__block with-search bg-dark-gradient">
            <div class="container">
                <div class="intro__block-container">
                    <div class="intro__block-text">
                        <div class="text__inner">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <label class="search">
                            <input type="text" placeholder="Search">
                            <button>
                                <img src="<?php echo get_template_directory_uri() . '/assets/' ?>img/icon/search-icon.svg"
                                     alt="alt">
                            </button>
                        </label>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $argsFirstPost = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'order_by' => 'date',
            'order' => 'DESC'
        );
        $querySinglePost = new WP_Query($argsFirstPost);
        $excludedPost = ($querySinglePost->have_posts()) ? $querySinglePost->posts[0]->ID : 0;

        if ($querySinglePost->have_posts()) :
        ?>
        <section class="info-section">
            <div class="container">
                <div class="blog-content__inner">
                    <ul class="content-list blog-wrapper">

                        <?php
                        while ($querySinglePost->have_posts()) : $querySinglePost->the_post();

                            $postOptions = get_fields();
                            ?>
                            <li>
                                <div class="content-item">
                                    <a href="<?php the_permalink(); ?>" class="content-img">
                                        <div class="event-first__label label">
                                            <div class="label__title">
                                                <?php echo $postOptions['post']['label']?>
                                            </div>
                                        </div>
                                        <?php
                                        if (has_post_thumbnail()) :
                                            the_post_thumbnail('full');
                                        endif;
                                        ?>
                                    </a>
                                    <div class="content-text">
                                        <h2> <?php the_title() ?></h2>
                                        <p> <?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="link">
                                            Read more
                                            <img src="<?php echo get_template_directory_uri() . '/assets/' ?>img/icon/arrow-long.svg"/>
                                        </a>
                                    </div>

                                </div>
                            </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        endif;
                        $argsAll = array(
                            'post_type' => 'post',
                            'posts_per_page' => 12,
                            'order_by' => 'date',
                            'order' => 'DESC',
                            'post__not_in' => array($excludedPost),
                        );
                        $queryAll = new WP_Query($argsAll);
                        ?>
                        <?php
                        if ($queryAll->have_posts()) :
                            while ($queryAll->have_posts()) : $queryAll->the_post();
                                ?>
                                <li>
                                    <div class="content-item">
                                        <a href="<?php the_permalink(); ?>" class="content-img">
                                            <?php
                                            if (has_post_thumbnail()) :
                                                the_post_thumbnail('full');
                                            endif;
                                            ?>
                                        </a>
                                        <div class="content-text">
                                            <h2> <?php the_title() ?></h2>
                                            <p> <?php the_excerpt(); ?></p>
                                            <a href="<?php the_permalink(); ?>" class="link">
                                                Read more
                                                <img src="<?php echo get_template_directory_uri() . '/assets/' ?>img/icon/arrow-long.svg"/>
                                            </a>
                                        </div>

                                    </div>
                                </li>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>

                        <?php endif; ?>
                    </ul>
                    <img src="<?php echo get_template_directory_uri() . '/assets/' ?>img/icon/loading.svg" alt="alt"
                         class="loading">
                </div>
            </div>
        </section>
    </div>

<?php
get_footer();