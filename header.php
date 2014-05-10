<!DOCTYPE html> 
<html <?php language_attributes(); ?>> 
	<head> 
		<meta charset="<?php bloginfo('charset'); ?>"> 

		<meta name="description" content="<?php esc_attr(bloginfo('description')); ?>" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php bloginfo('name') . wp_title(); ?></title> 

		<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />
				
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
			
			.searchform input[type="submit"]
			{
				<?php
					$link_color = get_option('viso_link_color');
						
					if(valid_color($link_color))
					{
						echo 'background-color: '. $link_color .';';
					}
				?>
			}
			
			.searchform input[type="submit"]:hover
			{
				<?php
				
					$body_backgroundcolor = get_option('viso_body_backgroundcolor');
					
					if(valid_color($body_backgroundcolor))
					{
						echo 'background-color: '. $body_backgroundcolor .';';
					}
				
				?>
			}
			
					
			body > header
			{
				<?php
					echo 'background-image:url(\'';
					echo header_image();
					echo '\');';	
				
				?>
			
			}
			
			body > header h1 a:link, 
			body > body header h1 a:visited,
			body > header h1 a:active, 
			body > header h1 a:hover 
			{
				<?php

				$header_textcolor = '#' . get_header_textcolor();
				
				if(valid_color($header_textcolor))
				{
					echo 'color:' . $header_textcolor . ';';	
					echo 'border-color:' . $header_textcolor . ';';	
				}
				
				?>
			}


			h1,
			h2,
			h3,
			h4,
			#wp-calendar caption,
			#nav .nav li a,
			#nav a#menuknop
			{
				<?php
				
				$options = get_option('theme_options');
				
				if($options['viso_uppercase'] == 'on')
				{
					echo 'text-transform: uppercase;';
				}
				
				?>
			
			}
			
		
		</style>
	</head> 
	<body <?php body_class(); ?>>

		<header>
			
			<?php
				if(get_header_textcolor() != 'blank')
				{
					echo '<h1>';
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
					echo bloginfo('name');
					echo '</a></h1><h4>';
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
					echo '<em class="navError">You need to define a menu in the menu-editor and add it to the default location.</em>';
				}
	            
				get_search_form();
			?>
		</div>
		
		<div id="content">
						
			<div>