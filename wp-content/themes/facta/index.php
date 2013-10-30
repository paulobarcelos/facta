<?php
	$categories = get_categories(array(
		'parent' => 0,
		'order' => 'DESC',
		'orderby' => 'id'
	));


	$redirect = get_option('facta_home_redirect');
	if($redirect){
		if((get_option('facta_redirect_only_once') && !@$_SESSION['home_redirect']) || !get_option('facta_redirect_only_once')){
			$_SESSION['home_redirect'] = true;
			wp_redirect( $redirect );
			exit();
		}	
	}
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
								'category_name' => $category->slug,
								'order' => 'ASC'
							));
							$first_post = $posts[0];
							
					?>
						<article id="category-<?php echo $category->cat_ID; ?>" class="span6 cover" role="article">
						
							<a href="<?php echo get_category_link($category->cat_ID) ?>" title="<?php echo $category->name; ?>" rel="bookmark">
								<h3><?php echo $category->name; ?></h3>
							
								<?php echo get_the_post_thumbnail( $first_post->ID , 'big' ); ?> 
							</a>
						
						</article> <!-- end article -->

					<?php endforeach;?>
			
				</div>     
			</div> <!-- end #content -->

<?php get_footer(); ?>