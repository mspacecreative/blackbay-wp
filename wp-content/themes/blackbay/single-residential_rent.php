<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	
	<div class="featured-bg-img">
		<?php if ( has_post_thumbnail() ) {
					    the_post_thumbnail();
			} ?>
	</div>
	<?php
		if ( et_builder_is_product_tour_enabled() ):
			// load fullwidth page in Product Tour mode
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

		<?php endwhile;
		else:
	?>
	<div class="container">
		<!-- SINGLE LISTING SECTION -->
		<div class="fw-container clearfix">
			
			<!-- LEFT SIDE CONTENT SECTION -->
			<div class="left-content">
			
				<h1 class="dark"><?php the_title(); ?></h1>
				
				<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
							
							the_content();
						
					} // end while
				} // end if
				?>
				
				<!-- CLEARFIX -->
				<div class="clearfix">
				
				<!-- BUILDING FEATURES -->
				<h3 class="line-rule-right"><span>Building Features</span></h3>
				<!-- /BUILDING FEATURES -->
					
					<!-- ONE HALF -->
					<div class="one_half" style="margin-top: 20px;">
						
						<!-- BULLET BOX -->
						<div class="bullet-box">
							<ul>
								<?php if( have_rows('building_features') ):
								
								 	while ( have_rows('building_features') ) : the_row(); ?>
								 	
								<li><?php the_sub_field('features_list'); ?></li>
								
								<?php endwhile; else : endif; ?>
							</ul>
						</div>
						<!-- END BULLET BOX -->
						
					</div>
					<!-- END ONE HALF -->
					
					<!-- ONE HALF -->
					<div class="one_half last" style="margin-top: 20px;">
						
						<!-- UNIT INFO -->
						<div class="unit-info-box">
							<h3><?php _e('Monthly Unit Costs'); ?></h3>
							<ul>
								<?php if( have_rows('unit_features') ):
								
								 	while ( have_rows('unit_features') ) : the_row(); ?>
								 	
								<li><?php the_sub_field('unit_list'); ?></li>
								
								<?php endwhile; else : endif; ?>
							</ul>
						</div>
						<!-- /UNIT INFO -->
						
						<!-- CTA BUTTONS -->
						<div class="button light cta-button">
							<a href="http://localhost/blackbay-wp/contact-blackbay/tenant-rental-application/">Landlord Reference</a>
						</div>
						<div class="button light">
							<?php if( get_field('more_info_button') ): ?>
							<a href="<?php the_field('more_info_button'); ?>" target="_blank">More Information</a>
							<?php endif; ?>
						</div>
						<!-- END CTA BUTTONS -->
						
					</div>
					<!-- END ONE HALF -->
					
				</div>
				<!-- END CLEARFIX -->
				
				<!-- PAGINATION -->
				<div class="post-navigation clear">
					<div class="half prev-link">
						<?php previous_post_link('%link', 'Previous'); ?>
					</div>
					<div class="half next-link">
						<?php next_post_link('%link', 'Next'); ?>
					</div>
				</div>
				<!-- END PAGINATION -->
				
			</div>
			<!-- END LEFT SIDE CONTENT SECTION -->
			
			<!-- RIGHT SIDE CONTENT SECTION -->
			<div class="right-content">
				
				<!-- SLIDE SHOW-->
				<?php 
				
				$images = get_field('photo_gallery');
				$size = 'full';
				
				if( $images ): ?>
				
				<!-- SLIDE SHOW-->
				<div class="photo-gallery">
				
					<?php foreach( $images as $image ): ?>
					<div>
						<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
					</div>
					<?php endforeach; ?>
					
				</div>
				<!-- END SLIDE SHOW-->
				
				<?php endif; ?>
				
				<!-- GOOGLE MAP -->
				<div class="google-map"><?php the_field('google_map'); ?></div>
				<!-- END GOOGLE MAP -->
				
			</div>
			<!-- END RIGHT SIDE CONTENT SECTION -->
			
		</div>
		<!-- END SINGLE LISTING SECTION -->
	</div> <!-- .container -->
	<?php endif; ?>
</div> <!-- #main-content -->

<?php

get_footer();