<?php
get_header();
$options = get_fields('options');
$fields = get_fields();
$section = $fields['post'];

$blogRecommended = $options['global']['recommended_blog_posts_for_all_posts'];
$blogRecommendedTitle = $options['global']['blog_recommended_title'];
?>


    <div class="sections__container">
        <section class="intro__block article">
            <div class="container smallest">
                <div class="intro__block-container">
                    <div class="intro__block-text">
                        <div class="text__inner">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="author-info">
                            <div class="author">
                                <div class="avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                                </div>
                                <p><?php the_author(); ?></p>
                            </div>
                            <p><?php echo get_the_date('M j, Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (has_post_thumbnail()) :
                ?>
                <div class="article-img__main">
                    <?php
                    the_post_thumbnail('intro-wide');
                    ?>
                </div>
            <?php
            endif;
            ?>
            ?>
        </section>
        <section class="info-section <?php echo $section['background_style'];
        echo ' ' . $section['section_type'] ?>">
            <div class="container smallest">
                <div class="article-body">
                    <?php
                    if ($section['article_content']) :
                        foreach ($section['article_content'] as $article) : ?>
                            <div class="article-content <?php echo $article['content_alignment'] ?>">
                                <?php if ($article['text']) : ?>
                                    <div class="article-text">
                                        <?php echo $article['text'] ?>
                                    </div>
                                <?php endif;
                                if ($article['image']) :
                                    ?>
                                    <div class="article-img">
                                        <img src="<?php echo $article['image']['url'] ?>"
                                             alt="<?php echo $article['image']['alt'] ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach;
                    endif;
                    if ($section['quote_content']) :
                        foreach ($section['quote_content'] as $quote) :
                            ?>
                            <div class="quote-item">
                                <?php if ($quote['image']) : ?>
                                    <div class="quote-img">
                                        <img src="<?php echo $quote['image']['url'] ?>" alt="<?php
                                        echo $quote['image']['alt'] ?>">
                                    </div>
                                <?php endif;
                                if ($quote['text']) :
                                    ?>
                                    <div class="quote-text">
                                        <?php echo $quote['text'] ?>
                                        <?php if ($quote['author']) : ?>
                                            <div class="quote-author">
                                                <?php echo $quote['author'] ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <?php if ($section['recommended_blog_posts'] === true || $blogRecommended === true)  : ?>

            <?php
            $currentPost = get_the_ID();
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array($currentPost),
                'order_by' => 'date',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                ?>
                <section class="info-section bg-reverse-gradient">
                    <div class="container smallest">
                        <div class="blog-recommend__inner">
                            <?php if ($blogRecommendedTitle) : ?>
                                <h3><?php echo $blogRecommendedTitle ?></h3>
                            <?php endif; ?>
                            <ul class="blog-recommend__list">
                                <?php
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) :
                                                the_post_thumbnail('full');
                                            endif;
                                            ?>
                                            <p>
                                                <?php the_title(); ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>


    </div>

<?php
get_footer();