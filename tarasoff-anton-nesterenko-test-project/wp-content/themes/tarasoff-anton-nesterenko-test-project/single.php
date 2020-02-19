<?php
get_header();
?>
<div class="container">
	<h1 class="title-name">
		
	<?php
	the_title();
	?>
	
	</h1>
	<div class="post__thumbnail">
		
	<?php
	the_post_thumbnail('video-thumb');
	?>
	</div>
	<?php
	the_content();
	?>
	<?php
	if(get_field('genre')){
	echo '<p class="post__genre" >Жанр киноленты: ' . get_field('genre') . '</p>';
}
	?>
	
	<?php
	if(get_field('premiere')){
	echo '<p class="post__premiere" >Дата премьеры: ' . get_field('premiere') . '</p>';
}
	?>
</div>
<?php
get_footer();
?>
