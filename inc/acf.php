<?php
/**
 * ACF specific functions
 *
 * @package WP-Bootstrap-Navwalker
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//CHALLENGES

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


	// Getting the entries
	$results = GFAPI::get_entries( $form_id, $search_criteria );
	$html = '';
	foreach ($results as $key => $result) {
		$text = ($result['6'] != '') ? "<div class='response-text'>{$result['6']}</div>" : '';
		$name = ($result['1.3'] != '' || $result['1.6'] != '') ? "<div class='response-name'>{$result['1.3']} {$result['1.6']}</div>" : '';
		$year = dlinq_year_cleaner($result['3']);
		$grad = ($result['3'] != '') ? "<div class='response-year'>'{$year}</div>" : '';
		//var_dump(dlinq_year_cleaner($result['3']));
		$img = ($result['8'] != '') ? "<div class='response-img'><img src='{$result['8']}' class='img-fluid' alt='An image created from the prompt.'></div>" : '';
		$html .= "<div class='response'>{$img} {$text} <div class='responder'>{$name} {$grad}</div></div>";
	}
	echo "<div class='response-holder'>
			<h2 id='responses'>Responses</h2>
			{$html}
		</div>";
}


//change title for ACF flexible layout in collapsed mode

add_filter('acf/fields/flexible_content/layout_title/name=content', 'dlinq_acf_fields_flexible_content_layout_title', 10, 4);
function dlinq_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

    if( get_sub_field('sub_topic_title') ) {
        $title .= ' - ' . get_sub_field('sub_topic_title');     
    }
	if( get_sub_field('title') ) {
        $title .= ' - ' . get_sub_field('title');     
    }
	 if( get_sub_field('accordion_title') ) {
        $title .= ' - ' . get_sub_field('accordion_title');     
    }

    return $title;
}



	//save acf json
		add_filter('acf/settings/save_json', 'detox_json_save_point');
		 
		function detox_json_save_point( $path ) {
		    
		    // update path
		    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $path;
		    
		}


		// load acf json
		add_filter('acf/settings/load_json', 'detox_json_load_point');

		function detox_json_load_point( $paths ) {
		    
		    // remove original path (optional)
		    unset($paths[0]);
		    
		    
		    // append path
		    $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $paths;
		    
		}