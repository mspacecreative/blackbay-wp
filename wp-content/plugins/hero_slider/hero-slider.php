<?php
/*
 * Plugin Name: M Space Hero Slider
 * Plugin URI: http://mspacecreative.com
 * Description: Full viewport slider, with headings and CTA
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function hero_slider_assets() {
 	wp_enqueue_style( 'hero-style', plugin_dir_url( __FILE__ ) . 'css/hero.css', array(), null );
 	wp_enqueue_style( 'owl-style', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), null );
 	wp_enqueue_style( 'owl-theme-style', plugin_dir_url( __FILE__ ) . 'css/owl.theme.default.min.css', array(), null );
 	wp_enqueue_script( 'owl-script', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
 	wp_enqueue_script( 'hero-script', plugin_dir_url( __FILE__ ) . 'js/hero.js', array( 'jquery' ), '1.0', true );
 }
 
 function hero_slider() {
 	ob_start();
 		include(plugin_dir_path( __FILE__ ) . 'includes/hero_slider_layout.php');
 	return ob_get_clean();
 }
 
 add_shortcode( 'hero_slider', 'hero_slider' );
 add_action( 'wp_enqueue_scripts', 'hero_slider_assets' );