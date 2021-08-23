<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JohnyCustomPosts {

	function __construct()
	{
		add_action( 'init', array( $this, 'johny_portfolio') );
		add_action( 'init', array( $this, 'johny_portfolio_tags') );
	}



	/**
	 *
	 * Spark Portfolio Custom Post Type
	 *
	 */
	public function johny_portfolio()
	{

		$labels = array(
			'name'               => _x( 'Portfolio' , 'post type general name', 'maxive' ),
			'singular_name'      => _x( 'Portfolio', 'post type singular name', 'maxive' ),
			'menu_name'          => _x( 'Portfolio' , 'admin menu', 'maxive' ),
			'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'maxive' ),
			'add_new'            => __( 'Add New Portfolio', 'maxive' ),
			'add_new_item'       => __( 'Add New Portfolio', 'maxive' ),
			'new_item'           => __( 'New Portfolio', 'maxive' ),
			'edit_item'          => __( 'Edit Portfolio', 'maxive' ),
			'view_item'          => __( 'View Portfolio', 'maxive' ),
			'all_items'          => __( 'All Portfolios', 'maxive' ),
			'search_items'       => __( 'Search Portfolios', 'maxive' ),
			'parent_item_colon'  => __( 'Parent :', 'maxive' ),
			'not_found'          => __( 'No Portfolios found.', 'maxive' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'maxive' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'maxive' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-businessman',
			'rewrite'            => array( 'slug' => 'portfolio', 'with_front' => true, 'pages' => true, 'feeds' => true ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'menu_icon'	 	     => 'dashicons-admin-appearance',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
		);

		register_post_type('portfolio', $args);

	}



	/**
	 *
	 * Spark Portfolio Custom Post Type
	 *
	 */
	public function johny_test()
	{

		$labels = array(
			'name'               => _x( 'Test' , 'post type general name', 'maxive' ),
			'singular_name'      => _x( 'Test', 'post type singular name', 'maxive' ),
			'menu_name'          => _x( 'Test' , 'admin menu', 'maxive' ),
			'name_admin_bar'     => _x( 'Test', 'add new on admin bar', 'maxive' ),
			'add_new'            => __( 'Add New Test', 'maxive' ),
			'add_new_item'       => __( 'Add New Test', 'maxive' ),
			'new_item'           => __( 'New Test', 'maxive' ),
			'edit_item'          => __( 'Edit Test', 'maxive' ),
			'view_item'          => __( 'View Test', 'maxive' ),
			'all_items'          => __( 'All Tests', 'maxive' ),
			'search_items'       => __( 'Search Tests', 'maxive' ),
			'parent_item_colon'  => __( 'Parent :', 'maxive' ),
			'not_found'          => __( 'No Portfolios found.', 'maxive' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'maxive' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'maxive' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-businessman',
			'rewrite'            => array( 'slug' => 'tests', 'with_front' => true, 'pages' => true, 'feeds' => true ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'menu_icon'	 	     => 'dashicons-admin-appearance',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
		);

		register_post_type('tests', $args);
	}


	public function johny_portfolio_tags()
	{
	   	$labels = array(
			'name'              => _x( 'Tags', 'taxonomy general name', 'maxive' ),
			'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'maxive' ),
			'search_items'      => __( 'Search Tags', 'maxive' ),
			'all_items'         => __( 'All Tags', 'maxive' ),
			'parent_item'       => __( 'Parent Tag', 'maxive' ),
			'parent_item_colon' => __( 'Parent Tag:', 'maxive' ),
			'edit_item'         => __( 'Edit Tag', 'maxive' ),
			'update_item'       => __( 'Update Tag', 'maxive' ),
			'add_new_item'      => __( 'Add New Tag', 'maxive' ),
			'new_item_name'     => __( 'New Tag Name', 'maxive' ),
			'menu_name'         => __( 'Tag', 'maxive' ),
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'pf-tag' ),
		);

		register_taxonomy( 'portfolio-tag', array( 'portfolio' ), $args );
	}
}

$johnyCustomPostInstance = new JohnyCustomPosts;
