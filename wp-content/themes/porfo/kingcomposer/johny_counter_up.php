<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="single-counter">
		<div class="counter-content">
			<i class="<?php echo esc_attr( $icon ); ?>"></i>
			<h3><?php echo esc_html( $title ); ?></h3>
			<h2 class="counter-number"><?php echo esc_html( $number ); ?></h2>
		</div>
	</div>
</div>
