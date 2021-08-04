<?php

/**
 * Publications CPT for general support publications
 */

function ac_base_publications() {
  // creating (registering) the custom type
  register_post_type( 'publications', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Publications', 'ac_base'), /* This is the Title of the Group */
      'singular_name' => __('Publication', 'ac_base'), /* This is the individual type */
      'all_items' => __('All Publications', 'ac_base'), /* the all items menu item */
      'add_new' => __('Add New Publication', 'ac_base'), /* The add new menu item */
      'add_new_item' => __('Add New Publication', 'ac_base'), /* Add New Display Title */
      'edit' => __( 'Edit', 'ac_base' ), /* Edit Dialog */
      'edit_item' => __('Edit Publication', 'ac_base'), /* Edit Display Title */
      'new_item' => __('New Publication', 'ac_base'), /* New Display Title */
      'view_item' => __('View Publication', 'ac_base'), /* View Display Title */
      'search_items' => __('Search Publications', 'ac_base'), /* Search Custom Type Title */
      'not_found' =>  __('Nothing found in the Database.', 'ac_base'), /* This displays if there are no entries yet */
      'not_found_in_trash' => __('Nothing found in Trash', 'ac_base'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'show_ui' => true,
      'query_var' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */
      'menu_icon' => 'dashicons-media-document', /* the icon for the custom post type menu */
      'has_archive' => true, /* you can rename the slug here */
      'rewrite'     => ['slug' => 'publications'],
      'with_front' => false,
      'capability_type' => 'page',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'          => array('publications_categories'),
    ) /* end of options */
  ); /* end of register post type */

}

add_action( 'init', 'ac_base_publications');

//hook into the init action and call create_publications_categories_taxonomy when it fires

add_action( 'init', 'create_publications_categories_taxonomy', 0 );

function create_publications_categories_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Publication Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Publication Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Publication Categories' ),
    'popular_items' => __( 'Popular Publication Categories' ),
    'all_items' => __( 'All Publication Categories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Publication Category' ),
    'update_item' => __( 'Update Publication Category' ),
    'add_new_item' => __( 'Add New Publication Category' ),
    'new_item_name' => __( 'New Publication Category Name' ),
    'separate_items_with_commas' => __( 'Separate publications categories with commas' ),
    'add_or_remove_items' => __( 'Add or remove publications categories' ),
    'choose_from_most_used' => __( 'Choose from the most used publications categories' ),
    'menu_name' => __( 'Publication Categories' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('publications_categories','publications', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'public' => true,
    'publicly_queryable' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'publications/type' ),
  ));
}
