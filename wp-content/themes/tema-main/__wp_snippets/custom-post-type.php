<?php
/*------------------------------------------------------------------------------------------
     # CUSTOM POST TYPE
 ------------------------------------------------------------------------------------------*/
function demo_cpt() {
    $singular = 'Custom Post';
    $plural = 'Custom Posts';
    $slug = str_replace( ' ', '_', strtolower( $singular ) );

    $labels = array(
        'name' 			      => __( $plural, 'Demo' ),
        'singular_name' 	  => __( $singular, 'Demo' ),
        'add_new' 		      => _x( 'Add New', 'Demo', 'Demo' ),
        'add_new_item'  	  => __( 'Add New ' . $singular, 'Demo' ),
        'edit'		          => __( 'Edit', 'Demo' ),
        'edit_item'	          => __( 'Edit ' . $singular, 'Demo' ),
        'new_item'	          => __( 'New ' . $singular, 'Demo' ),
        'view' 			      => __( 'View ' . $singular, 'Demo' ),
        'view_item' 		  => __( 'View ' . $singular, 'Demo' ),
        'search_term'   	  => __( 'Search ' . $plural, 'Demo' ),
        'parent' 		      => __( 'Parent ' . $singular, 'Demo' ),
        'not_found'           => __( 'No ' . $plural .' found', 'Demo' ),
        'not_found_in_trash'  => __( 'No ' . $plural .' in Trash', 'Demo' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'public'              => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => $slug),
        'menu_icon'           => 'dashicons-admin-post',
        'supports'            => array( 'title', 'thumbnail', 'editor' )
    );

    register_post_type( $slug, $args );
}

add_action( 'init', 'Demo_post_type_name' );


/*------------------------------------------------------------------------------------------
     # CUSTOM POST TYPE - Taxonomy
 ------------------------------------------------------------------------------------------*/
function Demo_tax_category() {
    $singular = 'Category';
    $plural = 'Categories';
    $slug = str_replace( ' ', '_', strtolower( $singular ) );

    $labels = array(
        'name'              => _x( $plural, 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search ' . $plural ),
        'all_items'         => __( 'All ' . $plural ),
        'parent_item'       => __( 'Parent ' . $singular ),
        'parent_item_colon' => __( 'Parent:' . $singular ),
        'edit_item'         => __( 'Edit ' . $singular ),
        'update_item'       => __( 'Update ' . $singular ),
        'add_new_item'      => __( 'Add New ' . $singular ),
        'new_item_name'     => __( 'New ' . $singular ),
        'menu_name'         => __( $plural ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical'  => true,
        'public'        => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'cpt_categories', 'post_type_name', $args );
}
add_action( 'init', 'Demo_tax_category', 0 );
