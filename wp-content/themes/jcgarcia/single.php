			<?php get_header(); ?>
			
	  		<div class="single">
	  			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  				<?php
  						//The first category of the post
  						$categories = get_the_category(get_the_id());
  						$category = $categories[0]->cat_name;
  					?>
	  				<h1 class="post_title"><?php the_title(); ?></h1>
		  			<div class="post_meta">
		  				<span class="is_post"><?php the_time('F j, Y'); ?></span>
		  				<span class="post_category"><span>Categoria:</span> <?php echo $category; ?> </span>
		  				<span class="post_comments"><span>Comentarios:</span> <?php comments_number('0', '1', '%'); ?></span>
		  			</div>
	  				<?php the_content(); ?>
	  			<?php endwhile; endif; ?>
				
				<div class="social_sharing"></div>
				
				<?php comments_template(); ?>
				
	  		</div><!-- .single -->
	  		
	  		<?php get_sidebar(); ?>
	  		
	  		<?php get_footer(); ?>