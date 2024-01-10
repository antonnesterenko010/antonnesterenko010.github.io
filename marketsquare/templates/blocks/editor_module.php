<?php

$textColor = get_sub_field('text_color');
$shareBlock = get_field('share_block', 'option');
$shareTitle = $shareBlock['share_title'];
$shareDesc = $shareBlock['share_desc'];
$content = get_sub_field('editor');
$contentWidth = get_sub_field('content_width');
$shareArticles = get_sub_field('share_article');

global $post;

$permalink = isset($post->ID) ? get_permalink($post->ID) : '';
$title = isset($post->ID) ? get_the_title($post->ID) : '';
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&amp;title=' . $title;
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
$twitterURL = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $permalink . '&amp;via=wpvkp';
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();

?>

<section class="editor__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="editor__wrapper" <?php echo $contentWidth === 'full' ? 'style="padding:0"' : '' ?>>
            <div class="editor__content <?php echo $textColor == 1 ? 'white' : '' ?>">
                <?php echo $content ? $content : '' ?>
                <?php if ($shareArticles) : ?>
                    <div class="editor__share">
                        <h3 class="editor__share-title"><?php echo $shareTitle ? $shareTitle : '' ?></h3>
                        <div class="editor__share-content">
                            <p class="editor__share-desc"><?php echo $shareDesc ? $shareDesc : '' ?></p>
                            <ul class="editor__share-list">
                                <li><a target="_blank" class="editor__share-item" href="<?php echo $linkedInURL ?>">Linkedin</a></li>
                                <li><a target="_blank" class="editor__share-item" href="<?php echo $facebookURL ?>">Facebook</a></li>
                                <li><a target="_blank" class="editor__share-item" href="<?php echo $twitterURL ?>">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
