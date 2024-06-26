<?php $game_data = get_game_page_data(get_the_ID()); ?>
<div class="content-wrapper">
    <section class="page__content">
        <div class="container">
            <div class="page__content-title">
                <?php echo !empty($game_data['logo']) ? '<div class="game-image"><img src="' . $game_data['logo'] . '" alt="game-image"></div>': ''; ?>
                <div class="game-info">
                    <div class="game-title">
                        <?php the_title(); ?>
                    </div>
                    <?php echo !empty($game_data['subtitle']) ? '<div class="game-subtitle">' . $game_data['subtitle'] . '</div>': ''; ?>
                </div>
            </div>
            <div class="page__content-wrapper">
                <div class="page__content-main">
                    <?php the_content(); ?>
                </div>
                <div class="page__content-window">
                    <?php
                    if (!empty($game_data['game_link'])) {
                        if (!empty($game_data['bg'])) {
                            echo '<div class="game-window" data-src="' . $game_data['game_link'] . '">';
                            echo '<div class="game-background-image"><img src="' . $game_data['bg'] . '" alt="game-image"></div>';
                        } else {
                            echo '<div class="game-window" data-src="' . $game_data['game_link'] . '">';
                        }
                        echo '<div class="game-button button">' . $game_data['play_btn'] . '</div>';
                        if (!empty($game_data['provider'])) {
                            echo '<div class="game-provider"><img src="' . $game_data['provider'] . '" alt="game-image"></div>';
                        }
                        echo '</div>';
                    }
                    echo !empty($game_data['img_disclaimer']) ? '<div class="game-disclaimer">'.$game_data['img_disclaimer'].'</div>' : '';
                    ?>
                </div>
            </div>
            <?php if($game_data['show_related_posts']) { ?>
            <div class="related-posts">
                <div class="games-block">
                    <div class="related-posts-title"><?= $game_data['related_posts_title'] ?></div>
                    <?php $games = get_posts(array(
                        'numberposts' => 3,
                        'post_type' => 'game',
                        'orderby' => 'rand',
                        'order' => 'DESC',
                        'exclude' => get_the_ID()
                    ));
                    if (!empty($games)) {
                        echo '<div class="games-card-list">';
                        foreach ($games as $game) {
                            $rating = get_post_meta($game->ID, 'game_page__rating', true);
                            echo '<div class="game-card"><div class="game-card-wrapper">';
                            if (has_post_thumbnail($game->ID)) {
                                echo '<a href="' . get_permalink($game->ID) . '" class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></a>';
                            }
                            echo '<div class="info-wrapper"><div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                            draw_rating_block($rating);
                            echo '</div>';
                            echo '</div></div></div>';
                        }
                        echo '</div>';
                    } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <?php if (!empty($game_data['game_link'])) { ?>
        <section class="content__form game">
            <div class="container">
                <div class="content-block">
                    <?php
                    echo '<div class="game-content">';
                    echo '<div class="game-close"><img src="' . get_template_directory_uri() . '/assets/design-10/img/close.svg" alt="close-btn"></div></div>';
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
