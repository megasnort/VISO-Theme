jQuery(document).ready(function($) {
	
	var speed = 180;
	
	$(document).ready(function(){
		
		// Make sure images are opened in a fancybox gallery per post
		$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').each(function()
		{
			$(this).attr('rel',$(this).parent().parent().parent().find('a[rel="bookmark"]').attr('title'));
		})
		
		$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').fancybox();
		
		$('#menuknop').click(function(e){
		
			e.preventDefault();
	
			$('.nav').slideToggle(speed);
	
		});	
		
		$('ul.nav > li.menu-item-has-children > a').mouseenter(viso_showMenu);
		$('ul.nav > li.menu-item-has-children > a').click(viso_toggleMenu);
		
		$('ul.nav > li').mouseleave(viso_hideMenu);
		

		
		$('#content, #aside, header').click(function()
		{
			$('.sub-menu').slideUp(speed);
			
			if($('#menuknop').css('display') == 'block')
			{
				$('.nav').slideUp(speed);	
			}
			
		});
		
		
		$('a#menuknop span').html($('#nav .current_page_item a').html());
			
		
		viso_resize();
		$(window).resize(viso_resize);
	});
	
	
	function viso_toggleMenu(e)
	{
		if($(this).next().css('display') == 'none')
		{
			e.preventDefault();
			
			var url = $(this).attr('href');
	
			$('.nav > ul > li > a').each(function()
			{
				if(url != $(this).attr('href'))
				{
					$(this).next().slideUp(speed);
				}
			});
			
			$(this).next().slideDown(speed);	
	
		}
		else
		{
			$(this).next().slideUp(speed);	
		}
	
	}
	
	
	
	function viso_showMenu()
	{

		if($('#menuknop').css('display') != 'block')
		{
			var url = $(this).attr('href');
		
			$('.nav > ul > li > a').each(function()
			{
				if(url != $(this).attr('href'))
				{
					$(this).next().slideUp(speed);
				}
			});
			
			$(this).next().slideDown(speed);	
		
		}
	
	}
		
	
	
	function viso_hideMenu()
	{
		if($('#menuknop').css('display') != 'block')
		{
	
			$(this).find('.sub-menu').slideUp(speed);	
		}
	}
	
	
	function viso_resize()
	{
		//When the menu-button is visible
		if($('a#menuknop').css('display') == 'block')
		{
			$('.nav').css('display', 'none');
		}
		else
		{
			$('.nav').css('display', 'block');
		}
			
		//Cheap trick to check if media query is active (innerWidth gives a different result in Webkit)
	
		if($('a#menuknop span').css('display') == 'none')
		{
			$('#content').height('auto');
		}
		else
		{
			//reset
			$('#content').height('auto');
			
			var aside = $('#aside').height();
			var content = $('#content').height();
			
			if(aside > content)
			{
				$('#content').height(aside);
			}
			else
			{
				$('#content').height('auto');
			}		
		}
	
	}

});

