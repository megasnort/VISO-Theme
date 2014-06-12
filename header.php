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