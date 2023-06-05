<?php $game_data = get_game_page_data(get_the_ID()); ?>
    <section class="page__content">
        <div class="container game-page-container">
            <div class="page__content-title">
<!--                --><?php //echo !empty($game_data['logo']) ? '<div class="game-image"><img src="' . $game_data['logo'] . '" alt="game-image"></div>': ''; ?>
                <div class="game-info">
<!--                    --><?php //echo !empty($game_data['provider']) ? '<div class="game-image"><img src="' . $game_data['provider'] . '" alt="game-provider"></div>': ''; ?>

                    <div class="game-title main-title-big">
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
                        echo '<div class="game-button"><svg width="78" height="78" viewBox="0 0 78 78" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)" fill="#fff"><path d="M39.002 72.195a33.645 33.645 0 1 1 0-67.289 33.645 33.645 0 0 1 0 67.29Zm0 4.807a38.451 38.451 0 1 0 0-76.902 38.451 38.451 0 0 0 0 76.902Z"/><path d="M30.693 24.395a2.403 2.403 0 0 1 2.5.183l16.822 12.016a2.403 2.403 0 0 1 0 3.913L33.193 52.523a2.403 2.403 0 0 1-3.802-1.957V26.534a2.404 2.404 0 0 1 1.302-2.139Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M.551.1h76.902v76.902H.551z"/></clipPath></defs></svg></div>';
                        if (!empty($game_data['logo'])) {
                            echo '<div class="game-image"><img src="' . $game_data['logo'] . '" alt="game-image"></div>';
                        }
//                        if (!empty($game_data['provider'])) {
//                            echo '<div class="game-provider"><img src="' . $game_data['provider'] . '" alt="game-image"></div>';
//                        }
                        echo '</div>';
                    }
                    echo !empty($game_data['img_disclaimer']) ? '<p class="game-disclaimer title-bg-default">'.$game_data['img_disclaimer'].'</p>' : '';
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if($game_data['show_related_posts']) { ?>
                <div class="related-posts">
                    <div class="related-posts-title"><?= $game_data['related_posts_title'] ?></div>
                    <?php $games = get_posts(array(
                        'numberposts' => 3,
                        'post_type' => 'game',
                        'orderby' => 'rand',
                        'order' => 'DESC',
                        'exclude' => get_the_ID()
                    ));
                    if (!empty($games)) {
                        echo '<div class="games-slider"><div class="games-card-list">';
                        foreach ($games as $game) {
                            $rating = get_post_meta($game->ID, 'game_page__rating', true);
                            echo '<div class="game-card"><div class="game-card-wrapper">';
                            if (has_post_thumbnail($game->ID)) {
                                echo '<a href="' . get_permalink($game->ID) . '" class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></a>';
                            }
                            echo '<div class="info-wrapper"><div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                            draw_rating_block($rating);
                            echo '</div><a class="main-button main-button-small" href="' . get_permalink($game->ID) . '">' . $game_data['play_btn'] . '</a>';
                            echo '</div></div></div>';
                        }
                        echo '</div></div>';
                    } ?>
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
                echo '<div class="game-close"><img src="' . get_template_directory_uri() . '/assets/design-1/img/white-cross.svg" alt="close-btn"></div></div>';
                ?>
            </div>
        </div>
    </section>
<?php } ?>