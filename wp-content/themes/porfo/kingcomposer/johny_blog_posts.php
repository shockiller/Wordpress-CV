<?php

extract( $atts );

global $porfoObj;

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

	<?php
		// Query for blog posts
		$args = array(
			'post_type' => 'post',
			'posts_per_page'   => $limit,
			'orderby'   => $orderby,
			'order'   => $order,
		);

		$posts = new WP_Query( $args );


		if( $posts->have_posts() ) :

	?>

	<div class="johny-blog-posts-wrapper">

		<?php
			while( $posts->have_posts() ) :
				$posts->the_post();


			?>

			<div class="<?php echo esc_attr( $grid_column ); ?>">

				<div class="blog-post vertical">
					<div class="post-thumbnail">
						<a href="<?php echo esc_url( get_the_permalink() ) ; ?>">
							<?php the_post_thumbnail('porfo-service-img-large') ?>
						</a>
					</div>
					<div class="post-content">
						<div class="post-content-inner">
							<<?php echo esc_attr( $title_tag ); ?>>
								<?php echo '<a href="'. esc_url( get_the_permalink() )  .'">'. get_the_title() .'</a>'; ?>
							</<?php echo esc_attr( $title_tag ); ?>>
							<p><?php echo esc_html( $porfoObj->postExcerpt( $content_limit, get_the_excerpt() ) ); ?></p>
						</div>
						<div class="post-footer">
							<div class="read-more-btn">
								<a href="<?php echo esc_url( get_the_permalink() ) ; ?>" class=""><?php echo esc_html( $read_more_text ); ?></a>
							</div>

						</div>
					</div>
				</div>

			</div>

			<?php
		    	endwhile;
		        wp_reset_postdata();

		    ?>

	</div>

	<?php else: ?>
	    <div class="col-md-4 col-sm-6">
			<?php esc_html_e('Please add new post', 'porfo'); ?>
	    </div>
	<?php endif; ?>
</div>
