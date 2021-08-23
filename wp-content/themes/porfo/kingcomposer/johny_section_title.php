<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="section-title">
        <?php
			echo '<'. esc_attr($type) .' class="title">';
			echo esc_html( $title );
			echo '</'. esc_attr($type) .'>';
		?>
    </div>
</div>
