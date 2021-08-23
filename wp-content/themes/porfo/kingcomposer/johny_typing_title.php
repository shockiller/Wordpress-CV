<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'porfo_spacer' );

if( !empty( $extra_class ) ) {
	$wrap_class[] = $extra_class;
}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
	<h1 class="cd-headline clip ">

		<span><?php echo esc_html( $before_typewriter_text ); ?></span>

		<span class="cd-words-wrapper">
			<?php

				$count = 0;

				if( count( $titles ) > 0 ) :

					foreach( $titles as $title ) :

						if( $count == 0 ) :
							echo '<b class="is-visible">'. esc_html($title->title) .'</b>';
						else :
							echo '<b>'. esc_html($title->title) .'</b>';
						endif;

						$count++;

					endforeach;
				endif;
			?>
		</span>
	</h1>
</div>
