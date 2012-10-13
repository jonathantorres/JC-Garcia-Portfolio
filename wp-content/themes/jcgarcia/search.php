	  		<?php get_header(); ?>
	  		
	  		<div id="all_posts">
	  			<a href="#top" id="back_to_top">Subir</a>
		  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		  			<?php get_template_part('loop'); ?>
		  		<?php endwhile; else: ?>
	  				<p>No posts to display</p>
	  			<?php endif; ?>
	  		</div><!-- #all_posts -->
	  		
	  		<div class="posts_navigation" style="display: none">
	  			<?php posts_nav_link(); ?>
	  		</div>
	  		
	  		<?php get_footer(); ?>