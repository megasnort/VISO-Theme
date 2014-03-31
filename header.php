<!DOCTYPE html> 
<html <?php language_attributes(); ?>> 
	<head> 
		<meta charset="<?php bloginfo('charset'); ?>"> 
		<meta name="author" content="Stef B." /> 
		<meta name="description" content="<?php esc_attr(bloginfo('description')); ?>" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php bloginfo('name') . wp_title(); ?></title> 

		<?php $template_dir = get_template_directory_uri(); ?> 

		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,300italic,700' rel='stylesheet' type='text/css'>
		<link href='<?php echo get_stylesheet_uri(); ?>' rel='stylesheet' type='text/css'>
		<link href='<?php echo $template_dir ?>/css/jquery.fancybox.css' rel='stylesheet' type='text/css'>
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
				
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" ></script>
		<script src="<?php echo $template_dir ?>/js/jquery.fancybox.pack.js" type="text/javascript" ></script>
		<script src="<?php echo $template_dir ?>/js/scripts.js" type="text/javascript" ></script>
	
		<!-- IE < 9 ondersteunt de nieuwe HTML5-tags niet. Met onderstaande scriptje wel. -->
		<!--[if lt IE 9]>
		<script src="<?php $template_dir; ?>/js/ie.js" type="text/javascript" ></script>
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
				
					$navigation_backgroundcolor = get_option('viso_navigation_backgroundcolor');
					
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
				
					$navigation_textcolor = get_option('viso_navigation_textcolor');
					
					if(valid_color($navigation_textcolor))
					{
						echo 'color: '. $navigation_textcolor .';';
					}
					
				?>
			}
			
			#nav .nav li a:active,
			#nav .nav li a:hover,
			#nav .nav .children li a:hover
			{
				<?php
					$title_color = get_option('viso_title_color');
						
					if(valid_color($title_color))
					{
						echo 'color: '. $title_color .';';
					}
				?>
			}
			
			footer, #copyright
			{	
				<?php
				
					$footer_backgroundcolor = get_option('viso_footer_backgroundcolor');
					
					if(valid_color($footer_backgroundcolor))
					{
						echo 'background-color: '. $footer_backgroundcolor .';';
					}
					
					$footer_textcolor = get_option('viso_footer_textcolor');
					
					if(valid_color($footer_backgroundcolor))
					{
						echo 'color: '. $footer_textcolor .';';
					}
				
				?>
			}
			
			#content
			{	
				<?php
				
					$body_backgroundcolor = get_option('viso_body_backgroundcolor');
					
					if(valid_color($body_backgroundcolor))
					{
						echo 'background-color: '. $body_backgroundcolor .';';
					}
					
				
				?>
			}
		
		
			#content article
			{	
				<?php
				
					$article_backgroundcolor = get_option('viso_article_backgroundcolor');
					
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
				
					$sidebar_backgroundcolor = get_option('viso_sidebar_backgroundcolor');
					
					if(valid_color($sidebar_backgroundcolor))
					{
						echo 'background-color: '. $sidebar_backgroundcolor .';';
					}
					
				
				?>
			}
			
			body h2,
			body h1,
			#content article h1,
			#content article h1 a,
			body #aside #wp-calendar caption,
			body #aside #wp-calendar th
			{
				<?php
					$title_color = get_option('viso_title_color');
						
					if(valid_color($title_color))
					{
						echo 'color: '. $title_color .';';
					}
				?>
			}
			
			#content article h1 a
			{
				<?php
					$title_color = get_option('viso_title_color');
						
					if(valid_color($title_color))
					{
						echo 'border-color: '. $title_color .';';
					}
				?>
				
			}
			
			body a:link,
			body a:visited
			{
				<?php
					$link_color = get_option('viso_link_color');
						
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
					$link_color = get_option('viso_link_color');
						
					if(valid_color($link_color))
					{
						echo 'background-color: '. $link_color .';';
					}
				?>
			}
			
			#nav #searchform input[type="submit"]:hover
			{
				<?php
				
					$body_backgroundcolor = get_option('viso_body_backgroundcolor');
					
					if(valid_color($body_backgroundcolor))
					{
						echo 'background-color: '. $body_backgroundcolor .';';
					}
				
				?>
			}
		
		</style>
	</head> 
	<body <?php body_class($class); ?>>

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

			<a href="#" id="menuknop"><span>MENU</span></a>
			
			<?php
				if(has_nav_menu( 'primary' ) )
				{
					

					$defaults = array(
						'theme_location'  => 'primary',
						'menu'            => '',
						'container'       => 'li',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'nav',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 2,
						'walker'          => ''
					);
				
					wp_nav_menu($defaults);
				}
				else
				{
					echo '<em style="color:white; line-height: 2.5em; padding-left:2em;">You need to define a menu in the menu-editor and add it to the default location.</em>';
				}
	            
				get_search_form();
			?>
		</div>
		
		<div id="content">
						
			<div>