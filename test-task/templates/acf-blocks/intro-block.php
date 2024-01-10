<?php

$fields = get_fields();
$section = $fields['intro'];

?>
<section class="intro__block <?php echo $section['section_type'] ?>">
    <?php if ($section['section_type'] === 'main') :
        echo '<div class="container-intro"><div class="intro__main-conteiner">';
    endif; ?>
    <div class="container <?php echo $section['container_type'] ?>">
        <div class="intro__block-container">
            <div class="intro__block-text">
                <div class="text__inner <?php
                echo $section['content_type']; ?>">
                    <?php
                    if ($section['text']) :
                        ?>
                        <?php echo $section['text'] ?>
                    <?php
                    endif;
                    ?>
                </div>
                <?php
                if ($section['link']):
                    ?>
                    <a href="<?php echo $section['link']['url'] ?>"
                       class="btn btn--pink btn--lg btn--with-arrow">
                        <?php echo $section['link']['title'] ?>
                    </a>
                <?php
                endif;
                ?>
            </div>
            <?php if ($section['image']) : ?>
                <div class="intro__block-img">
                    <img src="<?php echo $section['image']['url'] ?>"
                         alt="<?php echo $section['image']['alt'] ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($section['section_type'] === 'main') :
        echo '</div></div>';
    endif; ?>
</section>