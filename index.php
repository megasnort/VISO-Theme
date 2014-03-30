	
		<?php get_header(); ?>

		<?php
		
		if ( have_posts() )
		{

			while ( have_posts() )
			{
				the_post(); 
				
				?><article>
			
					<header>
						<h1>
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							<span>
								<?php
									/*
										echo get_the_date(); ?> om <?php the_time();
									*/
									?>
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
						
						<div class="reacties">
							<?php if(!is_singular() && comments_open()){ comments_popup_link('Nog geen reacties »', '1 reactie »', '% reacties »'); } ?>
						</div>	
				
					</section>
				</article>
				
				<?php
				
				if( is_single() )
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
					<?php
						if(comments_open())
						{
							
						?>

						<article class="smaller">
							<header>
								<h3>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Reacties</a>
								</h3>
							</header>
							<section>
								<ul>
								<?php
									$c = get_comments(array('post_id' => get_the_ID()));
									
									if(count($c))
									{
										wp_list_comments(array(), $c);
									}
									else
									{
										?><li><div class="comment"><p>Er zijn nog geen reacties.</p></div></li><?php
									} ?>
								</ul>
							</section>
						</article>
						<article>
							<section>
								<?php comment_form(array('title_reply' 	=> 	__( 'reageer!' ), 'comment_notes_before' 	=> 	'<p class="comment-notes">' . __( '... maar houd het een beetje deftig. Je e-mailadres wordt niet getoond bij de reacties maar wordt enkel gevraagd ter spamcontole.' ) . '</p>')); ?>
							</section>
	
						</article>
						
						<?php
						}
					}				
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
					<h1><a href="#">No posts yet</a></h1>
				</header>

				<section>
					<p>...</p>
				</section><!-- .entry-content -->

			</article><!-- #post-0 -->

			<?php } ?>

		
		<?php get_sidebar(); ?>
		
		<?php get_footer(); ?>