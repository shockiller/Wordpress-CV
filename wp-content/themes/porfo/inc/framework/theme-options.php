<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "porfo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'porfo' ),
        'page_title'           => esc_html__( 'Theme Options', 'porfo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 2,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'porfo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'porfo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'porfo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'porfo' ),
            'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'porfo' ) . '</p>'
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'porfo' ),
            'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'porfo' ) . '</p>'
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content =  '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'porfo' ) . '</p>';
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */



    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'porfo' ),
        'id'               => 'header_settings',
        'class'            => 'option-page-layout',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => 'header_layout',
                'type'     => 'radio',
                'title'    => esc_html__( 'Header Color Scheme', 'porfo' ),
                'subtitle' => esc_html__( 'Select the header navigation layout', 'porfo' ),
                'options'          => array(
                    'header-white' => '<img src="'. get_template_directory_uri() .'/assets/img/headers/header-white.png" alt="" class="radio-img">',
                    'header-black' => '<img src="'. get_template_directory_uri() .'/assets/img/headers/header-black.png" alt="" class="radio-img">',
                ),
                'default'  => 'header_white',
            ),
            array(
                'id'       => 'back_to_top_btn',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable back to top button', 'porfo' ),
                'subtitle' => esc_html__( 'Toggle this to enable/disable back to top button', 'porfo' ),
                'default'  => false,
            ),
            array(
                'id'       => 'side_menu',
                'type'     => 'switch',
                'title'    => esc_html__( 'Site Side Menu', 'porfo' ),
                'subtitle' => esc_html__( 'Choose to enable or disable side menu', 'porfo' ),
                'default'  => false,
            ),
            array(
                'id'       => 'sidemenu_social_title',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Social menu title text', 'porfo' ),
                'description' => esc_html__('Enter social menu title text here that will show above the social icons', 'porfo'),
                'default'     => esc_html__('Flow me on social media:', 'porfo'),
                'required'   => array( 'side_menu', 'equals', true ),
            ),
            array(
                'id'       => 'sidemenu_social_list',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Social Links for Side Menu', 'porfo' ),
                'description' => esc_html__('Get a list of icons names from ', 'porfo') . '<a target="_blank" href="'. esc_url('https://themify.me/themify-icons') .'">'. esc_html__('here', 'porfo') .'</a>' ,
                'default'     => __('[porfo_social_list icon="ti-facebook" link="#"]', 'porfo'),
                'required'   => array( 'side_menu', 'equals', true ),
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Logo', 'porfo' ),
        'id'               => 'logo_settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Logo', 'porfo' ),
                'subtitle' => esc_html__( 'Choose the site logo', 'porfo' ),
                'default'  => array(
                    'url'=>  get_template_directory_uri() . '/assets/img/logo.png'
                ),
            ),

        )
    ) );



    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Breadcrumbs', 'porfo' ),
        'id'               => 'breadcrumb_settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'breadcrumb_on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb On/Off ', 'porfo' ),
                'subtitle'    => esc_html__( 'Make the breadcrumb Visible/Hidden.', 'porfo' ),
                'default'     => true,
            ),
            array(
                'id'       => 'breadcrumb_sep',
                'type'     => 'text',
                'title'    => esc_html__( 'Breadcrumb Seperator ', 'porfo' ),
                'default'     => '/',
            ),
            array(
                'id'        => 'breadcrumb_background',
                'type'      => 'background',
                'output'    => array('.breadcrumb_area'),
                'title'     => esc_html__( 'Breadcrumb Background', 'porfo' ),
                'subtitle'  => esc_html__( 'Customize your breadcrumb background area.', 'porfo' ),
                'desc'      => esc_html__( 'This setting can be override by page breatdcrumb settings.', 'porfo' ),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'                => 'breadcrumb_spacing',
                'type'              => 'spacing',
                'output'            => array('.breadcrumb_area'),
                'mode'              => 'padding',
                'units'             => array('em', 'px'),
                'units_extended'    => 'false',
                'title'             => esc_html__('Breadcrumb Area Padding', 'porfo'),
                'subtitle'          => esc_html__('Please specify breadcrumb area padding.', 'porfo'),
                'required'          => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'          => 'breadcrumb_typography',
                'type'        => 'typography',
                'title'       => esc_html__('Breadcrumb Title Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'output'      => array('.breadcrumb_area .breadcrumb_title'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for breadcrumb title', 'porfo'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'          => 'link_breadcrumb_typography',
                'type'        => 'typography',
                'title'       => esc_html__('Breadcrumb Link Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'output'      => array('.breadcrumb_area .breadcrumbs span'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for  breadcrumb links', 'porfo'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'          => 'link_breadcrumb_typography_hover',
                'type'        => 'typography',
                'title'       => esc_html__('Breadcrumb Link Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'output'      => array('.breadcrumbs a span:hover'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for active breadcrumb links hover', 'porfo'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'          => 'active_breadcrumb_typography',
                'type'        => 'typography',
                'title'       => esc_html__('Active Breadcrumb Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'output'      => array('.breadcrumb_area .breadcrumbs span'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for active breadcrumb links', 'porfo'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),

            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'porfo' ),
        'id'               => 'body_typography',
        'customizer_width' => '450px',
        'fields'           => array(
             array(
                 'id'       => 'bdy_typography',
                'type'        => 'typography',
                'title'       => esc_html__('Body Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'output'      => array('body'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for body', 'porfo'),
            ),
             array(
                 'id'       => 'h1_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H1 Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'line-height' => true,
                'output'      => array('h1, .h1'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h1', 'porfo'),
            ),
             array(
                 'id'       => 'h2_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H2 Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'line-height' => true,
                'output'      => array('h2, .h2'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h2', 'porfo'),
            ),
             array(
                 'id'       => 'h3_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H3 Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'line-height' => true,
                'output'      => array('h3, .h3, .post-content-inner > .post-title'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h3', 'porfo'),
            ),
             array(
                 'id'       => 'h4_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H4 Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'line-height' => true,
                'output'      => array('h4, .h4'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h4', 'porfo'),
            ),
             array(
                 'id'       => 'h5_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H5 Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'line-height' => true,
                'output'      => array('h5, .h5'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h5', 'porfo'),
            ),
             array(
                 'id'       => 'h6_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H6 Typography', 'porfo'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'line-height' => true,
                'output'      => array('h6, .h6'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h6', 'porfo'),
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Settings', 'porfo' ),
        'id'               => 'page_setings',
        'desc'             => esc_html__( 'Scorn blog settings!', 'porfo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Page', 'porfo' ),
        'id'               => 'blog_settings',
        'customizer_width' => '450px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bp_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Page Title', 'porfo' ),
                'subtitle'    => esc_html__( 'Give any breadcrumb page title for the blog page.', 'porfo' ),
                'default'     => __('Read the latest from our blog', 'porfo'),
            ),
            array(
                'id'       => 'rmb_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Read more button text', 'porfo' ),
                'subtitle'    => esc_html__( 'Enter the text for posts read more button for .', 'porfo' ),
                'default'     => esc_html__('Continue reading...', 'porfo'),
            ),
            array(
                'id'       => 'blog_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Layout', 'porfo' ),
                'subtitle' => esc_html__( 'Choose the layout you want in blog pages', 'porfo' ),
                'options'          => array(
                    'fullpage' => get_template_directory_uri() .'/assets/img/layouts/fullpage.png"',
                    'left-sidebar' => get_template_directory_uri() .'/assets/img/layouts/left-sidebar.jpg"',
                    'right-sidebar' => get_template_directory_uri() .'/assets/img/layouts/right-sidebar.jpg"',
                ),
                'default'  => 'right-sidebar',
            ),
            array(
                'id'       => 'blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Grid', 'porfo' ),
                'subtitle' => esc_html__( 'Choose the number of column you want in blog pages', 'porfo' ),
                'options'          => array(
                    'one-column' => get_template_directory_uri() .'/assets/img/layouts/1-col.png"',
                    'two-column' => get_template_directory_uri() .'/assets/img/layouts/2-col.png"',
                    'three-column' => get_template_directory_uri() .'/assets/img/layouts/3-col.png"',
                ),
                'default'  => 'one-column',
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page', 'porfo' ),
        'id'               => 'single_page_settings',
        'customizer_width' => '450px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'single_page_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Single Page Layout', 'porfo' ),
                'subtitle' => esc_html__( 'Choose the layout you want in single pages', 'porfo' ),
                'options'          => array(
                    'fullpage' => get_template_directory_uri() .'/assets/img/layouts/fullpage.png"',
                    'left-sidebar' => get_template_directory_uri() .'/assets/img/layouts/left-sidebar.jpg"',
                    'right-sidebar' => get_template_directory_uri() .'/assets/img/layouts/right-sidebar.jpg"',
                ),
                'default'  => 'fullpage',
            ),
        )
    ) );



    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'porfo' ),
        'id'               => 'footer',
        'desc'             => esc_html__( 'Scorn footer settings!', 'porfo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'footer_color_schema',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Color Schema', 'porfo' ),
                'description' => esc_html__('Choose the footer color scheme you want.', 'porfo'),
                'options'  => array(
                    'footer-white' => 'White Footer',
                    'footer-black' => 'Black Footer',
                ),
                'default'  => 'footer-white'
            ),
            array(
                'id'       => 'footer_bg_color',
                'type'     => 'background',
                'output'     => array('.footer-area'),
                'title'    => esc_html__( 'Footer Background Color', 'porfo' ),
                'description' => esc_html__('Choose the footer background color.', 'porfo'),
                'background-image' => false,
                'background-size' => false,
                'background-repeat' => false,
                'background-attachment' => false,
                'background-position' => false,
            ),
            array(
                'id'       => 'footer_spacing',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'output'     => array('.footer-area'),
                'units'          => array('em', 'px'),
                'title'    => esc_html__( 'Footer Padding', 'porfo' ),
                'description' => esc_html__('Customize the footer area spacing.', 'porfo'),
            ),
            array(
                'id'       => 'footer_copyright_text',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer copyright text', 'porfo' ),
                'description' => esc_html__('Add footer copyright text that will show in the footer.', 'porfo'),
                'default'     => '&copy; Copyright MarvelTheme 2018',
            ),
            array(
                'id'       => 'footer_social_list',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer Social List', 'porfo' ),
                'subtitle' => esc_html__('Add any shortcodes like social shortcodes etc', 'porfo'),
                'description' => esc_html__('Get a list of icons names from ', 'porfo') . '<a target="_blank" href="'. esc_url('https://themify.me/themify-icons') .'">'. esc_html__('here', 'porfo') .'</a>' ,
                'default'     => __('[porfo_social_list icon="ti-facebook" link="#"][porfo_social_list icon="ti-twitter" link="#"][porfo_social_list icon="ti-instagram" link="#"]', 'porfo'),
            ),
            array(
                'id'       => 'footer_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Footer Widgets Layout', 'blooom' ),
                'subtitle' => esc_html__( 'Choose the number of column you want in footer', 'blooom' ),
                'options'          => array(
                    'col-md-12' => get_template_directory_uri() .'/assets/img/layouts/1-col.png"',
                    'col-md-6' => get_template_directory_uri() .'/assets/img/layouts/2-col.png"',
                    'col-md-4' => get_template_directory_uri() .'/assets/img/layouts/3-col.png"',
                    'col-md-3' => get_template_directory_uri() .'/assets/img/layouts/4-col.png"',
                ),
                'default'  => 'col-md-3',
            ),
        )
    ) );



    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'porfo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'porfo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
