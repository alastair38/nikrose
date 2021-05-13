<?php

/**
 * Publications CPT for general support publications
 */

function ac_base_library() {
  // creating (registering) the custom type
  register_post_type( 'library', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Library', 'ac_base'), /* This is the Title of the Group */
      'singular_name' => __('Library Item', 'ac_base'), /* This is the individual type */
      'all_items' => __('All Library Items', 'ac_base'), /* the all items menu item */
      'add_new' => __('Add New Library Item', 'ac_base'), /* The add new menu item */
      'add_new_item' => __('Add New Library Item', 'ac_base'), /* Add New Display Title */
      'edit' => __( 'Edit', 'ac_base' ), /* Edit Dialog */
      'edit_item' => __('Edit Library Item', 'ac_base'), /* Edit Display Title */
      'new_item' => __('New Library Item', 'ac_base'), /* New Display Title */
      'view_item' => __('View Library Item', 'ac_base'), /* View Display Title */
      'search_items' => __('Search Library Items', 'ac_base'), /* Search Custom Type Title */
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
      'rewrite'     => ['slug' => 'library'],
      'with_front' => false,
      'capability_type' => 'page',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'          => array('library_categories', 'category' ),
    ) /* end of options */
  ); /* end of register post type */

}

add_action( 'init', 'ac_base_library');

//hook into the init action and call create_library_categories_taxonomy when it fires

add_action( 'init', 'create_library_categories_taxonomy', 0 );

function create_library_categories_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Library Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Library Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Library Categories' ),
    'popular_items' => __( 'Popular Library Categories' ),
    'all_items' => __( 'All Library Categories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Library Category' ),
    'update_item' => __( 'Update Library Category' ),
    'add_new_item' => __( 'Add New Library Category' ),
    'new_item_name' => __( 'New Library Category Name' ),
    'separate_items_with_commas' => __( 'Separate library categories with commas' ),
    'add_or_remove_items' => __( 'Add or remove library categories' ),
    'choose_from_most_used' => __( 'Choose from the most used library categories' ),
    'menu_name' => __( 'Library Categories' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('library_categories','library', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'library/library-categories' ),
  ));
}
