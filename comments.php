<?php $ops = get_option('theme_options'); ?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php
	
	$c = get_comments(array('post_id' => get_the_ID()));
	
	if(count($c))
	{

	?>
	<article class="smaller">
		<header>
			<h3>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo ($ops['viso_comments'] == '') ? 'comments' : $ops['viso_comments'] ; ?></a>
			</h3>
		</header>
		<section>
			<ul>
				<?php
					// show comments
					wp_list_comments(array(), $c);
				?>
			</ul>				
			<div class="aligncenter">
				<?php
					// show links to the next and previous page of comments
					paginate_comments_links();			
				?>
			</div>
		</section>
	</article>
	<?php
	}
	// if the comments are open ...
	if(comments_open())
	{
		// show the commentform
		?>
		<article>
			<section>
				<?php comment_form(array('title_reply' 	=> 	__( ($ops['viso_comment'] == '') ? 'comment' : $ops['viso_comment']  ))); ?>
			</section>
	
		</article>
		<?php
	}