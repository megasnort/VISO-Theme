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