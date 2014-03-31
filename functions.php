<?php load_theme_textdomain('text_domain'); ?>
<?php register_nav_menu( 'primary', 'Main Menu' ); ?>
<?php if (function_exists('register_sidebar'))  
  register_sidebar(array('name'=>'Side bar'));  
  register_sidebar(array('name'=>'Footer'));  
?>
<?php add_theme_support( 'automatic-feed-links' ); ?>
<?php add_theme_support( 'post-thumbnails' ); ?>
<?php
add_action( 'customize_register', 'viso_hg_customize_register' );

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




?><?php
$defaults = array(
	'random-default'         => false,
	'height'                 => 220,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => 'EE0900',
	'header-text'            => true,
	'uploads'                => true
);

add_theme_support('custom-header', $defaults); ?>
<?php function viso_build_options_page() { ?>
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

	function section_footer() {}
	function section_language() {}
	
	add_settings_field('viso_facebookurl', 'Facebook URL', 'viso_facebookurl', __FILE__, 'footer_settings');
	add_settings_field('viso_twitterurl', 'Twitter URL', 'viso_twitterurl', __FILE__, 'footer_settings');
	add_settings_field('viso_footertext', 'Footer text', 'viso_footertext', __FILE__, 'footer_settings');
	
	add_settings_field('viso_comments', 'Comments', 'viso_comments', __FILE__, 'language_settings');
	add_settings_field('viso_comment', 'Comment', 'viso_comment', __FILE__, 'language_settings');
	add_settings_field('viso_nocomment', 'No comments yet', 'viso_nocomment', __FILE__, 'language_settings');

	
}
function viso_validate_setting($theme_options) {
	return $theme_options;
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


?>