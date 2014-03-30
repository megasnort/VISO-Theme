var speed = 180;

$(document).ready(function(){
	
	//zorgt ervoor dat de afbeeldingen in een fancybox galerij worden geopend per post
	$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').each(function()
	{
		$(this).attr('rel',$(this).parent().parent().parent().find('a[rel="bookmark"]').attr('title'));
	})
	
	$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').fancybox();
	
	$('#menuknop').click(function(e){
	
		e.preventDefault();

		$('.nav').slideToggle(speed);

	});	
	
	$('.nav > ul > li.page_item_has_children > a').mouseenter(showMenu);
	$('.nav > ul > li').mouseleave(hideMenu);
	
	$('.nav > ul > li.page_item_has_children > a').click(toggleMenu);
	
	$('#content, #aside, header').click(function()
	{
		$('.children').slideUp(speed);
		
		if($('#menuknop').css('display') == 'block')
		{
			$('.nav').slideUp(speed);	
		}
		
	});
	
	
	$('a#menuknop span').html($('#nav .current_page_item a').html());
		
	
	resize();
	$(window).resize(resize);
});


function toggleMenu(e)
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



function showMenu()
{
	
	if($('#menuknop').css('display') != 'block')
	{
		var url = $(this).attr('href');
	
		$('.nav > ul > li > a').each(function()
		{
			if(url != $(this).attr('href'))
			{
				$(this).next().slideUp(speed);
				console.log('slideUp')
			}
			else{
				console.log('skip')
			}
		});
		
		$(this).next().slideDown(speed);	
	
	}

}
	


function hideMenu()
{
	if($('#menuknop').css('display') != 'block')
	{

		$(this).find('.children').slideUp(speed);	
	}
}


function resize()
{
	//als het menuknopje zichtbaar is
	if($('a#menuknop').css('display') == 'block')
	{
		$('.nav').css('display', 'none');
	}
	else
	{
		$('.nav').css('display', 'block');
	}
		
	//Cheap trick to check if media query is active (innerWidth gives a different result in Webkit)
	//als het woord 'menu' onzichtbaar is

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