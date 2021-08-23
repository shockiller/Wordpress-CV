<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}

// Expload image id's to an array
$img_array = explode(',', $images);


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="client-logo-slider">

		<?php
			if( count( $img_array ) > 0 ) :
				foreach ($img_array as $image) :
					$img = wp_get_attachment_image_src( $image, 'full' );
		?>
			<div class="single-brand-logo">
				<div class="client-logo-wrapper text-center">
					<div class="client-logo-inner">
						<img src="<?php echo esc_url( $img[0] ); ?>" alt="">
					</div>
				</div>
			</div>
		<?php endforeach; else: ?>
			<div class="single-brand-logo">
				<div class="client-logo-wrapper text-center">
					<div class="client-logo-inner">
						<?php esc_html_e('Please add images', 'porfo'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>
