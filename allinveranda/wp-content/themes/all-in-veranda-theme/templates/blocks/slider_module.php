<?php
$title = get_sub_field('title');
$list = get_sub_field('list');
$backgroundColor = get_sub_field('section_background');
?>
<section class="slider"<?php if ($backgroundColor) : ?> style="background: <?php echo $backgroundColor; endif;?>">
    <div class="container">
        <?php if ($title) : ?>
            <div class="slider__title">
                <?php echo $title?>
            </div>
        <?php endif;?>
        <div class="thumbs__list__wrapper">
            <div class="thumbs__list">
                <div class="swiper-wrapper">

                    <?php
                    foreach ($list as $item) :
                        ?>
                        <div class="swiper-slide slider__item">
                            <a class="slider__image" data-fancybox="gallery" data-src="<?php echo $item['image']['url']?>" data-caption="<?php echo $item['image']['alt']?>">
                                <img src="<?php echo $item['image']['url']?>" alt="<?php echo $item['image']['alt']?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="slider__list">

            <div class="swiper-wrapper">
                <?php
                foreach ($list as $item) :
                    ?>
                    <div class="swiper-slide slider__item">
                        <div class="slider__quote">
                            <?php echo $item['quote']?>
                        </div>
                        <div class="slider__author">
                            <div class="author__avatar">
                                <img src="<?php echo $item['author_avatar']['url']?>" alt="<?php echo $item['author_avatar']['alt']?>">
                            </div>
                            <div class="author__info">
                                <div class="author__name">
                                    <?php echo $item['author_name']?>
                                </div>
                                <div class="author__position">
                                    <?php echo $item['author_position']?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slider__navigation">
                <div class="slider__navigation__prev slider__navigation__btn">
                    <svg class="active" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.6194 11.5835H4.98587" stroke="white" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.3027 5.2666L4.98591 11.5834L11.3027 17.9001" stroke="white" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <svg class="disabled" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.6194 11.5835H4.98587" stroke="#2C3843" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.3027 5.2666L4.98591 11.5834L11.3027 17.9001" stroke="#2C3843" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="slider__navigation__progress">
                </div>
                <div class="slider__navigation__next slider__navigation__btn">
                    <svg class="active" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.97769 11.5835H17.6112" stroke="white" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.2951 5.2666L17.6118 11.5834L11.2951 17.9001" stroke="white" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <svg class="disabled" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.97769 11.5835H17.6112" stroke="#2C3843" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.2951 5.2666L17.6118 11.5834L11.2951 17.9001" stroke="#2C3843" stroke-width="1.80479" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>