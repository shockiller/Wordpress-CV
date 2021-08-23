<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! function_exists( 'porfo_theme_setup' ) ) :

	function porfo_theme_setup() {

		global $porfo;

		// Load the theme text domain
		load_theme_textdomain( 'porfo', get_template_directory() . '/lang' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add title tag
		add_theme_support( 'title-tag' );

		// Add post-thumbnails
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'woocommerce' );

	    add_image_size( 'porfo-post-img-small', 370, 235, true );
	    add_image_size( 'porfo-post-img-medium', 555, 350, true );
	    add_image_size( 'porfo-post-img-large', 1140, 600, true );
	    add_image_size( 'porfo-service-img-large', 1140, 600, true );

	    // Set content width
	    if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}

		$defaults = array(
			'default-color'          => '#f8f8f8',
		);
		add_theme_support( 'custom-background', $defaults );

		if( function_exists('register_nav_menus') ) {
			register_nav_menus( array(
				'primary-menu' => esc_html__('Primany Menu', 'porfo'),
			) );
		}


	}

endif;

add_action( 'after_setup_theme', 'porfo_theme_setup' );


function porfo_dd($var){
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
}


/**
 * Detect Homepage
 *
 * @return boolean value
 */
function porfo_detect_homepage() {
    // If front page is set to display a static page, get the URL of the posts page.
    $homepage_id = get_option( 'page_on_front' );

    // current page id
    $current_page_id = ( is_page( get_the_ID() ) ) ? get_the_ID() : '';

    if( $homepage_id == $current_page_id ) {
        return true;
    } else {
        return false;
    }

}


/**
 *
 * Scorn Hide Footer Top
 *
 */

function porfo_hide_footer_top() {

	global $porfo;

	$output = 'show';

	if ( isset( $porfo['footer_top_switch'] ) ) {

		if( $porfo['footer_top_switch'] == true ) {

			$output = 'show';

		} else {

			$output = 'hide';

		}

	}

	if( function_exists( 'get_field') ) {

		if( get_field( 'hide_footer_top' ) ) {

			$output = 'hide';

		}

	}

	return $output;

}


/**
 *
 * Scorn Hide Footer Top
 *
 */

function porfo_hide_footer_btm() {

	global $porfo;

	$output = 'show';

	if ( isset( $porfo['footer_bottom_switch'] ) ) {

		if( $porfo['footer_bottom_switch'] == true ) {

			$output = 'show';

		} else {

			$output = 'hide';

		}

	}

	if( function_exists( 'get_field') ) {

		if( get_field( 'hide_footer_bottom' ) ) {

			$output = 'hide';

		}

	}

	return $output;

}


/**
 *
 * The posts loop pagination
 *
 */
function porfo_page_posts_loop( $template )
{
    if( have_posts() ) :

        while( have_posts() ) : the_post();

            get_template_part('templates/content', $template );

        endwhile;

    else:
        get_template_part('templates/no-post');
    endif;
}


/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function porfo_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_attr( $before ) . esc_attr__('Create a menu', 'porfo') . esc_attr($after) . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>" . $link ."</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<". esc_attr($container) ." class='". esc_attr($container_class) ."' id='". esc_attr($container_id) ."'>$output</". esc_attr($container) .">";
    }

    if ( $echo )
    {
        echo $output;
    }

    return $output;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'porfo_loop_columns');

if (!function_exists('porfo_loop_columns')) {
	function porfo_loop_columns() {
		return 3; // 3 products per row
	}
}


/**
 *
 * By adding filter to loop_shop_per_page
 *
 */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );


/**
 *
 * WordPress link pages
 *
 */
function porfo_wp_link_pages() {

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'porfo' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );

}


function porfo_get_pulled_sidebar($pull_class) {

	echo '<aside class="col-md-4 '. $pull_class .' widget_col">';

				if( is_active_sidebar('porfo_sidebar') ) :
					dynamic_sidebar( 'porfo_sidebar' );
				endif;

	echo '</aside>';
}

/**
 *
 * Add classes to post class by filting
 * @return $classes
 */

add_filter('post_class', 'porfo_post_class');

function porfo_post_class( $classes ) {

	global $porfo;

	// Is single post page
	if( is_single() ) {
		$classes[] = 'singleBlog';
	}


	$classes[] = 'singlePost';
	$classes[] = 'post_loop_col';
	$classes[] = 'wow';



	if( isset($porfo['blog_grid']))
		if( ! is_single() )
			$classes[] = $porfo['blog_grid'];

	return $classes;
}



/**
 *
 * Registering Google Fonts
 *
 */


 function porfo_google_fonts_url() {

    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'porfo' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lato|Montserrat:300,400,500,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;

}



/**
 *
 * Enqueuing Google Maps Script with  API key
 *
 */
function porfo_google_maps_js_script() {

	global $porfo;

	if( isset( $porfo['google-api-key'] ) ) {
		$api_key = $porfo['google-api-key'];

		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=' . $api_key, array('jquery'), null, true );
	}
}


