 <?php
 get_header();
 ?>
 <section class="post-section">
        <ul class="post-list">
         <?php
				 // параметры по умолчанию
					$posts = get_posts( array(
						'numberposts' => 5,
						'post_type'   => 'post',
						'order' => 'ASC'
					) );

					foreach( $posts as $post ){
						setup_postdata($post);
						?>
						<li class="post-list__item">
											<a href="<?php
											the_permalink();
											?>">
												<div class="post-list__item__image">
													<?php
													the_post_thumbnail('classic-thumb');
													?>
												</div>
												<p class="post-list__item__name"><?php
												the_title();
												?></p>
												<p class="post-list__item__date">Дата: <?php echo get_the_date(); ?> <?php
												the_time();
												?></p>
												<p class="post-list__item__link">Читать далее</p>
										</a>
									</li>
									<?php 
							// формат вывода the_title() ...
					}

					wp_reset_postdata(); // сброс
									?>
        </ul>
      </section>
    </div>
  </main>
  <?php
	get_footer();
	?>