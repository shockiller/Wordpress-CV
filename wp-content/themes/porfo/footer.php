<?php

    $porfo = get_option('porfo');


?>

    </div>



    <footer class="<?php echo implode(' ', porfo_set_footer_class()); ?>" >
        <div class="container">
            <div class="row">
                <?php
                    if( is_active_sidebar('porfo_footer_widget') ) {
                        dynamic_sidebar('porfo_footer_widget');
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="social-bookmark footer-social text-center">
                        <ul>
                            <?php
                                if( shortcode_exists('porfo_social_list') ) {
                                    echo do_shortcode( $porfo['footer_social_list'] );
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="copyright text-center">
                        <p>
                            <?php
                                // Don't need to use esc_html here
                                // Because html mark up is allowed here
                                echo esc_html( $porfo['footer_copyright_text'] );
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <?php wp_footer(); ?>
</body>

</html>
