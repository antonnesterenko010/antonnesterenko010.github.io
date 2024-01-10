<?php
$fields = get_fields();
$section = $fields['feedback'];
?>
<section class="section__container feedback-block feedback-block--secondary">
    <div class="container">
        <div class="feedback-block__wrapper">
            <div class="feedback-block__paper feedback-block__paper--secondary">
                <div class="feedback-inner__container">
                    <?php if ($section['thank_you_message']) : ?>
                     <div class="success-message success-message--overall">
                      <div class="success-message__container">
                          <?php echo $section['thank_you_message'];?>
                      </div>
                    </div>
                    <?php endif;?>
                    <div class="paper">
                        <?php if ($section['title']) : ?>
                            <div class="paper__title">
                                <?php echo $section['title'] ?>
                            </div>
                        <?php endif;
                        if ($section['tabs']) :
                            ?>
                            <div class="js-tabs js-dropdown-toggler-wrapper tabs custom-select feedback-block__inner small-body">
                                <div class="js-dropdown-toggle dropdown-toggle"></div>
                                <ul class="js-dropdown-menu dropdown-menu">
                                    <?php
                                    $menuCounter = 1;
                                    foreach ($section['tabs'] as $tab) : ?>
                                        <li data-tab-selector="<?php echo '#tab' . $menuCounter ?>">
                                            <div class="dropdown-menu__item">
                                                <div class="icon-container">
                                                    <?php if ($tab['svg_type'] === 'option' && $tab['svg_option'] === 'live_demo') : ?>
                                                    <svg viewBox="0 0 25 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M18.0446 11.1056L7.57015 5.86833C6.77227 5.46939 5.8335 6.04958 5.8335 6.94164V17.0584C5.8335 17.9504 6.77227 18.5306 7.57015 18.1317L18.0446 12.8944C18.7817 12.5259 18.7817 11.4741 18.0446 11.1056Z"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                    </svg>
                                                    <?php endif;
                                                    if ($tab['svg_type'] === 'option' && $tab['svg_option'] === 'request_pricing') :
                                                    ?>
                                                        <svg viewBox="0 0 25 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                    d="M12.6665 22C18.1895 22 22.6665 17.523 22.6665 12C22.6665 6.477 18.1895 2 12.6665 2C7.1435 2 2.6665 6.477 2.6665 12C2.6665 13.6 3.0425 15.112 3.7095 16.453C3.8875 16.809 3.9465 17.216 3.8435 17.601L3.2485 19.827C3.18979 20.0472 3.19001 20.279 3.24914 20.4991C3.30827 20.7192 3.42423 20.9199 3.58539 21.0811C3.74656 21.2423 3.94726 21.3582 4.16737 21.4174C4.38749 21.4765 4.61928 21.4767 4.8395 21.418L7.0655 20.823C7.45191 20.7258 7.86053 20.7731 8.2145 20.956C9.59743 21.6446 11.1216 22.0021 12.6665 22Z"/>
                                                            <path
                                                                    d="M12.6665 15.333C13.7715 15.333 14.6665 14.587 14.6665 13.667C14.6665 12.747 13.7715 12 12.6665 12C11.5615 12 10.6665 11.254 10.6665 10.333C10.6665 9.413 11.5615 8.667 12.6665 8.667M12.6665 15.333C11.5615 15.333 10.6665 14.587 10.6665 13.667M12.6665 15.333V16M12.6665 8.667V8M12.6665 8.667C13.7715 8.667 14.6665 9.413 14.6665 10.333"
                                                                    stroke-linecap="round"/>
                                                        </svg>
                                                    <?php endif;
                                                    if ($tab['svg_type'] === 'option' && $tab['svg_option'] === 'platform_tour') :
                                                        ?>
                                                        <svg viewBox="0 0 25 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="6.3335" y="13" width="4" height="4" rx="2"
                                                                  transform="rotate(90 6.3335 13)"/>
                                                            <rect x="17.3335" y="12" width="4" height="4" rx="2"
                                                                  transform="rotate(-90 17.3335 12)"/>
                                                            <path
                                                                    d="M18.3335 11L16.8335 12.5C15.8164 13.5171 15.3079 14.0256 14.6963 14.1384C14.4564 14.1826 14.2106 14.1826 13.9707 14.1384C13.3591 14.0256 12.8506 13.5171 11.8335 12.5V12.5C10.8164 11.4829 10.3079 10.9744 9.69627 10.8616C9.45644 10.8174 9.21055 10.8174 8.97073 10.8616C8.35908 10.9744 7.85055 11.4829 6.83349 12.5L5.3335 14"/>
                                                        </svg>
                                                    <?php
                                                    endif;
                                                    if ($tab['svg_type'] === 'custom' && $tab['svg_custom']) : ?>
                                                    <?php echo $tab['svg_custom']?>
                                                    <?php endif;
                                                    if ($tab['svg_type'] === 'image' && $tab['svg_image']) :
                                                    ?>
                                                        <img src="<?php echo $tab['svg_image']['url']?>" alt="<?php echo $tab['svg_image']['alt']?>">
                                                    <?php
                                                    endif;
                                                    ?>
                                                </div>
                                                <?php if ($tab['title']) :
                                                ?>
                                                <p><?php echo $tab['title']; ?></p>
                                                <?php
                                        endif;?>
                                            </div>
                                        </li>
                                        <?php
                                        $menuCounter++;
                                    endforeach;
                                    ?>
                                </ul>

                                <ul class="js-tabs-nav tabs-nav">
                                    <?php
                                    $navCounter = 1;
                                    foreach ($section['tabs'] as $tab) : ?>
                                    <li data-tab-selector="<?php echo '#tab' . $navCounter ?>" class="tabs-nav__item small-body">
                                        <div class="icon-container">
                                            <?php if ($tab['svg_type'] === 'option' && $tab['svg_option'] === 'live_demo') : ?>
                                                <svg viewBox="0 0 25 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M18.0446 11.1056L7.57015 5.86833C6.77227 5.46939 5.8335 6.04958 5.8335 6.94164V17.0584C5.8335 17.9504 6.77227 18.5306 7.57015 18.1317L18.0446 12.8944C18.7817 12.5259 18.7817 11.4741 18.0446 11.1056Z"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                </svg>
                                            <?php endif;
                                            if ($tab['svg_type'] === 'option' && $tab['svg_option'] === 'request_pricing') :
                                                ?>
                                                <svg viewBox="0 0 25 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M12.6665 22C18.1895 22 22.6665 17.523 22.6665 12C22.6665 6.477 18.1895 2 12.6665 2C7.1435 2 2.6665 6.477 2.6665 12C2.6665 13.6 3.0425 15.112 3.7095 16.453C3.8875 16.809 3.9465 17.216 3.8435 17.601L3.2485 19.827C3.18979 20.0472 3.19001 20.279 3.24914 20.4991C3.30827 20.7192 3.42423 20.9199 3.58539 21.0811C3.74656 21.2423 3.94726 21.3582 4.16737 21.4174C4.38749 21.4765 4.61928 21.4767 4.8395 21.418L7.0655 20.823C7.45191 20.7258 7.86053 20.7731 8.2145 20.956C9.59743 21.6446 11.1216 22.0021 12.6665 22Z"/>
                                                    <path
                                                            d="M12.6665 15.333C13.7715 15.333 14.6665 14.587 14.6665 13.667C14.6665 12.747 13.7715 12 12.6665 12C11.5615 12 10.6665 11.254 10.6665 10.333C10.6665 9.413 11.5615 8.667 12.6665 8.667M12.6665 15.333C11.5615 15.333 10.6665 14.587 10.6665 13.667M12.6665 15.333V16M12.6665 8.667V8M12.6665 8.667C13.7715 8.667 14.6665 9.413 14.6665 10.333"
                                                            stroke-linecap="round"/>
                                                </svg>
                                            <?php endif;
                                            if ($tab['svg_type'] === 'option' && $tab['svg_option'] === 'platform_tour') :
                                                ?>
                                                <svg viewBox="0 0 25 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="6.3335" y="13" width="4" height="4" rx="2"
                                                          transform="rotate(90 6.3335 13)"/>
                                                    <rect x="17.3335" y="12" width="4" height="4" rx="2"
                                                          transform="rotate(-90 17.3335 12)"/>
                                                    <path
                                                            d="M18.3335 11L16.8335 12.5C15.8164 13.5171 15.3079 14.0256 14.6963 14.1384C14.4564 14.1826 14.2106 14.1826 13.9707 14.1384C13.3591 14.0256 12.8506 13.5171 11.8335 12.5V12.5C10.8164 11.4829 10.3079 10.9744 9.69627 10.8616C9.45644 10.8174 9.21055 10.8174 8.97073 10.8616C8.35908 10.9744 7.85055 11.4829 6.83349 12.5L5.3335 14"/>
                                                </svg>
                                            <?php
                                            endif;
                                            if ($tab['svg_type'] === 'custom' && $tab['svg_custom']) : ?>
                                                <?php echo $tab['svg_custom']?>
                                            <?php endif;
                                            if ($tab['svg_type'] === 'image' && $tab['svg_image']) :
                                                ?>
                                                <img src="<?php echo $tab['svg_image']['url']?>" alt="<?php echo $tab['svg_image']['alt']?>">
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                        <?php if ($tab['title']) :
                                            ?>
                                            <p><?php echo $tab['title']; ?></p>
                                        <?php
                                        endif;?>

                                    </li>
                                    <?php
                                    $navCounter++;
                                    endforeach;?>
                                </ul>
                                <div class="js-tabs-content js-content">
                                    <?php
                                    $tabCounter = 1;
                                    foreach($section['tabs'] as $tab) :
                                    ?>
                                    <div id="<?php echo 'tab' . $tabCounter?>" class="js-tab-content">
                                        <div class="feedback-block__form">
                                            <div class="feedback-block__formWrapper">
                                                <?php echo do_shortcode($tab['form_shortcode']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $tabCounter++;
                                    endforeach;?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
