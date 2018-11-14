<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	
	<div class="bevel-overlay" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bevel-overlay.png);"></div>
	
	<?php if (has_post_thumbnail( $post->ID ) ){
	    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; 
	} ?>
	
	<div class="featured-bg-img" style="background-image: url(<?php echo $image ?>);"></div>
	
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
			
				<div class="title-desc-container">
					<h1 class="dark"><?php the_title(); ?></h1>
					
					<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
								
								the_content();
							
						} // end while
					} // end if
					?>
				</div>
				
				<!-- PROPERTY OVERVIEW -->
				<?php if( have_rows('property_details') ): ?>
				
				<h3 class="line-rule-right"><span>Property Details</span></h3>
				<div class="bullet-box">
					<ul>
						<?php while ( have_rows('property_details') ) : the_row(); ?>
						 	
						 	<li>
						 		<span style="font-weight: bold;"><?php the_sub_field('detail_label'); ?><?php _e(': '); ?>
						 		</span>
						 		<?php the_sub_field('detail_description'); ?>
						 	</li>
						
						<?php endwhile; ?>
					</ul>
				</div>
				<?php else : endif; ?>
				<!-- /PROPERTY OVERVIEW -->
				
				<!-- CTA BUTTONS -->
				<?php if( have_rows('external_links') ): ?>
					<?php while ( have_rows('external_links') ) : the_row(); ?>
						<div class="button light">
							<a href="<?php the_sub_field('external_link_url'); ?>" target="_blank"><?php the_sub_field('external_link_label'); ?></a>
						</div>
					<?php endwhile; else : 
				endif; ?>
				<!-- END CTA BUTTONS -->
				
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
				<?php 
				
				$location = get_field('location_map');
				
				if( !empty($location) ):
				?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
				<?php endif; ?>
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
