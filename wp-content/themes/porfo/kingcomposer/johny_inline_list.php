<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<ul class="johny-list-inline">

		<?php


			if( count( $lists ) > 0 ) :

				foreach( $lists as $list ) :

					echo '<li>'. esc_html($list->text) .'</li>';

				endforeach;
			endif;
		?>
	</ul>


</div>