/**
 * Registers an editor stylesheet for the theme.
 */
function porfo_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'porfo_theme_add_editor_styles' );


/**
 *
 * Building Comments Lists
 *
 */
function porfo_comments_list( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'tracback' :
        case 'pingback' : ?>

        <li <?php esc_attr( comment_class() ); ?> id="comment-<?php esc_attr( comment_ID() ); ?>">
		<p><span class="title"><?php esc_html_e( 'Pingback:', 'porfo' ); ?></span> <?php esc_url( comment_author_link() ); ?> <?php esc_url ( edit_comment_link( esc_html__( '(Edit)', 'porfo' ), '<span class="edit-link">', '</span>' ) ); ?></p>

        <?php break;
        default : ?>
		<li <?php esc_attr( comment_class() ); ?>  id="comment-<?php esc_attr(comment_ID() ); ?>">

			<div class="johny-media clearfix">
				<div class="johny-media-left">
					<a href="#">
					 	<?php echo get_avatar( $comment, 80 ); ?>
					</a>
				</div>
				<div class="johny-media-body">
					<h4 class="media-heading"><?php esc_html( comment_author() ); ?></h4>

					<span class="time"><?php echo esc_html( the_time( get_option('date_format') ) );?> <?php  esc_html( comment_time() ); ?> </span>
					<div class="comments-body-text">
						<?php
							if( $comment->comment_approved  == 0 ) {
								esc_html_e('Your comment is awating for moderation.', 'porfo');
							} else {
								comment_text();
							}
						?>

					</div>

					<?php esc_url( edit_comment_link( esc_html__('Edit', 'porfo') ) ); ?>

					<?php
				        comment_reply_link( array_merge( $args, array(
				            'reply_text' => esc_html__('| &nbsp; Reply', 'porfo'),
				            'after' => ' <span> &nbsp; &#8595; </span>',
				            'depth' => $depth,
				            'max_depth' => $args['max_depth']
				        ) ) );
				    ?>
				</div>
			</div>
		</li>

        <?php // End the default styling of comment
        break;
    endswitch;
}




/**
 *
 * Custom Comment Form
 *
 */

add_filter('comment_form_defaults', 'porfo_custom_comment_form');

function porfo_custom_comment_form( $defaults ) {
	$defaults['title_reply'] = esc_attr__('Leave a comment', 'porfo');
	$defaults['comment_notes_before'] = esc_attr__(' ', 'porfo');
	$defaults['comment_notes_after'] = '';
	$defaults['class_form'] = 'comment_form animated fadeInUp';	$defaults['comment_field'] = '<div class="form-group">
			<label for="comment">'. esc_html__('Write a comment', 'porfo') .'</label>
		<textarea name="comment" id="comment" placeholder="'. esc_attr__('Leave a comment', 'porfo') .'"></textarea>
		</div>';

	return $defaults;
}


/**
 *
 * Shape custom comments field
 *
 */

add_filter('comment_form_default_fields', 'porfo_custom_comment_form_fields');

function porfo_custom_comment_form_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('required_name_email');
	$aria_req = ($req ? " aria-required='true'" : ' ');

	$yourNamePlaceholder  = $aria_req ? esc_attr__('Name *', 'porfo') : esc_attr__('Your name ', 'porfo');
	$yourEmailPlaceholder = $aria_req ? esc_attr__('Email *', 'porfo') : esc_attr__('Your email ', 'porfo');

	$fields = array(
		'author' => '<div class="form-group">
					<label for="author">'. $yourNamePlaceholder .'</label>
					<input
						type="text"
						id="author"
						name="author"
						value="'. esc_attr( $commenter['comment_author'] ) .'"
						'. $aria_req .'
					></div>',

		'email' => '<div class="form-group">
					<label for="email">'. $yourEmailPlaceholder .'</label>
					<input
						type="email"
						id="email"
						name="email"
						value="'. esc_attr( $commenter['comment_author_email'] ) .'"
						'. $aria_req .'
					></div>',


	);

	return $fields;
}


/**
 *
 * Shape Tag Cloud font size
 *
 */
function porfo_tag_cloud_widget($args) {
    $args['largest'] = 15; //largest tag
    $args['smallest'] = 15; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'porfo_tag_cloud_widget' );





/**
 *
 * Remove Redux Framework Notices
 *
 */

function porfo_remove_demo_redux_notice() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'porfo_remove_demo_redux_notice');


/**
 * Get blog posts page URL.
 *
 * @return string The blog posts page URL.
 */
function porfo_get_blog_posts_page_url() {
	// If front page is set to display a static page, get the URL of the posts page.
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return esc_url(get_permalink( get_option( 'page_for_posts' ) ));
	}
	// The front page IS the posts page. Get its URL.
	return esc_url(get_home_url('/'));
}


/**
 *
 * Check if the specified plugin is active or not
 *
 * @return  boolean
 */
