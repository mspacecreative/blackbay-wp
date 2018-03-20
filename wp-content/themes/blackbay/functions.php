<?php

/* MAIN STYLESHEET */
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ));
	
	/*wp_register_style('para-styles', get_stylesheet_directory_uri() . '/js/dzsparallaxer/dzsparallaxer.css', array(), '1.0', 'all');
	wp_enqueue_style('para-styles');*/
}

/* FOOTER SCRIPTS */
function footer_scripts() {
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
}

/* BUTTONS */
function boxed_buttons($atts, $content = null)
{
    return '<div class="button dark">' . $content . '</div>';
}

function boxed_buttons_dark($atts, $content = null)
{
    return '<div class="button light">' . $content . '</div>';
}

// ACTIONS, OPTIONS AND FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'footer_scripts');

// SHORTCODES
add_shortcode('light_button', 'boxed_buttons');
add_shortcode('dark_button', 'boxed_buttons_dark');