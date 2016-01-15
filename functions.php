<?php 
 //Define Constants
 define('THEMEROOT', get_stylesheet_directory_uri());
 define('IMAGES', THEMEROOT.'/images');
 define('CSS', THEMEROOT.'/css');
 define('JS', THEMEROOT.'/js');


/*function enqueue_magnificpopup_styles() {
    wp_register_style('magnific_popup_style', get_template_directory_uri().'/magnific-popup/magnific-popup.css', array('style'));
    wp_enqueue_style('magnific_popup_style');
}
add_action('wp_enqueue_scripts', 'enqueue_magnificpopup_styles');*/

function theme_js() {
	wp_enqueue_script(
		'bootstrap_js',
		get_template_directory_uri() . '/js/bootstrap.js',
		array( 'jquery' ), '', true
	);

	wp_register_script ('magnific_js', get_stylesheet_directory_uri() . '/magnific-popup/jquery.magnific-popup.js',
		array('jquery'), '1.0.1', true);

	wp_enqueue_script(
		'magnific_js'
	);

	wp_register_script ('trigger_js', get_stylesheet_directory_uri() . '/magnific-popup/trigger.js',
		array('jquery'), '0.1', true);

	wp_enqueue_script(
		'trigger_js'
	);
	
}

add_action( 'wp_enqueue_scripts', 'theme_js');

/*function ajax_popup_method() {
	wp_enqueue_scripts ('magnific_js', get_template_directory_uri(). 'js/jquery.magnific-popup.js',array('jquey'), '',true);
}

add_action( 'wp_enqueue_scripts', 'ajax_popup_method' );*/

add_filter ('show_admin_bar', '__return_false');

add_theme_support ('menus');

function register_theme_menus() {
 	register_nav_menus (
		array(
			'header-menu' => __('Header Menu')
		)
	);
}
add_action ('init', 'register_theme_menus');

add_theme_support( 'post-thumbnails' ); 


add_image_size ('featured-large', 780, 332);
add_image_size ('featured-small', 433, 258, true);


// Add other useful image sizes for use through Add Media modal
add_image_size( 'medium-width', 780, 332, true );
add_image_size( 'medium-height', 9999, 480 );
add_image_size( 'medium-something', 480, 480 );

// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-width' => __( 'Medium Width' ),
        'medium-height' => __( 'Medium Height' ),
        'medium-something' => __( 'Medium Something' ),
    ) );
}






?>