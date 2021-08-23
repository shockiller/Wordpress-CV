<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}

$img = wp_get_attachment_image_src( $title_icon_img, 'full' );


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<div class="single-resume">
		<p class="work-duration"><?php echo esc_html( $date ); ?></p>
		<h4>
			<?php

				if( $use_icon == 'yes' ) {
					echo '<span class="title-icon">';
					echo '<i class="'. esc_attr( $title_icon ) .'"></i>';
					echo '</span>';
				}
				if( $use_icon_image == 'yes' ) {
					echo '<span class="title-icon">';
					echo '<img src="'. esc_url( $img[0] ) .'" alt="'. esc_html( $title ) .'">';
					echo '</span>';
				}
				echo esc_html( $title );
			?>
		</h4>
		<p><?php echo esc_html( $details ); ?></p>
		<h5><?php echo esc_html( $location ); ?></h5>
	</div>
</div>
