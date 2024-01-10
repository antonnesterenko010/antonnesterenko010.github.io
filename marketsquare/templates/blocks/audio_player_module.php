<?php
$textColor = get_sub_field('text_color');
$fileUrl = get_sub_field('audio_file');
$title = get_sub_field('title');
$bgColor = get_sub_field('background_color');
$mgTop = get_sub_field('margin_top') ? 'margin-top:' . get_sub_field('margin_top') . 'px;' : '';
$mgBottom = get_sub_field('margin_bottom') ? 'margin-bottom:' . get_sub_field('margin_bottom') . 'px;' : '';
?>

<div id="player" class="just-stay" style="<?php echo $mgBottom . $mgTop ?>">
    <div class="container-fluid max-width">
        <div class="<?php echo $textColor == 1 ? 'white' : 'black' ?>" id="controls" style="--audio-bg: <?php echo $bgColor; ?>">
            <h2><?php echo $title; ?></h2>
            <div class="lecteur">
                <audio id="music" class="fc-media">
                    <source src="<?php echo $fileUrl; ?>" type="audio/mpeg">
                </audio>
            </div>
        </div>
    </div>
</div>