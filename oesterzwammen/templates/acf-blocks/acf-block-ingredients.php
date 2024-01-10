<?php
$fields = get_fields();

use ThemeOptions\Helpers;

?>

<section class="ingredients-block">
	<div class="wrapper">
		<div class="left">
			<h2 class="title"><?php echo Helpers::get( $fields, 'left_title' ); ?></h2>
			<ul class="table-list">
				<?php if (Helpers::get( $fields, 'left_table_title' )): ?>
					<li class="list-item"><?php echo Helpers::get( $fields, 'left_table_title' ); ?></li>
				<?php endif; ?>
				<?php if(Helpers::get( $fields, 'left_table' )) {
					foreach (Helpers::get( $fields, 'left_table' ) as $item) {
						$additional_indent = $item['additional_indent'] ? 'additional-indent' : '';
						?>
						<li class="list-item <?php echo $additional_indent; ?>">
							<p><?php echo $item['name']; ?></p>
							<p class="quantity"><?php echo $item['quantity']; ?></p>
						</li>
					<?php }
				} ?>
			</ul>
		</div>
		<div class="right">
			<h2 class="title"><?php echo Helpers::get( $fields, 'right_title' ); ?></h2>
			<ul class="table-list">
				<?php if (Helpers::get( $fields, 'right_table_title' )): ?>
					<li class="list-item"><?php echo Helpers::get( $fields, 'right_table_title' ); ?></li>
				<?php endif; ?>
				<?php if(Helpers::get( $fields, 'right_table' )) {
					foreach (Helpers::get( $fields, 'right_table' ) as $item) {
						$additional_indent = $item['additional_indent'] ? 'additional-indent' : '';
						?>
						<li class="list-item <?php echo $additional_indent; ?>"><?php echo $item['name']; ?></li>
					<?php }
				} ?>
			</ul>
		</div>
	</div>
</section>
