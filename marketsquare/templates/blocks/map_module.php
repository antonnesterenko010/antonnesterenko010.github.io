<?php
$textColor = get_sub_field('text_color');
$address = get_sub_field('address');
$contacts = get_sub_field('contacts');
$socials = get_sub_field('socials');
$googleLink = get_field('google_link', 'option');
$offset = get_sub_field('offset');
?>

<section class="map__module <?php echo $offset ? 'offset-top' : '' ?>">
    <div class="container-fluid max-width relative">
        <div class="map__module__container <?php echo $textColor == 1 ? 'white' : '' ?>">
            <div class="map__info">
                <?php if ($contacts): ?>
                    <div class="map__info__contacts">
                        <?php foreach ($contacts as $item): ?>
                            <div class="map__info__contacts__item">
                                <h3><?php echo $item['title'] ?></h3>
                                <?php if ($item['items']): ?>
                                    <?php foreach ($item['items'] as $val):
                                        $link = $val['tel'] ? 'tel:' : 'mailto:'; ?>
                                        <?php if ($val['label']): ?>
                                        <span><?php echo $val['label']; ?></span>
                                    <?php endif; ?>
                                        <a href="<?php echo $link . $val['value'] ?>">
                                            <?php echo $val['value'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="map__info__additional">
                    <div class="map__info__additional__address">
                        <h3><?php echo $address['title'] ?></h3>
                        <p><?php echo $address['value'] ?></p>
                        <a target="_blank" href="<?php echo $googleLink ?: '' ?>" class="map__viagoogle link-arrow">
                            <?php echo $address['map_title']; ?>
                            <div class="arrow-stick">
                                <svg width="33" height="10" viewBox="0 0 33 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M28 1L32 5L28 9" stroke="#151515" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="map__info__additional__socials">
                        <?php if ($socials): ?>
                            <?php foreach ($socials as $item): ?>
                                <h3><?php echo $item['title'] ?></h3>
                                <div class="map__info__additional__socials__items">
                                    <?php if ($item['items']): ?>
                                        <?php foreach ($item['items'] as $link): ?>
                                            <a target="_blank" href="<?php echo $link['link'] ?: '' ?>">
                                                <?php echo $link['title']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="map" data-lat="55.6840809" data-lng="12.5875571" class="map__wrapper">
            </div>
        </div>
    </div>
</section>
