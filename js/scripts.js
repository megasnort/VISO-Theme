jQuery(document).ready(function($) {
	
	var viso_speed = 180;
	
	$(document).ready(function(){
				
		
		$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').each(function()
		{
			var element = $(this).parent();
			
			do{
				if(element.prop('tagName').toLowerCase() == 'article')
				{
					$(this).attr('data-lightbox', element.attr('id'));
					break;
				}
				element = element.parent();
			}
			while(element.prop('tagName').toLowerCase() != 'body')
			
		});
		
		
		$('#menuknop').click(function(e){
		
			e.preventDefault();
	
			$('.nav').slideToggle(viso_speed);
	
		});	
		
		
		$('ul.nav > li.menu-item-has-children > a').mouseenter(viso_showMenu).click(viso_toggleMenu);
		
		
		$('ul.nav > li').mouseleave(viso_hideMenu);

		
		$('#content, #aside, header').click(function()
		{
			$('.sub-menu').slideUp(viso_speed);
			
			if($('#menuknop').css('display') == 'block')
			{
				$('.nav').slideUp(viso_speed);	
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
					$(this).next().slideUp(viso_speed);
				}
			});
			
			$(this).next().slideDown(viso_speed);	
	
		}
		else
		{
			$(this).next().slideUp(viso_speed);	
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
					$(this).next().slideUp(viso_speed);
				}
			});
			
			$(this).next().slideDown(viso_speed);	
		
		}
	
	}
		
	
	
	function viso_hideMenu()
	{
		if($('#menuknop').css('display') != 'block')
		{
	
			$(this).find('.sub-menu').slideUp(viso_speed);	
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
		
		var contentWidth = parseInt($('article').width());
		
		$('.wp-caption').each(function(){
		
			var width = parseInt($(this).find('img').attr('width'));
			
			if(width > contentWidth)
			{
				$(this).width('auto');
			}
		
		});
	
	}

});

