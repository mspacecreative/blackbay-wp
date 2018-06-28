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

// ALLOW HTML IN WORDPRESS FIELDS
function html_widget_title( $title ) {
//HTML tag opening/closing brackets
$title = str_replace( '[', '<', $title );
$title = str_replace( '[/', '</', $title );
// bold — changed from 's' to 'strong' because of strikethrough code
$title = str_replace( 'strong]', 'strong>', $title );
$title = str_replace( 'b]', 'b>', $title );
// italic
$title = str_replace( 'em]', 'em>', $title );
$title = str_replace( 'i]', 'i>', $title );
// underline
// $title = str_replace( 'u]', 'u>', $title ); // could use this, but it is deprecated so use the following instead
$title = str_replace( '<u]', '<span style=”text-decoration:underline;”>', $title );
$title = str_replace( '</u]', '</span>', $title );
// superscript
$title = str_replace( 'sup]', 'sup>', $title );
// subscript
$title = str_replace( 'sub]', 'sub>', $title );
// del
$title = str_replace( 'del]', 'del>', $title ); // del is like strike except it is not deprecated, but strike has wider browser support — you might want to replace the following 'strike' section to replace all with 'del' instead
// strikethrough or <s></s>
$title = str_replace( 'strike]', 'strike>', $title );
$title = str_replace( 's]', 'strike>', $title ); // <s></s> was deprecated earlier than so we will convert it
$title = str_replace( 'strikethrough]', 'strike>', $title ); // just in case you forget that it is 'strike', not 'strikethrough'
// tt
$title = str_replace( 'tt]', 'tt>', $title ); // Will not look different in some themes, like Twenty Eleven — FYI: http://reference.sitepoint.com/html/tt
// marquee
$title = str_replace( 'marquee]', 'marquee>', $title );
// blink
$title = str_replace( 'blink]', 'blink>', $title ); // only Firefox and Opera support this tag
// wtitle1 (to be styled in style.css using .wtitle1 class)
$title = str_replace( '<wtitle1]', '<span class=”wtitle1″>', $title );
$title = str_replace( '</wtitle1]', '</span>', $title );
// wtitle2 (to be styled in style.css using .wtitle2 class)
$title = str_replace( '<wtitle2]', '<span class=”wtitle2″>', $title );
$title = str_replace( '</wtitle2]', '</span>', $title );

return $title;
}

// ACTIONS, OPTIONS AND FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'styles_scripts');
add_action( 'widgets_init', 'about_page_sidebar' );
add_filter( 'widget_title', 'html_widget_title' );

// SHORTCODES
add_shortcode('light_button', 'boxed_buttons');
add_shortcode('dark_button', 'boxed_buttons_dark');