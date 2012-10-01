/* 
	Author: Jonathan Torres
*/
var $j = jQuery.noConflict();
var JCGarcia = {};

JCGarcia.Site = new function() {
	var isSearchDisplayed = false;
	var $lightBox = $j('div.lightbox');
	var $preloader;
	
	this.init = function() {
		/* Filter Dropdown */
		$j('.filter span').hover(function() {
			$j(this).parent().removeClass('default').addClass('down');
			$j('ul.filter_dropdown').css( { display: 'block' } );
		}, function() {
			$j(this).parent().removeClass('down').addClass('default');
			$j('ul.filter_dropdown').css( { display: 'none' } );
		});
		
		$j('ul.filter_dropdown').mouseenter(function() {
			$j(this).parent().removeClass('default').addClass('down');
			$j(this).css( { display: 'block' } );
		});
		
		$j('ul.filter_dropdown').mouseleave(function() {
			$j(this).parent().removeClass('down').addClass('default');
			$j(this).css( { display: 'none' } );
		});
		
		/* Open the search bar */
		$j('#open_search').click(function(e) {
			e.preventDefault();
			$j(this).animate( { opacity: 0 }, 'fast', function() {
				$j('.search_area').css( { display: 'none' } );
				$j('.search_bar').css( { display: 'block' } );
				$j('.search_bar').animate( { opacity: 1.0 } );
				$j('#s').focus();
				isSearchDisplayed = true;
			});
		});
		
		/* Show search icon when you blur from search field */
		$j('#s').blur(function(e) {
			if (isSearchDisplayed) {
				$j('.search_bar').css( { display: 'none', opacity: 0.0 } );
				$j('.search_area').css( { display: 'block' } );
				$j('#open_search').css( { opacity: 1.0 } );
			}
		});
		
		/* Hover on logo */
		$j('h1.main_title a').hover(function(e) {
			$j('h1.main_title span.slogan').css( { 'display': 'block' } );
		}, function(e) {
			$j('h1.main_title span.slogan').css( { 'display': 'none' } );
		});
		
		$j('h1.main_title span.slogan').mouseenter(function(e) {
			$j('h1.main_title span.slogan').css( { 'display': 'block' } );
		});
		
		$j('h1.main_title span.slogan').mouseleave(function(e) {
			$j('h1.main_title span.slogan').css( { 'display': 'none' } );
		});
		
		/* Search Form Validation */
		if (!Modernizr.input.placeholder) {
			var label = 'Buscar...';
			var $searchForm = $j('#searchform');
			var $searchInput = $j('#s');
			
			$searchInput.val(label);
			$searchInput.blur(function(e) {
				if ($j(this).val() == '') $j(this).val(label);
			});
			
			$searchInput.focus(function(e) {
				$j(this).val('');
			});
			
			$searchForm.submit(function(e) {
				if ($searchInput.val() == '' || $searchInput.val() == label) {
					return false;
				}
			});
		}
		
		/* Show drop shadow when scrolling */
		$j(window).scroll(function(e) {
			var scrollTop = $j(window).scrollTop();
			
			if (scrollTop < 10) {
				$j('#page_header').removeClass();
			} else {
				$j('#page_header').addClass('dropshadow');
			}
		});
		
		/* Open contact lightbox */
		$j('#contact_btn').click(function(e) {
			e.preventDefault();
			JCGarcia.Site.contact();
		});
	}
	
	this.contact = function() {
		var $contactContainer = $j('div.contact_container');
		var $contactForm = $j('.contact_form');
		
		$lightBox.fadeIn('fast', function() {
			$contactContainer.fadeIn('fast');
			$contactForm.fadeIn('fast');
		});
		
		/* Close contact lightbox */
		$j('#close_contact').click(function(e) {
			e.preventDefault();
			
			$contactContainer.fadeOut('fast');
			$contactForm.fadeOut('fast', function() {
				$lightBox.fadeOut('fast');
			});
		});
	}
	
	this.home = function() {
		isotopeSquares();
	}
	
	this.single = function() {
		isotopeSquares();
	}
	
	this.resume = function() {
		resumeRenglons('div.renglon.experience', 324, 301, 23, 3);
		resumeRenglons('div.renglon.projects', 324, 301, 23, 3);
		resumeRenglons('div.renglon.education', 324, 301, 23, 3);
		resumeRenglons('div.renglon.recomendation', 959, 936, 23, 1);
		
		/* Open contact lightbox */
		$j('#contact_button').click(function(e) {
			e.preventDefault();
			JCGarcia.Site.contact();
		});
	}
	
	this.imageHolder = function() {
		$j('.img_holder').each(function(i) {
			var $item = $j(this);
			var $rollover = $item.parent().find('.rollover');
			var rolloverHeight = $rollover.parent().find('.img_holder').height();
			var rolloverWidth = $rollover.parent().find('.img_holder').width();
			var $spanItem = $rollover.find('span.over_img');
			$rollover.css( { height: 143 + 'px' } );
			
			$spanItem.css( {
				top: ($rollover.height() * 0.5 - $spanItem.height() * 0.5) + 'px',
				left : ($rollover.width() * 0.5 - $spanItem.width() * 0.5) + 'px'
			} );
			
			$item.hover(function(e) {
				$rollover.css( { display: 'block' } );
			}, function(e) {
				if (!$rollover.is(':visible')) {
					$rollover.css( { display: 'block' } );
				}
			});
			
			$item.parent().mouseleave(function(e) {
				$rollover.css( { display: 'none' } );
			});
		});
	}
	
	this.showPreloader = function() {
		/* show preloader, do not show it on post pages */
		$preloader = $j('<div id="homepreload"><img src="http://www.juancarlosangustia.com/wp-content/uploads/2012/09/inf-loading-588514283.gif"></div>');
		$j('#all_posts').append($preloader);
	}
	
	this.hidePreloader = function() {
		$preloader.fadeOut('fast');
	}
	
	this.filtering = function() {
		var filters = ['.instagram', '.wp', '.twitter', '.portfolio'];
		
		/* Filter instagram */
		$j('#insta').click(function(e) {
			isotopeFilter($j(this), '.instagram', filters);
		});
		
		/* Filter Blog */
		$j('#blogpost').click(function(e) {
			isotopeFilter($j(this), '.wp', filters);
		});
		
		/* Filter Twitter */
		$j('#tweets').click(function(e) {
			isotopeFilter($j(this), '.twitter', filters);
		});
		
		/* Filter Portfolio */
		$j('#ports').click(function(e) {
			isotopeFilter($j(this), '.portfolio', filters);
		});
	}
	
	function isotopeFilter(checkbox, itemClass, array) {
		if (checkbox.is(':checked')) {
			if ($j.inArray(itemClass, array) == -1) {
				array.push(itemClass);
			}
		} else {
			array.splice($j.inArray(itemClass, array), 1);
		}
		
		$j('#all_posts').isotope( { filter: array.join(', ') } );
	}
	
	function resumeRenglons(renglon, itemWidth, thumbWidth, thumbMargin, itemsInView) {
		var numOflistItems = 0;
		var $arrowLeft = $j(renglon).find('span.left');
		var $arrowRight = $j(renglon).find('span.right');
		var $jobsContainer = $j(renglon + ' .jobs_container .jobs');
		
		numOflistItems = $j(renglon + ' .jobs .job').length;
		$jobsContainer.css( { 'left' : '0px' } );
		$jobsContainer.css( { 'width' : (numOflistItems * thumbWidth) + (numOflistItems * thumbMargin) + 'px' } );
		//console.log(numOflistItems);
		
		$arrowLeft.click(function(e) { 
			e.preventDefault();
			if ($j('$jobsContainer:animated').length) return;
			
			if (parseInt($jobsContainer.css('left')) >= 0) {
				$jobsContainer.css( { 'left': '0px' } )
			} else {
				$jobsContainer.animate( { left: (parseInt($jobsContainer.css('left')) + itemWidth) + 'px' } );
			}
		});
		
		$arrowRight.click(function(e) { 
			e.preventDefault();
			if ($j('$jobsContainer:animated').length) return;
			
			var itemsOutside = numOflistItems - itemsInView;
			var limitLeft = itemWidth * itemsOutside;
			
			if (parseInt($jobsContainer.css('left')) == -limitLeft) {
				$jobsContainer.css( { 'left': -limitLeft + 'px' } );
			} else {
				$jobsContainer.animate( { left: (parseInt($jobsContainer.css('left')) - itemWidth) + 'px' } );
			}
		});
	}
	
	function isotopeSquares() {
		/* hide posts */
		var $container = $j('#all_posts');
		$container.find('.square').each(function() {
			 $j(this).css( { display : 'none', opacity: 0 } );
		});
		
		/* show them when the images are loaded */
		$container.imagesLoaded(function() {
			JCGarcia.Site.hidePreloader();
			$container.isotope( { itemSelector : '.square', animationEngine : 'jquery' } );
			
			$container.find('.square').each(function() {
				$j(this).css( { display : 'block' } );
				$j(this).delay(Math.random() * 1000).animate( { opacity: 1 } );
			});
			
			JCGarcia.Site.imageHolder();
		});
	}
}

$j(document).ready(function(e) {
	var page = $j('body').attr('class');
	//console.log('page: ' + page);
	
	JCGarcia.Site.init();
	JCGarcia.Site.filtering();
	JCGarcia.Site.showPreloader();
	
	if (page.indexOf('page-template-resume-php') >= 0) {
		//console.log('resume');
		JCGarcia.Site.resume();
	} else {
		JCGarcia.Site.home();
		//console.log('home or other page');
	}
});





