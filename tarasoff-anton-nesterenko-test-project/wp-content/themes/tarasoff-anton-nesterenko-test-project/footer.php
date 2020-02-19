<footer class="footer-section">
    <div class="container">
					<?php
					wp_nav_menu( [
						'theme_location'  => 'footer-menu',
						'container'       => false, 
						'menu_class'      => 'navbar-list', 
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
					] );
					?>
      <p class="footer-copyright">Anton Nesterenko. 2020. All rights reserved.</p>
    </div>
	</footer>
	<?php
	wp_footer();
	?>
</body>
</html>