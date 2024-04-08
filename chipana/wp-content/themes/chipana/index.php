<?php
get_header();

$fields = get_fields('options');
$home = $fields['homepage'];

$heroSlider = $home['slider'];

$aboutTitle = $home['about_title'];
$aboutText = $home['about_text'];
$aboutImage = $home['about_image'];

$samplesText = $home['samples_text'];
$samplesButton = $home['samples_button'];
$samplesList = $home['samples_list'];

$servicesTitle = $home['services_title'];
$servicesCards = $home['services_cards'];
$servicesList = $home['services_list'];

$chooseTitle = $home['choose_title'];
$chooseCards = $home['choose_cards'];

$studioTitle = $home['studio_title'];
$studioPhotos = $home['studio_photos'];

$reviewTitle = $home['review_title'];
$reviewList = $home['review_list'];

$contactTitle = $home['contact_title'];
$contactPhone = $home['contact_phone'];
$contactEmail = $home['contact_email'];
$contactFormShortcode = $home['contact_form_shortcode'];
?>


    <main class="grid-container">
        <section id="home" class="hero grid-container grid-content-full">
            <?php
            if ($heroSlider) :
                ?>
                <div class="hero-swiper grid-content-full grid-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($heroSlider as $slide) : ?>

                            <div class="swiper-slide hero-card grid-content-full grid-container"
                                 style="background-image: url('<?php echo $slide['image']['url'] ?>')">
                                <div class="hero-inner grid-content">
                                    <?php echo $slide['text'];
                                    if ($slide['button']) :
                                        ?>
                                        <button class="btn"
                                                onclick="scrollToSection('<?php echo $slide['button']['url'] ?>')"><?php echo $slide['button']['title'] ?></button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (count($heroSlider) > 1) : ?>
                        <div class="pagination">
                            <div class="swiper-pagination"></div>

                            <div class="swiper-button-prev hero-arrow-prev">
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>
                            <div class="swiper-button-next hero-arrow-next">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
        <section id="about" class="about grid-content">
            <div class="about-inner section-inner">
                <?php if ($aboutTitle) : ?>
                    <h2><?php echo $aboutTitle ?></h2>
                <?php endif;
                ?>
                <div class="about-wrap">
                    <?php
                    if ($aboutText) :?>
                        <div class="about-text">
                            <?php echo $aboutText ?>
                        </div>
                    <?php endif;
                    if ($aboutImage) :
                        ?>
                        <img src="<?php echo $aboutImage['url'] ?>" alt="<?php echo $aboutImage['alt'] ?>">
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section id="samples" class="samples grid-content-full grid-container" style="background-color: #EADFEC;">
            <div class="grid-content">
                <div class="samples-inner section-inner">
                    <div class="samples-heading">
                        <?php if ($samplesText) :
                            echo $samplesText;
                        endif;
                        if ($samplesButton) :
                            ?>
                            <button class="btn"
                                    onclick="scrollToSection('<?php echo $samplesButton['url'] ?>')"><?php echo $samplesButton['title'] ?></button>
                        <?php endif; ?>
                    </div>
                    <div class="samples-wrap">
                        <?php
                        $counter = 1;
                        foreach ($samplesList as $sample) : ?>
                            <?php
                            $id = strtolower(str_replace(' ', '-', $sample['title']));
                            ?>
                            <figure data-attr="<?php echo $counter ?>">
                                <?php if ($sample['title']) : ?>
                                    <figcaption id="<?php echo $id; ?>"><?php echo $sample['title'] ?></figcaption>
                                <?php endif; ?>
                                <div class="audio-container">
                                    <div class="audio-player"
                                         data-src="<?php echo $sample['file']['url'] ?>">
                                        <div class="play-btn btn">
                                            <img class="play"
                                                 src="<?php echo get_template_directory_uri() . "/assets/images/" ?>Play.svg"
                                                 alt="play">
                                            <img class="pause"
                                                 src="<?php echo get_template_directory_uri() . "/assets/images/" ?>PauseCircle.svg"
                                                 alt="pause">
                                        </div>
                                        <div class="time-display">
                                            <span class="current-time">0:00</span>
                                            <span class="slash">/</span>
                                            <span class="total-time">0:00</span>
                                        </div>
                                        <div class="audio"></div>
                                        <div class="mute-btn btn">
                                            <img class="volume-up"
                                                 src="<?php echo get_template_directory_uri() . "/assets/images/" ?>VolumeOn.svg"
                                                 alt="volum on">
                                            <img class="volume-mute"
                                                 src="<?php echo get_template_directory_uri() . "/assets/images/" ?>VolumeOff.svg"
                                                 alt="VolumeOff">
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        <?php
                        $counter++;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="services grid-content">
            <div class="services-inner section-inner">
                <?php if ($servicesTitle) :
                    echo $servicesTitle;
                endif;
                if ($servicesCards) :
                    ?>
                    <div class="services-cards">
                        <?php
                        $counter = 1;
                        foreach ($servicesCards as $serviceCard) : ?>
                            <div class="services-card" data-attr="<?php echo $counter ?>">
                                <?php echo $serviceCard['text'] ?>
                            </div>
                        <?php
                        $counter++;
                        endforeach; ?>
                    </div>
                <?php endif;
                if ($servicesList) :
                    ?>

                    <div class="services-list services-card-list">
                        <?php echo $servicesList ?>
                    </div>
                <?php endif; ?>
            </div>
            </div>
        </section>
        <section class="choose grid-content grid-content-full grid-container" style="background-color: #EADFEC;">
            <div class="choose-inner section-inner grid-content">
                <?php if ($chooseTitle) :
                    echo $chooseTitle;
                endif;
                if ($chooseCards) :
                    ?>
                    <div class="choose-cards">
                        <?php foreach ($chooseCards as $chooseCard) : ?>
                            <div class="choose-card">
                                <?php if ($chooseCard['image']) : ?>
                                    <img src="<?php echo $chooseCard['image']['url'] ?>"
                                         alt="<?php echo $chooseCard['image']['alt'] ?>" width="64" height="64">
                                <?php endif;
                                if ($chooseCard['text']):
                                    echo $chooseCard['text'];
                                endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section class="studio grid-content">
            <div class="studio-inner section-inner">
                <?php if ($studioTitle) :
                    echo $studioTitle;
                endif;
                if ($studioPhotos) :
                    ?>
                    <div class="studio-photos">
                        <?php foreach ($studioPhotos as $studioPhoto) : ?>
                            <div class="<?php echo $studioPhoto['size'] ?>">
                                <img src="<?php echo $studioPhoto['image']['url'] ?>"
                                     alt="<?php echo $studioPhoto['image']['alt'] ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            </div>
        </section>
        <section id="review" class="review grid-content-full grid-container" style="background-color: #EADFEC;">
            <div class="review-inner section-inner grid-content">
                <?php if ($reviewTitle) :
                    echo $reviewTitle;
                endif;
                if ($reviewList) :
                    ?>
                    <div class="review-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($reviewList as $review) : ?>
                                <div class="swiper-slide">
                                    <div class="review-card">
                                        <div class="card-wrap">
                                            <?php if ($review['image']) : ?>
                                                <img src="<?php echo $review['image']['url'] ?>"
                                                     alt="<?php echo $review['image']['alt'] ?>" width="56" height="56">
                                            <?php endif;
                                            if ($review['author']):
                                                ?>
                                                <h4><?php echo $review['author'] ?></h4>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($review['quote']) : ?>
                                            <p><?php echo $review['quote'] ?></p>
                                        <?php endif; ?>
                                        <div class="audio-container">
                                            <div class="audio-player"
                                                 data-src="<?php echo $review['file']['url'] ?>">
                                                <div class="play-btn btn">
                                                    <img class="play"
                                                         src="<?php echo get_template_directory_uri() . "/assets/images/" ?>Play.svg"
                                                         alt="play">
                                                    <img class="pause"
                                                         src="<?php echo get_template_directory_uri() . "/assets/images/" ?>PauseCircle.svg"
                                                         alt="pause">
                                                </div>
                                                <div class="time-display">
                                                    <span class="current-time">0:00</span>
                                                    <span class="slash">/</span>
                                                    <span class="total-time">0:00</span>
                                                </div>
                                                <div class="audio"></div>
                                                <div class="mute-btn btn">
                                                    <img class="volume-up"
                                                         src="<?php echo get_template_directory_uri() . "/assets/images/" ?>VolumeOn.svg"
                                                         alt="volum on">
                                                    <img class="volume-mute"
                                                         src="<?php echo get_template_directory_uri() . "/assets/images/" ?>VolumeOff.svg"
                                                         alt="VolumeOff">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (count($reviewList) > 1) : ?>
                            <div class="review-swiper-pagination"></div>

                            <div class="swiper-button-prev review-arrow-prev">
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>
                            <div class="swiper-button-next review-arrow-next">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
        </section>
        <section id="contact" class="contact grid-content">
            <div class="contact-inner section-inner">
                <div class="contact-wrap">
                    <?php if ($contactTitle) :
                        echo $contactTitle;
                    endif;
                    ?>
                    <?php if ($contactPhone || $contactEmail) : ?>
                        <address>
                            <?php if ($contactPhone) : ?>
                                <div class="adress-wrap">
                                    <i class="fa-solid fa-phone-volume"></i><a
                                            href="<?php echo $contactPhone['url'] ?>"><?php echo $contactPhone['title'] ?></a>
                                </div>
                            <?php endif;
                            if ($contactEmail) :
                                ?>
                                <div class="adress-wrap">
                                    <i class="fa-regular fa-envelope"></i><a
                                            href="mailto:<?php echo $contactEmail ?>"><?php echo $contactEmail ?></a><br/>
                                </div>
                            <?php endif; ?>
                        </address>
                    <?php endif; ?>
                </div>
                <?php if ($contactFormShortcode) :
                    echo do_shortcode($contactFormShortcode);
                endif;
                ?>
            </div>
        </section>
    </main>

<?php
get_footer();