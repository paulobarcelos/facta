<?php
	$categories = get_categories(array(
		'parent' => 0
	));
	wp_redirect( get_category_link($categories[0]->cat_ID), 302 );
?>
<?php get_header(); ?>
			
			<?php
				$blog_hero = of_get_option('blog_hero');
				if ($blog_hero){
			?>
			<div class="clearfix row-fluid">
				<div class="hero-unit">				
					<h1><img src="<?php echo get_template_directory_uri(); ?>/images/logo-hero.png" alt="<?php bloginfo('title'); ?>"/></h1>					
				</div>
			</div>
			<?php
				}
			?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">

					<?php 
						foreach ($categories as $category) :
							$posts = get_posts(array(
								'numberposts' => 1,
								'category' => $category->cat_ID
							));
							$first_post = $posts[0];
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $first_post->ID ), 'big' ); 
							
					?>
						<article id="category-<?php echo $category->cat_ID; ?>" class="span6 cover" role="article">
						
							<a href="<?php echo get_category_link($category->cat_ID) ?>" title="<?php echo $category->name; ?>" rel="bookmark">
								<h3><?php echo $category->name; ?></h3>
								<img src=<?php echo $image[0];?> />
							</a>
						
						</article> <!-- end article -->

					<?php endforeach;?>
			
				</div>     
			</div> <!-- end #content -->

<?php get_footer(); ?>