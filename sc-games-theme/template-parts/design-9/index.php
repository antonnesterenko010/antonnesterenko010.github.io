<?php $index_data = get_index_page_data(); ?>
<section class="hero" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/design-9/img/hero-bg.jpg');">
<!--    <img src="--><?php //echo get_template_directory_uri() ?><!--/assets/design-9/img/hero-bg.jpg" alt="hero-bg.jpg"-->
<!--         class="hero-img">-->
    <div class="container">
        <div class="hero-block">
			<?php
				echo !empty($index_data['hero_title']) ? '<div class="hero-title">' . $index_data['hero_title'] . '</div>' : '';
				echo !empty($index_data['hero_description']) ? '<div class="hero-description">' . $index_data['hero_description'] . '</div>' : '';
			?>
        </div>
    </div>
</section>
<section class="games">
    <div class="container">
        <div class="games-block">
			<?php
				echo !empty($index_data['games_title']) ? '<div class="games-title"><div class="name">' . $index_data['games_title'] . '</div></div>' : '';
				echo !empty($index_data['games_description']) ? '<div class="games-description">' . $index_data['games_description'] . '</div>' : '';
				$games = get_posts(array(
						'numberposts' => 9,
						'post_type' => 'game',
						'orderby' => 'date',
						'order' => 'DESC',
					)
				);
				if (!empty($games)) {
					echo '<div class="games-card-list">';
					foreach ($games as $game) {
						$rating = get_post_meta($game->ID, 'game_page__rating', true);
						echo '<a class="game-card" href="' . get_permalink($game->ID) . '"><div class="game-card-wrapper">';
						if (has_post_thumbnail($game->ID)) {
							echo '<div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div>';
						}
						echo '<div class="info-wrapper"><div class="title-wrapper">';
						draw_rating_block($rating);
						echo '<div class="title">' . $game->post_title . '</div>';
						echo '</div>';
						echo '</div></div></a>';
					}
					echo '</div>';
				}
			?>
        </div>
    </div>
</section>
<section class="how-to-play">
    <div class="container">
		<?php
			echo !empty($index_data['htp_title']) ? '<div class="content-title"><h2>' . $index_data['htp_title'] . '</h2></div>' : '';
			echo !empty($index_data['htp_description']) ? '<div class="content-description">' . $index_data['htp_description'] . '</div>' : '';
			if (!empty($index_data['htp_blocks'])) {
				echo '<div class="content-list">';
				foreach ($index_data['htp_blocks'] as $fp_htp_block) {
					echo '<div class="content-list-item">';
					echo '<div class="content-list-item-blur"></div>';
					echo '<div class="item-wrapper">';
					echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt="sword"></div>';
					echo '<div class="title">' . $fp_htp_block['title'] . '</div>';
					echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div>';
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
			}
		?>
    </div>
</section>

