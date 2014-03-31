<?php $options = get_option('theme_options'); ?>
		<footer>
			
			<aside>
				
				<?php $template_dir = get_template_directory_uri(); ?> 
				
				<nav>
					<?php
						if($options['viso_twitterurl'] != '')
						{
							?><a href="<?php echo $options['viso_facebookurl']; ?>">
								<img src="<?php echo $template_dir; ?>/images/facebook.png" alt="facebook" />
							</a><?php
						}
					?>

					<?php
						if($options['viso_twitterurl'] != '')
						{
							?><a href="<?php echo $options['viso_twitterurl']; ?>" target="_blank">
								<img src="<?php echo $template_dir; ?>/images/twitter.png" alt="facebook" />
							</a><?php
						}
					?>
					<a href="/?feed=rss2">
						<img src="<?php echo $template_dir; ?>/images/rss.png" alt="facebook" />
					</a>

				</nav>
								
			</aside>
			
			<ul id="footer">
				<?php dynamic_sidebar('Footer'); ?>  
			</ul>
			
		</footer>
		
		<div id="copyright">
			<?php if($options['viso_footertext'] == '')
			{
				$theme = wp_get_theme();
				
				echo '<a href="' . $theme->get('AuthorURI') . '" target="_blank">' . $theme->get( 'Name' ) . ' v' . $theme->get( 'Version' ) . ' by ' . $theme->get( 'Author' ) . '</a>';
			}
			else
			{
				echo $options['viso_footertext'];
			}
			?>
		</div>
		
		<?php wp_footer(); ?>
		
	</body>
</html>	