function porfo_is_plugin_active( $name ) {

    if (  in_array( $name, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	} else {
		return false;
	}
}


// Apply filter
add_filter('body_class', 'porfo_set_body_class');

function porfo_set_body_class($classes) {

	global $porfo;

	if( isset( $porfo['back_to_top_btn'] ) && $porfo['back_to_top_btn'] == true ) {

		$classes[] = 'back-to-top';
	}

	return $classes;
}


/**
 * Set header class dynamically
 *
 */
function porfo_set_header_class() {

	// Globalizing theme options variables
	global $porfo;

    // Get the homepage ID
    $homepage_id = get_option( 'page_on_front' );

    // current page id
    $current_page_id = ( is_page( get_the_ID() ) ) ? get_the_ID() : '';



    $output_class = array();
    $output_class[] = 'header-area';

    if( porfo_is_plugin_active('redux-framework/redux-framework.php') == true  ) :

	    // If header layout is set from Theme Options
	    if( isset($porfo['header_layout']) ) {
	        $output_class[] = esc_html( $porfo['header_layout'] );
	    }

	endif;

    //
    // If get_field function is exsits
    // This functions active when ACF is active
    //
    if( function_exists('get_field') ) {

    	/*----------  Header Positions for specific page  ----------*/
    	if( get_field('header_color_scheme') ) {

		    if( ($key = array_search($porfo['header_layout'], $output_class)) !== false) {
		        unset($output_class[$key]);
		    }


			$output_class[] = get_field('header_color_scheme');


    	}


    }

    return $output_class;

}
/**
 * Set footer class dynamically
 *
 */
function porfo_set_sidemenu_clas() {

	// Globalizing theme options variables
	global $porfo;


    $output_class = array();
    $output_class[] = 'mainmenu-expand';

	$header_layout = ( isset( $porfo['header_layout'] ) ) ?  $porfo['header_layout'] : 'header_white';

    if( porfo_is_plugin_active('redux-framework/redux-framework.php') == true  ) :

	    // If header layout is set from Theme Options
	    if( isset($porfo['side_menu']) && $porfo['side_menu'] == true ) {
	        $output_class[] = esc_html( $header_layout );
	    }

	endif;

    //
    // If get_field function is exsits
    // This functions active when ACF is active
    //
    if( function_exists('get_field') ) {

    	/*----------  Header Positions for specific page  ----------*/
    	if( get_field('header_color_scheme') ) {


			// Globalizing theme options variables
			global $porfo;

		    if( ($key = array_search($porfo['header_layout'], $output_class)) !== false) {
		        unset($output_class[$key]);
		    }

			$output_class[] = get_field('header_color_scheme');


    	}


    }

    return $output_class;

}


/**
 * Set footer class dynamically
 *
 */
function porfo_set_footer_class() {

	// Globalizing theme options variables
	global $porfo;


    $output_class = array();
    $output_class[] = 'footer-area';

    if( porfo_is_plugin_active('redux-framework/redux-framework.php') == true  ) :

	    // If header layout is set from Theme Options
	    if( isset($porfo['footer_color_schema']) ) {
	        $output_class[] = esc_html( $porfo['footer_color_schema'] );
	    }

	endif;

    //
    // If get_field function is exsits
    // This functions active when ACF is active
    //
    if( function_exists('get_field') ) {

    	/*----------  Header Positions for specific page  ----------*/
    	if( get_field('footer_color_scheme') ) {

		    if( ($key = array_search($porfo['footer_color_schema'], $output_class)) !== false) {
		        unset($output_class[$key]);
		    }

			$output_class[] = get_field('footer_color_scheme');

    	}


    }

    return $output_class;

}


function porfo_get_site_logo() {

    global $porfo;

    $logo = '';
    $logo_url = '';

    $custom_logo = get_post_meta( get_the_ID(), 'page_custom_logo', true );

    if( $custom_logo ) {
        $img_url = wp_get_attachment_image_src( $custom_logo );
        $logo_url .= esc_url( $img_url[0] );
    } else if( isset( $porfo['logo'] ) ) {
        $logo_url .= esc_url( $porfo['logo']['url'] );
    } else {
        $logo_url .= get_template_directory_uri() .'/assets/img/logo.png';
    }


    $logo .= '<img src="'. $logo_url .'" alt="'. get_bloginfo('title') .'">';

    return $logo;
}





/**
 *
 * One click demo Installation for Porfo theme
 *
 */

function porfo_import_files() {
  return array(
    array(
      'import_file_name'           => 'Porfo',
      'local_import_file'            => PORFO_INC_DIR . '/demo-contents/porfo_content.xml',
      'import_preview_image_url'   => 'http://themes.graphchilly.com/wp-demos/porfo-demo/images/page_1.png',
      'import_notice'              => esc_html__( 'After importing the demo, you need set your preferred homepage layout from ', 'porfo') .
      		'<a href="'. trailingslashit( esc_url( home_url('/') ) ) .'wp-admin/options-reading.php">'. esc_html__('here', 'porfo') .'</a>',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'porfo_import_files' );
