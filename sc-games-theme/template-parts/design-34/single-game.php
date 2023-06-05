<?php
$game_title = the_title('', '', false);
$game_data = get_game_page_data(get_the_ID());
$play_btn = isset($options['sc_games_pln_btn']) && !empty($options['sc_games_pln_btn']) ? $options['sc_games_pln_btn'] : 'Play';
?>
<main>
    <section class="single-game">
        <div class="container">
            <div class="single-game-card">
                <h3 class="title"><?php echo $game_title ?></h3>
                <div class="single-game-row">
                    <div class="single-game-top">
                        <?php
                        if (!empty($game_data['game_link'])) { ?>
                            <div class="game">
                                <?php

                                if (!empty($game_data['bg'])) {
                                    echo '<div class="game-background-image"><img src="' . $game_data['bg'] . '" alt="game-image"></div>';
                                    if (!empty($game_data['game_link'])) { ?>
                                        <div class="btn-wrapper">
                                            <a class="play btn"
                                               data-modal="#game-modal"><?php echo !empty($game_data['play_btn']) ? $game_data['play_btn'] : 'Play for free' ?></a>
                                        </div>
                                    <?php }
                                    if (!empty($game_data['game_link'])) {
                                        if (!empty($game_data['img_disclaimer'])) {
                                            echo '<strong class="sub"> ' . $game_data['img_disclaimer'] . '</strong>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="single-game-bottom">
                        <?php echo !empty($game_data['subtitle']) ? '<div class="game-subtitle">' . $game_data['subtitle'] . '</div>' : ''; ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related games">
        <div class="container">
            <div class="games-block">
                <h3 class="title"><?= $game_data['related_posts_title'] ?></h3>
                <?php $games = get_posts(array(
                    'numberposts' => 3,
                    'post_type' => 'game',
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'exclude' => get_the_ID()
                ));
                if (!empty($games)) {
                    echo '<div class="games-card-list">';
                    foreach ($games as $key => $game) {
                        $rating = get_post_meta($game->ID, 'game_page__rating', true);
                        $percent = $rating * 10;
                        echo '<div class="game-card">';
                        echo '<div class="game-card-wrapper">';
                        if (has_post_thumbnail($game->ID)) {
                            echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
                        }
                        echo '<div class="inner-wrapper">';
                        echo '<div class="title">' . $game->post_title . '</div>';
                        draw_rating_block($rating);
                        echo '<a class="main-button" href="'. get_permalink($game->ID) .'" >' . $play_btn . '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                } ?>
            </div>
        </div>
    </section>
    <?php if (!empty($game_data['game_link'])) { ?>
        <div class="modal-overlay game-modal" id="game-modal"
             data-callback="gameModal"
             data-src="<?php echo $game_data['game_link'] ?>">
            <div class="modal-window">
                <div class="btns-wrapper">
                    <div class="modal-fullscreen"></div>
                    <div class="modal-close"></div>
                </div>
                <div class="modal-content"></div>
            </div>
        </div>
    <?php } ?>
</main>


