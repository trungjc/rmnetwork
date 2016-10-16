<?php
/**
 * Functions - Child theme custom functions
 */


/*****************************************************************************************************************
************************** Caution: do not remove or edit anything within this section **************************/

/**
 * Loads the Divi parent stylesheet.
 * Do not remove this or your child theme will not work unless you include a @import rule in your child stylesheet.
 */
function dce_load_divi_stylesheet() {
    wp_enqueue_style( 'divi-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'dce_load_divi_stylesheet' );

/**
 * Makes the Divi Children Engine available for the child theme.
 * Do not remove this or you will lose all the customization capabilities created by Divi Children Engine.
 */
require_once('divi-children-engine/divi_children_engine.php');

/****************************************************************************************************************/

function loadAssetCss(){
	wp_enqueue_style('full-page-css', get_stylesheet_directory_uri() .'/Asset/css/jquery.fullpage.min.css');
}
add_action('wp_enqueue_scripts', 'loadAssetCss');

function loadAssetJs(){
	wp_enqueue_script('full-page-js', get_stylesheet_directory_uri() .'/Asset/js/jquery.fullpage.min.js');
	wp_enqueue_script('moment-js', get_stylesheet_directory_uri() .'/Asset/js/moment.min.js');
	wp_enqueue_script('moment-timezone-js', get_stylesheet_directory_uri() .'/Asset/js/moment-timezone-with-data.min.js');
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() .'/Asset/js/custom.js');
}
add_action('wp_enqueue_scripts', 'loadAssetJs');

function bweb_feedzy_meta_hide_author($metaArgs, $feedURL){
    $metaArgs['author'] = false;
    return $metaArgs;
}
add_filter('feedzy_meta_args', 'bweb_feedzy_meta_hide_author', 9, 2);

