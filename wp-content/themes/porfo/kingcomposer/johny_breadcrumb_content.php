<?php

global $porfoObj;

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="breadcrumb-content">
		<?php
			echo $porfoObj->porfo_breadcrumbs();
		?>
	</div>
</div>
