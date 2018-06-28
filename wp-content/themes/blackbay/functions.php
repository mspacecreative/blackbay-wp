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
function styles_scripts() {
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
	wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('slick-script');
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), null );
	wp_enqueue_style('slick-theme');
	
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/css/slick.css', array(), null );
	wp_enqueue_style('slick');
	
	wp_enqueue_style( 'rental', get_stylesheet_directory_uri() . '/css/rental_app.css', array(), null );
	wp_enqueue_style('rental');
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

/* ABOUT PAGE SIDEBAR */
function about_page_sidebar() {
	register_sidebar( array(
		'name' => esc_html__( 'About Page Sidebar', 'BlackBay' ),
		'id' => 'sidebar-about',
		'before_widget' => '<div id="%1$s" class="et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .et_pb_widget -->',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}

// GOOGLE MAP
function google_maps() {
    ob_start();
    get_template_part('includes/google-map');
    return ob_get_clean();
}

// GOOGLE MAP API
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyAMjm_0er-ybuWcVoPXYLSr82mn6bvNqCY');
}

// ACTIONS, OPTIONS AND FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'styles_scripts');
add_action( 'widgets_init', 'about_page_sidebar' );
add_action('acf/init', 'my_acf_init');

// SHORTCODES
add_shortcode('light_button', 'boxed_buttons');
add_shortcode('dark_button', 'boxed_buttons_dark');
add_shortcode( 'google_map', 'google_maps' );