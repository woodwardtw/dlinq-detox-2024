<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


function detox_homepage_posts(){
	$args = array(
		'post_type' => array('post'),
		'post_status' => array('publish')

	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
			global $post;
			$title = get_the_title();
			$link = get_the_permalink();
			$img = get_the_post_thumbnail($post->ID,'medium', array('class' => 'img-fluid'));
			$class = ($the_query->current_post % 2 == 0) ? 'col-md-7' : 'col-md-5' ;
			$img_side = ($the_query->current_post % 3 == 0) ? 'order-md-last' : 'order-md-first';
			$html = "<div class='{$class}'>
					<div class='container-fluid'>
						<div class='row'>
							<div class='col-md-8 '>
								<h2>{$title}</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem dui, tempor ac est vel, iaculis lacinia ipsum. Suspendisse magna lectus, cursus eget metus sit amet, sollicitudin porta purus. Donec eleifend magna mi, a sagittis ex sodales a. Nam convallis orci sapien, ac pretium ex pretium in. Pellentesque ullamcorper dapibus felis. Donec aliquet nibh sed dolor tincidunt fringilla. Etiam sit amet consectetur purus. Sed semper, dolor eu semper ornare, urna justo euismod velit, e</p>
								<a class='btn btn-more' href='{$link}'>Explore</a>
							</div>
							<div class='col-md-4 {$img_side}'>
								{$img}
							</div>
						</div>
					</div>
				</div>";
		// Do Stuff
		echo $html;
		endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
}