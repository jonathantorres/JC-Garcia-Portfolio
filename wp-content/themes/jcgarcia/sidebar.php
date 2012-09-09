			<div id="all_posts" class="sidebar">
	  			<?php $query = new WP_Query('posts_per_page=6&cat=-6'); ?>
	  			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
		  			<?php get_template_part('loop'); ?>
		  		<?php endwhile; else: ?>
	  				<p>No posts to display</p>
	  			<?php endif; ?>
	  		</div><!-- #all_posts -->