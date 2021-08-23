<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="service-slider">

		<?php
			if( count( $services ) > 0 ) :
				foreach( $services as $service ) :
		?>

			<div class="single-service">
				<div class="service-content text-center">
					<i class="<?php echo esc_html( $service->icon ) ?>"></i>
					<h5><?php echo esc_html( $service->title ) ?></h5>
					<p><?php echo esc_html( $service->desc ) ?></p>
				</div>
			</div>


		<?php endforeach; else: ?>
			<div class="single-service">
				<div class="service-content text-center">
					<h5><?php esc_html_e('Add new services', 'porfo'); ?></h5>
				</div>
			</div>
		<?php endif; ?>


	</div>
</div>
