<?php
$options = get_fields('options');

$logo = $options['footer']['logo'];
$menuLists = $options['footer']['menu_lists'];
$copyright = $options['footer']['copyright_text'];
$policyLinks = $options['footer']['policy_links'];
$developedLink = $options['footer']['developed_link'];
$developedLogo = $options['footer']['developed_logo'];


$socialItem = $options['global']['social_item'];
$socialFacebookLink = $options['global']['social_item']['facebook'];
$socialLinkedinLink = $options['global']['social_item']['linkedin'];
$socialTwitterLink = $options['global']['social_item']['twitter'];
$phone = $options['global']['phone'];
$email = $options['global']['email'];
?>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer__top-wrapper">

            <div class="logo-footer__wrapper">
                <?php if ($logo) : ?>
                <a href="<?php echo home_url();?>" class="logo-footer">
                    <img src="<?php echo $logo['url']?>" alt="<?php echo $logo['alt']?>" />
                </a>
                <?php endif;?>
                <div class="social-contacts__social">
                    <?php if ($socialFacebookLink) : ?>
                        <a href="<?php echo $socialFacebookLink['url']?>" class="btn btn--icon btn--icon--fb"></a>
                    <?php endif;
                    if ($socialLinkedinLink) :
                        ?>
                        <a href="<?php echo $socialLinkedinLink['url']?>" class="btn btn--icon btn--icon--in"></a>
                    <?php endif;
                    if ($socialTwitterLink) :
                        ?>
                        <a href="<?php echo $socialTwitterLink['url']?>" class="btn btn--icon btn--icon--twi"></a>
                    <?php endif;?>
                </div>
            </div>

            <div class="footer-navigation">
                <div class="footer-navigation__menu">
                    <?php foreach ($menuLists as $item) : ?>
                    <div
                        class="footer-navigation__list small-body accordionBlock js-accordion-block-mobile-only"
                    >
                        <?php if ($item['menu_title']) : ?>
                        <div class="accordionTitle">
                            <h4><?php echo $item['menu_title']?></h4>
                        </div>
                        <?php endif;
                        if ($item['menu_links']) :
                        ?>
                        <div class="accordionContent js-accordion-content-mobile-only">
                            <?php foreach($item['menu_links'] as $menuItem) :  ?>
                            <a href="<?php echo $menuItem['link']['url']?>">
                                <?php echo $menuItem['link']['title']?>
                            </a>
                            <?php endforeach;?>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="social-contacts social-contacts__wrapper">
                    <div class="social-contacts__social">

                        <?php if ($socialFacebookLink) : ?>
                            <a href="<?php echo $socialFacebookLink['url']?>" class="btn btn--icon btn--icon--fb"></a>
                        <?php endif;
                        if ($socialLinkedinLink) :
                            ?>
                            <a href="<?php echo $socialLinkedinLink['url']?>" class="btn btn--icon btn--icon--in"></a>
                        <?php endif;
                        if ($socialTwitterLink) :
                            ?>
                            <a href="<?php echo $socialTwitterLink['url']?>" class="btn btn--icon btn--icon--twi"></a>
                        <?php endif;?>
                    </div>
                    <div class="social-contacts__contacts small-body">
                        <?php if ($phone) : ?>
                            <a href="<?php echo $phone['url']?>">
                                <p><?php echo $phone['title']?></p>
                            </a>
                        <?php endif;
                        if ($email) :
                            ?>
                            <a href="<?php echo $email['url']?>">
                                <p><?php echo $email['title']?></p>
                            </a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__social-contacts">
            <div class="divider"></div>
            <div class="footer__policy small-body">
                <div>
                    <?php if ($copyright) : ?>
                    <p><?php echo $copyright ?></p>
                    <?php endif;
                    if ($policyLinks) :
                    ?>
                    <div class="policy_link">
                        <?php foreach ($policyLinks as $item) : ?>
                            <a href="<?php echo $item['link']['url']?>">
                                <p><?php echo $item['link']['title']?></p>
                            </a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
                <?php if ($developedLogo || $developedLink) : ?>
                <div class="policy_developed">
                    <?php if ($developedLink) : ?>
                    <p><?php echo $developedLink['title']?></p>
                    <?php endif;
                    if ($developedLogo) :
                    ?>
                    <a href="<?php echo $developedLink['url']?>" class="logo-developed">
                        <img src="<?php echo $developedLogo['url']?>" width="104px" alt="<?php echo $developedLogo['alt']?>" />
                    </a>
                    <?php endif;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>