$(document).ready(function(){
	
	//zorgt ervoor dat de afbeeldingen in een fancybox galerij worden geopend per post
	$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').each(function()
	{
		$(this).attr('rel',$(this).parent().parent().parent().find('a[rel="bookmark"]').attr('title'));
	})
	
	$('#content a[href$=".jpg"], #content a[href$=".jpeg"], #content a[href$=".png"],#content a[href$=".gif"]').fancybox();
	
	$('#menuknop').click(function(e){
	
		e.preventDefault();

		if($('.nav').css('max-height') == '0px')
		{
			$('.nav').css('max-height','250px')
		}
		else
		{
			$('.nav').css('max-height','0px')
		}
	});	
	
	resize();
	$(window).resize(resize);
});


function resize()
{
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
		
		console.log(aside + ' - ' + content);
		
		if(aside > content)
		{
			console.log('pas aan');
			$('#content').height(aside);
		}
		else
		{
			$('#content').height('auto');
		}		
	}

}