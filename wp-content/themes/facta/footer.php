			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
		          <hr />
		          <div id="widget-footer" class="clearfix row-fluid">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					
					<div class="footer-logos">
						<img src="<?php echo get_template_directory_uri(); ?>/images/footer-logos.png" alt="">
					</div>
					<div class="creative-commons">
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/br/deed.en_US">
							<img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/br/80x15.png" />
						</a><?php _e('Este trabalho está licenciado em conformidade com a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/br/deed.en_US">Creative Commons Atribuição-NãoComercial-CompartilhaIgual 3.0 Brasil');?></a>.
					</div>


				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->


  		<!-- photoswipe gallery stuff -->
  		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/photoswipe/klass.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/photoswipe/code.photoswipe.jquery-3.0.5.min.js"></script>
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>