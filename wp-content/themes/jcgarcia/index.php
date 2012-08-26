	  		<?php get_header(); ?>
	  		
	  		<ul id="all_posts">
		  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		  			<?php 
		  				//The first category of the post
		  				$categories = get_the_category(get_the_id());
		  				$category = $categories[0]->cat_name;
		  				$postClass;
		  				$postName;
		  				
		  				//Need to make a switch for everything else : instagram, flickr etc ect
		  				if ($category == 'Portfolio') {
			  				$postClass = 'portfolio';
			  				$postName = 'portfolio';
		  				} else {
			  				$postClass = 'wp';
			  				$postName = 'post';
		  				}
		  			?>
		  			<li class="square <?php echo $postClass; ?>">
		  				<a href="<?php the_permalink(); ?>">
			  				<div class="rollover">
								<span class="over_img <?php echo $postClass; ?>"></span>
								<p class="post_date"><?php the_time('F, j, Y'); ?></p>
							</div>
							
							<div class="img_holder">
								<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('post-thumb'); else : ?>
		  							<img src="<?php bloginfo('template_url'); ?>/img/post_image.jpg" alt="Post">
		  						<?php endif; ?>
		  					</div>
						</a>
		  				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		  				<?php if ($category != 'Portfolio') the_excerpt(); ?>
		  				<span class="post_type <?php echo $postClass; ?>"><?php echo $postName; ?></span>
		  			</li>
		  		<?php endwhile; else: ?>
	  				<p>No posts to display</p>
	  			<?php endif; ?>
	  		</ul><!-- #all_posts -->
	  		
	  		<?php get_footer(); ?>