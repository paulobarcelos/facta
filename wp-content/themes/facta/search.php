<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">
				
					<div class="page-header"><h1><span><?php _e("Search","bonestheme"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h1></div>

					<div class="thumbnails pintrest">
						<?php if (have_posts()) : $post_index = 0; while (have_posts()) : the_post(); ?>
						
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pin magazine-article'); ?> role="article">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="thumbnail">
										<div class="wrapper">
											<h4 class="title"><?php the_title(); ?></h4>
											<p class="excerpt"><?php the_excerpt_max_charlength(200); ?></p>										
											<?php the_post_thumbnail( 'big'); ?>
										</div>
									</a>
								</article> <!-- end article -->
						
						<?php $post_index++; endwhile; ?>	
						
						<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
							
							<?php page_navi(); // use the page navi function ?>

						<?php } else { // if it is disabled, display regular wp prev & next links ?>
							<nav class="wp-prev-next">
								<ul class="clearfix">
									<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
									<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
								</ul>
							</nav>
						<?php } ?>
									
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
						    </header>
						    <section class="post_content">
						    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
						    </section>
						    <footer>
						    </footer>
					</article>
						
						<?php endif; ?>
					</div>
			
				</div> <!-- end #main -->
    			
    
			</div> <!-- end #content -->

<?php get_footer(); ?>