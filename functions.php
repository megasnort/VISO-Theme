<?php // register_nav_menu( 'primary', 'Primary Menu' ); ?>
<?php if (function_exists('register_sidebar'))  
  register_sidebar(array('name'=>'Side bar'));  
  register_sidebar(array('name'=>'Footer'));  
?>
<?php add_theme_support( 'automatic-feed-links' ); ?>
<?php add_theme_support( 'post-thumbnails' ); ?>
<?php
add_action( 'customize_register', 'hg_customize_register' );
function hg_customize_register($wp_customize)
{
  $colors = array();
  $colors[] = array( 'slug'=>'navigation_backgroundcolor', 'default' => '#111111', 'label' => __( 'Navigation Background Color', 'VISO Theme' ) );
  $colors[] = array( 'slug'=>'navigation_textcolor', 'default' => '#FFFFFF', 'label' => __( 'Navigation Text Color', 'VISO Theme' ) );
  
  $colors[] = array( 'slug'=>'body_backgroundcolor', 'default' => '#ABC8B8', 'label' => __( 'Body Background Color', 'VISO Theme' ) );
  $colors[] = array( 'slug'=>'article_backgroundcolor', 'default' => '#FFFFFF', 'label' => __( 'Article Background Color', 'VISO Theme' ) );
  
  $colors[] = array( 'slug'=>'sidebar_backgroundcolor', 'default' => '#FFFFFF', 'label' => __( ' Sidebar Background Color', 'VISO Theme' ) );
  
  $colors[] = array( 'slug'=>'footer_backgroundcolor', 'default' => '#111111', 'label' => __( 'Footer Background Color', 'VISO Theme' ) );
  $colors[] = array( 'slug'=>'footer_textcolor', 'default' => '#FFFFFF', 'label' => __( 'Footer Text Color', 'VISO Theme' ) );
  
  $colors[] = array( 'slug'=>'title_color', 'default' => '#EE0900', 'label' => __( 'Title Color', 'VISO Theme' ) );
  $colors[] = array( 'slug'=>'link_color', 'default' => '#EE0900', 'label' => __( 'Link Color', 'VISO Theme' ) );

  foreach($colors as $color)
  {
    // SETTINGS
    $wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));

    // CONTROLS
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'] )));
  }
}
?><?php
$defaults = array(
	'default-image'          => get_template_directory_uri() . '/images/logo_viso_gewoon.png',
	'random-default'         => false,
	'height'                 => 220,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => 'EE0900',
	'header-text'            => true,
	'uploads'                => true
);

add_theme_support('custom-header', $defaults); ?>
<?php function build_options_page() { ?>
<div id="theme-options-wrap">
	<div class="icon32" id="icon-tools"> <br /> </div>
	<h2>VISO Theme Settings</h2>
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
add_action('admin_init', 'register_and_build_fields');

function register_and_build_fields() {
	register_setting('theme_options', 'theme_options', 'validate_setting');

	add_settings_section('footer_settings', 'Footer Settings', 'section_footer', __FILE__);

	function section_footer() {}
	
	add_settings_field('facebookurl', 'Facebook URL', 'facebookurl', __FILE__, 'footer_settings');
	add_settings_field('twitterurl', 'Twitter URL', 'twitterurl', __FILE__, 'footer_settings');
	add_settings_field('footertext', 'Footer text', 'footertext', __FILE__, 'footer_settings');
}
function validate_setting($theme_options) {
	return $theme_options;
}

function facebookurl() {
	$options = get_option('theme_options');  echo "<input name='theme_options[facebookurl]' type='text' value='{$options['facebookurl']}' />";
}

function twitterurl() {
	$options = get_option('theme_options');  echo "<input name='theme_options[twitterurl]' type='text' value='{$options['twitterurl']}' />";
}

function footertext() {
	$options = get_option('theme_options');  echo "<textarea rows=\"4\" cols=\"40\" name='theme_options[footertext]'>{$options['footertext']}</textarea>";
}

add_action('admin_menu', 'theme_options_page');

function theme_options_page() {
	add_options_page('VISO Theme', 'VISO Theme', 'administrator', __FILE__, 'build_options_page');
}
?>