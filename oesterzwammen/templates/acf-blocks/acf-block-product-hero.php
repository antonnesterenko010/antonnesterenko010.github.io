<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$subtitle_decoration = '';

if (Helpers::get( $fields, 'subtitle_decoration' )) {
	$subtitle_decoration = 'decoration';
}

?>
<section class="product-hero-block">
	<div class="wrapper">
		<div class="info">
			<?php if ( Helpers::get( $fields, 'title_type' ) == 'Text' ): ?>
				<h1 class="title">
					<?php echo Helpers::get( $fields, 'text_title' ); ?>
				</h1>
			<?php elseif ( Helpers::get( $fields, 'title_type' ) == 'Image' ): ?>
				<div class="title-image"><?php echo wp_get_attachment_image( Helpers::get( $fields, 'image_title' ), 'full' ); ?></div>
			<?php endif; ?>
			<div class="subtitle-wrapper <?php echo $subtitle_decoration; ?>">
				<p class="subtitle"><?php echo Helpers::get( $fields, 'subtitle' ); ?></p>
			</div>
		</div>
		<div class="image">
			<?php echo wp_get_attachment_image( Helpers::get( $fields, 'image' ), 'full' ); ?>
		</div>
	</div>
</section>
