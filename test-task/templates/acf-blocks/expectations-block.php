<?php
$fields = get_fields();
$section = $fields['expectations'];
?>
<section class="expectations-block">
    <div class="container section__container">
        <div class="expectations-block-container">
            <?php if ($section['title']) : ?>
                <?php echo $section['title'] ?>
            <?php endif;
            if ($section['tabs']) :
                ?>
                <div class="tabs">
                    <div class="tab__triggers">
                        <ul id="js-tabs__nav" class="tabs__nav">
                            <?php

                            $navCounter = 1;
                            foreach ($section['tabs'] as $tab) :
                                ?>
                                <li>
                                    <p data-tab="<?php echo '#tab' . $navCounter ?>"><?php echo $tab['navigation_title'] ?></p>
                                </li>
                                <?php
                                $navCounter++;
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="js-tabs__content tabs__content">
                        <?php
                        $tabCounter = 1;
                        foreach ($section['tabs'] as $tab) :
                            ?>
                            <div id="<?php echo 'tab' . $tabCounter ?>" class="js-tab__content-box tab__content-box">
                                <div class="tab__content-desc">
                                    <?php if ($tab['content_text']) : ?>
                                        <div class="tab__content-text">
                                            <?php echo $tab['content_text'];
                                            if ($tab['content_link']) :
                                                ?>
                                                <a href="<?php echo $tab['content_link']['url'] ?>"
                                                   class="btn read_more_link-yellow">
                                                    <?php echo $tab['content_link']['title'] ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?php echo $tab['main_link']['url'] ?>"
                                       class="btn btn--lg btn--pink btn--with-arrow">
                                        <?php echo $tab['main_link']['title'] ?>
                                    </a>
                                </div>
                                <?php if ($tab['content_image']) : ?>
                                    <div class="tab__content-image">
                                        <img src="<?php echo $tab['content_image']['url'] ?>"
                                             alt="<?php echo $tab['content_image']['alt'] ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                            $tabCounter++;
                        endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>