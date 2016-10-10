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

/* Get First image - Simom Hasan */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}


if ( ! function_exists( 'twentyfifteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_entry_meta() {
  if ( is_sticky() && is_home() && ! is_paged() ) {
    printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'twentyfifteen' ) );
  }

  $format = get_post_format();
  

  if ( 'post' == get_post_type() ) {
    if ( is_singular() || is_multi_author() ) {
      printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text" style="display:none">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
        _x( 'Author', 'Used before post author name.', 'twentyfifteen' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
    }

    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfifteen' ) );
    if ( $categories_list && twentyfifteen_categorized_blog() ) {
      printf( '<span class="cat-links"><span class="screen-reader-text" style="display:none">%1$s </span>%2$s</span>',
        _x( 'Categories', 'Used before category names.', 'twentyfifteen' ),
        $categories_list
      );
    }

    $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfifteen' ) );
    if ( $tags_list ) {
      printf( '<span class="tags-links"><span class="screen-reader-text" style="display:none">%1$s </span>%2$s</span>',
        _x( 'Tags', 'Used before tag names.', 'twentyfifteen' ),
        $tags_list
      );
    }
  }

  if ( is_attachment() && wp_attachment_is_image() ) {
    // Retrieve attachment metadata.
    $metadata = wp_get_attachment_metadata();

    printf( '<span class="full-size-link"><span class="screen-reader-text" style="display:none">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
      _x( 'Full size', 'Used before full size attachment link.', 'twentyfifteen' ),
      esc_url( wp_get_attachment_url() ),
      $metadata['width'],
      $metadata['height']
    );
  }
if ( current_theme_supports( 'post-formats', $format ) ) {
    printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
      sprintf( '<span class="screen-reader-text" style="display:none">%s </span>', _x( 'Format', 'Used before post format.', 'twentyfifteen' ) ),
      esc_url( get_post_format_link( $format ) ),
      get_post_format_string( $format )
    );
  }

  if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" style="display:none" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      get_the_date(),
      esc_attr( get_the_modified_date( 'c' ) ),
      get_the_modified_date()
    );

    printf( '<span class="posted-on"><span class="screen-reader-text" style="display:none">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
      _x( 'Posted on', 'Used before publish date.', 'twentyfifteen' ),
      esc_url( get_permalink() ),
      $time_string
    );
  }

}
endif;


function twentyfifteen_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'twentyfifteen_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,

      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'twentyfifteen_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so twentyfifteen_categorized_blog should return false.
    return false;
  }
}