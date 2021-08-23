<?php
get_header();
?>


    <!-- 15. breadcrumb_area -->
    <?php
        // Get the theme options
        $porfo = get_option( 'porfo' );

        echo $porfoObj->porfo_breadcrumb_bridge();

    ?>
    <!-- 15. /breadcrumb_area -->

    <?php
        // Get blog page grid options
        $column = ( isset( $porfo['blog_grid'] ) ? $porfo['blog_grid'] : 'one-column' );

        // Get blog page layout options
        $layout = ( isset( $porfo['blog_layout'] ) ? $porfo['blog_layout'] : 'right-sidebar' );
    ?>

    <!-- 23. blog_area -->
    <div class="blog_area sp">
        <div class="container">
            <div class="row">

                <?php if( $layout == 'fullpage') : ?>

                    <?php $porfoObj->thePostLoop( $column, true ); ?>

                <?php elseif( $layout ==  'left-sidebar' ) : ?>

                    <?php get_sidebar(); ?>

                    <?php $porfoObj->thePostLoop( $column ); ?>

                <?php elseif( $layout == 'right-sidebar' ) : ?>

                    <?php $porfoObj->thePostLoop( $column ); ?>

                    <?php get_sidebar(); ?>

                <?php else: ?>

                    <?php $porfoObj->thePostLoop( $column ); ?>

                    <?php get_sidebar(); ?>

                <?php endif; ?>


            </div>
        </div>
    </div>

<?php
get_footer();
?>
