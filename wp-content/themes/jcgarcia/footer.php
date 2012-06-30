		</section><!-- #main_content -->
	  	
  	</div><!-- #mainContainer -->
  	
  	<div class="lightbox"></div><!-- .lightbox -->
  	<div class="contact_container"></div><!-- contact_container -->
  	<div class="contact_form">
		<a id="close_contact" href="#"></a>
		<h1>Contacto</h1>
		<form id="contact_jc" class="comments_form" action="#" method="post">
			<ul>
				<li>
					<label for="username">nombre</label>
					<input type="text" id="username" name="username" placeholder="nombre">
				</li>
				<li>
					<label for="email">e-mail</label>
					<input type="text" id="email" name="email" placeholder="e-mail">
				</li>
				<li>
					<label for="message">mensaje</label>
					<textarea id="message" name="message" placeholder="mensaje"></textarea>
				</li>
				<li>
					<input type="submit" class="gradient dark_button" id="send" name="send" value="Enviar">
				</li>
			</ul>
		</form><!-- #contact_jc -->
		
		<div id="other_contacts">
			<h3>Movil</h3>
			<p>787.667.5748</p>
			
			<h3>Skype</h3>
			<p>jangustia</p>
			
			<h3>Follow me</h3>
			<div class="networks">
				<a href="#"><img src="<?php bloginfo('template_url'); ?>/img/contact_twitter_icon.png"></a>
				<a href="#"><img src="<?php bloginfo('template_url'); ?>/img/contact_flickr_icon.png"></a>
				<a href="#"><img src="<?php bloginfo('template_url'); ?>/img/contact_instagram_icon.png"></a>
				<a href="#"><img src="<?php bloginfo('template_url'); ?>/img/contact_linkedin_icon.png"></a>
			</div>
		</div><!-- #other_contacts -->
	</div><!-- contact_form -->

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="<?php bloginfo('template_url'); ?>/js/libs/jquery.masonry.min.js"></script>

  <!-- scripts concatenated and minified via build script -->
  <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  <!-- end scripts -->

  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
  
  <?php wp_footer(); ?>
</body>
</html>