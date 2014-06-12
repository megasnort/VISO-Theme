<?php

load_theme_textdomain('text_domain');
register_nav_menu( 'primary', 'Main Menu' );

if (function_exists('register_sidebar'))
{
  register_sidebar(array('name'=>'Side bar'));  
  register_sidebar(array('name'=>'Footer'));  
}

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

add_action( 'customize_register', 'viso_hg_customize_register' );
add_action( 'wp_enqueue_scripts', 'add_extra_stylesheets_and_scripts' );


function add_extra_stylesheets_and_scripts() {

   wp_enqueue_style( 'VISO-styles', get_template_directory_uri() . '/style.css');
   wp_enqueue_style( 'Lightbox2', get_template_directory_uri() . '/css/lightbox.css');
   wp_enqueue_style( 'Google Font', '//fonts.googleapis.com/css?family=Lato:100,300,300italic,700');

   wp_enqueue_script( 'jquery');      
   wp_enqueue_script( 'Lightbox2', get_template_directory_uri() . '/js/lightbox.js');   
   wp_enqueue_script( 'VISO-scripts', get_template_directory_uri() . '/js/scripts.js');   

}


function viso_hg_customize_register($wp_customize)
{
  $colors = array();
  $colors[] = array( 'slug'=>'viso_navigation_backgroundcolor', 'default' => '#111111', 'label' => __( 'Navigation Background Color', 'VISO' ) );
  $colors[] = array( 'slug'=>'viso_navigation_textcolor', 'default' => '#FFFFFF', 'label' => __( 'Navigation Text Color', 'VISO' ) );
  
  $colors[] = array( 'slug'=>'viso_body_backgroundcolor', 'default' => '#ABC8B8', 'label' => __( 'Body Background Color', 'VISO' ) );
  $colors[] = array( 'slug'=>'viso_article_backgroundcolor', 'default' => '#FFFFFF', 'label' => __( 'Article Background Color', 'VISO' ) );
  
  $colors[] = array( 'slug'=>'viso_sidebar_backgroundcolor', 'default' => '#FFFFFF', 'label' => __( ' Sidebar Background Color', 'VISO' ) );
  
  $colors[] = array( 'slug'=>'viso_footer_backgroundcolor', 'default' => '#111111', 'label' => __( 'Footer Background Color', 'VISO' ) );
  $colors[] = array( 'slug'=>'viso_footer_textcolor', 'default' => '#FFFFFF', 'label' => __( 'Footer Text Color', 'VISO' ) );
  
  $colors[] = array( 'slug'=>'viso_title_color', 'default' => '#EE0900', 'label' => __( 'Title Color', 'VISO' ) );
  $colors[] = array( 'slug'=>'viso_link_color', 'default' => '#EE0900', 'label' => __( 'Link Color', 'VISO' ) );

  foreach($colors as $color)
  {
    // SETTINGS
    $wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));

    // CONTROLS
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'] )));
    
  }
  

}

function unregister_default_wp_widgets()
{
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Nav_Menu_Widget');
}


add_action('widgets_init', 'unregister_default_wp_widgets', 1);



$defaults = array(
	'random-default'         => false,
	'height'                 => 220,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => 'EE0900',
	'header-text'            => true,
	'uploads'                => true
);

add_theme_support('custom-header', $defaults);

function viso_build_options_page() { ?>
<div id="theme-options-wrap">
	<div class="icon32" id="icon-tools"> <br /> </div>
	<h2>VISO Settings</h2>
	<p></p>
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php settings_fields('theme_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
	</form>
</div>
<?php }


add_action('admin_init', 'viso_register_and_build_fields');


function viso_register_and_build_fields() {
	register_setting('theme_options', 'theme_options', 'viso_validate_setting');

	add_settings_section('footer_settings', 'Footer Settings', 'section_footer', __FILE__);
	add_settings_section('language_settings', 'Language Settings', 'section_language', __FILE__);
	add_settings_section('layout_settings', 'Layout Settings', 'section_layout', __FILE__);

	function section_footer() {}
	function section_language() {}
	function section_layout() {}
	
	add_settings_field('viso_facebookurl', 'Facebook URL', 'viso_facebookurl', __FILE__, 'footer_settings');
	add_settings_field('viso_twitterurl', 'Twitter URL', 'viso_twitterurl', __FILE__, 'footer_settings');
	add_settings_field('viso_footertext', 'Footer text', 'viso_footertext', __FILE__, 'footer_settings');
	
	add_settings_field('viso_comments', 'Comments', 'viso_comments', __FILE__, 'language_settings');
	add_settings_field('viso_comment', 'Comment', 'viso_comment', __FILE__, 'language_settings');
	add_settings_field('viso_nocomment', 'No comments yet', 'viso_nocomment', __FILE__, 'language_settings');
	
	add_settings_field('viso_uppercase', 'Uppercase titles', 'viso_uppercase', __FILE__, 'layout_settings');

	
}
function viso_validate_setting($theme_options) {
	return $theme_options;
}

function viso_uppercase() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[viso_uppercase]' type=\"checkbox\"";
	
	if($options['viso_uppercase'] == 'on')
	{
		echo ' checked="checked"';
	}
	
	echo " />";
}

function viso_facebookurl() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[viso_facebookurl]' type='text' value='{$options['viso_facebookurl']}' />";
}

function viso_twitterurl() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[viso_twitterurl]' type='text' value='{$options['viso_twitterurl']}' />";
}

function viso_footertext() {
	$options = get_option('theme_options');
	echo "<textarea rows=\"6\" cols=\"60\" name='theme_options[viso_footertext]'>{$options['viso_footertext']}</textarea>";
}

function viso_comments() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[viso_comments]' type='text' value='{$options['viso_comments']}' />";
}

function viso_comment() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[viso_comment]' type='text' value='{$options['viso_comment']}' />";
}

function viso_nocomment() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[viso_nocomment]' type='text' value='{$options['viso_nocomment']}' />";
}

add_action('admin_menu', 'viso_theme_options_page');


function viso_theme_options_page()
{
	add_theme_page('VISO', 'VISO', 'administrator', __FILE__, 'viso_build_options_page');
}


add_editor_style(get_template_directory_uri() . '/css/editor.css');

add_action( 'wp_head', 'theme_css', 100 );

function theme_css(){
	//$options = get_option( 'option_to_get' );
	?>
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
	<?php // continue regular functions.php file
}

?>