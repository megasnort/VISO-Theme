		<?php $options = get_option('theme_options'); ?>
		<footer>
			
			<aside>
				
				<?php $template_dir = get_template_directory_uri(); ?> 
				
				<nav>
					<a href="https://www.facebook.com/pages/VISO-Mariakerke/99414377560">
						<img src="<?php echo $template_dir; ?>/images/facebook.png" alt="facebook" />
					</a>
					<?php
						if($options['twitterurl'] != '')
						{
							?><a href="<?php echo $options['twitterurl']; ?>" target="_blank">
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
			<?php echo $options['footertext']; ?>
		</div>
		
		<?php wp_footer(); ?>
		
	</body>
</html>	