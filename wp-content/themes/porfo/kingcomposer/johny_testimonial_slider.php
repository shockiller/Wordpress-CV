<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

	<div class="testimonial-slider">

		<?php
			if( count( $testimonials ) > 0 ) :
				foreach( $testimonials as $testimonial ) :

					$img = wp_get_attachment_image_src( $testimonial->image, 'full' );

		?>

				<div class="single-testimonial">
					<div class="client-avatar">
						<img src="<?php echo esc_url( $img[0] ) ?>" alt="">
					</div>
					<div class="testimonial-content-wrapper">
						<div class="testimonial-content text-center">
							<h4><?php echo esc_html( $testimonial->name ); ?></h4>
							<h6><?php echo esc_html( $testimonial->designation ); ?></h6>
							<p><?php echo esc_html( $testimonial->comment ); ?></p>
						</div>
					</div>
				</div>

		<?php endforeach; else: ?>
			<div class="single-testimonial">
				<div class="testimonial-content-wrapper">
					<div class="testimonial-content text-center">
						<h4><?php esc_html_e('Please add new testimonial', 'porfo'); ?></h4>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
