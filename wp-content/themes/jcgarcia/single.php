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
		  				<span class="is_post">
			  				<?php if ($category == 'Portfolio') : ?>
			  					Portfolio
							<?php else : ?>
	  							Post
	  						<?php endif; ?>
		  				</span>
		  				<span class="post_category"><span>Categoria:</span> <?php echo $category; ?> </span>
		  				<span class="post_comments"><span>Comentarios:</span> <?php comments_number('0', '1', '%'); ?></span>
		  			</div>
	  				<?php the_content(); ?>
	  			<?php endwhile; endif; ?>
				
				<div class="social_sharing">
					<div class="twitter_btns">
	  					<a href="https://twitter.com/share" class="twitter-share-button" data-via="memoplus">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
						</script>
	  				</div><!-- .twitter_btns -->
					<div class="facebook_likes">
						<div class="fb-like" data-href="https://www.facebook.com/juancarlosangustia" data-send="false" data-width="300" data-show-faces="false"></div>
					</div><!-- .facebook_likes -->
				</div><!-- .social_sharing -->
				
				<?php comments_template(); ?>
				
	  		</div><!-- .single -->
	  		
	  		<?php get_sidebar(); ?>
	  		
	  		<?php get_footer(); ?>