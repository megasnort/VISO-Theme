<!DOCTYPE html> 
<html <?php language_attributes(); ?>> 
	<head> 
		<meta charset="<?php bloginfo('charset'); ?>"> 
		<meta name="author" content="Stef B." /> 
		<meta name="description" content="<?php esc_attr(bloginfo('description')); ?>" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php bloginfo('name') . wp_title(); ?></title> 

		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,300italic,700' rel='stylesheet' type='text/css'>
		<link href='<?php echo get_stylesheet_uri(); ?>' rel='stylesheet' type='text/css'>
		
		 <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<?php $template_dir = get_template_directory_uri(); ?> 
		<link href="<?php echo $template_dir ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" ></script>
		<script src="<?php echo $template_dir ?>/js/jquery.fancybox.pack.js" type="text/javascript" ></script>
		<script src="<?php echo $template_dir ?>/js/scripts.js" type="text/javascript" ></script>
	
		<!-- IE < 9 ondersteunt de nieuwe HTML5-tags niet. Met onderstaande scriptje wel. -->
		<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_directory'); ?>/js/ie.js" type="text/javascript" ></script>
		<![endif]-->
		<?php wp_head(); ?>
		
		<style type="text/css">
		
			<?php

				function valid_color($str)
				{
					return (strlen($str) == '7') ? true : false;
				}				
			
			?>
		
			#nav
			{	
				<?php
				
					$navigation_backgroundcolor = get_option('navigation_backgroundcolor');
					
					if(valid_color($navigation_backgroundcolor))
					{
						echo 'background-color: '. $navigation_backgroundcolor .';';
					}
					
				?>
			}
			
			
			#nav .nav li a:link,
			#nav .nav li a:visited
			{	
				<?php
				
					$navigation_textcolor = get_option('navigation_textcolor');
					
					if(valid_color($navigation_textcolor))
					{
						echo 'color: '. $navigation_textcolor .';';
					}
					
				?>
			}
			
			#nav .nav li a:active,
			#nav .nav li a:hover
			{
				<?php
					$title_color = get_option('title_color');
						
					if(valid_color($title_color))
					{
						echo 'color: '. $title_color .';';
					}
				?>
			}
			
			footer, #copyright
			{	
				<?php
				
					$footer_backgroundcolor = get_option('footer_backgroundcolor');
					
					if(valid_color($footer_backgroundcolor))
					{
						echo 'background-color: '. $footer_backgroundcolor .';';
					}
					
					$footer_textcolor = get_option('footer_textcolor');
					
					if(valid_color($footer_backgroundcolor))
					{
						echo 'color: '. $footer_textcolor .';';
					}
				
				?>
			}
			
			#content
			{	
				<?php
				
					$body_backgroundcolor = get_option('body_backgroundcolor');
					
					if(valid_color($body_backgroundcolor))
					{
						echo 'background-color: '. $body_backgroundcolor .';';
					}
					
				
				?>
			}
		
		
			#content article
			{	
				<?php
				
					$article_backgroundcolor = get_option('article_backgroundcolor');
					
					if(valid_color($article_backgroundcolor))
					{
						echo 'background-color: '. $article_backgroundcolor .';';
					}
					
				
				?>
			}
			
			body > #aside,
			body
			{	
				<?php
				
					$sidebar_backgroundcolor = get_option('sidebar_backgroundcolor');
					
					if(valid_color($sidebar_backgroundcolor))
					{
						echo 'background-color: '. $sidebar_backgroundcolor .';';
					}
					
				
				?>
			}
			
			body h2,
			body h1,
			#content article h1,
			#content article h1 a
			{
				<?php
					$title_color = get_option('title_color');
						
					if(valid_color($title_color))
					{
						echo 'color: '. $title_color .';';
					}
				?>
					
			}
			
			body a:link,
			body a:visited
			{
				<?php
					$link_color = get_option('link_color');
						
					if(valid_color($link_color))
					{
						echo 'color: '. $link_color .';';
						echo 'border-color: '. $link_color .';';
					}
				?>
					
			}
			
			#nav #searchform input[type="submit"]
			{
				<?php
					$link_color = get_option('link_color');
						
					if(valid_color($link_color))
					{
						echo 'background-color: '. $link_color .';';
					}
				?>
			}
			
			#nav #searchform input[type="submit"]:hover
			{
				<?php
				
					$body_backgroundcolor = get_option('body_backgroundcolor');
					
					if(valid_color($body_backgroundcolor))
					{
						echo 'background-color: '. $body_backgroundcolor .';';
					}
				
				?>
			}
		
		</style>
	</head> 
	<body>

		<header style="background-image:url('<?php header_image(); ?>');">
			
			<?php
				if(get_header_textcolor()!='blank')
				{
					echo '<h1 style="color:#' . get_header_textcolor() .'">';
					echo bloginfo('name');
					echo '</h1><h4>';
					echo bloginfo('description');
					echo '</h4>';
				}	
			?>
			
		</header>

		<div id="nav" class="clearfix">

			<!-- @todo: wp_nav_menu() -->
			<a href="#" id="menuknop"><span>MENU</span></a>
			
			<?php wp_page_menu(  
				array(  
	               'show_home'  =>   'Blog',  
	               'sort_column'    =>   'menu_order',  
	               'menu_class' =>   'nav',
				   'depth' =>   '1',
	            ));
	            
	            get_search_form();
			?>
		</div>
		
		<div id="content">
						
			<div>