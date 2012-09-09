	  		<?php get_header(); ?>
	  		
	  		<div id="all_posts">
		  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		  			<?php get_template_part('loop'); ?>
		  		<?php endwhile; else: ?>
	  				<p>No posts to display</p>
	  			<?php endif; ?>
	  		</div><!-- #all_posts -->
	  		
	  		<div class="posts_navigation">
	  			<?php posts_nav_link(); ?>
	  		</div>
	  		
	  		<?php get_footer(); ?>