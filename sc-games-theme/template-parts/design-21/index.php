<?php

$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$index_data = get_index_page_data();
$reg_link = isset($options[$prefix . 'reg_link']) && !empty($options[$prefix . 'reg_link']) ? $options[$prefix . 'reg_link'] : '';
$reg_label = isset($options[$prefix . 'reg_label']) && !empty($options[$prefix . 'reg_label']) ? $options[$prefix . 'reg_label'] : 'Registration';

$name_label = isset($options[$prefix . 'fp_reg_form_name_label']) && !empty($options[$prefix . 'fp_reg_form_name_label']) ? $options[$prefix . 'fp_reg_form_name_label'] : '';
$email_label = isset($options[$prefix . 'fp_reg_form_email_label']) && !empty($options[$prefix . 'fp_reg_form_email_label']) ? $options[$prefix . 'fp_reg_form_email_label'] : '';
$password_label = isset($options[$prefix . 'fp_reg_form_password_label']) && !empty($options[$prefix . 'fp_reg_form_password_label']) ? $options[$prefix . 'fp_reg_form_password_label'] : '';
$password_again_label = isset($options[$prefix . 'fp_reg_form_password_again_label']) && !empty($options[$prefix . 'fp_reg_form_password_again_label']) ? $options[$prefix . 'fp_reg_form_password_again_label'] : '';
$submit_label = isset($options[$prefix . 'fp_reg_form_submit_label']) && !empty($options[$prefix . 'fp_reg_form_submit_label']) ? $options[$prefix . 'fp_reg_form_submit_label'] : '';
$play_btn = isset($options['sc_games_pln_btn']) && !empty($options['sc_games_pln_btn']) ? $options['sc_games_pln_btn'] : 'Play Now';
?>
<section class="hero">
    <div class="hero-decor">
        <div class="hero-decor-mobile">
            <div class="hero-decor-saturn hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-saturn-mobile.png'?>" alt="hero-decor">
            </div>
            <div class="hero-decor-meteor hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-meteor-mobile.png'?>" alt="hero-decor">
            </div>
            <div class="hero-decor-casino hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-casino-mobile.png'?>" alt="hero-decor">
            </div>
        </div>
        <div class="hero-decor-desktop">
            <div class="hero-decor-saturn hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-saturn.png'?>" alt="hero-decor">
            </div>
            <div class="hero-decor-meteor hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-meteor.png'?>" alt="hero-decor">
            </div>
            <div class="hero-decor-money hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-money.png'?>" alt="hero-decor">
            </div>
            <div class="hero-decor-casino hero-decor-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-casino.png'?>" alt="hero-decor">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="hero-block">
            <div class="hero-title-wrapper">
                <?php
                echo !empty($index_data['hero_title']) ? '<div class="hero-title">' . $index_data['hero_title'] . '</div>' : '';
                echo !empty($index_data['hero_description']) ? '<div class="hero-description">' . $index_data['hero_description'] . '</div>' : '';
                ?>

                <div class="hero-button-wrapper">
                    <div class="hero-play-button hero-button"><a href="#games-section" class="button"><?= $play_btn ?></a></div>
                    <?php
                    if (!empty($reg_link) && !empty($reg_label)) {
                        echo '<div class="hero-button hero-sign-up"><a href="' . $reg_link . '" class="button">' . $reg_label . '';
                        echo '</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="games" id="games-section">
    <div class="games-decor">
        <div class="decor-top games-decor-item">
            <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/games-decor-top.png'?>" alt="">
        </div>
        <div class="decor-bottom games-decor-item">
            <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/games-decor-bottom.png'?>" alt="">
        </div>
    </div>
    <div class="container">
        <div class="games-block">
            <div class="games-title-wrapper">
                <div class="games-title">
                    <?php
                    echo !empty($index_data['games_title']) ? '<div class="title main-title-medium">' . $index_data['games_title'] . '</div>' : '';
                    echo !empty($index_data['games_description']) ? '<div class="description">' . $index_data['games_description'] . '</div>' : '';
                    ?>
                </div>
            </div>
            <?php
            $games = get_posts(
                array(
                    'numberposts' => 9,
                    'post_type' => 'game',
                    'orderby' => 'date',
                    'order' => 'DESC',
                )
            );
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
                    echo '</div>';
                    echo '</div></div></div>';
                }
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>
<section class="newsletter">
    <div class="container">
        <div class="newsletter-block">
            <div class="newsletter-decor">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/newsletter-decor-top.png'?>" alt="newsletter-decor">
            </div>
            <div class="newsletter-block-wrapper">
                <div class="newsletter-content">
                    <div class="newsletter-title-wrapper">
                        <?php
                        echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>' : '';
                        echo !empty($index_data['newsletter_subtitle']) ? '<div class="newsletter-subtitle">' . $index_data['newsletter_subtitle'] . '</div>' : '';
                        ?>
                    </div>
                    <form action="#" class="newsletter-form">
                        <div class="newsletter-input">
                            <input type="text"
                                   placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                        </div>
                        <?php echo '<button type="submit" class="newsletter-button">' . $index_data['newsletter_button_label'] . '</button>'; ?>
                    </form>
                </div>
                <div class="newsletter-image">
                    <img class="newsletter-image--mobile" src="<?php echo get_template_directory_uri() . '/assets/design-21/img/newsletter-image.png'?>" alt="newsletter-image">
                    <div class="newsletter-background">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/newsletter-background.png'?>" alt="newsletter-image">
                    </div>
                    <div class="newsletter-austronaut">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/newsletter-austronaut.png'?>" alt="newsletter-image">
                    </div>
                    <div class="newsletter-smog">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/newsletter-smog.png'?>" alt="newsletter-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="content-decor">
        <div class="content-decor-mobile">
            <div class="content-decor-item content-decor-ball">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-ball-mobile.png'?>" alt="content-decor">
            </div>
            <div class="content-decor-item content-decor-star-1">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-star-mobile.png'?>" alt="content-decor">
            </div>
            <div class="content-decor-item content-decor-star-2">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-star-mobile.png'?>" alt="content-decor">
            </div>
            <div class="content-decor-item content-decor-sparkle">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-sparkle-mobile.png'?>" alt="content-decor">
            </div>
        </div>
        <div class="content-decor-desktop">
            <div class="content-decor-item content-decor-ball">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-ball.png'?>" alt="content-decor">
            </div>
            <div class="content-decor-item content-decor-star">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/decor-star.png'?>" alt="content-decor">
            </div>
            <div class="content-decor-item content-decor-sparkle-small">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/small-sparkle.png'?>" alt="content-decor">
            </div>
            <div class="content-decor-item content-decor-sparkle-big">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-21/img/big-sparkle.png'?>" alt="content-decor">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content-block">
            <?php
            echo !empty($index_data['htp_title']) ? '<div class="content-title">' . $index_data['htp_title'] . '</div>' : '';
            echo !empty($index_data['htp_description']) ? '<div class="content-description">' . $index_data['htp_description'] . '</div>' : '';
            if (!empty($index_data['htp_blocks'])) {
                echo '<div class="content-list">';
                foreach ($index_data['htp_blocks'] as $fp_htp_block) {
                    echo '<div class="content-list-item">';
                    echo '<div class="item-wrapper">';
                    echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt="sword"></div>';
                    echo '<div class="title-wrapper"><div class="title">' . $fp_htp_block['title'] . '</div>';
                    echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div></div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
<section class="modal">
    <div class="modal-wrapper">
        <div class="modal-form content__form register">
            <div class="modal-container">
                <div class="content-block">
                    <div class="content-title main-title-big">
                        <?php the_title(); ?>
                    </div>
                    <a id="form_anchor"></a>
                    <form class="form-with-answer" method="POST" action="#form_anchor">
                        <div class="form-block">
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_name"><?php echo !empty($name_label) ? $name_label : 'Name'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="r_name" name="r_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_pass"><?php echo !empty($password_label) ? $password_label : 'Password'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="password" id="r_pass" name="r_pass">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_email"><?php echo !empty($email_label) ? $email_label : 'Email'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="r_email" name="r_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper required">
                                    <label for="r_pass_confirm"><?php echo !empty($password_again_label) ? $password_again_label : 'Password again'; ?></label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="password" id="r_pass_confirm" name="r_pass_confirm">
                                </div>
                            </div>
                        </div>
                        <div class="submit-block">
                            <input type="submit" class="form-submit-btn button"
                                   value="<?php echo !empty($submit_label) ? $submit_label : 'Register'; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal-overlay">
    <div class="modal-window">
        <div class="modal-close">
            <img src="<?php echo get_template_directory_uri() ?>/assets/design-11/img/close.svg" alt="star">
        </div>
        <div class="modal-content">
            <div class="modal-title main-title-medium"><?php echo !empty($answer_text) ? $answer_text : 'Thank you for your message!'; ?></div>
            <div class="modal-btn button"><?php echo !empty($answer_button_label) ? $answer_button_label : 'Ok'; ?></div>
        </div>
    </div>
</div>