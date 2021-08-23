<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}

$img = wp_get_attachment_image_src( $image, 'full' );


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="profile-image">
		<img src="<?php echo esc_attr( $img[0] ); ?>" alt="">
	</div>
</div>
