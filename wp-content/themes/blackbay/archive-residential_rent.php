<?php

get_header();

//$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

//$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	
	<div class="container">
		<!-- SINGLE LISTING SECTION -->
		<div class="fw-container clearfix">
			
			<h1 class="entry-title main_title"><?php _e('Residential Listings for Rent'); ?></h1>-
						
						<div class="grid testimonial-container">
						
							<div class="grid-sizer"></div>
							<div class="gutter-sizer"></div>
							
							<?php 
							if ( have_posts() ) {
								while ( have_posts() ) {
									the_post(); ?>
							
							<div class="grid-item index-post-box light-grey">
								<div class="grid-item-shadow">
									<div class="grid-inner">
										<i class="fa fa-plus"></i>
										<a class="taphover" href="<?php echo the_permalink(); ?>"></a>
										<?php if ( has_post_thumbnail() ) {
													    the_post_thumbnail();
											} else { ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blackbay_placeholder.jpg" alt="<?php the_title(); ?>" /> 
											<?php } ?>
									</div>
									<p><?php the_title(); ?></p>
								</div>
							</div>
							
							<?php } // end while
							} // end if
							?>
						
						</div>
			
		</div>
		<!-- END SINGLE LISTING SECTION -->
		
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();
