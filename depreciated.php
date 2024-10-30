<?php
/*
The legacy shortcodes: catcountposts, countposts, countpost, postsincat, postincat, ccp; have been depreciated as of version 3.0 of this plugin. The new shortcodes offer better functionality and are easier to use. However, this plugin will continue to support the old shortcodes indefinetely, so there is no need to update shortcodes you've already used.
*/

// LEGACY FUNCTION
function cat_count_posts( $atts ) {
	extract( shortcode_atts( array( // extract arguments
		'cat' => NULL, 
		'tag' => NULL,
		'type' => NULL,
	), $atts ) ); 
	
	// determine type
	if( $type == 'name' ) $utype = 'name'; // category name
	elseif( $type == 'id' ) $utype = 'cat_ID'; // category ID number
	else $utype = 'slug'; // otherwise assume slug

	if( !empty( $cat ) ) {
		$categories = get_categories(); // load all categories into array
		foreach( $categories as $category ) 
			if( $category->$utype == $cat ) return $category->count; // return count on match
	}
	
	elseif( !empty( $tag ) ) {
		$tagies = get_tags(); // load all categories into array
		foreach( $tagies as $tagie ) 
			if( $tagie->$utype == $tag ) return $tagie->count; // return count on match

	}
	
	else {
		return 0; // else return 0
	}
}

// LEGACY SHORTCODES
$shortcodes = array( // list of shortcodes
	'catcountposts', 
	'countposts', 
	'countpost', 
	'postsincat', 
	'postincat', 
	'ccp' );
foreach( $shortcodes as $shortcode ) add_shortcode( $shortcode, 'cat_count_posts' );
?>