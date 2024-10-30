<?php
/*
Plugin Name: Count Posts in a Category, Tag, or Custom Taxonomy
Plugin URI: http://shinraholdings.com/plugins/count-posts-in-a-category
Description: Adds a custom short code that returns the number of posts in a given category.
Version: 3.1
Author: bitacre
Author URI: http://shinraholdings.com
License: GPLv2 
	Copyright 2012 Shinra Web Holdings (plugins@shinraholdings.com)
Usage: 
	[cat_count slug="category-slug"]
	[tag_count slug="tag-slug"]
	[tax_count tax="custom-taxonomy-type" slug="taxonomy-slug"]

	You may also use id="44" or name="Term Name" instead of slug="term-slug".
	
	Multiple IDs or slugs separated by commas will have their counts summed:
	[cat_count id="44,56,77,198"]
*/

// include depreciated shortcodes
include_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'depreciated.php' );

// category count function
function cpina_cat_count( $atts ) {
	$taxonomy = 'category';
	
	// extract args
	extract( shortcode_atts( array( 
		'slug' => NULL, 
		'id' => NULL,
		'name' => NULL,
	), $atts ) ); 
	
	// determine type
	if( !empty( $slug ) ) { $field = 'slug'; $value = $slug; }
	elseif( !empty( $id ) ) { $field = 'id'; $value = $id; }
	elseif( !empty( $name ) ) { $field = 'name'; $value = $name; }
	else return 0; // nothing specified
	
	// get sum
	if( $field != 'name' && strpos( $value, ',' ) != false ) {
		$values = explode( ',', $value );
		$count_sum = 0;
		foreach( $values as $value ) {
			$term = get_term_by( $field, $value, $taxonomy ); // get term object
			if( isset( $term->count ) ) $count_sum = $count_sum + $term->count;
		}
		return $count_sum;
	}
	
	$term = get_term_by( $field, $value, $taxonomy ); // get term object
	if( isset( $term->count ) ) return $term->count;
	else return 0;
}
add_shortcode( 'cat_count', 'cpina_cat_count' );


// tag count function
function cpina_tag_count( $atts ) {
	$taxonomy = 'post_tag';
	
	// extract args
	extract( shortcode_atts( array( 
		'slug' => NULL, 
		'id' => NULL,
		'name' => NULL,
	), $atts ) ); 
	
	// determine type
	if( !empty( $slug ) ) { $field = 'slug'; $value = $slug; }
	elseif( !empty( $id ) ) { $field = 'id'; $value = $id; }
	elseif( !empty( $name ) ) { $field = 'name'; $value = $name; }
	else return 0; // nothing specified
	
		// get sum
	if( $field != 'name' && strpos( $value, ',' ) != false ) {
		$values = explode( ',', $value );
		$count_sum = 0;
		foreach( $values as $value ) {
			$term = get_term_by( $field, $value, $taxonomy ); // get term object
			if( isset( $term->count ) ) $count_sum = $count_sum + $term->count;
		}
		return $count_sum;
	}
	
	$term = get_term_by( $field, $value, $taxonomy ); // get term object
	if( isset( $term->count ) ) return $term->count;
	else return 0;
}
add_shortcode( 'tag_count', 'cpina_tag_count' );


// custom taxonomy count function
function cpina_tax_count( $atts ) {
	
	// extract args
	extract( shortcode_atts( array( 
		'slug' => NULL, 
		'id' => NULL,
		'name' => NULL,
		'tax' => NULL
	), $atts ) ); 
	
	// determine taxonomy
	if( empty( $tax ) ) return 0;
	
	// determine type
	if( !empty( $slug ) ) { $field = 'slug'; $value = $slug; }
	elseif( !empty( $id ) ) { $field = 'id'; $value = $id; }
	elseif( !empty( $name ) ) { $field = 'name'; $value = $name; }
	else return 0; // nothing specified
	
		// get sum
	if( $field != 'name' && strpos( $value, ',' ) != false ) {
		$values = explode( ',', $value );
		$count_sum = 0;
		foreach( $values as $value ) {
			$term = get_term_by( $field, $value, $tax ); // get term object
			if( isset( $term->count ) ) $count_sum = $count_sum + $term->count;
		}
		return $count_sum;
	}
	
	$term = get_term_by( $field, $value, $tax ); // get term object
	if( isset( $term->count ) ) return $term->count;
	else return 0;
}
add_shortcode( 'tax_count', 'cpina_tax_count' );


?>