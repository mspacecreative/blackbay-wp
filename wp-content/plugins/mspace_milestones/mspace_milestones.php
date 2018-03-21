<?php
/*
 * Plugin Name: M Space Milestones
 * Plugin URI: http://mspacecreative.com
 * Description: Show a list of milestones in a slider format
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function milestones_slider() {
 	ob_start();
 		include(plugin_dir_path( __FILE__ ) . 'includes/milestones.php');
 	return ob_get_clean();
 }
 
 add_shortcode( 'milestones_slider', 'milestones_slider' );