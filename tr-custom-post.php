<?php


// Register Custom Post Type
function tr_portfolio_custom_post_type() {

$labels = array(
'name'                => _x( 'TR Portfolio', 'Post Type General Name', 'text_domain' ),
'singular_name'       => _x( 'TR Portfolio', 'Post Type Singular Name', 'text_domain' ),
'menu_name'           => __( 'TR Portfolio', 'text_domain' ),
'name_admin_bar'      => __( 'TR Portfolio', 'text_domain' ),
'parent_item_colon'   => __( 'Parent Portfolio:', 'text_domain' ),
'all_items'           => __( 'All Portfolio', 'text_domain' ),
'add_new_item'        => __( 'Add New Portfolio', 'text_domain' ),
'add_new'             => __( 'Add Portfolio', 'text_domain' ),
'new_item'            => __( 'New Portfolio', 'text_domain' ),
'edit_item'           => __( 'Edit Portfolio', 'text_domain' ),
'update_item'         => __( 'Update Portfolio', 'text_domain' ),
'view_item'           => __( 'View Portfolio', 'text_domain' ),
'search_items'        => __( 'Search Portfolio', 'text_domain' ),
'not_found'           => __( 'Not found', 'text_domain' ),
'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
);
$args = array(
'label'               => __( 'post_type', 'text_domain' ),
'description'         => __( 'Post Type Description', 'text_domain' ),
'labels'              => $labels,
'supports'            => array('title','editor','thumbnail' ),
'taxonomies'          => array( '' ),
'hierarchical'        => false,
'public'              => true,
'show_ui'             => true,
'show_in_menu'        => true,
'menu_position'       => 5,
'show_in_admin_bar'   => true,
'show_in_nav_menus'   => true,
'can_export'          => true,
'has_archive'         => true,
'exclude_from_search' => false,
'publicly_queryable'  => true,
'capability_type'     => 'page',
);
register_post_type( 'tr_portfolio', $args );

}



// Hook into the 'init' action
add_action( 'init', 'tr_portfolio_custom_post_type', 0 );


// Register Custom Taxonomy

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function tr_portfolio_add_custom_taxonomies() {
    // Add new "Locations" taxonomy to Posts
    register_taxonomy('tr_portfolio_taxonomy', 'tr_portfolio', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Portfolios', 'tr' ),
            'singular_name' => _x( 'Portfolio', 'tr' ),
            'search_items' =>  __( 'Search Portfolios' ),
            'all_items' => __( 'All Portfolios' ),
            'parent_item' => __( 'Parent Portfolio' ),
            'parent_item_colon' => __( 'Parent Portfolio:' ),
            'edit_item' => __( 'Edit Portfolio' ),
            'update_item' => __( 'Update Portfolio' ),
            'add_new_item' => __( 'Add New Portfolio' ),
            'new_item_name' => __( 'New Portfolio' ),
            'menu_name' => __( 'Portfolios' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'Portfolios', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action( 'init', 'tr_portfolio_add_custom_taxonomies', 0 );

