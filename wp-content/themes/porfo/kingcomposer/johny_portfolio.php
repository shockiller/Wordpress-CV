<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

	<?php


            //
            // Query for all the portfolio posts
            //
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page'   => $limit,
                'orderby'   => $orderby,
                'order'   => $order,
            );

            $posts = new WP_Query( $args );

            if( $posts->have_posts() ) :
    ?>

		<div class="portfolio-content">

			<div class="portfolio-filter-wrap text-center">

				<?php if( $pf_switch == 'yes' ) : ?>
					<ul class="portfolio-filter">
						<?php
	                        //
							// Get terms
							// And build filter buttons
	                        $terms = get_terms( 'portfolio-tag' );

	                        $count_terms = count( $terms );

	                        if ( $count_terms > 0 ) :

								echo '<li class="active" data-filter="*">All</li>';

	                            foreach ( $terms as $term ) :

									echo '<li data-filter=".'.esc_attr( strtolower( $term->name ) ).'">'. esc_attr( $term->name ) .'</li>';

								endforeach;
							endif;
						?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="portfolio portfolio-masonry">

				<?php
					//
					// Loop over through posts
					//
                    while( $posts->have_posts() ) :
                    $posts->the_post();

					// Get taxonomies for single portfolio posts
					$tags      	= get_the_terms( get_the_ID(), 'portfolio-tag' );
					$tagsCount 	= count( $tags );
					$count      = 0;
					$termArr 	= array();

					// Loop over throuth each the terms
					if( $tags ) {
						foreach($tags as $type) {
								$termArr[] = strtolower( $type->name ) ;
						}
					}

					// Get the portfolio attachment id
					$attachment_id = get_post_thumbnail_id( get_the_ID() );
					$thumbnail = wp_get_attachment_image_src( $attachment_id, 'full' );
					$thumb_img_meta = wp_get_attachment_metadata( $attachment_id );


					// Build classes for Portfolio Item
                    $build_pf_item_classes = array();
                    $build_pf_item_classes[] = 'portfolio-item';

					// Get the portfolio post terms
                    $build_pf_item_classes[] = implode(' ', $termArr);


                    if( $thumb_img_meta['width'] >= 650 ) {
                        $build_pf_item_classes[] = 'portfolio-item-big';
                    }

                    if( $thumb_img_meta['height'] >= 580 ) {
                        $build_pf_item_classes[] = 'portfolio-item-xl';
                    }
				?>
				<div class="<?php echo implode(' ', $build_pf_item_classes); ?> ">
					<div class="portfolio-item-content" >
						<div class="item-thumbnail"  style="background-image: url('<?php echo esc_url( $thumbnail[0] ) ?>')"></div>


							<div class="portfolio-details" data-href="<?php esc_url( the_permalink() ); ?>">
								<div class="portfolio-details-inner">
									<a class="venobox portfolio-view-btn" data-gall="myGallery" href="<?php echo esc_url( $thumbnail[0] ) ?>"><i class="ti-fullscreen"></i></a>
									<h3><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html( the_title() );  ?></a></h3>

									<?php
										echo '<span class="portfolio-category">';
										echo  implode(', ', $termArr);
										echo '</span>';
									?>

								</div>
							</div>


					</div>
				</div>
				<?php endwhile; ?>

			</div>
		</div>

	<?php endif; ?>
</div>
