<!-- TAGLINE -->
<div class="tagline">
	<h1>Live different than the rest.</h1>
</div>
<!-- END TAGLINE -->

<div class="hero">
	<?php 
	$loop = new WP_Query( array( 'post_type' => 'hero', 'order' => 'ASC' ) );
	    if ( $loop->have_posts() ) :
	        while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
						  <div style="background-image: url(<?php echo $backgroundImg[0] ?>);" class="hero-bg">
						  	<div class="outer-hero-text-container">
						  		<div class="inner-hero-text-container">
						  			<!--<h1><?php the_title(); ?></h1>-->
						  			<?php the_content();
						  				if (get_field('hero_link')):
						  			 ?>
						  			<a href="<?php the_field('hero_link'); ?>"><?php the_field('hero_button_label'); ?></a>
						  			<?php endif; ?>
						  		</div>
						  	</div>
						  </div>
					<?php endwhile; 
			endif; 
	wp_reset_postdata(); 
	?>
</div>
<!-- SCROLL ARROW -->
<a class="smooth-scroll-button" href="#residential"><i class="fa fa-angle-down"></i></a>

<!-- TRANSPARENT TRIANGLE -->
<div class="triangle">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/transparent-triangle.png" alt="" />
</div>