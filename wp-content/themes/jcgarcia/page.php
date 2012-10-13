			<?php get_header(); ?>
			
	  		<div class="single">
	  			<a href="#top" id="back_to_top">Subir</a>
	  			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  				<h1 class="post_title"><?php the_title(); ?></h1>
		  			<div class="post_meta"></div>
	  				<?php the_content(); ?>
	  			<?php endwhile; endif; ?>
	  		</div><!-- .single -->
	  		
	  		<?php get_sidebar(); ?>
	  		
	  		<?php get_footer(); ?>