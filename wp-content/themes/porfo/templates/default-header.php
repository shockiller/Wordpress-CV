<?php


    $porfo = get_option('porfo');
?>

<!-- Header area start -->
<header id="header-area" class="<?php echo implode(' ', porfo_set_header_class()); ?>" data-spy="affix" data-offset-top="1">
    <nav class="navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-11">
                    <div class="navbar-inner">
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php echo porfo_get_site_logo();?>
                            </a>
                        </div>
                        <div class="main-menu-wrapper clearfix" id="navigation">
                            <?php
                                if( function_exists('wp_nav_menu') ) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'menu_id' => 'main-menu',
                                        'menu_class' => 'nav navbar-nav navbar-right',
                                        'walker'       =>  new Porfo_Nav_Menu_Walker
                                    ));
                                }
                            ?>
                        </div>

                        <?php if( isset( $porfo['side_menu'] ) && $porfo['side_menu'] == true  ) : ?>
                            <div class="expand-menu-open hide-on-mobile">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <?php endif; ?>

                        <div class="expand-menu-open show-on-mobile">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header area end -->


    <!-- Slide menu start -->
    <div class="<?php echo implode(' ', porfo_set_sidemenu_clas()); ?>">
        <div class="close-menu">
            <i class="ti-close"></i>
        </div>
        <div class="menu-logo">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
                <?php echo porfo_get_site_logo();?>
            </a>
        </div>
        <nav class="navbar">
            <div class="mainmenu-box" id="navigation-2">
                <?php
                    if( function_exists('wp_nav_menu') ) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'menu_id' => 'slide-nav',
                            'menu_class' => 'nav navbar-nav'
                        ));
                    }
                ?>
            </div>
        </nav>
        <div class="sidebar-bookmark-area">
            <p>
                <?php
                    if( isset( $porfo['sidemenu_social_title'] ) )
                        echo esc_html( $porfo['sidemenu_social_title'] );
                ?>
            </p>
            <ul class="expand-social social-bookmark">
                <?php
                    if( shortcode_exists('porfo_social_list') ) {
                        echo do_shortcode( $porfo['sidemenu_social_list'] );
                    }
                ?>
            </ul>
        </div>
        <p class="expand-copyright">
            <?php
                // Don't need to use esc_html here
                // Because html mark up is allowed here
                echo esc_html( $porfo['footer_copyright_text'] );
            ?>
        </p>
    </div>
    <!-- Slide menu end -->
