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
		'post_type' 	=> array('activity'),
		'post_status'	=> array('publish'),
		  'orderby' 	=> array(
			'date' =>'ASC',
			/*Other params*/
			)
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
			global $post;
			$title = get_the_title();
			$link = get_the_permalink();
			$img = get_the_post_thumbnail($post->ID,'medium', array('class' => 'img-fluid'));
			$content = get_the_content();
			$excerpt = substr($content, 0, 400) . ' . . .';
			$bg_colors = array('white', 'white', 'aqua', 'red', 'white', 'white');
			$bg_color = $bg_colors[$the_query->current_post]; //change background color according to array
			$make_seven = array(0, 1, 4, 5, 7 );
			$post_number = $the_query->current_post;
			$class = (in_array( $post_number, $make_seven )) ? 'col-md-7' : 'col-md-5' ; // alternate 5 and 7 column width blocks
			$img_side = ($the_query->current_post % 3 == 0) ? 'order-md-last' : 'order-md-first'; //alter img to go first or last 
			$html = "<div class='{$class}'>
						<div class='row {$bg_color} home-box'>
							<div class='col-md-5 {$img_side}'>
								{$img}
							</div>
							<div class='col-md-7'>
								<h2>{$title}</h2>
								<p>{$excerpt}</p>
								<a class='btn btn-more' href='{$link}' aria-lable='Read more about the AI topic: {$title}.'>Explore</a>
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


//CHALLENGES
//NEEDS TO BE IN MAIN FUNCTIONS FOR SOME REASON
//add gravity forms to acf field for the daily create challenge option
/**
 * Populate ACF select field options with Gravity Forms forms
 */

//might need something like https://wordpress.org/plugins/categories-for-gravity-forms/
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [''];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=form_id', 'acf_populate_gf_forms_ids' );