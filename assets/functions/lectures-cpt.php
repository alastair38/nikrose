<?php

/**
 * Lectures CPT for listing lectures
 */

function ac_base_lectures() {
  // creating (registering) the custom type
  register_post_type( 'lectures', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Lectures', 'ac_base'), /* This is the Title of the Group */
      'singular_name' => __('Lecture', 'ac_base'), /* This is the individual type */
      'all_items' => __('All Lectures', 'ac_base'), /* the all items menu item */
      'add_new' => __('Add New Lecture', 'ac_base'), /* The add new menu item */
      'add_new_item' => __('Add New Lecture', 'ac_base'), /* Add New Display Title */
      'edit' => __( 'Edit', 'ac_base' ), /* Edit Dialog */
      'edit_item' => __('Edit Lecture', 'ac_base'), /* Edit Display Title */
      'new_item' => __('New Lecture', 'ac_base'), /* New Display Title */
      'view_item' => __('View Lecture', 'ac_base'), /* View Display Title */
      'search_items' => __('Search Lectures', 'ac_base'), /* Search Custom Type Title */
      'not_found' =>  __('Nothing found in the Database.', 'ac_base'), /* This displays if there are no entries yet */
      'not_found_in_trash' => __('Nothing found in Trash', 'ac_base'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */
      'menu_icon' => 'dashicons-groups', /* the icon for the custom post type menu */
      'has_archive' => true, /* you can rename the slug here */
      'rewrite'     => ['slug' => 'lectures'],
      'with_front' => false,
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
    ) /* end of options */
  ); /* end of register post type */

}

add_action( 'init', 'ac_base_lectures');