<?php $thumbnail = isset($thumbnail) && $thumbnail ? $thumbnail : false ?>
<picture class="image__img">
    <source
            srcset="<?php echo $imageWeb ?>"
            sizes="100vw"
            type="image/webp"
    >
    <?php echo $thumbnail ? $image : '<img src="' . $image . '"sizes="100vw">'; ?>
</picture>
