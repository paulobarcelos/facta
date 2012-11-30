<?php
	$custom = get_post_custom();
?>
<?php get_header(); ?>

			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php 
						$category = get_the_category($post->ID);
						$category = $category[0];

						$previous_post = get_adjacent_post( TRUE, '', TRUE );
						$next_post = get_next_post( TRUE, '', FALSE );
					?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<ul class="pager">
								<?php if(empty($previous_post)):?>
									<li class="pull-left inactive">
										<span>&larr;</span>
									</li>
								<?php else:?>
									<li class="pull-left">
										<a href="<?php echo get_permalink( $previous_post->ID );?>">&larr;</a>
									</li>
								<?php endif;?>
								
								<?php if(empty($next_post)):?>
									<li class="pull-right inactive">
										<span>&rarr;</span>
									</li>
								<?php else:?>
									<li class="pull-right">
										<a href="<?php echo get_permalink( $next_post->ID );?>">&rarr;</a>
									</li>
								<?php endif;?>
								
							</ul>
						
						<header>
							
							<div class="page-header">
								<h1><?php the_title(); ?></h1>
								<?php if ( !empty( $post->post_excerpt ) ) :?>
									<p class="excerpt"><?php echo $post->post_excerpt; ?></p>
								<?php endif; ?>
								<?php if(isset($custom['author'])):?>
									<span class="author"><?php echo $custom['author'][0]; ?></span>
								<?php endif; ?>
								
							</div>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_content(); ?>



					
						</section> <!-- end article section -->

						<ul class="breadcrumb">
								<li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> <span class="divider">&#8594;</span></li>
								<li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo $category->name;?></a> <span class="divider">&#8594;</span></li>
								<li class="active"><?php the_title(); ?></li>
							</ul>
							
							<ul class="pager">
								<?php if(empty($previous_post)):?>
									<li class="pull-left inactive">
										<span>&larr;</span>
									</li>
								<?php else:?>
									<li class="pull-left">
										<a href="<?php echo get_permalink( $previous_post->ID );?>">&larr;</a>
									</li>
								<?php endif;?>
								
								<?php if(empty($next_post)):?>
									<li class="pull-right inactive">
										<span>&rarr;</span>
									</li>
								<?php else:?>
									<li class="pull-right">
										<a href="<?php echo get_permalink( $next_post->ID );?>">&rarr;</a>
									</li>
								<?php endif;?>
								
							</ul>
						
						
					
					</article> <!-- end article -->
					
					<?php //comments_template(); ?>
					
					<?php endwhile; ?>	
					
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
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>