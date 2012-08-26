<!doctype html>

<!--@author Jonathan Torres--> 
<!--www.jonathantorres.com--> 
<!--info@jonathantorres.com--> 

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">
  
  <title>
	  <?php wp_title(' | ', true, 'right'); ?>
	  <?php bloginfo('name'); ?>
	  <?php if (is_home() || is_front_page()) echo(' | '); bloginfo('description'); ?>
  </title>

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/favicon.ico" />

  <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" media="screen">
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="<?php bloginfo('template_url'); ?>/js/libs/modernizr-2.5.3.min.js"></script>
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  
  	<!-- fb like -->
  	<div id="fb-root"></div>
  	<script>
  	(function(d, s, id) {
	  	var js, fjs = d.getElementsByTagName(s)[0];
	  	if (d.getElementById(id)) return;
	  	js = d.createElement(s); js.id = id;
	  	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=254927021228474";
	  	fjs.parentNode.insertBefore(js, fjs);
	  } (document, 'script', 'facebook-jssdk'));
	</script>
  
	<div id="mainContainer">
		<div class="top_of_page">
			<section id="page_header">
				<header id="search_social">
		  			<div class="social">
		  				<div class="twitter_btns">
		  					<a href="https://twitter.com/share" class="twitter-share-button" data-via="memoplus">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
							</script>
		  				</div><!-- .twitter_btns -->
						<div class="facebook_likes">
							<div class="fb-like" data-href="https://www.facebook.com/juancarlosangustia" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
						</div>
		  			</div><!-- .social -->
		  			
		  			<div class="search_bar">
		  				<form id="searchform" action="#" method="get">
   					 		<input type="text" id="s" name="s" placeholder="Buscar...">
						</form>
		  			</div><!-- .search_bar -->
		  			
		  			<div class="search_area">
		  				<a id="open_search" href="#"></a>
		  			</div><!-- .search -->
		  		</header><!-- #search_social -->
		  		
		  		<header id="main_head">
		  			<h1 class="main_title">
		  				<span class="slogan"></span>
		  				<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		  			</h1><!-- .main_title -->
		  			
		  			<?php if (is_home() || is_search()) : ?>
		  				<nav id="main_nav">
			  				<ul class="nav_list">
			  					<li><a id="resume_btn" href="<?php echo get_page_link(13); ?>">RESUME</a></li>
			  					<li><a id="contact_btn" href="#">CONTACTO</a></li>
			  				</ul>
			  			</nav><!-- #main_nav -->
			  			
			  			<div class="filter default">
		  					<span>Filtrar Contenido</span>
		  					<ul class="filter_dropdown">
		  						<li><input type="checkbox">Instagram</li>
		  						<li><input type="checkbox">Flickr</li>
		  						<li><input type="checkbox">Blog</li>
		  						<li><input type="checkbox">Twitter</li>
		  						<li><input type="checkbox">Portafolio</li>
		  					</ul>
		  				</div><!-- .filter -->
		  			<?php else : ?>
		  				<nav id="main_nav" class="right">
			  				<ul class="nav_list">
			  					<li><a id="resume_btn" href="<?php echo get_page_link(13); ?>">RESUME</a></li>
			  					<li><a href="<?php bloginfo('url'); ?>">PORTFOLIO</a></li>
			  					<li><a id="contact_btn" href="#">CONTACTO</a></li>
			  				</ul>
			  			</nav><!-- #main_nav -->
		  			<?php endif; ?>
		  			
		  			
		  		</header><!-- #main_head -->
			</section><!-- #page_header -->
		</div><!-- .top_of_page -->
  		
	  	<section id="main_content">