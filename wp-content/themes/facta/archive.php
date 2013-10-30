<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">
				
					<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<?php single_cat_title(); ?>
						</h1>
						<?php 
						$description = category_description();
							if ( !empty( $description ) ) :?>
									<div class="excerpt"><?php echo $description; ?></div>
								<?php endif; ?>
						<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "bonestheme"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "bonestheme"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>
					</div>

					<div class="thumbnails pintrest">
					
						<?php if (is_category()) :?>
							<?php 
								global $wp_query;
								$cat_query = $wp_query->query;
								$cat_query['posts_per_page'] = -1;
								$cat_query['order'] = 'ASC';
							?>
							<?php query_posts( $cat_query); ?>
						<?php endif;?>
						<?php if (have_posts()) : $post_index = 0; while (have_posts()) : the_post(); ?>
						
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pin magazine-article'); ?> role="article">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="thumbnail">
										<div class="wrapper">
											<?php
												$custom = get_post_custom();
											?>
											<?php if(isset($custom['selo'])): foreach ($custom['selo'] as $selo): ?>
												<img class="selo" alt="" src="<?php echo $selo; ?>"/>
											<?php endforeach; endif;?>
											<h4 class="title"><?php the_title(); ?></h4>
											<p class="excerpt"><?php the_excerpt_max_charlength(200); ?></p>										
											<?php the_post_thumbnail( 'big'); ?>
										</div>
									</a>
								</article> <!-- end article -->
						
						<?php $post_index++; endwhile; ?>	
					
									
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
						    </header>
						    <section class="post_content">
						    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					</div>
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>