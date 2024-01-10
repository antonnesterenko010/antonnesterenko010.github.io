<?php
$footerContact = get_field('contact', 'option');
$footerContactTitle = $footerContact['contact_title'];
$footerContactItems = $footerContact['contact_items'];
$footerAddress = get_field('address', 'option');
$footerImage = get_field('footer_image', 'option');
$footerImg = $footerImage['footer_img'];
$footerImgWebp = $footerImage['footer_img_webp'];
$footerAddressTitle = $footerAddress['footer_address_title'];
$footerAddressDesc = $footerAddress['footer_address_desc'];
$footerAddressLinkTitle = $footerAddress['footer_address_link_title'];
$footerNavigation = get_field('footer_navigation', 'option');
$footerRights = get_field('footer_rights', 'option');
$footerRightsLink = get_field('footer_rights_link', 'option');
$footerCookies = get_field('footer_cookies', 'option');
$footerCookiesLink = get_field('footer_cookies_link', 'option');
$footerSocial = get_field('footer_social', 'option');
$socialTitle = get_field('social_links_title', 'option');
$logoRotate = get_field('logo', 'option');
$googleLink = get_field('google_link', 'option');
$marketSquare = __('Marketsquare', 'marketsquare');
?>

<footer class="site-footer redesign">
    <div class="container-fluid max-width">
        <div class="footer-wrapper">

            <a href="<?php echo home_url() ?>" class="footer__img-wrapper">
                <?php
                $image = $footerImg['sizes']['footer-img'];
                $imageWeb = $footerImgWebp['sizes']['footer-img'];
                ?>
                <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
            </a>

            <div class="footer__contact-wrapper">
                <h3 class="msq-body footer__contact-title">
                    <?php echo $footerContactTitle; ?>
                </h3>
                <div class="footer__contact-items">
                    <?php foreach ($footerContactItems as $footerContactItem) : ?>
                        <?php if ($footerContactItem['contact_item_link']): ?>
                            <div class="footer__contact-items__repeater">
                                <?php foreach ($footerContactItem['contact_item_link'] as $item):
                                    $link = $item['tel'] ? 'tel:' : 'mailto:'; ?>

                                <div class="repeater__wrapper">
                                    <?php if ($item['label']): ?>
                                    <span class="msq-body"><?php echo $item['label'] ?></span>
                                <?php endif; ?>
                                    <a class="msq-body" href="<?php echo $link . $item['item'] ?>"><?php echo $item['item'] ?></a>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="footer__address-wrapper">
                <h3 class="msq-body footer__address_title"><?php echo $footerAddressTitle ?></h3>
                <div class="footer__address-items">
                    <p class="footer__address_desc msq-body"><?php echo $footerAddressDesc ?></p>
                    <a target="_blank" class="map_footer msq-body link-arrow" href="<?php echo $googleLink ? $googleLink : '' ?>"><?php echo $footerAddressLinkTitle ?>
                        <?php get_template_part_var('templates/parts/arrow-white'); ?>
                    </a>
                </div>
            </div>

            <div class="footer__social-wrapper">
                <h3 class="msq-body"><?php echo $socialTitle ?></h3>
                <div class="footer__social__wrapper">
                    <?php foreach ($footerSocial as $social) : ?>
                        <a class="msq-body" href="<?php echo $social['social_link'] ?>"><?php echo $social['social_title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="footer__menu-wrapper">
                <h3 class="msq-body"><?php echo $footerNavigation?></h3>
                <div class="footer__menu__list">
                    <?php footerMenuLeft();?>
                    <?php footerMenuRight();?>
                </div>
            </div>
            <div class="footer__info-wrapper">

                <div class="footer__rights-wrapper">
                    <span class="msq-body__small footer__rights">
                        <?php echo '&copy;' . ' ' . $marketSquare . ' ' . date("Y") ?>
                    </span>
                </div>
                <div class="footer__pages-wrapper">
                    <a href="<?php echo get_permalink($footerCookiesLink) ?>" class="msq-body__small footer__rights">
                        <?php echo $footerCookies ?>
                    </a>
                    <a href="<?php echo get_permalink($footerRightsLink) ?>" class="msq-body__small footer__rights">
                        <?php echo $footerRights ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- #colophon -->
<!-- #page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
