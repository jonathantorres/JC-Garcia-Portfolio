	  		<?php get_header(); ?>
	  		
	  		<?php 
		  		$all_posts = array();
		  		$has_posts = true;
		  		
		  		//Get WP Posts
		  		if (have_posts()) : while (have_posts()) : the_post();
		  		
		  			//The first category of the post
		  			$categories = get_the_category(get_the_id());
		  			$category = $categories[0]->cat_name;
		  				
		  			$all_posts[(get_the_time('U'))]['id'] = get_the_id();
		  			$all_posts[(get_the_time('U'))]['title'] = get_the_title();
		  			
		  			//Need to make a switch for everything else : instagram, flickr etc ect
		  			if ($category == 'Portfolio') {
			  			$all_posts[(get_the_time('U'))]['type'] = 'portfolio';
			  			$all_posts[(get_the_time('U'))]['catname'] = 'portfolio';
		  			} else {
			  			$all_posts[(get_the_time('U'))]['type'] = 'wp';
			  			$all_posts[(get_the_time('U'))]['catname'] = 'post';
		  			}
		  			
		  			$all_posts[(get_the_time('U'))]['permalink'] = get_permalink();
		  			$all_posts[(get_the_time('U'))]['thumb'] = '/img/post_image.jpg';
		  			$all_posts[(get_the_time('U'))]['excerpt'] = get_the_excerpt();
		  			$all_posts[(get_the_time('U'))]['date'] = get_the_time('F, j, Y');
		  			
		  		endwhile; else:
		  			$has_posts = false;
		  		endif;
		  		
	  		?>
	  		
	  		<ul id="all_posts">
		  		<?php if ($has_posts) : foreach($all_posts as $post => $the_post) :  ?>
		  			<li class="square <?php echo $the_post['type']; ?>">
		  				<a href="<?php echo $the_post['permalink']; ?>">
			  				<div class="rollover">
								<span class="over_img <?php echo $the_post['type']; ?>"></span>
								<p class="post_date"><?php echo $the_post['date']; ?></p>
							</div>
							
							<div class="img_holder">
		  						<img src="<?php bloginfo('template_url'); echo $the_post['thumb']; ?>" alt="Post">
		  					</div>
						</a>
		  				<h3><a href="<?php echo $the_post['permalink']; ?>"><?php echo $the_post['title']; ?></a></h3>
		  				<p><?php echo $the_post['excerpt']; ?></p>
		  				<span class="post_type <?php echo $the_post['type']; ?>"><?php echo $the_post['catname']; ?></span>
		  			</li>
		  		<?php endforeach; else: ?>
	  				<p>No posts to display</p>
	  			<?php endif; ?>
	  		</ul><!-- #all_posts -->
	  		
	  		<?php get_footer(); ?>