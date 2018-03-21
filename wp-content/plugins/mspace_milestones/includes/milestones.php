<div style="padding: 50px 0;">
	
<h1 style="text-align: center; position: relative; z-index: 2; padding: 0 5%;">blackbay&#8217;s milestones</h1>

<div class="slick-bg">
	<?php $loop = new WP_Query( array( 'post_type' => 'milestones', 'order' => 'ASC' ) );
			if ( $loop->have_posts() ) :
	        while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
						<div style="background: url(<?php echo $backgroundImg[0] ?>);" class="timeline-bg"></div>
					<?php endwhile;
			endif; 
	wp_reset_postdata(); ?>
</div>

<div class="swipe-container">
	<div class="timeline w-1080">
		<?php $loop = new WP_Query( array( 'post_type' => 'milestones', 'order' => 'ASC' ) );
				if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div>
							<i class="fa fa-circle"></i><p class="light center"><?php the_title(); ?></p>
						</div>
						<?php endwhile;
				endif; 
		wp_reset_postdata(); ?>
	</div>
	
	<div class="slider-for w-800">
	<?php $loop = new WP_Query( array( 'post_type' => 'milestones', 'order' => 'ASC' ) );
			if ( $loop->have_posts() ) :
	        while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div>
			<?php the_content(); ?>
		</div>
					<?php endwhile;
			endif; 
	wp_reset_postdata(); ?>
	</div>
</div>
				
</div>