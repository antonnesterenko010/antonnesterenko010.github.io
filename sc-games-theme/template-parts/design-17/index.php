<?php
$index_data = get_index_page_data();
?>

<main>
  <section class="content bg hero">
    <div class="bg"></div>
    <div class="container">
      <div class="content-block">
        <div class="wrapper">
          <div class="<?php echo $index_data['hero_reg_link'] ?>">
            <?php
            if (!empty($index_data['hero_title'])) {
              echo '<h3 class="title hero">' . $index_data['hero_title'] . '</h3>';
            }
            ?>
          </div>
          <?php
          if (!empty($index_data['hero_description'])) {
            echo '<div class="subtitle hero">' . $index_data['hero_description'] . '</div>';
          } ?>
        </div>
      </div>
    </div>
  </section>

  <section class="content how-it-works-content">
    <div class="container">
      <div class="content-block">
        <?php
        if (!empty($index_data['htp_blocks'])) {
          echo '<div class="content-list">';
          foreach ($index_data['htp_blocks'] as $key => $fp_htp_block) {
            echo '<div class="content-list-item">';
            echo '<div class="item-wrapper block-bg">';
            echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt=""/></div>';
            echo '<div>';
            echo '<div class="title">' . $fp_htp_block['title'] . '</div>';
            echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        }
        echo '<div class="title-wrapper">';
        echo !empty($index_data['htp_title']) ? '<h3 class="title ">' . $index_data['htp_title'] . '</h3>' : '';
        echo !empty($index_data['htp_description']) ? '<div class="subtitle "><img src="'. get_template_directory_uri() .'/assets/design-17/img/astronaut.png" alt="">' . $index_data['htp_description'] . '</div>' : '';
        echo '</div>';
        ?>
      </div>
    </div>
  </section>

  <section class="games">
    <div class="container">
      <div class="games-block">
        <?php if (!empty($index_data['games_title'])) { ?>
          <h3 class="title">
            <?php echo $index_data['games_title'] ?>
          </h3>
        <?php } ?>
        <?php if (!empty($index_data['games_description'])) { ?>
          <div class="subtitle">
            <?php echo $index_data['games_description'] ?>
          </div>
        <?php } ?>
        <?php
        $games = get_posts(
          array(
            'numberposts' => 8,
            'post_type' => 'game',
            'orderby' => 'date',
            'order' => 'DESC',
          )
        );
        if (!empty($games)) {
          echo '<div class="games-card-list">';
          foreach ($games as $key => $game) {
            $rating = get_post_meta($game->ID, 'game_page__rating', true);
            $percent = ($rating / 2);
            echo '<div class="game-card">';
            echo '<div class="game-card-wrapper">';
            if (has_post_thumbnail($game->ID)) {
              echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
            }
            echo '<div class="inner-wrapper">';
            echo '<div class="title">' . $game->post_title . '</div>';
            echo '<div class="custom-rate">'. $percent .'</div>';
            echo '<div class="play-now-btn "><a class="btn secondary" href="' . get_permalink($game->ID) . '">' . $index_data['play_btn'] . '</a></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>

  <section class="newsletter">
    <div class="container">
      <div class="subscribe block-bg">
        <div class="img min-small">
          <img class="" src="<?php echo get_template_directory_uri() . '/assets/design-17/img/news-bg.png'; ?>"
               alt="Subscribe">
        </div>
        <div class="wrapper">
          <?php echo !empty($index_data['newsletter_title']) ? '<h3 class="title ">' . $index_data['newsletter_title'] . '</h3>' : ''; ?>
          <?php echo !empty($index_data['newsletter_subtitle']) ? '<div class="subtitle ">' . $index_data['newsletter_subtitle'] . '</div>' : ''; ?>
          <form action="#">
            <input type="text" name="email" placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
            <button type="submit" class="secondary"><?= $index_data['newsletter_button_label']; ?></button>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>