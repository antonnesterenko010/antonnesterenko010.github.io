<?php
use ThemeOptions\Helpers;

$fields = get_fields('options');

?>
<footer class="footer">
    <div class="footer-top footer-block">
        <div class="footer-col">
            <?php if(Helpers::get($fields, 'footer.label_first')) : ?>
            <span class="footer-top__label">
                <?php echo Helpers::get($fields, 'footer.label_first')?>
            </span>
            <?php endif;
            if(Helpers::get($fields, 'footer.link_first')) : ?>
            <a href="<?php echo Helpers::get($fields, 'footer.link_first.url')?>" class="footer-top__link">
                <?php echo Helpers::get($fields, 'footer.link_first.title')?>
            </a>
            <?php endif;?>
        </div>
        <div class="footer-col">
            <?php if(Helpers::get($fields, 'footer.label_second')) : ?>
                <span class="footer-top__label">
                    <?php echo Helpers::get($fields, 'footer.label_second')?>
                </span>
            <?php endif;
            if(Helpers::get($fields, 'footer.link_second')) : ?>
                <a href="<?php echo Helpers::get($fields, 'footer.link_second.url')?>" class="footer-top__link">
                    <?php echo Helpers::get($fields, 'footer.link_second.title')?>
                </a>
            <?php endif;?>
        </div>
        <div class="footer-col">
            <?php if(Helpers::get($fields, 'footer.label_third')) : ?>
                <span class="footer-top__label">
                    <?php echo Helpers::get($fields, 'footer.label_third')?>
                </span>
            <?php endif;
            if(Helpers::get($fields, 'footer.link_third')) : ?>
                <a href="<?php echo Helpers::get($fields, 'footer.link_third.url')?>" class="footer-top__link">
                    <?php echo Helpers::get($fields, 'footer.link_third.title')?>
                </a>
            <?php endif;?>
        </div>
    </div>
    <div class="footer-bottom footer-block">
        <div class="footer-col">
            <?php if(Helpers::get($fields, 'footer.copyright')) : ?>
            <div class="footer-bottom__text">
                <?php echo Helpers::get($fields, 'footer.copyright') ?>
            </div>
            <?php endif;?>
        </div>
        <div class="footer-col">
            <?php if(Helpers::get($fields, 'footer.central_text_left')) : ?>
            <div class="footer-bottom__text"><?php echo Helpers::get($fields, 'footer.central_text_left')?></div>
            <?php endif;
            if (Helpers::get($fields, 'footer.central_text_right')) : ?>
            <div class="footer-bottom__text"><?php echo Helpers::get($fields, 'footer.central_text_right')?></div>
            <?php endif;?>
        </div>
        <div class="footer-col">
            <?php if(Helpers::get($fields, 'footer.right_text_left.title')) : ?>
                <a href="<?php echo Helpers::get($fields, 'footer.right_text_left.url')?>" class="footer-bottom__text"><?php echo Helpers::get($fields, 'footer.right_text_left.title')?></a>
            <?php endif;
            if (Helpers::get($fields, 'footer.right_text_right.title')) : ?>
                <a href="<?php echo Helpers::get($fields, 'footer.right_text_right.url')?>" class="footer-bottom__text"><?php echo Helpers::get($fields, 'footer.right_text_right.title')?></a>
            <?php endif;?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
