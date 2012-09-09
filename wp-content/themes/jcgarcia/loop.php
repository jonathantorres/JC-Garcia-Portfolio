					<?php 
		  				//The first category of the post
		  				$categories = get_the_category(get_the_id());
		  				$category = $categories[0]->cat_name;
		  				$postClass;
		  				$postName;
		  				
		  				//Select Post Class : instagram, wp, twitter, flickr.
		  				switch ($category) {
						    case 'Portfolio':
						        $postClass = 'portfolio';
						        $postName = 'portfolio';
						        break;
						    case 'Twitter':
						        $postClass = 'twitter';
						        $postName = 'twitter';
						        break;
						    case 'Instagram':
						        $postClass = 'instagram';
						        $postName = 'instagram';
						        break;
						    case 'Flickr':
						        $postClass = 'flickr';
						        $postName = 'flickr';
						        break;
						    default:
						        $postClass = 'wp';
						        $postName = 'post';
						        break;
						}
		  			?>
		  			
		  			<div class="square <?php echo $postClass; ?>">
		  				<?php if ($category != 'Twitter') : ?>
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
						<?php else : ?>
							<p><?php the_title(); ?></p>
							<h3>Tweet</h3>
						<?php endif; ?>
						
		  				<?php if ($postClass == 'wp') the_excerpt(); ?>
		  				<span class="post_type <?php echo $postClass; ?>"><?php echo $postName; ?></span>
		  			</div>