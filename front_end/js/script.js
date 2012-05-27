/* 
	Author: Jonathan Torres
*/
var $j = jQuery.noConflict();
var JCGarcia = {};

JCGarcia.Site = new function() {
	var isSearchDisplayed = false;
	
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
				$j('.search').css( { display: 'none' } );
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
				$j('.search').css( { display: 'block' } );
				$j('#open_search').css( { opacity: 1.0 } );
			}
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
				$j('#page_header').addClass('shadow');
			}
		});
	}
	
	this.home = function() {
		masonSquares();
	}
	
	this.single = function() {
		masonSquares();
	}
	
	this.resume = function() {
		//
	}
	
	function masonSquares() {
		var $container = $j('#all_posts');
		
		$container.imagesLoaded(function() {
			$container.masonry( { itemSelector : '.square', singleMode : true } );
			
			$j('.img_holder').each(function(i) {
				var $item = $j(this);
				var $rollover = $item.parent().find('.rollover');
				var rolloverHeight = $rollover.parent().find('.img_holder').height();
				var rolloverWidth = $rollover.parent().find('.img_holder').width();
				var $spanItem = $rollover.find('span.over_img');
				$rollover.css( { height: rolloverHeight + 'px' } );
				
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
		});
	}
}

$j(document).ready(function(e) {
	var page = $j('#main_content').children().first().attr('class');
	console.log(page);
	
	JCGarcia.Site.init();
	
	switch (page) {
		case 'home' : 
			JCGarcia.Site.home();
			break;
			
		case 'single' : 
			JCGarcia.Site.single();
			break;
			
		case 'resume' : 
			JCGarcia.Site.resume();
			break;
	}
});





