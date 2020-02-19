<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
	<title>Tarasoff Anton Nesterenko test-project</title>
	<?php
	wp_head();
	?>
</head>
<body>
  <header class="header-section">
    <div class="container">
      <nav class="navbar">
        <a href="#" class="navbar-logo">
          <?php
					the_custom_logo();
					?>
				</a>
					<?php
					wp_nav_menu( [
						'theme_location'  => 'header-menu',
						'container'       => false, 
						'menu_class'      => 'navbar-list', 
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
					] );
					?>
      </nav>
    </div>
  </header>
  <main class="main">
    <div class="container">
      
     