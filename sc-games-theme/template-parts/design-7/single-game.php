<?php $game_data = get_game_page_data(get_the_ID()); ?>
    <section class="page__content">
        <div class="container">
            <div class="page__content-title">
				<?php echo !empty($game_data['logo']) ? '<div class="game-image"><img src="' . $game_data['logo'] . '" alt="game-image"></div>' : ''; ?>
                <div class="game-info">
                    <div class="game-title">
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
							echo '<div class="game-button-wrapper"><div class="game-button button"><span>' . $game_data['play_btn'] . '</span></div></div>';
							if (!empty($game_data['provider'])) {
								echo '<div class="game-provider"><img src="' . $game_data['provider'] . '" alt="game-image"></div>';
							}
							echo '</div>';
						}
						echo !empty($game_data['img_disclaimer']) ? '<div class="game-disclaimer">' . $game_data['img_disclaimer'] . '</div>' : '';
					?>
                </div>
            </div>
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
						echo '<div class="games-card-list">';
						foreach ($games as $game) {
							$rating = get_post_meta($game->ID, 'game_page__rating', true);
							$game_logo = get_post_meta($game->ID, 'game_page__logo', true);
							echo '<a href="' . get_permalink($game->ID) . '"  class="game-card "><div class="game-card-wrapper">';
							echo has_post_thumbnail($game->ID) ? '<img class="game-card-image" src="' . get_the_post_thumbnail_url($game->ID) . '" alt="image">' : '';
							echo '<div class="game-card-bottom">';
							echo !empty($game_logo) ? '<div class="game-card-icon"><img src="' . $game_logo . '" alt="image"></div>' : '';
							echo '<div class="game-card-info">';
							draw_rating_block($rating);
							echo '<span class="game-card-title">' . $game->post_title . '</span>';
							echo '</div>';
							echo '</div>';
							echo '</div></a>';
						}
						echo '</div>';
					}
				?>
            </div>
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