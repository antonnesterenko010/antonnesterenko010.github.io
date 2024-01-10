<?php
$fields = get_fields();

use ThemeOptions\Helpers;
?>

<section class="about-product-block">
	<div class="wrapper">
		<div class="image">
			<?php echo wp_get_attachment_image( Helpers::get( $fields, 'image' ), 'full' ); ?>
		</div>
		<div class="info">
			<h2 class="title"><?php echo Helpers::get( $fields, 'title' ); ?></h2>
			<div class="text">
				<?php echo Helpers::get( $fields, 'text' ); ?>
			</div>
		</div>
	</div>
</section>
