<?php 
// Rodowody psów - post type
if ( ! function_exists('sn_wp_custom_post_type_rodowody_psow') ) {
	// Register Custom Post Type
	function sn_wp_custom_post_type_rodowody_psow() {
		$labels = array(
			'name'                  => _x( 'Rodowody psów', 'Post Type General Name', 'web14devsn' ),
			'singular_name'         => _x( 'Rodowód psa', 'Post Type Singular Name', 'web14devsn' ),
			'menu_name'             => __( 'Rodowody psów', 'web14devsn' ),
			'name_admin_bar'        => __( 'Rodowody psów', 'web14devsn' ),
			'archives'              => __( 'Item Archives', 'web14devsn' ),
			'attributes'            => __( 'Item Attributes', 'web14devsn' ),
			'parent_item_colon'     => __( 'Parent Item:', 'web14devsn' ),
			'all_items'             => __( 'Wszystkie', 'web14devsn' ),
			'add_new_item'          => __( 'Dodaj nowy', 'web14devsn' ),
			'add_new'               => __( 'Dodaj nowy', 'web14devsn' ),
			'new_item'              => __( 'Nowy rodowód', 'web14devsn' ),
			'edit_item'             => __( 'Edytuj rodowód', 'web14devsn' ),
			'update_item'           => __( 'Update Item', 'web14devsn' ),
			'view_item'             => __( 'Zobacz rodowód', 'web14devsn' ),
			'view_items'            => __( 'Zobacz rodowody', 'web14devsn' ),
			'search_items'          => __( 'Szukaj', 'web14devsn' ),
			'not_found'             => __( 'Nie znaleziono', 'web14devsn' ),
			'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'web14devsn' ),
			'featured_image'        => __( 'Obrazek wyróżniający', 'web14devsn' ),
			'set_featured_image'    => __( 'Ustaw obrazek', 'web14devsn' ),
			'remove_featured_image' => __( 'Usuń obrazek', 'web14devsn' ),
			'use_featured_image'    => __( 'Użyj jako obrazek wyróżniający', 'web14devsn' ),
			'insert_into_item'      => __( 'Wstaw', 'web14devsn' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'web14devsn' ),
			'items_list'            => __( 'Lista pozycji', 'web14devsn' ),
			'items_list_navigation' => __( 'Items list navigation', 'web14devsn' ),
			'filter_items_list'     => __( 'Filter items list', 'web14devsn' ),
		);
		$args = array(
			'label'                 => __( 'Rodowody psów', 'web14devsn' ),
			'description'           => __( 'Rodowody psów', 'web14devsn' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-buddicons-activity',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => true,
			'show_in_rest'		=> true,
			'can_export'            => true,
			'has_archive'           => true,
			'rewrite' => array('slug' => 'dogs-list'),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'rodowody_psow', $args );
	}
	add_action( 'init', 'sn_wp_custom_post_type_rodowody_psow', 0 );
}