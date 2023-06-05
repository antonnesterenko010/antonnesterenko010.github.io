<?php $game_data = get_game_page_data(get_the_ID()); ?>
<main>
    <section class="page__content">
        <div class="container game-page-container">
            <div class="page__content-title">
                <?php echo !empty($game_data['logo']) ? '<div class="game-image"><img src="' . $game_data['logo'] . '" alt="game-image"></div>' : ''; ?>
                <div class="game-info">
                    <?php echo !empty($game_data['provider']) ? '<div class="game-image"><img src="' . $game_data['provider'] . '" alt="game-provider"></div>' : ''; ?>

                    <div class="game-title main-title-big">
                        <?php the_title(); ?>
                    </div>
                    <?php echo !empty($game_data['subtitle']) ? '<div class="game-subtitle">' . $game_data['subtitle'] . '</div>' : ''; ?>
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
//                        if (!empty($game_data['logo'])) {
//                            echo '<div class="game-image"><img src="' . $game_data['logo'] . '" alt="game-image"></div>';
//                        }
                        if (!empty($game_data['bg'])) {
                            echo '<button class="game-button" aria-label="' . $game_data['play_btn'] . '"><svg width="77" height="77" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)" fill="#fff"><path d="M38.451 72.096a33.645 33.645 0 1 1 0-67.29 33.645 33.645 0 0 1 0 67.29Zm0 4.806a38.451 38.451 0 1 0 0-76.903 38.451 38.451 0 0 0 0 76.903Z"/><path d="M30.146 24.296a2.403 2.403 0 0 1 2.5.183l16.822 12.016a2.402 2.402 0 0 1 0 3.912L32.646 52.423a2.403 2.403 0 0 1-3.802-1.956V26.435a2.403 2.403 0 0 1 1.302-2.14Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h76.902v76.902H0z"/></clipPath></defs></svg></button>';
                            if (!empty($game_data['provider'])) {
                                echo '<div class="game-provider"><img src="' . $game_data['provider'] . '" alt="game-image"></div>';
                            }
                        }
                        echo '</div>';
                    }
                    if (!empty($game_data['bg'])) {
                        echo !empty($game_data['img_disclaimer']) ? '<div class="game-disclaimer title-bg-default">' . $game_data['img_disclaimer'] . '</div>' : '';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if ($game_data['show_related_posts']) { ?>
                <div class="related-posts">
                    <div class="related-posts-title main-title-medium"><?= $game_data['related_posts_title'] ?></div>
                    <?php $games = get_posts(array(
                        'numberposts' => 4,
                        'post_type' => 'game',
                        'orderby' => 'rand',
                        'order' => 'DESC',
                        'exclude' => get_the_ID()
                    ));
                    if (!empty($games)) {
                        echo '<div class="games-slider"><div class="games-card-list">';
                        foreach ($games as $game) {
                            $game_data = get_game_page_data($game->ID);
                            $rating = get_post_meta($game->ID, 'game_page__rating', true);
                            echo '<div class="game-card">';
                            echo '<a href="' . get_permalink($game->ID) . '" class="game-card-wrapper">';
                            if (has_post_thumbnail($game->ID)) {
                                echo '<div  class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></div>';
                            }
                            echo '<div class="info-wrapper">';
                            echo '<div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                            draw_rating_block($rating);
                            echo '<div class="button-wrapper"><div class="card-button main-button">' . $game_data['play_btn'] . '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div></a></div>';
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
</main>
