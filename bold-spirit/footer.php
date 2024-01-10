<?php
use ThemeOptions\Helpers;

$fields = get_fields('options');

?>
<footer class="footer">
    <div class="footer-divider"></div>
    <div class="container">
        <div class="footer-block">
            <?php if (Helpers::get($fields, 'footer.menu')) : ?>
            <ul class="footer-menu">
                <?php foreach (Helpers::get($fields, 'footer.menu') as $menu_item) : ?>
                <li class="footer-menu__item">
                    <a href="<?php echo $menu_item['link']['url']?>"><?php echo $menu_item['link']['title']?></a>
                </li>
                <?php endforeach;?>
            </ul>
            <?php endif;
            if(Helpers::get($fields, 'footer.logo')) : ?>
            <a href="<?php echo home_url();?>" class="footer-logo">
                <img width="322px" height="36px" src="<?php echo Helpers::get($fields, 'footer.logo')?>" alt="logo">
            </a>
            <?php endif;
            if(Helpers::get($fields, 'footer.copyright')) :
            ?>
            <p class="footer-copyright"><?php echo Helpers::get($fields, 'footer.copyright')?></p>
            <?php endif;?>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
<script id="scaleScript">
    document.addEventListener('DOMContentLoaded', function () {
        ((/*Sections zoom*/) => {
            function setup(el)
            {
                var windowWidth = Math.min.apply(null, [window.innerWidth, window.outerWidth]),
                    zoom = windowWidth / 1920,
                    zoomTablet = windowWidth / 768,
                    zoomSmall = windowWidth / 430
                if (windowWidth < 1920 && windowWidth > 1024) {
                    el.style.zoom = `${zoom}`;
                } else if (windowWidth <= 1024 && windowWidth > 768) {
                    el.style.zoom = `${zoomTablet}`;
                } else if (windowWidth <= 768) {
                    el.style.zoom = `${zoomSmall}`;
                } else {
                    el.removeAttribute('style');
                }
            }


            function zooming(selectors)
            {
                console.log('resize')
                selectors.forEach(function (el) {
                    setup(document.querySelector(el))
                })
            }

            var selectors = ['body']
            zooming(selectors)
            window.addEventListener('resize', function () {
                zooming(selectors)
            });
        })();
    });
</script>
</body>
</html>

