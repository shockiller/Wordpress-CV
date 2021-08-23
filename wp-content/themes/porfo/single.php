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

    <!-- 23. blog_area -->
    <div class="blog_area sp">
        <div class="container">
            <div class="row">

                <?php $porfoObj->thePostLoop( 'single' ); ?>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </div>

<?php
get_footer();
?>
