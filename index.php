<?php get_header(); ?>
<?php $options = get_option('theme_options'); ?>
<?php
		
		if ( ! isset( $content_width ) ) $content_width = 900;
		
		if ( have_posts() )
		{

			while ( have_posts() )
			{
				the_post(); 
				
				?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
					<header>
						<h1>
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							<span>
								<?php echo get_the_date(); ?> om <?php the_time(); ?>
							</span>
						</h1>
					</header>
					<?php
	
					if ( has_post_thumbnail() )
					{
						?>
						<figure>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>	
							</a>
						</figure>
						<?php 
					}
					?> 
					<section class="content">
					
					<?php the_content(); ?>
				
					</section>
					<section class="footer clearfix">
				
						<div class="categorieen">
							<?php the_category(', '); ?>
						</div>
						<div class="tags">
							<?php the_tags('', ', '); ?>
						</div>

						
						<div class="reacties">
							<?php if(comments_open()){ comments_popup_link((($options['viso_nocomment'] == '') ? 'No comments yet' : $options['viso_nocomment'] ). ' »', '1 ' .(($options['viso_comment'] == '') ? 'comment' : $options['viso_comment'] ). ' »', '% ' .(($options['viso_comments'] == '') ? 'comments' : $options['viso_comments'] ). ' »'); } ?>
						</div>	
						<?php paginate_comments_links(); ?>
					</section>
				</article>
				
				<?php
				
				if( is_single() || is_singular() )
				{
					?>
					<nav id="pagination">
					
						<div class="next" title="previous post">
						<?php
						
						$prev_post = get_previous_post();
						
						if (!empty( $prev_post ))
						{
							?>
								<a href="<?php echo get_permalink( $prev_post->ID ); ?>">« <?php echo $prev_post->post_title; ?></a>
							<?php
						}
						?>
						</div>

					
						<div class="prev" title="next post">
						<?php
						
						$next_post = get_next_post();
						
						if (!empty( $next_post ))
						{
							?>
								<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?> »</a>
							<?php
						}
						?>
						</div>
						
					</nav>

					<?php comments_template();

					}
					$defaults = array(
					'before'           => '<div class="aligncenter">',
					'after'            => '</div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'nextpagelink'     => __( '««' ),
					'previouspagelink' => __( '»»' ),
					'pagelink'         => '%',
					'echo'             => 1
				);
				
				wp_link_pages( $defaults );				
				}
				
				?>
				<nav id="pagination">
				
					<div class="next" title="previous posts">
				<?php
					echo next_posts_link('««');				
				?>
					</div>
					
					<div class="prev" title="next posts">
				<?php
					echo previous_posts_link('»»');
				?>
					</div>
				</nav>
				<?php
				
			}
			else
			{
			?>
			<article>

				<header>
					<h1><a href="#">Nothing found <?php if(isset($_GET['s'])) { echo 'for "' . $_GET['s'] . '"'; }  ?></a></h1>
				</header>

				<section>
					<p>Try looking for something else:</p>
					<p><?php get_search_form(); ?></p>
				</section><!-- .entry-content -->

			</article><!-- #post-0 -->

			<?php } ?>

		
		<?php get_sidebar(); ?>
		
		<?php get_footer(); ?>