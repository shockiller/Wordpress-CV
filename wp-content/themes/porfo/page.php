<?php
get_header();
?>


    <!-- 15. breadcrumb_area -->
    <?php

        echo $porfoObj->porfo_breadcrumb_bridge( );


    ?>
    <!-- 15. /breadcrumb_area -->

    <?php
        // Get blog page grid options

        // Get blog page layout options
        $layout = ( isset( $porfo['single_page_layout'] ) ? $porfo['single_page_layout'] : 'fullpage' );

    ?>

    <div class="container page_single">

        <div class="row">
            <?php
                if( have_posts() ) :
                    while( have_posts() ) :
                        the_post(); ?>

                            <?php if ( isset($layout) && $layout == 'left-sidebar' ): ?>

                                <div class="col-md-8 col-md-push-4">
                                    <?php $porfoObj->theContentWithComment(); ?>
                                </div>

                                <?php porfo_get_pulled_sidebar('col-md-pull-8'); ?>

                            <?php elseif ( isset($layout) && $layout == 'right-sidebar' ): ?>

                                <div class="col-md-8">
                                    <?php $porfoObj->theContentWithComment(); ?>
                                </div>

                                <?php get_sidebar(); ?>


                            <?php elseif ( isset($layout) && $layout == 'fullpage' ): ?>

                                <div class="col-md-12">
                                    <?php $porfoObj->theContentWithComment(); ?>
                                </div>

                            <?php else: ?>
                                <div class="col-md-12">
                                    <?php $porfoObj->theContentWithComment(); ?>
                                </div>
                            <?php endif ?>


                <?php  endwhile;
                endif;
            ?>
        </div>
    </div>

<?php
get_footer();
?>
